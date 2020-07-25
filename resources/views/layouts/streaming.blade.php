@extends('layouts.bootstrap')

@section('extra-css')
<style>

/* @import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,800;1,900&display=swap'); */

/* @import url('https://fonts.googleapis.com/css2?family=Baloo+Da+2:wght@400;500;600;700;800&display=swap'); */

@import url('https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,500&display=swap');


body{
  /* font-family: 'Nunito', sans-serif; */
  /* font-family: 'Baloo Da 2', cursive; */

  font-family: 'DM Sans', sans-serif;
  font-weight: 500;

}
h1, h2, h3{
  font-weight: 700;
}
.btn-primary
{
  background-color: #0b2a64 !important;
  border: none;
  box-shadow: none !important;
}
.btn-primary:hover
{
  background-color: #303d72 !important;
  border: none;
  box-shadow: none !important;
}
.btn-outline-primary
{
  box-shadow: none !important;
}
.btn-outline-primary:hover
{
  box-shadow: none !important;
}
.dropdown-menu
{
  border-radius: 10px !important;
}

a{
  text-decoration: none !important;
}
a:hover {
  /* color: #0056b3; */
  /* text-decoration: underline; */
}
.bd-placeholder-img {
  font-size: 1.125rem;
  text-anchor: middle;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

@media (min-width: 768px) {
  .bd-placeholder-img-lg {
    font-size: 3.5rem;
  }
}
html {
  font-size: 14px;
}
@media (min-width: 768px) {
  html {
    font-size: 16px;
  }
}

.container {
  max-width: 960px;
}

.pricing-header {
  max-width: 700px;
}

.card-deck .card {
  min-width: 220px;
}
.menu
{
  background-image: linear-gradient(to right, rgb(255,150,150) , white);
}

footer .text-muted:hover
{
  color: red !important;
}
#site-title{
  color: black;
  font-weight: 700;
}
</style>
@yield('extra-css-streaming')
@endsection

@section('content')

<!-- Image and text -->
<!-- <nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img src="{{ asset('image/netflix.png') }}" width="70" height="30" class="d-inline-block align-top" alt="" style="border-right: 2px solid black;">
    Web Creation
  </a>
</nav> -->


<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm menu">
  <!-- <h5 class="my-0 mr-md-auto font-weight-normal">Company name</h5> -->
  <a class="navbar-brand my-0 mr-md-auto font-weight-normal"  id="site-title" href="{{ route('streaming.index') }}">
    <img src="{{ asset('assets/img/netflix.png') }}" width="70" height="30" class="d-inline-block align-top" alt="" style="border-right: 2px solid black; color: black;">
    <img src="{{ asset('assets/img/Web-Creation2.png') }}" width="70" height="30" class="d-inline-block align-top" alt="">

  </a>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="{{ route('streaming.help') }}">Besoin d'aide?</a>
    <!-- <a class="p-2 text-dark" href="#">Tarifs</a> -->
  </nav>
  <div class="">
    @guest
      <a class="btn btn-outline-primary" href="{{ route('login') }}">Se connecter</a>
      <!-- <a class="btn btn-primary" href="{{ route('streaming.account') }}">Se connecter</a> -->
    @else
    <div class="btn-group">
      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ auth()->user()->name }}
      </button>
      <div class="dropdown-menu dropdown-menu-right">
        @can('manage-users')
        <a href="{{ route('admin.home') }}" class="dropdown-item" type="button">Espace admin</a>
        @endcan
        <a href="{{ route('account') }}" class="dropdown-item" type="button">Paramètres</a>
        <a href="{{ route('streaming.account') }}" class="dropdown-item" type="button">Mes abonnements</a>
        <div class="dropdown-divider"></div>
        <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();" class="dropdown-item">
                    {{ __('Se déconnecter') }}
                </a>
                <form  id="logout-form" action="{{ route('logout') }}" method="POST" >
                    @csrf

                </form>
      </div>
    </div>
    @endguest
  </div>
</div>
  <div class="container">
  @yield('contenu')

  <footer class="pt-4 pt-md-5 my-md-5 border-top">
    <div class="row">
      <div class="col-12 col-md">
        <img class="mb-2" src="{{ asset('assets/img/netflix.png') }}" alt="" width="70 " height="30" style="border-right: 2px solid black;">
        Web Création
        <small class="d-block mb-3 text-muted">&copy; 2020</small>
      </div>
      <div class="col-6 col-md">
        <h5>A venir</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">Amazon prime vidéo</a></li>
          <li><a class="text-muted" href="#">Disney +</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Autres services</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">CANAL+ / EDAN</a></li>
          <li><a class="text-muted" href="#">Forum</a></li>
          <li><a class="text-muted" href="#">Boutique</a></li>
          <li><a class="text-muted" href="#">Espace Annonce</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>A propos</h5>
        <ul class="list-unstyled text-small">
          <!-- <li><a class="text-muted" href="#">Equipe</a></li> -->
          <li><a class="text-muted" href="{{ route('streaming.help') }}/#contact-us">Nous contacter?</a></li>
          <li><a class="text-muted" href="{{ route('streaming.help') }}">Support Technique</a></li>
          <li><a class="text-muted" href="#">Politique de confidentialité</a></li>
        </ul>
      </div>
    </div>
  </footer>
</div>


@endsection
