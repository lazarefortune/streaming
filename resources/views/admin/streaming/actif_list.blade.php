@extends('layouts.admin')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Comptes-actifs</li>
  </ol>
</nav>

<div class="m-1">
  <h4 class="mb-4 text-center">Liste des commandes actives</h4>

  @if(empty($actifs[0]))
  <div class="alert alert-primary text-center font-weight-bold border border-dark">
    Vous n'avez aucun compte actif
  </div>
  @endif

  @foreach($actifs as $actif)

  <!-- Card -->
  <a class="card card-frame shadow py-3 px-4 mb-3" href="{{ route('admin.streaming.actif_details', $actif) }}">

    <div class="row align-items-sm-center">
      <span class="col-sm-4 text-dark h5">
        <b>Commande n° {{ $actif->id }}</b>
      </span>
      <span class="col-6 col-sm-5 text-body">
        {{ $actif->created_at->format('d/m/Y') }}
        ({{ Carbon\Carbon::parse($actif->created_at)->diffForHumans() }})
      </span>
      <span class="col-6 col-sm-3 text-right">

        @if($actif->connexion_idtf)
        <span class="badge badge-success">Terminé</span>
        @else
        <span class="badge badge-danger">Sans identifiants</span>
        @endif
        <!-- Consulter <i class="fas fa-angle-right fa-sm ml-1"></i> -->

      </span>
    </div>
  </a>
  <!-- End Card -->
  @endforeach

</div>



@endsection
