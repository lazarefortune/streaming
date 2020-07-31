<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Streaming;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    //
    public function home()
    {
      $users = User::all();

      // $streams = Streaming::where('forfait_statut', 'En cours de validation')
      //                     ->get();
      $streams = Streaming::all();
      
      return view('admin.home')->with([
        'users' => $users,
        'streams' => $streams,
      ]);
    }
}
