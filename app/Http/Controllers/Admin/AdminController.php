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

      return view('admin.home')->with([
        'users' => $users,
        'streams' => $streams,
      ]);
    }
}
