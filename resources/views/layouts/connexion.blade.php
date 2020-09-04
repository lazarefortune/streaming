<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Lazare Fortune, Mohamed Mama">
    <title>Web Creation · Connexion</title>

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
            <a href="{{ route('streaming.index') }}" class="btn btn-flat">
              <i data-feather="arrow-left" stroke-width="2.5" width="16" height="16"></i>
            </a>
            <a href="{{ route('streaming.index') }}" ><img src="{{ asset('assets/img/new/Streaming2.png') }}" width="190" height="40" class="d-inline-block align-top p-0 m-0" alt="logo-Web-Creation-streaming" title="logo de Web Creation Streaming"></a>
            <!-- <button type="button" name="button" class="btn btn-primary">heo</button> -->
          </nav>
        </header>

        <form class="form-signin" method="POST" action="{{ route('login') }}">
          @csrf
          <div class="text-center mb-4 d-none d-sm-none d-md-block">
            <a href="{{ route('streaming.index') }}">
              <img src="{{ asset('assets/img/new/Web_Creation.png') }}" class="d-none d-sm-none d-md-inline" width="50%" height="auto" alt="logo-Web-Creation" title="logo de Web Creation">
            </a>
            <!-- <h1 class="h3 mb-3 font-weight-normal"> <b>Se connecter</b> </h1> -->
          </div>
          <h3 class="text-center font-weight-bolder mt-5 mt-sm-5 mt-lg-0 mb-4" style="color: #677987 !important;">Se connecter</h3>
          @include('flash::message')

          <!-- <a href="{{ url('auth/facebook') }}" class="btn btn-lg btn-primary btn-block">
                <strong>Login With Facebook</strong>
            </a> -->
          <!-- <div class="g-signin2" data-onsuccess="onSignIn"></div>
          <hr>
          <a href="{{ url('auth/google') }}" style="margin-top: 20px;" class="btn btn-lg btn-success btn-block">
            <strong>Login With Google</strong>
          </a> -->

          <div class="form-label-group">
            <input type="text" id="inputEmail"
                   class="form-control {{ $errors->has('contact') || $errors->has('email') ? ' is-invalid' : '' }}"
                   name="login" value="{{ old('contact') ?: old('email') }}" placeholder="Téléphone ou e-mail" required>
            <label for="inputEmail">Téléphone ou e-mail</label>

            @if ($errors->has('contact') || $errors->has('email'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('contact') ?: $errors->first('email') }}</strong>
                </span>
            @endif
          </div>

          <div class="form-label-group">
            <input id="inputPassword" placeholder="Mot de passe" type="password" id="inputPassword" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password">
            <label for="inputPassword">Mot de passe</label>
            <!-- <input type="checkbox" onclick="myFunction()"> -->
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>


          <div class="checkbox mb-3">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" name="remember" id="remember"  {{ old('remember') ? 'checked' : '' }} >
                <label class="custom-control-label" for="remember">
                    {{ __('Rester connecté') }}
                </label>
            </div>
          </div>
          <button class="btn  btn-primary btn-block btn-lg" type="submit">
            <strong>Connexion</strong>
          </button>

          <div class="mt-2 mb-4 d-flex justify-content-center">
            @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">
                <strong class="text-color">{{ __('Mot de passe oublié ?') }}</strong>
            </a>
            @endif
          </div>
          <div class="row px-3 mt-4 mb-1">
            <div class="line"></div>
            <small  class="or text-center">Ou</small>
            <div class="line"></div>
          </div>
          <div class="p-4">
            <a href="{{ route('register') }}"  class="btn btn-success btn-block" type="button" name="button">
              <strong>Créer un compte</strong>
            </a>
          </div>
          <!-- <p class="mt-5 mb-3 text-muted text-center">&copy; 2020</p> -->
        </form>



    @jquery
    @toastr_js
    @toastr_render
    <!-- jquery local -->
    <!-- <script>
    function myFunction() {
      var x = document.getElementById("inputPassword");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
      }
    </script> -->
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
