@extends('layouts.admin')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.streaming.command_list') }}">Commandes</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $command->id }}</li>
  </ol>
</nav>

<h4 class="mb-4 text-center">Details de la commande</h4>

<div class="row m-1">
    <div class="card col-md-8 mx-auto shadow mb-5">
      <h5 class="card-header bg-white border-0 h4 mt-2 text-center">Commande n°{{ $command->id }}</h5>

      <div class="card-body">
        <!-- <h4 class="h6">Informations générales</h4> -->
        <div class="">

          <p> De : <b>{{ $command->forfait_name }}</b> </p>
          <p> Montant : <b>{{ $command->forfait_price }} Fcfa</b> </p>
          <p> Crée le : <b>{{ $command->created_at->format('d/m/Y') }}</b>
            (<span><b>{{ Carbon\Carbon::parse($command->created_at)->diffForHumans() }}</b></span>)</p>
          @if(!empty($command->payment_date))
          <p>Payé le : <b>{{ $command->payment_date }}</b>
            (<span><b>{{ Carbon\Carbon::parse($command->payment_date)->diffForHumans() }}</b></span>)</p>
          @endif
        </div>

        @if(strstr($command->proof, 'code'))
        <!-- <div class="row my-3">
          <div class="col-md-8">
            <img src="{{ asset('storage') }}/{{ $command->path_proof }}" alt="..." width="100%" height="auto" class="img-thumbnail">

          </div>
          <div class="col-md-4">
            <a href="{{ asset('storage') }}/{{ $command->path_proof }}" class="mr-4">
              <i data-feather="maximize-2" stroke-width="2.5" width="20" height="20"></i>
            </a>
            <a href="{{ asset('storage') }}/{{ $command->path_proof }}" class="" download>
              <i data-feather="download" stroke-width="2.5" width="20" height="20"></i>
            </a>
          </div>
        </div> -->


        <div class="">

          <p>Code de l'Agent : <b>{{ str_replace("code : ", "", $command->proof) }}</b> </p>
        </div>
        @else
        <div class="">

          <p>Numéro de téléphone de transaction : <b>{{ $command->proof }}</b> </p>
        </div>
        @endif


          <p class="mt-2">
            <a class="" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              <i data-feather="plus" stroke-width="2.5" width="16" height="16"></i>
              <span class="text-icon">informations sur le client</span>
            </a>
          </p>
          <div class="collapse" id="collapseExample">
            <div class="card card-body">
              <p>Nom : <b></b><a href="{{ route('admin.users.edit', $command->user) }}" class="font-weight-bold">{{ $command->user->name }}</a> </p>
              @if(!empty($command->user->email))
              <p>E-mail : <a href="{{ route('admin.streaming.send_mail', $command->user) }}" class="font-weight-bold">{{ $command->user->email }}</a> </p>
              @endif
              <p>Contact : <a href="tel:{{ $command->user->contact }}" class="font-weight-bold">{{ $command->user->contact }}</a> </p>
              <div class="mt-3">
                <a href="https://wa.me/{{ $command->user->contact }}" target="_blank" class="btn btn-success">
                  <i class="fab fa-whatsapp"></i>
                  Joindre via whatsapp
                </a>
              </div>
            </div>
          </div>

      </div>


      <div class="card-footer bg-white border-0 mb-3 row">

        <div class="ml-auto">

          @if($command->forfait_statut == "Payé")
          <!-- active commande modal -->

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#active-compte">
              Activer le compte
            </button>

            <!-- Modal -->
            <div class="modal fade" id="active-compte" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Souhaitez vous vraiment activer le compte ?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                  <a href="{{ route('admin.streaming.active_account', $command) }}" class="btn btn-primary">
                    Oui, activer
                  </a>
                </div>
              </div>
            </div>
            </div>
          @else
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#reject_payment-{{ $command->id }}">
              Rejeter
            </button>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#confirm_payment{{ $command->id }}">
              <i data-feather="check" stroke-width="2.5" width="20" height="20"></i>
              <span class="text-icon">Confirmer</span>
            </button>


            <div class="modal fade" id="confirm_payment{{ $command->id }}" tabindex="-1" role="dialog" aria-labelledby="confirm_paymentLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Confirmation du paiement</h5>
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

            <div class="modal fade" id="reject_payment-{{ $command->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
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
          @endif
        </div>


      </div>

    </div>
</div>




@endsection
