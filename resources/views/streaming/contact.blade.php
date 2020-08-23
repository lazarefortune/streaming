@extends('layouts.template')
@section('extra-css-streaming')
<style>
.card{
  border-radius: 6px;
}
.card-header{
  border-radius: 6px 6px 0px 0px !important;
}
.contact-banner
{
  background-image: url('{{ asset("public/assets/img/google/help-banner.svg") }}') ;
  background-repeat: no-repeat;
  background-color: white;
  background-position: center;
}
.contact-banner h3{
  color: #1967da;
  font-weight: 500;
  /* font-size: 20px; */
  /* line-height: 2.5rem; */
}
</style>
@endsection
@section('contenu')
<div class="jumbotron contact-banner">
  <div class="text-center d-flex justify-content-center">
    <!-- <p>Bienvenue dans le centre d'aide, que pouvons nous faire pour vous ?.</p> -->
    <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Lire plus &raquo;</a></p> -->

    <form class="" action="{{ route('streaming.contact_send') }}" method="post"  class="form-inline">
      @csrf
      <h3 class="mb-4">Laissez-nous votre message</h3>
      @guest
      <div class="form-group font-weight-bold">
        <!-- <label for="name">Votre nom</label> -->
        <input type="text" name="name" value=""  class="form-control shadow-lg" placeholder="Entrez votre nom" required>
      </div>
      <div class="form-group">
        <!-- <label for="email">Votre adresse mail</label> -->
        <input type="email" name="email" value=""  class="form-control shadow-lg" placeholder="Entrez votre adresse e-mail" required>
      </div>
      @else
      <div class="alert alert-primary">
        Vous êtes connecté en tant que <br>
        <b>{{ auth()->user()->name }}</b>
      </div>
      @endguest

      <div class="form-group my-3">
        <!-- <label for="question" class=""> <strong>Votre message</strong> </label> -->
        <textarea name="message" placeholder="Ecrivez votre message..." class="form-control form-control-lg shadow-lg mb-4" rows="5" cols="80" style="font-size: 15px;" required></textarea>
      </div>

      <button type="submit" class="btn btn-primary" name="button">
        <span class="text-icon">Envoyer</span>
        <i data-feather="send" stroke-width="2.5" width="16" height="16"></i>
      </button>
      <!-- <button type="submit" name="button"  class="btn btn-primary btn-block">Envoyer</button> -->
    </form>
  </div>
</div>

<div class="container">

  <div  id="contact-us">
    <!-- <h2 class="text-center mx-auto mb-3">Contact</h2> -->

  <div class="row d-flex d-inline">
    <h5  class="m-2">Nous contacter autrement ?</h5>
    <a href="https://wa.me/24166795503?text=Bonjour%20Web%20Creation%20Streaming" target="_blank" class="btn btn-outline-success m-2" name="button"><i class="fab fa-whatsapp"></i> Whatsapp</a>
    <a href="" class="btn btn-outline-primary m-2" name="button"><i class="fab fa-facebook-messenger"></i> Messenger</a>
    <a href="tel:24166795503" class="btn btn-outline-warning m-2" name="button"><i class="fas fa-phone-alt"></i> Appeler</a>
  </div>
</div>

</div>


@endsection
