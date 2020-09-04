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
    <link rel="stylesheet" href="{{ asset('assets/css/test.css') }}">
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/503d9b4d92.js" crossorigin="anonymous"></script>
    <!-- google sign in -->
    <!-- <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id" content="807391013261-odgs295bc3lk83k2ke07u0c1656d76pt.apps.googleusercontent.com.apps.googleusercontent.com"> -->
    @toastr_css
    <style >

      .steps-form {
          display: table;
          width: 100%;
          position: relative;
      }
      .steps-form .steps-row {
          display: table-row;
      }
      .steps-form .steps-row:before {
          top: 14px;
          bottom: 0;
          position: absolute;
          content: " ";
          width: 100%;
          height: 1px;
          background-color: #ccc;
      }
      .steps-form .steps-row .steps-step {
          display: table-cell;
          text-align: center;
          position: relative;
      }
      .steps-form .steps-row .steps-step p {
          margin-top: 0.5rem;
      }
      .steps-form .steps-row .steps-step button[disabled] {
          opacity: 1 !important;
          filter: alpha(opacity=100) !important;
      }
      .steps-form .steps-row .steps-step .btn-circle {
          width: 30px;
          height: 30px;
          text-align: center;
          padding: 6px 0;
          font-size: 12px;
          line-height: 1.428571429;
          border-radius: 15px;
          margin-top: 0;
      }
      .btn-circle{
        width: 30px;
        height: 30px;
        text-align: center;
        padding: 6px 0;
        font-size: 12px;
        line-height: 1.428571429;
        border-radius: 15px;
        margin-top: 0;
      }
      .card-footer{
        background: white !important;
        border: none !important;
      }


      .choix a:hover{
        border: 1px solid #0944b3 !important;
      }
      .choix a:focus{
        border: 2px solid #0944b3 !important;
      }



        label {
        width: 100%;
        font-size: 1rem;
      }

      .card-input-element+.card {
        /* height: calc(36px + 2*1rem); */
        color: var(--primary);
        -webkit-box-shadow: none;
        box-shadow: none;
        border: 2px solid transparent;
        border-radius: 4px;
      }

      .card-input-element+.card:hover {
        cursor: pointer;
      }

      .card-input-element:checked+.card {
        border: 2px solid var(--primary) !important;
        -webkit-transition: border .3s;
        -o-transition: border .3s;
        transition: border .3s;
      }



      /* .card-input-element:checked+.card::before {
        content: '\e5ca';
        color: #0944b3;
        font-family: 'Material Icons';
        font-size: 24px;
        -webkit-animation-name: fadeInCheckbox;
        animation-name: fadeInCheckbox;
        -webkit-animation-duration: .5s;
        animation-duration: .5s;
        -webkit-animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
      } */

      @-webkit-keyframes fadeInCheckbox {
        from {
          opacity: 0;
          -webkit-transform: rotateZ(-20deg);
        }
        to {
          opacity: 1;
          -webkit-transform: rotateZ(0deg);
        }
      }

      @keyframes fadeInCheckbox {
        from {
          opacity: 0;
          transform: rotateZ(-20deg);
        }
        to {
          opacity: 1;
          transform: rotateZ(0deg);
        }
      }

      /* new 2 */
      label {
          width: 100%;
      }

      .card-input-element {
          display: none;
      }

      .card-input {
          /* margin: 10px; */
          /* padding: 00px; */
      }

      .card-input:hover {
          cursor: pointer;
      }

      .card-input-element:checked + .card-input {
           /* box-shadow: 0 0 1px 1px #2ecc71; */
       }

    </style>
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
            <!-- <a href="{{ route('streaming.index') }}" class="btn btn-flat">
              <i data-feather="arrow-left" stroke-width="2.5" width="16" height="16"></i>
            </a> -->

            <!-- Button trigger modal -->
<button type="button" class="btn btn-flat" data-toggle="modal" data-target="#exampleModal">
  <i data-feather="arrow-left" stroke-width="2.5" width="16" height="16"></i>
</button>



            <!-- <a href="{{ route('streaming.index') }}" > <h4>Paiement</h4> </a> -->
            <h5>

              Paiement
            </h5>
            <!-- <a href="{{ route('streaming.index') }}" ><img src="{{ asset('assets/img/new/Streaming2.png') }}" width="190" height="40" class="d-inline-block align-top p-0 m-0" alt="logo-Web-Creation-streaming" title="logo de Web Creation Streaming"></a> -->
            <!-- <button type="button" name="button" class="btn btn-primary">heo</button> -->
          </nav>
        </header>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Erreur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Vous venez de terminer la procédure de paiement, veuillez cliquer sur "Continuer"
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <a href="{{ route('streaming.orders') }}" class="btn btn-flat">
                  <button type="button" class="btn btn-primary">
                    <i data-feather="arrow-left" stroke-width="2.5" width="16" height="16"></i>
                    <span class="text-icon">Oui, Continuer</span>
                  </button>
                </a>
              </div>
            </div>
          </div>
        </div>

        <div class="steps-form mt-5">
          <div class="steps-row setup-panel">
            <div class="steps-step">
              <a href="" type="button" class="btn btn-success btn-circle">1</a>
              <p>Moyen</p>
            </div>
            <div class="steps-step">
              <a href="" type="button" class="btn btn-success btn-circle" disabled="disabled">2</a>
              <p>Paiement </p>
            </div>
            <div class="steps-step">
              <a href="" type="button" class="btn btn-success btn-circle" disabled="disabled">3</a>
              <p>Terminé</p>
            </div>
          </div>
        </div>

    <main>
      <form  class="form-signin d-flex flex-column bd-highlight" action="{{ route('streaming.moyen_payment_store', $stream) }}" method="post">
        @csrf
        <div class="text-center mb-4 d-none d-sm-none d-md-block">
          <a href="{{ route('streaming.index') }}">
            <img src="{{ asset('assets/img/new/Web_Creation.png') }}" class="d-none d-sm-none d-md-inline" width="50%" height="auto" alt="logo-Web-Creation" title="logo de Web Creation">
          </a>
        </div>
        <div class="text-center mb-2 font-weight-bold">
           <span class="h3 text-muted">Terminé</span>
        </div>
        <!-- <h1 class="h3 text-center mb-3 font-weight-normal text-muted"> <b>Airtel Money</b> </h1> -->

        @include('flash::message')

        <div class="card shadow p-3">
          <div class="card-body">
            <div class="mb-2">
              <h5  class="font-weight-bold mb-4">Commande n° {{ $stream->id }}</h5>
            </div>

            <div class="alert alert-success text-dark" role="alert">
              <h5 class="alert-heading">
                <i data-feather="check-circle" stroke-width="2.5" width="20" height="20"></i>
                <span class="text-icon">Envoyé avec succès!</span>
              </h5>
              <p>Notre équipe vérifie votre paiement.</p>
              <p>Vous recevrez sous 24h vos <b>identifiants de connexion </b> par SMS, e-mail et dans vos notifications sur notre site.</p>
              <p>Merci de patienter.</p>


            </div>

            <!-- <div class="mt-3">
              <a href="{{ route('streaming.orders') }}"  class="btn btn-primary float-right"> Cliquez ici <i  class="fas fa-arrow-right"></i> </a>
            </div> -->
          </div>
          <!-- end card body -->
        </div>
        <!-- end card -->


        <!-- @if(empty(old('choice')))
        <small class="text-center text-danger">Choisissez un moyen de paiement</small>
        @endif -->
        <a href="{{ route('streaming.orders') }}" class="mt-4">
          <button  id="soumi" class="btn bd-highlight mt-auto btn-primary btn-block btn-lg  my-4 font-weight-bold" type="button">
            <span class="text-icon">Continuer</span>
            <i data-feather="arrow-right" stroke-width="3" width="16" height="16"></i>
          </button>
        </a>
        <!-- @if(empty(old('choice'))) disabled @endif -->
        <!-- <p class="mt-5 mb-3 text-muted text-center">&copy; 2020</p> -->
      </form>
    </main>



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
