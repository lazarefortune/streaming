@extends('layouts.template')
@section('extra-css-streaming')
<style>
  .card{
    border-radius: 6px;
  }
  .card-header{
    border-radius: 6px 6px 0px 0px !important;
  }
  .help-banner
  {
    background-image: url('{{ asset("public/assets/img/google/help-banner.svg") }}') ;
    background-repeat: no-repeat;
    background-color: white;
    background-position: center;
    /* height: 200px; */
  }
  .help-banner h3{
    color: #1967da;
    font-weight: 500;
    /* font-size: 20px; */
    /* line-height: 2.5rem; */
  }
</style>
@endsection

@section('contenu')
  <!-- <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('streaming.index') }}">Accueil</a></li>
      <li class="breadcrumb-item active" aria-current="page">Centre-d'aide</li>
    </ol>
  </nav> -->
  @include('flash::message')

  <div class="jumbotron help-banner">
    <div class="text-center">
      <img src="{{ asset('assets/img/google/help.png') }}"   class="rounded-circle shadow p-2" width="50" height="50" alt="">
      <h3 class="mt-1 mb-4">Comment pouvons-nous vous aider ?</h3>
      <form class="" action="{{ route('streaming.question_send') }}" method="post"  class="form-inline">
        @csrf
        <div class="form-group mb-2">
          <input type="text" name="message" placeholder="Décrivez votre problème ..."  class="form-control form-control-lg col-md-6 shadow-lg mx-auto p-4" style="font-size: 15px;" value="" required>
        </div>
        <div class="mt-4">
          <button type="submit" class="btn btn-primary" name="button">
            <span class="text-icon">Soumettre</span>
            <i data-feather="send" stroke-width="2.5" width="16" height="16"></i>
          </button>
        </div>
      </form>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="card border-0">
          <div class="card-header text-center border-0">
            <h5 class="h5"> <strong>Questions liées à votre compte Web Creation</strong> </h6>
          </div>
          <div class="card-body">

            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <a href=""  class="card-link">
                  Comment gérer mes informations
                </a>
              </li>
              <li class="list-group-item">
                <a href=""  class="card-link">
                  Conseils pour gérer mon compte
                </a>
              </li>
            </ul>

          </div>
          <!-- end card body -->
        </div>
        <!-- end card -->
      </div>
      <!-- end column -->

      <div class="col-md-6">
        <div class="card border-0">
          <div class="card-header text-center border-0">
            <h5 class="h5"> <strong>Questions liées à la sécurité de vos données</strong> </h6>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <a href=""  class="card-link"> Comment <b>Web Creation</b> gère mes informations </a>
              </li>
              <li class="list-group-item">
                <a href=""  class="card-link"> Conseils pour sécuriser mes données </a>
              </li>
            </ul>
          </div>
          <!-- end card body -->
        </div>
        <!-- end card -->
      </div>
      <!-- end column -->
    </div>
    <!-- end row -->

    <div class="row">
      <div class="col-md-6">
        <div class="card border-0">
          <div class="card-header text-center border-0">
            <h5 class="h5"> <strong>Questions liées à la facturation</strong> </h6>
          </div>
          <div class="card-body">

            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <a href=""  class="card-link">
                  Facturation et paiements Netflix
                </a>
              </li>
              <li class="list-group-item">
                <a href=""  class="card-link">
                  Netflix indique "Votre compte est suspendu en raison d'un problème avec votre dernier paiement".
                </a>
              </li>
            </ul>

          </div>
          <!-- end card body -->
        </div>
        <!-- end card -->
      </div>
      <!-- end column -->

      <div class="col-md-6">
        <div class="card border-0">
          <div class="card-header text-center border-0">
            <h5 class="h5"> <strong>Questions liées à votre abonnement</strong> </h6>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <a href=""  class="card-link"> Comment renouveller mon abonnement </a>
              </li>
              <li class="list-group-item">
                <a href=""  class="card-link"> Comment suspendre mon abonnement </a>
              </li>
            </ul>
          </div>
          <!-- end card body -->
        </div>
        <!-- end card -->
      </div>
      <!-- end column -->
    </div>
    <!-- end row -->



    <div  id="contact-us">
      <h2 class="text-center mx-auto mb-3">Contact</h2>

      <div class="row d-flex d-inline">
        <h5  class="m-2">Vous souhaitez plutôt nous contacter ?</h5>

        <a href="https://wa.me/24166795503?text=Bonjour%20Web%20Creation%20Streaming" target="_blank" class="btn btn-outline-success m-2" name="button">
          <i class="fab fa-whatsapp"></i> Whatsapp
        </a>
        <a href="" class="btn btn-outline-primary m-2" name="button">
          <i class="fab fa-facebook-messenger"></i> Messenger
        </a>
        <a href="tel:24166795503" class="btn btn-outline-warning m-2" name="button">
          <i class="fas fa-phone-alt"></i> Appeler
        </a>
      </div>
    </div>
    <!-- end div contact us -->

  </div>
  <!-- end container -->


@endsection
