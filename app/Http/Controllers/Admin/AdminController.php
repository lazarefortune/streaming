<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Streaming;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    //
    public function home()
    {
      // $streams = Streaming::where('forfait_statut', 'En cours de validation')
      //                     ->get();
      $users = User::all();
      $streams = Streaming::all();
      $notActiveCommands = DB::table('streamings')->where('forfait_statut', 'Payé')
                                          ->whereNull('forfait_start')
                                          ->get();

      return view('admin.home')->with([
        'users' => $users,
        'streams' => $streams,
        'notActiveCommands' => $notActiveCommands,
      ]);
    }

    public function store_mail()
    {

    }

    public function caisse()
    {
      $streams = Streaming::all();
      $streams = $streams->where('forfait_statut','Payé');
      $total = 0;

      foreach ($streams as $stream) {
        $total += $stream->forfait_price;
      }
      return view('admin.streaming.caisse')->with('total', $total);
    }
}
