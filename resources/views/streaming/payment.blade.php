@extends('layouts.template')

@section('extra-css-streaming')
<style >
  .steps-form {
      display: table;
      width: 100%;
      position: relative;
  }
  .steps-form .steps-row {
      display: table-row;
  }
  .steps-form .steps-row:before {
      top: 14px;
      bottom: 0;
      position: absolute;
      content: " ";
      width: 100%;
      height: 1px;
      background-color: #ccc;
  }
  .steps-form .steps-row .steps-step {
      display: table-cell;
      text-align: center;
      position: relative;
  }
  .steps-form .steps-row .steps-step p {
      margin-top: 0.5rem;
  }
  .steps-form .steps-row .steps-step button[disabled] {
      opacity: 1 !important;
      filter: alpha(opacity=100) !important;
  }
  .steps-form .steps-row .steps-step .btn-circle {
      width: 30px;
      height: 30px;
      text-align: center;
      padding: 6px 0;
      font-size: 12px;
      line-height: 1.428571429;
      border-radius: 15px;
      margin-top: 0;
  }
</style>
@endsection

@section('contenu')

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ route('streaming.index') }}">Accueil</a>
      </li>
      <li class="breadcrumb-item" aria-current="page">
        <a href="{{ route('streaming.orders') }}">Vos-commandes</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">
        Caisse
      </li>
    </ol>
  </nav>

  @include('flash::message')

  <div class="row d-flex justify-content-center">
    <div class="col-md-8">
      <h2  class="mb-3 text-center">
        <i  class="fas fa-cash-register"></i>
        Caisse
      </h2>

      <div class="steps-form">
        <div class="steps-row setup-panel">
          <div class="steps-step">
            <a href="#step-9" type="button" class="btn btn-success btn-circle">1</a>
            <p>Paiement</p>
          </div>
          <div class="steps-step">
            <a href="#step-10" type="button" class="btn btn-secondary btn-circle" disabled="disabled">2</a>
            <p>Preuve du paiement</p>
          </div>
          <div class="steps-step">
            <a href="#step-11" type="button" class="btn btn-secondary btn-circle" disabled="disabled">3</a>
            <p>Validation</p>
          </div>
        </div>
      </div>

      <div class="card shadow p-3 mb-2">
        <h4  class="text-center">Facture</h4>

        <div class="card-body">
          <div class="">
            <h5  class="font-weight-bold mb-4">Commande n° {{ $stream->id }}</h5>

            <p>
              Forfait : <span class="h6 text-info float-right font-weight-bold">{{ $stream->forfait_name }}</span>
            </p>
            <p>
              Type : <span class="h6 text-info float-right font-weight-bold">{{ $stream->forfait_type }}</span>
            </p>
            <p>
              Date : <span class="h6 text-info float-right font-weight-bold">{{ $stream->created_at->format('d/m/Y') }}</span>
            </p>
          </div>

          <div class="p-2" style="background-color: #e3e4e6;">
            Total à payer :<span  class="h5 float-right font-weight-bold"> {{ $stream->forfait_price }} Fcfa</span>
          </div>
        </div>
      </div>


      <div class="card shadow p-3">
        <div class="card-body">

          <div class="mb-4">
            <h5  class="text-danger text-center mb-3">Comment payer ?</h5>
            <p>Effectuez le transfert par :</p>
            <p>
              <img src="{{ asset('assets/img/Airtel-Money.png') }}" height="auto" width="50" alt="airtel-money-logo">
              Airtel Money ( <b>074-87-83-17</b> )
            </p>

              <h5 class="text-danger">
                <i data-feather="alert-triangle" stroke-width="2.5" width="20" height="20"></i>
                <span class="text-icon">Important !!</span>
                <a class="btn btn-danger" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Cliquez ici</a>
              </h5>

              <div class="row">
                <div class="col">
                  <div class="collapse multi-collapse" id="multiCollapseExample1">
                    <div class="card card-body border border-danger">
                      <ul class="" style="list-style: none;">
                        <li>
                          <i data-feather="chevron-right" stroke-width="3" width="16" height="16" ></i>
                          <span class="text-icon">Envoyer les {{ $stream->forfait_price }} Fcfa <span class="text-danger">avant</span> de cliquer sur "Poursuivre".</span>
                        </li>
                        <li>
                          <i data-feather="chevron-right" stroke-width="3" width="16" height="16" ></i>
                          <span class="text-icon">Faite une capture d'écran du <span class="text-danger">message de confirmation</span> Airtel Money.</span>
                        </li>
                        <li>
                          <i data-feather="info" stroke-width="3" width="16" height="16" ></i>
                          <span class="text-icon">Si vous l'avez fait chez un boutiquier, recopier le numéro <span class="text-danger"> <b>Trans id</b></span> dans le message reçu par le boutiquier.</span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>



            <!-- <p>
              <img src="{{ asset('assets/img/mobicash.png') }}" height="50" width="50" alt="Mobicash-logo">
              MOBICASH (066-11-22-33)
            </p> -->
          </div>

          <div class="mt-3">
            <a href="{{ route('streaming.orders') }}"  class="float-left font-weight-bold">
              <i data-feather="arrow-left" stroke-width="3" width="16" height="16"></i>
              <span class="text-icon">Abandonner</span>
            </a>

            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModalLong">
              <span class="text-icon">Poursuivre</span>
              <i data-feather="arrow-right" stroke-width="2.5" width="20" height="20"></i>
            </button>
            <!-- modal -->
            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Attention</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Avez vous effectuer le transfert Airtel Money ?
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                      <i data-feather="x" stroke-width="2.5" width="20" height="20"></i>
                      <span class="text-icon">Non</span>
                    </button>
                    <a href="{{ route('streaming.payment-proof', $stream) }}"  class="btn btn-success">
                      <i data-feather="check" stroke-width="2.5" width="20" height="20"></i>
                      <span class="text-icon">Oui, je confirme</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <!-- end modal -->
          </div>
          <!-- end div -->
        </div>
        <!-- end card body -->
      </div>
      <!-- end card -->
    </div>
    <!-- end col-md-8 -->
  </div>
  <!-- end row -->

@endsection
