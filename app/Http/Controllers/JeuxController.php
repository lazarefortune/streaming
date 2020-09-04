<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JeuxController extends Controller
{
    public function index()
    {
      return view('streaming.jeux_concours');
    }
}
