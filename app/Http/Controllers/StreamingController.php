<?php

namespace App\Http\Controllers;
use PDF;
use App\User;
use App\Streaming;
use App\Notifications\NewPayment;
use App\Notifications\RegisteredNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class StreamingController extends Controller
{
    //
    public function index()
    {
       // toastr()->success('Bienvenue');

       // alert()->success('Connectez vous.','Bienvenue '.auth()->user()->name)->autoclose(3500);
       // alert()->basic('Sweet Alert with basic.','Basic');
       // alert()->warning('Sweet Alert with warning.');

      // return view('streaming.index', compact('$forfaits'));
      $forfaits_netflix = DB::table('forfait')->where('name', 'Netflix')->get();
      $forfaits_amazon = DB::table('forfait')->where('name', 'Amazon')->get();

      return view('streaming.index')->with([
        'forfaits_netflix' => $forfaits_netflix,
        'forfaits_amazon' => $forfaits_amazon,
      ]);
    }

    public function store_stream($id_forfait)
    {

      $forfait = DB::table('forfait')->where('id', $id_forfait)->first();
      // Prevent user from having more than 3 orders
      $user = auth()->user();
      if (($user->streamings()->count()) >= 3) {
        flash("<div class='text-center'> <i data-feather='alert-triangle' stroke-width='2.5' width='20' height='20'></i> Désolé! vous ne pouvez pas passer plus de 3 commandes </div>")->error();
        return redirect()->route('streaming.orders');
      }
      // end Prevent

      $stream = Streaming::create([
          'forfait_name' => $forfait->name,
          'user_id' => (auth()->user()->id),
          'forfait_type' => $forfait->type,
          'forfait_price' => $forfait->price,
          'forfait_statut' => 'Non payé',
      ]);


      flash("<div class='text-center'> Votre commande a été enregistré n° $stream->id . Passez maintenant à la caisse </div>")->success();
      return redirect()->route('streaming.orders');
    }

    public function my_orders()
    {
      // $streams = Streaming::latest()->paginate(10);
      $streams = (auth()->user())->streamings()->orderBy('created_at')->paginate(10);
      return view('streaming.orders', compact('streams'));
    }

    public function deleteStream($id_forfait)
    {
      Streaming::destroy($id_forfait);
      flash("<div class='text-center'> Votre commande a bien été retiré. </div>")->error();
      return redirect()->route('streaming.orders');
    }

    public function payment(Streaming $stream)
    {
      if ($stream->forfait_statut != "Non payé") {
        return abort(401);
      }
      return view('streaming.payment', compact('stream'));
    }

    public function payment_proof(Streaming $stream)
    {
      if ($stream->forfait_statut != "Non payé") {
        return abort(401);
      }
      return view('streaming.payment_proof', compact('stream'));
    }

    // Enregistrement de la preuve du paiement
    public function payment_proof_store(Streaming $stream, Request $request)
    {
      if ($stream->forfait_statut != "Non payé") {
        return abort(401);
      }
      $request->validate([
        'proof' => 'required|image',
      ]);

      $file = $request->file('proof');
      $path = $file->store('proofs', 'public');

      $stream->forfait_statut = "En cours de validation";
      $stream->path_proof = $path;
      $stream->save();

      \Notification::route('mail', 'lazarefortune@gmail.com')
            ->notify(new NewPayment());

      return view('streaming.payment_success', compact('stream'));
    }

    public function getFacturePdf(Streaming $stream)
    {
        $date = Carbon::now();
        // L'instance PDF avec la vue resources/views/streaming/facture.blade.php
        $pdf = PDF::loadView('streaming.facture', compact('stream', 'date'));

        // Lancement du téléchargement du fichier PDF
        return $pdf->download(\Str::slug('Facture '.$stream->id.' '.$stream->user->name.' '.$stream->created_at, '-').".pdf");
        // return $pdf->stream();
    }

}
