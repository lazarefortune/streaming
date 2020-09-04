<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $user = auth()->user();

        if( ($user->hasAnyRole(['auteur','admin'])) ){
          return view('admin.account.home')->with('user', $user);
        }

        return view('user.account.home')->with('user', $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
      $user = auth()->user();

      if( ($user->hasAnyRole(['auteur','admin'])) ){
        return view('admin.account.edit')->with('user', $user);
      }

      return view('user.account.edit')->with('user', $user);
    }

    public function edit_password(User $user)
    {
      $user = auth()->user();

      if( ($user->hasAnyRole(['auteur','admin'])) ){
        return view('admin.account.edit_password')->with('user', $user);
      }

      return view('user.account.edit_password')->with('user', $user);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user = auth()->user();

        $validator = Validator::make($request->all(), [
          'contact' => ['required', 'string', 'unique:users,contact,'.$user->contact.',contact'],
          'email' => ['nullable', 'string', 'email', 'max:255', 'unique:users,email,'.$user->email.',email'],
          'name' => ['required', 'string', 'max:255'],
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $user->update($request->all());
        // flash("Informations mis à jour avec succès")->success();
        toastr()->success('Informations mis à jour avec succès');

        return back();
    }


    public function update_password()
    {
      request()->validate([
        'password_old' => ['required', 'min:3'],
        'passwordnew'=> ['required','min:3'],
      ]);
      $resultat = password_verify(request('password_old'), (auth()->user()->password));
      if ($resultat) {
        request()->validate([
          'passwordnew'=> ['required','confirmed', 'min:3'],

        ]);

        auth()->user()->update([
          'password' => bcrypt(request('passwordnew'))
        ]);
        // flash("Mot de passe changé avec succès")->success();
        toastr()->success('Mot de passe changé avec succès');
        return redirect()->route('account.password');
      }
      else {
        return back()->withInput()-> withErrors([
          'password_old' => 'Mot de passe actuel incorrect'
        ]);
      }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }


}
