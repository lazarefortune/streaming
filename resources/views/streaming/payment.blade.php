@extends('layouts.template')

@section('extra-css-streaming')
<style >
.steps-form {
    display: table;
    width: 100%;
    position: relative; }
.steps-form .steps-row {
    display: table-row; }
.steps-form .steps-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc; }
.steps-form .steps-row .steps-step {
    display: table-cell;
    text-align: center;
    position: relative; }
.steps-form .steps-row .steps-step p {
    margin-top: 0.5rem; }
.steps-form .steps-row .steps-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important; }
.steps-form .steps-row .steps-step .btn-circle {
    width: 30px;
    height: 30px;
    text-align: center;
    padding: 6px 0;
    font-size: 12px;
    line-height: 1.428571429;
    border-radius: 15px;
    margin-top: 0; }
</style>
@endsection

@section('contenu')

@include('flash::message')
<!-- <form class="row d-flex justify-content-center" method="post">

  <div class="col-md-6">
    <h1>Procédure de paiement du ticket : {{ $stream->id }}</h1>
    <div class="card">
      <div class="card-header">
        ETAPE 1
      </div>
      <div class="card-body">
        <p> <i  class="fas fa-comment-dollar"></i> Envoyez le montant suivant : <strong>{{ $stream->forfait_price }} Fcfa</strong> par </p>
        <hr>
        <h5 class="text-danger">Airtel Money</h5>
        <p>077-11-22-33</p>
        ou
        <hr>
        <h5  class="text-danger">MOBICASH</h5>
        <p>066-11-22-33</p>

      </div>
      <div class="card-footer d-flex justify-content-between">
        <a href="{{ route('streaming.account') }}"  class="btn btn-warning"> <i  class="fas fa-arrow-left"></i> Abandonner</a>



        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
          Poursuivre <i  class="fas fa-arrow-right"></i>
        </button>


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
                En poursuivant, <span  class="text-danger">vous confirmez avoir effectué le transfert mobile money</span>, toute tentative de fraude sera sanctionné.
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"> <i  class="fas fa-times"></i> Annuler</button>
                <a href="{{ route('streaming.payment-proof', $stream) }}"  class="btn btn-success"> <i  class="fas fa-check"></i> Oui, je confirme</a>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>


</form> -->


<div class="row d-flex justify-content-center">
  <div class="col-md-8">
    <h2  class="mb-3 text-center"> <i  class="fas fa-cash-register"></i> Caisse</h2>

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



    <div class="card shadow p-3">
      <h4  class="text-center">Facture</h4>
      <hr>
      <div class="card-body">

          <div class="">
            <h5  class="font-weight-bold mb-4">Commande n° {{ $stream->id }}</h5>

            <p>Forfait : <span class="h6 text-info float-right font-weight-bold">{{ $stream->forfait_name }}</span> </p>
            <p>Type : <span class="h6 text-info float-right font-weight-bold">{{ $stream->forfait_type }}</span> </p>
            <p>Date : <span class="h6 text-info float-right font-weight-bold">{{ $stream->created_at->format('d/m/Y') }}</span> </p>
          </div>
          <hr>
          <div class="" style="background-color: #e3e4e6;">
            Total à payer :<span  class="h5 float-right font-weight-bold"> {{ $stream->forfait_price }} Fcfa</span>
          </div>

          <hr>

          <div class="">
            <h5  class="text-danger">Comment payer ?</h5>
            Effectuez le transfert via :
              <p>
                <img src="{{ asset('assets/img/Airtel-Money.png') }}" height="50" width="50" alt="airtel-money-logo">
                Airtel Money (077-11-22-33)  ou
              </p>
              <p>
                <img src="{{ asset('assets/img/mobicash.png') }}" height="50" width="50" alt="Mobicash-logo">
                MOBICASH (066-11-22-33)
              </p>
              <!-- <p class="h5 text-info">Airtel Money (077-11-22-33)</p>
              ou
              <p  class="h5 text-info">MOBICASH (066-11-22-33)</p> -->
          </div>
          <small class="text-danger">NB: Veuillez effectuer le transfert avant de cliquer sur "Poursuivre".</small>
          <hr>
          <div class="">
            <a href="{{ route('streaming.account') }}"  class="btn btn-warning float-left"> <i  class="fas fa-arrow-left"></i> Abandonner</a>



            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModalLong">
              Poursuivre <i  class="fas fa-arrow-right"></i>
            </button>


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
                    En poursuivant, <span  class="text-danger">vous confirmez avoir effectué le transfert mobile money</span>, toute tentative de fraude sera sanctionné.
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"> <i  class="fas fa-times"></i> Annuler</button>
                    <a href="{{ route('streaming.payment-proof', $stream) }}"  class="btn btn-success"> <i  class="fas fa-check"></i> Oui, je confirme</a>
                  </div>
                </div>
              </div>
            </div>

          </div>


      </div>
    </div>
  </div>
</div>



@endsection
