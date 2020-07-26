@extends('layouts.admin')

@section('content')

<div class="container">
  <h2>Liste des commandes en cours</h2>

  <div class="row">
    @foreach($commands as $command)
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          Ticket n° {{ $command->id }}
        </div>
        <div class="card-body">
          <p>Commande de :  <b>{{ $command->user->name }}</b> </p>
          <p>Montant :  <b>{{ $command->forfait_price }} Fcfa</b> </p>
          <p>Crée le : <b>{{ $command->created_at->format('d/m/Y') }}</b>
          (<span><b>{{ Carbon\Carbon::parse($command->created_at)->diffForHumans() }}</b></span>)</p>
          <img src="{{ asset('storage') }}/{{ $command->path_proof }}" alt="..." width="100" height="100" class="img-thumbnail">
        </div>
        <div class="card-footer d-flex justify-content-between">


          <!-- Accept payment -->
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#confirm_payment{{ $command->id }}">
            Confirmer le paiement
          </button>

          <!-- Modal -->
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



          <!-- Reject PAYMENT -->
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
            Rejeter le paiement
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    </div>
    @endforeach
  </div>

  <hr>

  <h2>Liste des forfaits actifs</h2>

  <div class="row">
    @foreach($actifs as $actif)
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          Ticket n° {{ $actif->id }}
        </div>
        <div class="card-body">
          <p>Commande de :  <b>{{ $actif->user->name }}</b> </p>
          <p>Montant :  <b>{{ $actif->forfait_price }} Fcfa</b> </p>
          <p>Début : <b>{{ $actif->forfait_start }} ({{ Carbon\Carbon::parse($actif->forfait_start)->diffForHumans() }}) </b> </p>
          <p>Expire le : <b>{{ $actif->forfait_end }} ({{ Carbon\Carbon::parse($actif->forfait_end)->diffForHumans() }})</b> </p>
          <!-- <p>Activé <b></b> </p> -->
          <!-- <p>Expire <b></b> </p> -->
          <img src="{{ asset('storage') }}/{{ $actif->path_proof }}" alt="..." width="100" height="100" class="img-thumbnail">
        </div>
        <div class="card-footer d-flex justify-content-between">
          <a href=""  class="btn btn-primary">Envoyer les informations</a>
          <a href=""  class="btn btn-danger">Annuler abonnement</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>



@endsection
