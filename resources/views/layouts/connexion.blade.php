<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Lazare Fortune, Mohamed Mama">
    <title>Web Creation · Connexion</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/floating-labels/">
    <!-- css -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/503d9b4d92.js" crossorigin="anonymous"></script>


    <style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,500&display=swap');
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
      html,
      body {
        height: 100%;
      }

      body {
        font-family: 'DM Sans', sans-serif;
        font-weight: 500;

        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        /* background-color: #f5f5f5; */
      }

      .form-signin {
        width: 100%;
        max-width: 420px;
        padding: 15px;
        margin: auto;
      }

      .form-label-group {
        position: relative;
        margin-bottom: 1rem;
      }

      .form-label-group > input,
      .form-label-group > label {
        height: 3.125rem;
        padding: .75rem;
      }

      .form-label-group > label {
        position: absolute;
        top: 0;
        left: 0;
        display: block;
        width: 100%;
        margin-bottom: 0; /* Override default `<label>` margin */
        line-height: 1.5;
        color: #495057;
        pointer-events: none;
        cursor: text; /* Match the input under the label */
        border: 1px solid transparent;
        border-radius: .25rem;
        transition: all .1s ease-in-out;
      }

      .form-label-group input::-webkit-input-placeholder {
        color: transparent;
      }

      .form-label-group input:-ms-input-placeholder {
        color: transparent;
      }

      .form-label-group input::-ms-input-placeholder {
        color: transparent;
      }

      .form-label-group input::-moz-placeholder {
        color: transparent;
      }

      .form-label-group input::placeholder {
        color: transparent;
      }

      .form-label-group input:not(:placeholder-shown) {
        padding-top: 1.25rem;
        padding-bottom: .25rem;
      }

      .form-label-group input:not(:placeholder-shown) ~ label {
        padding-top: .25rem;
        padding-bottom: .25rem;
        font-size: 12px;
        color: #777;
      }

      /* Fallback for Edge
      -------------------------------------------------- */
      @supports (-ms-ime-align: auto) {
        .form-label-group > label {
          display: none;
        }
        .form-label-group input::-ms-input-placeholder {
          color: #777;
        }
      }

      /* Fallback for IE
      -------------------------------------------------- */
      @media all and (-ms-high-contrast: none), (-ms-high-contrast: active) {
        .form-label-group > label {
          display: none;
        }
        .form-label-group input:-ms-input-placeholder {
          color: #777;
        }
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

      .form-label-group input{
        /* border-bottom: 1px solid black !important; */
        border-top:none;
        border-left:none;
        border-right:none;
        box-shadow: none;
        border-radius: 4px;
          /* outline: blue auto 0px ; */
      }
      .form-label-group input:focus{
        border: 2px solid blue;
        border-radius: 4px;
        box-shadow: none;
          /* outline: blue auto 0px ; */
      }
      .form-label-group .is-invalid input:focus{
        border: 2px solid red !important;
        border-radius: 4px;
        box-shadow: none !important;
      }
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
    </style>
    <!-- Custom styles for this template -->
    <link href="floating-labels.css" rel="stylesheet">
  </head>
  <body>

    <form class="form-signin" method="POST" action="{{ route('login') }}">
      @csrf
      <!-- <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Accueil</a></li>
          <li class="breadcrumb-item active" aria-current="page">Connexion</li>
        </ol>
      </nav> -->
      <div class="text-center mb-4">
        <!-- <a href="{{ route('streaming.index') }}"><img class="mb-4" src="{{ asset('assets/img/logo-Web-Creation-streaming.png') }}" alt="" width="70%" height="100"></a> -->
        <a href="{{ route('streaming.index') }}">
          <img src="{{ asset('assets/img/new/Streaming2.png') }}" width="70%" height="100%" alt="logo-Web-Creation-streaming" title="logo de Web Creation Streaming">
        </a>
        <!-- <h1 class="h3 mb-3 font-weight-normal"> <b>Se connecter</b> </h1> -->
      </div>
      @include('flash::message')
      <div class="form-label-group">
        <input id="login" type="text" id="inputEmail"
               class="form-control {{ $errors->has('contact') || $errors->has('email') ? ' is-invalid' : '' }}"
               name="login" value="{{ old('contact') ?: old('email') }}" placeholder="Téléphone ou e-mail"  >
        <label for="inputEmail">Téléphone ou e-mail</label>

        @if ($errors->has('contact') || $errors->has('email'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('contact') ?: $errors->first('email') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-label-group">
        <input id="password" placeholder="Mot de passe" type="password" id="inputPassword" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password">
        <label for="inputPassword">Mot de passe</label>

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>

      <div class="checkbox mb-3">
        <div class="custom-control custom-checkbox">
            <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

            <label class="custom-control-label" for="remember">
                {{ __('Rester connecté') }}
            </label>
        </div>
      </div>
      <button class="btn  btn-primary btn-block" type="submit"> <strong>Connexion</strong> </button>
      <div class="mt-1 mb-4 d-flex justify-content-center">
        @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}">
            <strong  class="text-color">{{ __('Mot de passe oublié ?') }}</strong>
        </a>
        @endif
      </div>
      <div class="row px-3 mb-4">
        <div class="line"></div>
        <small  class="or text-center">Ou</small>
        <div class="line"></div>
      </div>
      <div class="p-4">
        <a href="{{ route('register') }}"  class="btn btn-success btn-block btn-sm" type="button" name="button"> <strong>Créer un compte</strong> </a>
      </div>
      <!-- <p class="mt-5 mb-3 text-muted text-center">&copy; 2020</p> -->
    </form>

    <!-- jquery local -->
    <script src="{{ asset('bootstrap/jquery-3.5.1.slim.min.js') }}"></script>
    <script src="{{ asset('bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
  </body>
</html>
