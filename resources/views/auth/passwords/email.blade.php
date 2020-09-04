<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Lazare Fortune, Mohamed Mama">
    <title>Web Creation · Reinitialisation</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/floating-labels/">
    <!-- Favicons -->
    <script src="https://kit.fontawesome.com/503d9b4d92.js" crossorigin="anonymous"></script>
    <!-- css -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/connexion_style.css') }}">
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/503d9b4d92.js" crossorigin="anonymous"></script>
    <!-- google sign in -->
    <!-- <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id" content="807391013261-odgs295bc3lk83k2ke07u0c1656d76pt.apps.googleusercontent.com.apps.googleusercontent.com"> -->
    @toastr_css
  </head>
  <body>

<!-- <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '{your-app-id}',
      cookie     : true,
      xfbml      : true,
      version    : '{api-version}'
    });

    FB.AppEvents.logPageView();

  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script> -->

        <header class="d-sm-block d-md-none d-lg-none ">
          <nav class="navbar shadow mt-1 navbar-expand-md navbar-white fixed-top bg-white d-flex justify-content-between">
            <a href="{{ route('login') }}" class="btn btn-flat">
              <i data-feather="arrow-left" stroke-width="2.5" width="16" height="16"></i>
            </a>
            <a href="{{ route('streaming.index') }}" ><img src="{{ asset('assets/img/new/Streaming2.png') }}" width="190" height="40" class="d-inline-block align-top p-0 m-0" alt="logo-Web-Creation-streaming" title="logo de Web Creation Streaming"></a>
            <!-- <button type="button" name="button" class="btn btn-primary">heo</button> -->
          </nav>
        </header>

        <form class="form-signin" method="POST" action="{{ route('password.email') }}">
          @csrf
          <div class="text-center mb-4 d-none d-sm-none d-md-block">
            <a href="{{ route('streaming.index') }}">
              <img src="{{ asset('assets/img/new/Web_Creation.png') }}" class="d-none d-sm-none d-md-inline" width="50%" height="auto" alt="logo-Web-Creation" title="logo de Web Creation">
            </a>
            <!-- <h1 class="h3 mb-3 font-weight-normal"> <b>Se connecter</b> </h1> -->
          </div>
          <h3 class="text-center font-weight-bold " style="color: #677987 !important;">Mot de passe</h3>

          @include('flash::message')
          <div class="text-center my-3">
            {{ __('Vous avez oublié votre mot de passe? pas de panique.') }}
          </div>

          @if (session('status'))
              <div class="alert alert-success" role="alert">
                  {{ session('status') }}
              </div>
          @endif

          <!-- <a href="{{ url('auth/facebook') }}" class="btn btn-lg btn-primary btn-block">
                <strong>Login With Facebook</strong>
            </a> -->
          <!-- <div class="g-signin2" data-onsuccess="onSignIn"></div>
          <hr>
          <a href="{{ url('auth/google') }}" style="margin-top: 20px;" class="btn btn-lg btn-success btn-block">
            <strong>Login With Google</strong>
          </a> -->

          <div class="form-label-group">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Entrez votre adresse mail">
            <label for="inputPassword">Entrez votre adresse e-mail</label>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <button class="btn  btn-primary btn-block btn-lg" type="submit">
            <strong>{{ __('Envoyer le lien de réinitialisation') }}</strong>
          </button>

          <div class="mt-3 mb-4 d-flex justify-content-center">

            <a href="">
                <strong  class="text-color">{{ __('Vous n\'avez pas d\'email ? Cliquez ici') }}</strong>
            </a>

          </div>

          <div class="row px-3 mb-4">
            <div class="line"></div>
            <small  class="or text-center">Ou</small>
            <div class="line"></div>
          </div>

          <div class="p-4 ">
            <a href="{{ route('login') }}"  class="btn btn-outline-primary btn-block mb-3" type="button" name="button">
              <strong>Se connecter</strong>
            </a>

            <a href="{{ route('register') }}"  class="btn btn-outline-success btn-block mt-3" type="button" name="button">
              <strong>Créer un compte</strong>
            </a>
          </div>
          <!-- <p class="mt-5 mb-3 text-muted text-center">&copy; 2020</p> -->
        </form>

    @jquery
    @toastr_js
    @toastr_render
    <!-- jquery local -->
    <script src="{{ asset('bootstrap/jquery-3.5.1.slim.min.js') }}"></script>
    <script src="{{ asset('bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- favicons -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.19.0/feather.min.js" ></script>
    <script type="text/javascript">
    	feather.replace();
    </script>
  </body>
</html>
