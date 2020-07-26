<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Streaming;
use Illuminate\Support\Carbon;
use App\Notifications\InvoicePaid;

class ForfaitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $forfaits = DB::table('forfait')->get();

        return view('admin.streaming.forfait', ['forfaits' => $forfaits]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.streaming.create_forfait');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'name' => ['required', 'string', 'min:3'],
          'type' => ['required', 'string', 'min:3'],
          'description' => ['nullable','string', 'min:8'],
          'price' => ['required', 'numeric'],
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }



        $forfait = DB::table('forfait')->insert(
            [
              'name' => $request->name,
              'type' => $request->type,
              'description' => $request->description,
              'price' => $request->price
            ]
        );

        flash("Forfait ajouté avec succès")->success();

        return redirect()->route('admin.streaming.forfaits');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $forfait = DB::table('forfait')->where('id', $id)->first();

      return view('admin.streaming.edit-forfait', ['forfait' => $forfait]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $validator = Validator::make($request->all(), [
        'name' => ['required', 'string', 'min:3'],
        'type' => ['required', 'string', 'min:3'],
        'description' => ['nullable','string', 'min:8'],
        'price' => ['required', 'numeric'],
      ]);

      if ($validator->fails()) {
          return back()
                      ->withErrors($validator)
                      ->withInput();
      }

      $val = DB::table('forfait')
              ->where('id', $id)
              ->update([
                'name' => $request->name,
                'type' => $request->type,
                'description' => $request->description,
                'price' => $request->price
            ]);

        flash("Forfait mis à jour avec succès")->success();

        return redirect()->route('admin.streaming.forfaits');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $delete = DB::table('forfait')->where('id', $id)->delete();

        flash("Forfait supprimé avec succès")->error();

        return redirect()->route('admin.streaming.forfaits');

    }


    // Liste des commandes
    public function command_list()
    {
      // $commands = DB::table('streamings')->where('forfait_statut', 'En cours de validation')->get();

      $commands = Streaming::all()->where('forfait_statut', 'En cours de validation');
      $actifs = Streaming::all()->where('forfait_statut', 'Payé');

      return view('admin.streaming.command_list', compact('commands', 'actifs'));
    }

    // Confirmation d'un paiement
    public function confirm_payment_proof(Streaming $stream)
    {
      // $user = $stream->user;
      // $user->notify(new InvoicePaid($user, $stream));
      // die();

      $stream->forfait_statut = "Payé";
      $stream->forfait_start = Carbon::now();
      $stream->forfait_end = Carbon::now()->addMonth();
      $stream->save();

      $user = $stream->user;
      $user->notify(new InvoicePaid($user, $stream));




      return redirect()->back();

    }

    // Rejet du paiement
    public function reject_payment_proof(Streaming $stream)
    {
      $stream->forfait_statut = "Non payé";
      $stream->path_proof = "";
      $stream->save();

      $lien = $stream->path_proof;
      Storage::disk('public')->delete($lien);
      Storage::delete($lien);

      return redirect()->back();

    }
}
