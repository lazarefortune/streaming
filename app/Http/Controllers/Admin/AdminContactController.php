<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Mail\AdminMail;
use App\Http\Requests\ContactRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class AdminContactController extends Controller
{

  public function index(User $user)
  {

    return view('admin.mails.contact')->with('user', $user);
  }

  public function index_simple()
  {

    return view('admin.mails.contact');
  }

  public function send(Request $request)
  {


    if (Auth::check()) {
      $val = $request->except('_token');
      // dd($val);
    }else{
      return redirect()->route('admin.home');
    }

    Mail::to($val['email'])
        ->cc('lazarefortune@gmail.com')
        ->send(new AdminMail($val));

    toastr()->success('Message envoyé avec succès');
    // return view('emails.confirm');
    return redirect()->back();
  }


}
