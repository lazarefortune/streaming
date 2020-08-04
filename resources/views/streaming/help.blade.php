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
  /* background-image: url('{{ asset("image/support.jpg") }}') ; */
}
</style>
@endsection
@section('contenu')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('streaming.index') }}">Accueil</a></li>
    <li class="breadcrumb-item active" aria-current="page">Centre-d'aide</li>
  </ol>
</nav>
@include('flash::message')
<div class="jumbotron"  id="help-banner">
  <div class="container text-center">
    <h1 class="display-5 ">Centre d'aide</h1>
    <!-- <p>Bienvenue dans le centre d'aide, que pouvons nous faire pour vous ?.</p> -->
    <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Lire plus &raquo;</a></p> -->

    <form class="" action="" method="post"  class="form-inline">
      <div class="form-group mb-2">
        <label for="question" class="sr-only"> <strong>Posez nous votre question</strong> </label>
        <!-- <input type="text" name="question" placeholder="Qu'est ce qui vous pose problème ?"  class="form-control" value=""> -->
        <textarea name="question" placeholder="Qu'est ce qui vous pose problème ?" class="form-control" rows="2" cols="80"></textarea>
      </div>
      <button type="submit" name="button"  class="btn btn-primary">Envoyer votre question</button>
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
