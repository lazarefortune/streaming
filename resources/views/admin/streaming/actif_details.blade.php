@extends('layouts.admin')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.streaming.actif_list') }}">Comptes-actifs</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $actif->id }}</li>
  </ol>
</nav>

<h4 class="mb-4 text-center">Details du compte</h4>

<div class="row m-1">
    <div class="card col-md-8 mx-auto shadow mb-5">
      <h5 class="card-header bg-white border-0 h4 mt-2 text-center">Commande n°{{ $actif->id }}</h5>

      <div class="card-body">
        <!-- <h4 class="h6">Informations générales</h4> -->
        <div class="">

          <p> De : <b>{{ $actif->forfait_name }}</b> </p>
          <p> Montant : <b>{{ $actif->forfait_price }} Fcfa</b> </p>
          <p> Crée le : <b>{{ $actif->created_at->format('d/m/Y') }}</b>
            (<span><b>{{ Carbon\Carbon::parse($actif->created_at)->diffForHumans() }}</b></span>)</p>

          <p>Début : <b>{{ $actif->forfait_start }} ({{ Carbon\Carbon::parse($actif->forfait_start)->diffForHumans() }}) </b> </p>
          <p>Expire le : <b>{{ $actif->forfait_end }} ({{ Carbon\Carbon::parse($actif->forfait_end)->diffForHumans() }})</b> </p>
        </div>


          <p class="mt-2">
            <a class="" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              <i data-feather="plus" stroke-width="2.5" width="16" height="16"></i>
              <span class="text-icon">informations sur le client</span>
            </a>
          </p>
          <div class="collapse" id="collapseExample">
            <div class="card card-body">
              <p>Nom : <b></b><a href="{{ route('admin.users.edit', $actif->user) }}" class="font-weight-bold">{{ $actif->user->name }}</a> </p>
              @if(!empty($actif->user->email))
              <p>E-mail : <a href="{{ route('admin.streaming.send_mail', $actif->user) }}" class="font-weight-bold">{{ $actif->user->email }}</a> </p>
              @endif
              <p>Contact : <a href="tel:{{ $actif->user->contact }}" class="font-weight-bold">{{ $actif->user->contact }}</a> </p>
              <div class="mt-3">
                <a href="https://wa.me/{{ $actif->user->contact }}" target="_blank" class="btn btn-success">
                  <i class="fab fa-whatsapp"></i>
                  Joindre via whatsapp
                </a>
              </div>
            </div>
          </div>

      </div>


      <div class="card-footer bg-white border-0 mb-3 row">

        <div class="ml-auto">

            <a href="{{ route('admin.streaming.send_info_idtf', $actif) }}"  class="btn btn-primary">Envoyer les identifiants</a>
            <!-- <a href=""  class="btn btn-danger">Annuler abonnement</a> -->





        </div>


      </div>

    </div>
</div>




@endsection
