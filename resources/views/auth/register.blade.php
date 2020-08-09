@extends('layouts.template')
@section('extra-css-streaming')
  <style>
    .ou{
      text-align: center;
      overflow: hidden;
    }
    .ou:before, .ou:after {
      content: '';
      width: 3em;
      border-bottom: 1px black solid;
      display: inline-block;
      vertical-align: middle;
    }
    .or{
      width: 10%;
      font-weight: bold;
    }
    .line{
      height: 1px;
      width: 45%;
      background-color: #E0E0E0;
      margin-top: 10px;
    }

    .text-color
    {
      color: #0b2a64;
    }
    .form-group input{
      /* border-bottom: 1px solid black !important; */
      border-top:none;
      border-left:none;
      border-right:none;
      box-shadow: none;
      border-radius: 0;
        /* outline: blue auto 0px ; */
    }
    .form-group input:focus{
      border: 2px solid blue;
      border-radius: 4px;
      box-shadow: none;
        /* outline: blue auto 0px ; */
    }
    .form-group .is-invalid input:focus{
      border: 2px solid red !important;
      border-radius: 4px;
      box-shadow: none !important;
    }
    .btn-primary
    {
      background-color: #0b2a64 !important;
      border: none;
    }
    .btn-primary:hover
    {
      background-color: #303d72 !important;
      border: none;
    }
  </style>
@endsection

@section('contenu')

  <div class="row">
    <div class="col-12 col-sm-6 col-md-6 pl-4 pr-4">
      
      <h4  class="text-center"> <b>Inscription</b> </h4>

      @include('flash::message')

      <form method="POST" action="{{ route('register') }}"  class="mb-3">
          @csrf

        <div class="form-group">
          <input id="name" placeholder="Votre nom" type="text" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" name="name" autocomplete="name" >
          @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

        <div class="form-group">
          <input id="contact" placeholder="Votre numéro de téléphone" type="tel" value="{{ old('contact') }}" class="form-control @error('contact') is-invalid @enderror" name="contact" autocomplete="contact" >
          @error('contact')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

        <div class="form-group">
          <input id="email" placeholder="Votre email" type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" name="email" autocomplete="email" >
          @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

        <div class="form-group">
          <input id="password" placeholder="Mot de passe" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password">
          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>

        <button type="submit"  class="btn btn-success btn-block" name="button"> <strong>S'inscrire</strong> </button>
      </form>

      <div class="row px-3 mb-3">
        <div class="line"></div>
        <small  class="or text-center">Ou</small>
        <div class="line"></div>
      </div>

      <div class="p-4">
        <a href="{{ route('login') }}"  class="btn btn-primary btn-block btn-sm" type="button" name="button"> <strong>Se connecter</strong> </a>
      </div>
    </div>
    <!-- end column -->

    <div class="col-md-6 col-sm-6 d-none d-sm-block d-md-block d-lg-block">
      <!-- <img src="{{ asset('image/img1.png') }}" height="50px" width="50px" alt=""> -->
      <img src="{{ asset('assets/img/img3.png') }}"  class="img-fluid" alt="">
      <div class="card text-center border-0">
        <p>Accédez au réseaux de <strong class="text-info">Web Creation</strong> gratuitement.</p>
      </div>
      <div class="">
        <img src="{{ url('/assets/img/Web Creation/3_min.png') }}" alt="" width="140" height="70">
        <img src="{{ url('/assets/img/4_min.png') }}" alt="" width="130" height="70">
      </div>
    </div>
    <!-- end column -->

  </div>
  <!-- end row -->

@endsection
