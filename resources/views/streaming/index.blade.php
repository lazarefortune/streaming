@extends('layouts.template')

@section('title', 'Accueil')

@section('extra-css-streaming')
  <style>
  body{
    background-color: white !important;
  }
  .card{
    border-radius: 6px;
    /* border: 2px solid #0b2a64; */
  }
  .card-header{
    border-radius: 6px 6px 0px 0px !important;
  }
  .card-link{
    color: green;
  }
  .head{
    height: 100% !important;
  }


  main{
    margin-top: 0px !important;
  }

  main > .container {
    padding: 20px 15px 0;
    /* margin-top: 100px !important; */
    /* padding-top: 60px; */
  }

  #hero {
  width: 100%;
  /* height: 95vh; */
  margin-top: 0px !important;
  /* background-image: url('{{ asset("public/assets/img/google/help-banner.svg") }}') ; */
  background-repeat: no-repeat;
  background-color: white;
  background-position: bottom;
  /* background: #37517e; */
}

#hero .container {
  /* padding-top: 72px; */
}

#hero h1 {
  margin: 0 0 10px 0;
  font-size: 48px;
  font-weight: 700;
  line-height: 56px;
}

#hero h2 {
  /* color: rgba(255, 255, 255, 0.6); */
  margin-bottom: 50px;
  font-size: 24px;
}

#hero .btn-get-started {
  /* font-family: "Jost", sans-serif; */
  font-weight: 500;
  font-size: 16px;
  letter-spacing: 1px;
  display: inline-block;
  padding: 10px 28px 11px 28px;
  border-radius: 4px;
  transition: 0.5s;
  margin: 10px 0 0 0;
  color: #fff;
  /* background: #47b2e4; */
  background: #0944b3;
}

#hero .btn-get-started:hover {
  background: #303d72;
}

#hero .btn-watch-video {
  font-size: 16px;
  display: inline-block;
  padding: 10px 0 8px 40px;
  transition: 0.5s;
  margin: 10px 0 0 25px;
  color: black;
  position: relative;
}

#hero .btn-watch-video i {
  color: black;
  font-size: 32px;
  position: absolute;
  left: 0;
  top: 7px;
  transition: 0.3s;
}

#hero .btn-watch-video:hover i {
  color: #0944b3;
}

#hero .animated {
  animation: up-down 2s ease-in-out infinite alternate-reverse both;
}

@media (max-width: 991px) {
  #hero {
    /* height: 100vh; */
    text-align: center;
  }
  #hero .animated {
    -webkit-animation: none;
    animation: none;
  }
  #hero .hero-img {
    text-align: center;
  }
  #hero .hero-img img {
    width: 50%;
  }
}

@media (max-width: 768px) {
  #hero h1 {
    font-size: 28px;
    line-height: 36px;
  }
  #hero h2 {
    font-size: 18px;
    line-height: 24px;
    margin-bottom: 30px;
  }
  #hero .hero-img img {
    width: 70%;
  }
}

@media (max-width: 575px) {
  #hero .hero-img img {
    width: 80%;
  }
  #hero .btn-get-started {
    font-size: 16px;
    padding: 10px 24px 11px 24px;
  }
  #hero .btn-watch-video {
    font-size: 16px;
    padding: 10px 0 8px 40px;
    margin-left: 20px;
  }
  #hero .btn-watch-video i {
    font-size: 32px;
    top: 7px;
  }
}

@-webkit-keyframes up-down {
  0% {
    transform: translateY(10px);
  }
  100% {
    transform: translateY(-10px);
  }
}

@keyframes up-down {
  0% {
    transform: translateY(10px);
  }
  100% {
    transform: translateY(-10px);
  }
}


  </style>

  <link rel="stylesheet" href="{{ asset('assets/css/sweetalert.css') }}">
  <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
@endsection

@section('contenu')

<!-- @include('sweet::alert') -->

  <!-- <div class="mx-auto  text-center lead">
    <h1 class="display-5 font-weight-bold"> <strong>Découvrez toutes nos offres streaming</strong> </h1>
  </div> -->

  <!-- ======= Hero Section ======= -->
  <!-- <section id="hero" class="d-flex align-items-center"> -->
  <section id="hero" class="">

    <div class="">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Découvrez nos offres de <a href="#services">Streaming</a></h1>
          <h2>Des films et séries illimités, sur tous vos écrans, partout au <span class="text-color">Gabon</span> </h2>
          <div class="d-lg-flex">
            <a href="" class="btn-get-started scrollto">
              Commencer
              <i data-feather="arrow-right" stroke-width="2" width="16" height="16"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" style="margin-top: 120px !important;" data-aos-delay="200">
          <img src="assets/img/streaming-services.jpg" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section>

  <!-- End Hero -->

  <!-- ========================= SECTION HEADER ======================= -->
  <!-- <section class="head">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1 class="display-5 font-weight-bold"> <strong>Découvrez toutes nos offres streaming</strong> </h1>
        </div>
        <div class="col-md-6">
          <img src="{{ asset('assets/img/img3.png') }}" width="100%" height="auto" alt="">
        </div>
      </div>
    </div>
  </section> -->
  <!-- ========================= END SECTION HEADER ======================= -->

  <!-- ============================== SECTION OFFRES ======================== -->

  <section id="offres">

    <div class="pricing-header px-3 mb-3 pb-md-4 mx-auto text-center">
      <!-- <h1 class="display-4 font-weight-bold"> <strong>Netflix</strong> </h1> -->
      <img src="{{ asset('assets/img/netflix.png') }}" alt="" width="180" height="auto">
      <p class="lead">
        Passez votre commande, procédez au paiement, et profitez !!.
      </p>
      <a href=""  class="card-link text-danger" name="button">
        En savoir plus <i data-feather="arrow-right" stroke-width="2.5" width="20" height="20"></i>
      </a>
    </div>


    <!-- <div class="card-deck mb-3 text-center">
      @foreach($forfaits_netflix as $forfait)
      <div class="card mb-4 shadow">
        <div class="card-body">
          <div class="mb-2 pb-2 border-bottom rounded-bottom rounded-lg">
            <h4 class="my-0 font-weight-normal"> <strong>{{ $forfait->type }}</strong> </h4>
          </div>
          <h2 class="card-title pricing-card-title">{{ $forfait->price }} Fcfa<small class="text-muted">/ mo</small></h2>
          <ul class="list-unstyled mt-3 mb-4">
            {!! $forfait->description !!}
          </ul>
          <a href="{{ route('streaming.store', $forfait->id) }}" class="btn btn-lg btn-block btn-primary">
            <i data-feather="shopping-cart" stroke-width="2.5" width="20" height="20"></i>
            <b class="text-icon">Commander</b>
          </a>
        </div>
      </div>
      @endforeach

    </div> -->

    <div class="card-deck mb-3 text-center">
      <div class="card mb-4 shadow">
        <div class="card-body">
          <div class="mb-2 pb-2 border-bottom rounded-bottom rounded-lg">
            <h4 class="my-0 font-weight-normal"> <strong>Gratuit</strong> </h4>
          </div>
          <h2 class="card-title pricing-card-title"> 0 Fcfa<small class="text-muted">/ mo</small></h2>
          <ul class="list-unstyled mt-3 mb-4">
            <li>Participer au jeu concours pour:</li>
            <li>1 mois de connexion</li>
          </ul>
          <a href="{{ route('streaming.store', 1) }}" class="btn btn-lg btn-block btn-outline-primary">
            <i data-feather="play" stroke-width="2.5" width="20" height="20"></i>
            <b class="text-icon">Participer</b>
          </a>
        </div>
      </div>

      <div class="card mb-4 shadow">
        <div class="card-body">
          <div class="mb-2 pb-2 border-bottom rounded-bottom rounded-lg">
            <h4 class="my-0 font-weight-normal"> <strong>Standard</strong> </h4>
          </div>
          <h2 class="card-title pricing-card-title"> 4100 Fcfa<small class="text-muted">/ mo</small></h2>
          <ul class="list-unstyled mt-3 mb-4">
            <li>1 Ecran</li>
            <li>Films et séries illimités</li>
          </ul>
          <a href="{{ route('streaming.store', 2) }}" class="btn btn-lg btn-block btn-primary">
            <i data-feather="shopping-cart" stroke-width="2.5" width="20" height="20"></i>
            <b class="text-icon">Commander</b>
          </a>
        </div>
      </div>

      <div class="card mb-4 shadow">
        <div class="card-body">
          <div class="mb-2 pb-2 border-bottom rounded-bottom rounded-lg">
            <h4 class="my-0 font-weight-normal"> <strong>Pro</strong> </h4>
          </div>
          <h2 class="card-title pricing-card-title"> 14500 Fcfa<small class="text-muted">/ mo</small></h2>
          <ul class="list-unstyled mt-3 mb-4">
            <li><span class="text-danger">5</span> Ecrans</li>
            <li>Films et séries illimités</li>
          </ul>
          <a href="{{ route('streaming.store', 3) }}" class="btn btn-lg btn-block btn-primary">
            <i data-feather="shopping-cart" stroke-width="2.5" width="20" height="20"></i>
            <b class="text-icon">Commander</b>
          </a>
        </div>
      </div>
    </div>




    <!-- <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <img src="{{ asset('assets/img/amazon_prime_video.png') }}" alt="" width="180" height="auto">
      <p class="lead">
        Passez votre commande, procédez au paiement, et profitez !!.
      </p>
      <a href=""  class="card-link text-danger" name="button">
        En savoir plus <i data-feather="arrow-right" stroke-width="2.5" width="20" height="20"></i>
      </a>
    </div>


    <div class="card-deck mb-3 text-center">

      @foreach($forfaits_amazon as $forfait)
      <div class="card mb-4 shadow">
        <div class="card-body">
          <div class="mb-2 pb-2 border-bottom rounded-bottom rounded-lg">
            <h4 class="my-0 font-weight-normal"> <strong>{{ $forfait->type }}</strong> </h4>
          </div>
          <h2 class="card-title pricing-card-title">{{ $forfait->price }} Fcfa<small class="text-muted">/ mo</small></h2>
          <ul class="list-unstyled mt-3 mb-4">
            {!! $forfait->description !!}
          </ul>
          <a href="{{ route('streaming.store', $forfait->id) }}" class="btn btn-lg btn-block btn-primary">
            <i data-feather="shopping-cart" stroke-width="2.5" width="20" height="20"></i>
            <b class="text-icon">Commander</b>
          </a>
        </div>
      </div>
      @endforeach

    </div> -->

  </section>


@endsection
