<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
  public function index()
  {
    return view('streaming.contact');
  }

  public function send(Request $request)
  {
    if (Auth::check()) {
      $val = $request->except('_token');
      $val['name'] = auth()->user()->name;
      $val['email'] = auth()->user()->email;
    }else{
      $val = $request->except('_token');
    }
    Mail::to('webcreation@lazarefortune.com')
        ->send(new Contact($val));

    toastr()->success('Message envoyé avec succès');
    // return view('emails.confirm');
    return redirect()->back();
  }

  public function question_send(Request $request)
  {
    $val = $request->except('_token');
    $val['name'] = auth()->user()->name;
    $val['email'] = auth()->user()->email;

    Mail::to('webcreation@lazarefortune.com')
        ->send(new Contact($val));

    toastr()->success('Question envoyé avec succès');
    // return view('emails.confirm');
    return redirect()->back();
  }
}
