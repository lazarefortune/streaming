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
input:focus{
  /* box-shadow: 0px 8px 40px #000000 !important; */
  /* box-shadow: none !important; */
  box-shadow:
  0 2.8px 2.2px rgba(0, 0, 0, 0.034),
  0 6.7px 5.3px rgba(0, 0, 0, 0.048),
  0 12.5px 10px rgba(0, 0, 0, 0.06),
  0 22.3px 17.9px rgba(0, 0, 0, 0.072),
  0 41.8px 33.4px rgba(0, 0, 0, 0.086),
  0 100px 80px rgba(0, 0, 0, 0.12) !important;
  /* box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset, 0px 0px 8px  !important; */
}
textarea:focus{
  /* box-shadow: 0px 8px 40px #000000 !important; */
  /* box-shadow: none !important; */
  box-shadow:
  0 2.8px 2.2px rgba(0, 0, 0, 0.034),
  0 6.7px 5.3px rgba(0, 0, 0, 0.048),
  0 12.5px 10px rgba(0, 0, 0, 0.06),
  0 22.3px 17.9px rgba(0, 0, 0, 0.072),
  0 41.8px 33.4px rgba(0, 0, 0, 0.086),
  0 100px 80px rgba(0, 0, 0, 0.12) !important;
  /* box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset, 0px 0px 8px rgba(255, 100, 255, 0.5) !important; */
}


/* form starting stylings ------------------------------- */
/* .group 			  {
  position:relative !important;
  margin-bottom:15px;
} */
/* input 				{
  font-size:18px;
  padding:10px 10px 10px 5px;
  display:block;
  width:300px;
  border:none;
  border-bottom:1px solid #757575;
} */
/* input:focus 		{ outline:none; } */

/* LABEL ======================================= */
/* label 				 {
  color:#999;
  font-weight:normal;
  position:absolute;
  pointer-events:none;
  left:10px;
  top:7px;
  transition:0.2s ease all;
  -moz-transition:0.2s ease all;
  -webkit-transition:0.2s ease all;
} */

/* active state */
 /* input:focus ~ label, input:valid ~ label {
  top:-20px;
  color:#5264AE;
} */

/* BOTTOM BARS ================================= */
/* .bar 	{ position:relative; display:block; width:300px; }
.bar:before, .bar:after 	{
  content:'';
  height:2px;
  width:0;
  bottom:1px;
  position:absolute;
  background:#5264AE;
  transition:0.2s ease all;
  -moz-transition:0.2s ease all;
  -webkit-transition:0.2s ease all;
}
.bar:before {
  left:50%;
}
.bar:after {
  right:50%;
} */

/* active state */
/* input:focus ~ .bar:before, input:focus ~ .bar:after {
  width:50%;
} */

/* HIGHLIGHTER ================================== */
/* .highlight {
  position:absolute;
  height:60%;
  width:100px;
  top:25%;
  left:0;
  pointer-events:none;
  opacity:0.5;
} */

/* active state */
/* input:focus ~ .highlight {
  -webkit-animation:inputHighlighter 0.3s ease;
  -moz-animation:inputHighlighter 0.3s ease;
  animation:inputHighlighter 0.3s ease;
} */

/* ANIMATIONS ================ */
/* @-webkit-keyframes inputHighlighter {
	from { background:#5264AE; }
  to 	{ width:0; background:transparent; }
}
@-moz-keyframes inputHighlighter {
	from { background:#5264AE; }
  to 	{ width:0; background:transparent; }
}
@keyframes inputHighlighter {
	from { background:#5264AE; }
  to 	{ width:0; background:transparent; }
} */
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
        <input type="text" name="name" value=""  class="form-control " placeholder="Entrez votre nom" required>
      </div>

      <!-- <div class="group">
        <input type="text"  class="form-control" name="name" required>
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Votre Nom</label>
      </div>

      <div class="group">
        <input type="text" class="form-control" required>
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Email</label>
      </div> -->

      <div class="form-group">
        <!-- <label for="email">Votre adresse mail</label> -->
        <input type="email" name="email" value=""  class="form-control " placeholder="Entrez votre adresse e-mail" required>
      </div>
      @else
      <div class="alert alert-primary">
        Vous êtes connecté en tant que <br>
        <b>{{ auth()->user()->name }}</b>
      </div>
      @endguest

      <div class="form-group my-3">
        <!-- <label for="question" class=""> <strong>Votre message</strong> </label> -->
        <textarea name="message" placeholder="Ecrivez votre message..." class="form-control form-control-lg mb-4 " rows="5" cols="80" style="font-size: 15px;" required></textarea>
      </div>

      <button type="submit" class="btn btn-primary" name="button">
        <span class="text-icon">Envoyer</span>
        <i data-feather="send" stroke-width="2.5" width="16" height="16"></i>
      </button>
      <!-- <button type="submit" name="button"  class="btn btn-primary btn-block">Envoyer</button> -->
    </form>
  </div>
</div>


<!-- <form>

    <div class="group">
      <input type="text"  class="form-control" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Name</label>
    </div>

    <div class="group">
      <input type="text" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Email</label>
    </div>

  </form> -->


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
