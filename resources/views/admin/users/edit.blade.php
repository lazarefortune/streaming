@extends('layouts.admin')

@section('extra-css-admin')
<style>
  label{
    font-weight: bold;
  }
</style>
@endsection

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.users.index') }}">Users</a> </li>
    <li class="breadcrumb-item active" aria-current="page">{{ $user->id }}</li>
    <!-- <li class="breadcrumb-item active" aria-current="page">{{ str_replace(" ", "-" ,$user->name) }}</li> -->
  </ol>
</nav>
<div class="container">

@if(($user->hasAnyRole(['auteur','admin'])) && ( (auth()->user()->isAdmin()) == false ))
<div class="alert alert-primary text-center" role="alert">
  Oups ! Vous ne disposez pas des autorisations nécessaires pour consulter ce profil! Veuillez contacter l'administrateur. <hr>
  <a href="{{ url('admin/users') }}" class="btn btn-primary">retour</a>
</div>
@else


<div class=" my-4">
  <!-- Author -->
  <div class="card card-body shadow py-4">
    <div class="row align-items-md-center">
      <div class="col-md-7 mb-5 mb-md-0">
        <div class="media align-items-center">
          <div class="media-body font-size-1 ml-3">
            <div class="h3 mb-2">{{$user->name }}</div>
            @if(!empty($user->email))
            <span class="d-block"> E-mail :
              <span class="text-muted">{{ $user->email }}</span>
            </span>
            @endif
            <span class="d-block"> Contact :
              <span class="text-muted">{{ $user->contact }}</span>
            </span>
            <!-- <span class="d-block text-muted">{{ $user->email }}</span>
            <span class="d-block text-muted">{{ $user->contact }}</span> -->
          </div>
        </div>
      </div>
      <div class="col-md-5">
        <div class="d-flex justify-content-md-center align-items-center">
          <span class="d-block font-weight-bold text-cap mr-2"></span>

          <a class="btn btn-xs btn-icon btn-soft-secondary rounded-circle ml-2" href="https://wa.me/{{ $user->contact }}">
            <i class="fab fa-whatsapp" style="font-size: 20px;"></i>
          </a>
          <a class="btn btn-xs btn-icon btn-soft-secondary rounded-circle ml-2" href="tel:{{ $user->contact }}">
            <i data-feather="phone" stroke-width="2" width="20" height="20"></i>
          </a>
          <a class="btn btn-xs btn-icon btn-soft-secondary rounded-circle ml-2" href="{{ route('admin.streaming.send_mail', $user) }}">
            <i data-feather="mail" stroke-width="2" width="20" height="20"></i>
          </a>
        </div>
      </div>
    </div>

    @can('delete-users')
    <div class="row p-2 mt-3">
      <div class="ml-auto">

          <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModalCenter-{{ $user->id }}">
            Supprimer
          </button>

          <div class="modal fade" id="exampleModalCenter-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalCenterTitle">Suppression</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Souhaitez vous vraiment supprimer l'utilisateur <b>{{ $user->name }}</b>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                  <form class="d-inline" action="{{ route('admin.users.destroy', $user->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

      </div>
    </div>
    @endcan

  </div>
  <!-- End Author -->
</div>
@can('change-role')
<div class="card card-body shadow mb-4">
  <form class="" action="{{ route('admin.users.update', $user) }}" method="post">
    @csrf
    @method('PATCH')

      <div class="row align-items-md-center my-3">
        <div class="col-md-6">
          <div class="align-items-center ml-3">
            <div class="h5 mb-4">Roles</div>
            @foreach($roles as $role)

              <div class="form-group custom-control custom-switch">
                <input type="checkbox"  class="custom-control-input" name="roles[]" value="{{ $role->id }}" id="{{ $role->id }}" '@if($user->roles->pluck("id")->contains($role->id)) checked @endif'>
                <!-- <input type="checkbox"  class="custom-control-input" name="roles[]" value="{{ $role->id }}" id="{{ $role->id }}" '@foreach($user->roles as $userRole) @if($userRole->id === $role->id) checked @endif @endforeach'> -->

                <label for="{{ $role->id }}" class="custom-control-label text-capitalize">{{ $role->name }}</label>
                <!-- @if($role->name == 'admin')
                  (<small  class="text-danger"> <b>Attention ! en cochant ceci l'utilisateur aura tous les droits d'accès</b> </small>)
                @endif -->
              </div>
            @endforeach
          </div>
          <button type="submit"  class="btn btn-primary" name="button">Modifier le role</button>
        </div>
      </div>

  </form>
</div>
@endcan


@endif

</div>
@endsection
