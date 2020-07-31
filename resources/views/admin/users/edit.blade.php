@extends('layouts.admin')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.users.index') }}">Users</a> </li>
    <li class="breadcrumb-item active" aria-current="page">{{ str_replace(" ", "-" ,$user->name) }}</li>
  </ol>
</nav>
<div class="container">

@if(($user->hasAnyRole(['auteur','admin'])) && ( (auth()->user()->isAdmin()) == false ))
<div class="alert alert-primary" role="alert">
  Oups ! Vous ne disposez pas des autorisations nécessaires pour consulter ce profil! Veuillez contacter l'administrateur. <hr>
  <a href="{{ url('admin/users') }}" class="btn btn-primary">retour</a>
</div>
@else
<div class="card">
  <div class="card-header">
    <h4>Modification de <b>{{ $user->name }}</b></h4>
  </div>
  <div class="card-body">
    <form class="" action="{{ route('admin.users.update', $user) }}" method="post">
      @csrf
      @method('PATCH')

      <div class="form-group col-sm-6">
          <label for="nom"> {{ __('Nom') }} </label>
          <input type="text" class="form-control" id="nom"  placeholder="Entrez votre nom" value="{{ old('name') ?? $user->name }}" name="name">

          @if($errors->has('name'))
            <div class="alert alert-danger" role="alert">
              {{ $errors->first('name') }}
            </div>
          @endif
      </div>

      <div class="form-group col-sm-6">
          <label for="contact"> {{ __('contact') }} </label>
          <input type="text" class="form-control" id="contact"  placeholder="Entrez un nom" value="{{ old('contact') ?? $user->contact }}" name="contact" required>

          @if($errors->has('contact'))
            <div class="alert alert-danger" role="alert">
              {{ $errors->first('contact') }}
            </div>
          @endif
      </div>

      <div class="form-group col-sm-6">
          <label for="email"> {{ __('email') }} </label>
          <input type="email" class="form-control" id="email" aria-describedby="nameHelp" placeholder="Entrez votre adresse mail" value="{{ old('email') ?? $user->email }}" name="email">
          <small id="nameHelp" class="form-text text-muted">Cet email permet la connexion de l'utilisateur.</small>
          @if($errors->has('email'))
            <div class="alert alert-danger" role="alert">
              {{ $errors->first('email') }}
            </div>
          @endif
      </div>



      @can('change-role')
      <h3> Roles</h3>
      @foreach($roles as $role)

        <div class="form-group custom-control custom-switch">
          <input type="checkbox"  class="custom-control-input" name="roles[]" value="{{ $role->id }}" id="{{ $role->id }}" '@if($user->roles->pluck("id")->contains($role->id)) checked @endif'>
          <!-- <input type="checkbox"  class="custom-control-input" name="roles[]" value="{{ $role->id }}" id="{{ $role->id }}" '@foreach($user->roles as $userRole) @if($userRole->id === $role->id) checked @endif @endforeach'> -->

          <label for="{{ $role->id }}" class="custom-control-label">{{ $role->name }}</label>
          @if($role->name == 'admin')
            (<small  class="text-danger"> <b>Attention ! en cochant ceci l'utilisateur aura tous les droits d'accès</b> </small>)
          @endif
        </div>
      @endforeach
      @endcan


      <button type="submit"  class="btn btn-primary" name="button">Modifier les informations</button>
    </form>
  </div>
</div>
@endif

</div>
@endsection
