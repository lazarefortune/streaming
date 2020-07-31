<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
        //
        $user = auth()->user();
        if(($user->hasAnyRole(['auteur','admin'])) && ((auth()->user()->isAdmin()) == false ))
        {
          // DB::table('users')->whereIn('utilisateur', $roles)->first();
          $users = User::all();
          // $users = $users->roles()->where('name', 'utilisateur')->get();

          // dd($users);

        }
        $users = User::all();

        return view('admin.users.index')->with('users', $users);
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
        //
        if (Gate::denies('edit-users')) {
          return redirect()->route('admin.users.index');
        }



        $roles = Role::all();

        return view('admin.users.edit', [
          'user' => $user,
          'roles' => $roles
        ]);
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
        //
        if (Gate::denies('change-role')) {
          $validator = Validator::make($request->all(), [
            'contact' => ['required', 'string', 'unique:users,contact,'.$user->contact.',contact'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->email.',email'],
            'name' => ['required', 'string', 'max:255'],
          ]);

          if ($validator->fails()) {
              return back()
                          ->withErrors($validator)
                          ->withInput();
          }

          $user->name = $request->name;
          $user->email = $request->email;
          $user->contact = $request->contact;
          $user->save();
        }else {

          $user->roles()->sync($request->roles);

          // $validator = Validator::make($request->all(), [
          //   'contact' => ['required', 'string', 'unique:users,contact,'.$user->contact.',contact'],
          //   'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->email.',email'],
          //   'name' => ['required', 'string', 'max:255'],
          // ]);
          //
          // if ($validator->fails()) {
          //     return redirect('/admin/users/'.$user->id.'/edit')
          //                 ->withErrors($validator)
          //                 ->withInput();
          // }
          $user->name = $request->name;
          $user->email = $request->email;
          $user->contact = $request->contact;
          $user->save();
        }

        // flash("Informations mis à jour avec succès")->success();
        toastr()->success('Informations mis à jour avec succès');
        return redirect()->back();
        // return redirect()->route('admin.users.index');
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
        if (Gate::denies('delete-users')) {
          return redirect()->route('admin.users.index');
        }

        $user->roles()->detach();
        DB::table('streamings')->where('user_id', $user->id)->delete();
        $user->delete();

        // flash("Utilisateur supprimé avec succès")->success();
        toastr()->error('Utilisateur supprimé avec succès');

        return redirect()->route('admin.users.index');
    }
}
