<?php

namespace App\Http\Controllers;
use App\User;
use App\Streaming;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use PDF;
use App\Notifications\RegisteredNotification;

class StreamingController extends Controller
{
    //

    public function store_netflix($id_forfait){

      $forfait = DB::table('forfait')->where('id', $id_forfait)->first();

      // Prevent user from having more than 3 orders
      /*
      $user = auth()->user();
      if (($user->streamings()->count()) > 3) {
        flash("Oups! vous avez atteint le nombre maximal (3) de commandes")->error();
        return redirect()->route('streaming.account');
      }
      */
      // end Prevent



      $stream = Streaming::create([
          'forfait_name' => $forfait->name,
          'user_id' => (auth()->user()->id),
          'forfait_type' => $forfait->type,
          'forfait_price' => $forfait->price,
          'forfait_statut' => 'Non payé',
      ]);

      flash("Votre forfait a bien été ajouté. Procédez au paiement")->success();

      return redirect()->route('streaming.account');

    }

    public function account()
    {
      // $streams = Streaming::latest()->paginate(10);
      $streams = (auth()->user())->streamings()->paginate(10);

      return view('streaming.account', compact('streams'));
    }

    public function deleteForfait($id_forfait)
    {
      Streaming::destroy($id_forfait);
      flash("Votre commande a bien été supprimé.")->error();
      return redirect()->route('streaming.account');
    }

    public function payment(Streaming $stream)
    {
      if ($stream->forfait_statut != "Non payé") {
        return abort(401);
      }
      return view('streaming.payment', compact('stream'));
    }

    /* Preuve du paiement
        Avec blocage de l'accès à la vue dans le cas ou le statut du forfait est différent de "Non payé"
    */
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
      // dd($request->file('proof'));

          // dump($request->file('proof')->getClientOriginalName());
          // dump($request->file('proof'));
          // $request->proof->move($destinationPath, $fileName);

          $request->validate([
              'proof' => 'required|image',
          ]);

          $file = $request->file('proof');
          // dd($file);
          //Display File Name
          // echo 'File Name: '.$file->getClientOriginalName();
          // echo '<br>';

          //Display File Extension
          // echo 'File Extension: '.$file->getClientOriginalExtension();
          // echo '<br>';

          //Display File Real Path
          // echo 'File Real Path: '.$file->getRealPath();
          // echo '<br>';

          //Display File Size
          // echo 'File Size: '.$file->getSize();
          // echo '<br>';

          $path = $file->store('proofs', 'public');

          $stream->forfait_statut = "En cours de validation";
          $stream->path_proof = $path;
          $stream->save();

          return view('streaming.payment_success', compact('stream'));


    }

    public function index()
    {
      $forfaits = DB::table('forfait')->where('name', 'Netflix')->get();
       // toastr()->success('Bienvenue');

       // alert()->success('Connectez vous.','Bienvenue '.auth()->user()->name)->autoclose(3500);
       // alert()->basic('Sweet Alert with basic.','Basic');
       // alert()->warning('Sweet Alert with warning.');

      return view('streaming.index', compact('forfaits'));
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
