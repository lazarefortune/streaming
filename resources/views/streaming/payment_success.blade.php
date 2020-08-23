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
            <a href="#step-10" type="button" class="btn btn-success btn-circle" disabled="disabled">2</a>
            <p>Preuve du paiement</p>
          </div>
          <div class="steps-step">
            <a href="#step-11" type="button" class="btn btn-success btn-circle" disabled="disabled">3</a>
            <p>Validation</p>
          </div>
        </div>
      </div>

      <div class="card shadow p-3">
        <div class="card-body">
          <div class="mb-2">
            <h5  class="font-weight-bold mb-4">Commande n° {{ $stream->id }}</h5>
          </div>

          <div class="alert alert-success text-dark" role="alert">
            <h5 class="alert-heading">
              <i data-feather="check-circle" stroke-width="2.5" width="20" height="20"></i>
              <span class="text-icon">Envoyé avec succès!</span>
            </h5>
            <p>Notre équipe vérifie votre paiement.</p>
            <p>Vous recevrez vos <b>identifiants de connexion </b> par SMS, e-mail et dans vos notifications sur notre site.</p>
            <p>Merci de patienter.</p>


          </div>

          <div class="mt-3">
            <a href="{{ route('streaming.orders') }}"  class="btn btn-primary float-right"> Cliquez ici <i  class="fas fa-arrow-right"></i> </a>
          </div>
        </div>
        <!-- end card body -->
      </div>
      <!-- end card -->
    </div>
    <!-- end column -->
  </div>
  <!-- end row -->

@endsection
