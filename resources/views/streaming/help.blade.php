@extends('layouts.template')
@section('extra-css-streaming')
<style>
.card{
  border-radius: 6px;
}
.card-header{
  border-radius: 6px 6px 0px 0px !important;
}
#help-banner
{
  /* background-image: url('{{ asset("assets/img/google/help-banner.svg") }}') ; */
  /* background-image: url("/assets/img/google/settings.png"); */
  /* background-image: url( {{ url('assets/img/google/help-banner.svg') }} ); */
}
.help-banner
{
  background-image: url('{{ asset("public/assets/img/google/help-banner.svg") }}') ;
  background-repeat: no-repeat;
  background-color: white;
  background-position: center;
  /* height: 200px; */
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
  <div class="container text-center">
    <img src="{{ asset('assets/img/google/help.png') }}"   class="rounded-circle shadow p-2" width="50" height="50" alt="">
    <p style="color: #1967da; font-weight: 500; font-size: 32px; line-height: 2.5rem;" class="my-4">
      Comment pouvons-nous vous aider ?
    </p>
    <!-- <p>Bienvenue dans le centre d'aide, que pouvons nous faire pour vous ?.</p> -->
    <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Lire plus &raquo;</a></p> -->

    <form class="" action="" method="post"  class="form-inline">
      <div class="form-group mb-2">
        <!-- <label for="question" class=""> <strong>Posez nous votre question</strong> </label> -->
        <input type="text" name="question" placeholder="Décrivez votre problème ?"  class="form-control form-control-lg col-md-6 shadow-lg mx-auto p-4" style="font-size: 15px;" value="">
        <!-- <textarea name="question" placeholder="Qu'est ce qui vous pose problème ?" class="form-control" rows="2" cols="80"></textarea> -->
      </div>
      <!-- <button type="submit" name="button"  class="btn btn-primary">Envoyer votre question</button> -->
    </form>
  </div>
</div>

<div class="container">
   <hr>

  <div class="row">
    <div class="col-md-6">
      <div class="card border-0">
        <div class="card-header text-center border-0">
          <h5 class="h5"> <strong>Questions liées à la facturation</strong> </h6>
        </div>
        <div class="card-body">

          <ul class="list-group list-group-flush">
            <li class="list-group-item"> <a href=""  class="card-link"> Facturation et paiements Netflix </a> </li>
            <li class="list-group-item"> <a href=""  class="card-link"> Netflix indique "Votre compte est suspendu en raison d'un problème avec votre dernier paiement". </a> </li>

          </ul>

        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card border-0">
        <div class="card-header text-center border-0">
          <h5 class="h5"> <strong>Questions liées à votre abonnement</strong> </h6>
        </div>
        <div class="card-body">

          <ul class="list-group list-group-flush">
            <li class="list-group-item"> <a href=""  class="card-link"> Comment renouveller votre abonnement </a> </li>
            <li class="list-group-item"> <a href=""  class="card-link"> Comment suspendre mon abonnement </a> </li>

          </ul>

        </div>
      </div>
    </div>


  </div>

  <hr>

  <div  id="contact-us">
    <h2 class="text-center mx-auto mb-3">Contact</h2>

  <div class="row d-flex d-inline">
    <h5  class="m-2">Vous souhaitez nous contacter ?</h5>
    <a href="" class="btn btn-success m-2" name="button"><i class="fab fa-whatsapp"></i> Lancer un chat whatsapp</a>
    <a href="" class="btn btn-primary m-2" name="button"><i class="fab fa-facebook-messenger"></i> Chat Messenger</a>
    <a href="" class="btn btn-warning m-2" name="button"><i class="fas fa-phone-alt"></i> Nous appeler</a>
  </div>
</div>

</div>


@endsection
