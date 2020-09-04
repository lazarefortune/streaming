@extends('layouts.admin')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Commandes</li>
  </ol>
</nav>

<div class="m-1">
  <h4 class="mb-4 text-center">Liste des commandes</h4>

  @if(empty($commands[0]))
  <div class="alert alert-primary text-center font-weight-bold border border-dark">
    Vous n'avez aucune nouvelle commande payé
  </div>
  @endif

  @if(!empty($notActiveCommands))
    @foreach($notActiveCommands as $command)
    <!-- Card -->
    <a class="card card-frame shadow py-3 px-4 mb-3" href="{{ route('admin.streaming.command_details', $command->id) }}">

      <div class="row align-items-sm-center">
        <span class="col-sm-4 text-dark h5">
          <b>Commande n° {{ $command->id }}</b>
        </span>
        <span class="col-6 col-sm-5 text-body">
          {{ $command->created_at }}
          ({{ Carbon\Carbon::parse($command->created_at)->diffForHumans() }})
        </span>
        <span class="col-6 col-sm-3 text-right">
          <span class="badge badge-warning p-2">Payé (non actif)</span>
          <!-- Consulter <i class="fas fa-angle-right fa-sm ml-1"></i> -->

        </span>
      </div>
    </a>
    <!-- End Card -->
    @endforeach
  @endif

  @foreach($commands as $command)

  <!-- Card -->
  <a class="card card-frame shadow py-3 px-4 mb-3" href="{{ route('admin.streaming.command_details', $command) }}">

    <div class="row align-items-sm-center">
      <span class="col-sm-4 text-dark h5">
        <b>Commande n° {{ $command->id }}</b>
      </span>
      <span class="col-6 col-sm-5 text-body">
        {{ $command->created_at->format('d/m/Y') }}
        ({{ Carbon\Carbon::parse($command->created_at)->diffForHumans() }})
      </span>
      <span class="col-6 col-sm-3 text-right">

        <span class="badge badge-danger p-2">En attente</span>
        <!-- Consulter <i class="fas fa-angle-right fa-sm ml-1"></i> -->

      </span>
    </div>
  </a>
  <!-- End Card -->
  @endforeach

  <!-- <div class="row"> -->
    <!-- @foreach($commands as $command) -->



    <!-- <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          Commande n° {{ $command->id }}
        </div>
        <div class="card-body">
          <p>Nom du client :  <b>{{ $command->user->name }}</b> </p>
          <p>Montant :  <b>{{ $command->forfait_price }} Fcfa</b> </p>
          <p>Crée le : <b>{{ $command->created_at->format('d/m/Y') }}</b>
          (<span><b>{{ Carbon\Carbon::parse($command->created_at)->diffForHumans() }}</b></span>)</p>
          <img src="{{ asset('storage') }}/{{ $command->path_proof }}" alt="..." width="100" height="100" class="img-thumbnail">
        </div>
        <div class="card-footer d-flex justify-content-between">



          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#confirm_payment{{ $command->id }}">
            Confirmer le paiement
          </button>


          <div class="modal fade" id="confirm_payment{{ $command->id }}" tabindex="-1" role="dialog" aria-labelledby="confirm_paymentLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Confirmation du paiement</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Souhaitez vous vraiment confirmer ce paiement?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                  <a href="{{ route('admin.streaming.confirm_payment_proof', $command->id) }}"  class="btn btn-success">Oui, Confirmer</a>
                </div>
              </div>
            </div>
          </div>




          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#reject_payment-{{ $command->id }}">
            Rejeter le paiement
          </button>


          <div class="modal fade" id="reject_payment-{{ $command->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Rejet du paiement</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Souhaitez vous vraiment rejeter ce paiement ?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                  <a href="{{ route('admin.streaming.reject_payment_proof', $command->id) }}"  class="btn btn-danger">Oui, Rejeter</a>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div> -->
    <!-- @endforeach -->
  <!-- </div> -->



</div>



@endsection
