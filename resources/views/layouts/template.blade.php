<!doctype html>
<html lang="fr" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Lazare Fortune, Mohamed Mama">
    <title>Web Creation</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style_template_1.css') }}">
    <!-- Favicons -->
    <script src="https://kit.fontawesome.com/503d9b4d92.js" crossorigin="anonymous"></script>

    @yield('extra-css-streaming')


    @toastr_css

  </head>
  <body class="d-flex flex-column h-100">
    <header>
      <nav class="navbar navbar-icon-top navbar-expand-lg navbar-white menu shadow">
        <a class="navbar-brand my-0 mr-md-auto font-weight-normal"  id="site-title" href="{{ route('streaming.index') }}">
          <img src="{{ asset('assets/img/3r.png') }}" width="110" height="40" class="d-inline-block align-top p-0 m-0" alt="">
        </a>

        <a class="p-2 text-dark d-none d-sm-none d-md-block" href="{{ route('streaming.help') }}">Besoin d'aide ? </a>
        @auth
          @unless (auth()->user()->unreadNotifications->isEmpty())
            <div class="nav-item dropdown">
              <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-bell">
                  <span class="badge badge-info">{{ auth()->user()->unreadNotifications->count() }}</span>
                </i>
                <span  class="d-none d-sm-inline d-md-inline">Notifications</span>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <div class="overflow-auto" style="height: 200px;">
                  @foreach (auth()->user()->unreadNotifications as $unreadNotification)
                  <a href="" class="dropdown-item text-wrap">Bienvenue {{ $unreadNotification->data['name'] }}</strong></a>
                  <hr>
                  @endforeach
                </div>
              </div>
            </div>
          @endunless
        @endauth

        @guest
          <a class="btn btn-outline-primary" href="{{ route('login') }}">Se connecter</a>
          <a class="btn btn-primary ml-2 d-none d-sm-none d-md-block" href="{{ route('register') }}">S'inscrire</a>
        @else
        <div class="btn-group">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle"></i> <span  class="d-none d-sm-none d-md-inline">| {{ auth()->user()->name }}</span>
          </button>
          <div class="dropdown-menu dropdown-menu-right">
            @can('manage-users')
            <a href="{{ route('admin.home') }}" class="dropdown-item" type="button"> <span><i class="fas fa-user-shield"></i></span> Espace admin</a>
            @endcan
            <a href="{{ route('account') }}" class="dropdown-item" type="button"><span><i class="fas fa-cog"></i></span>  Paramètres</a>
            <a href="{{ route('streaming.account') }}" class="dropdown-item text-success" type="button"> <span><i class="fas fa-shopping-cart"></i></span> Mes abonnements</a>
            <div class="dropdown-divider"></div>
            <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();" class="dropdown-item text-danger">
                        <span><i class="fas fa-sign-out-alt"></i></span>
                        {{ __('Se déconnecter') }}
                    </a>
                    <form  id="logout-form" action="{{ route('logout') }}" method="POST" >
                        @csrf

                    </form>
          </div>
        </div>
        @endguest
      </nav>
    </header>

    <!-- Begin page content -->
    <main role="main" class="flex-shrink-0 mb-3">
      <div class="container">
        @yield('contenu')
      </div>
    </main>



    <!-- <footer class="footer mt-auto py-3">
      <div class="container">
        <span class="text-muted">Place sticky footer content here.</span>
      </div>
    </footer> -->

    <hr>
    <footer class="footer mt-auto py-3">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md">
            <img class="mb-2" src="{{ asset('assets/img/netflix.png') }}" alt="" width="70 " height="30" style="border-right: 2px solid black;">
            <img src="{{ asset('assets/img/Web-Creation2.png') }}" width="70" height="30" class="d-inline-block align-top" alt="">
            <small class="d-block mb-3 text-muted">&copy; 2020</small>

              <a href="https://facebook.com/WebCreation241/" target="_blank" style="font-size: 30px;"><i class="fab fa-facebook"></i></a>
              <a href="#" style="font-size: 30px;"><i class="fab fa-whatsapp"></i></a>
              <a href="#" style="font-size: 30px;"><i class="fab fa-instagram"></i></a>
              <a href="#" style="font-size: 30px;"><i class="fab fa-discord"></i></a>
              <p> <a href="developper-space">Êtes-vous développeur ?</a> </p>
          </div>
          <!-- <div class="col-6 col-md">
            <h5>A venir</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Amazon prime vidéo</a></li>
              <li><a class="text-muted" href="#">Disney +</a></li>
            </ul>
          </div> -->
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
              <li><a class="text-muted" href=""> <i  class="fas fa-info-circle"></i> Qui sommes nous ?</a></li>
              <li><a class="text-muted" href="{{ route('streaming.contact') }}"><i class="fas fa-phone-alt"></i> Nous contacter?</a></li>
              <li><a class="text-muted" href="{{ route('streaming.help') }}"> <i class="fas fa-headset"></i> Support Technique</a></li>
              <li>  <a class="text-muted" href="#">Politique de confidentialité</a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>


    @jquery

    @toastr_js

    @toastr_render
    <!-- jquery local -->
    <script src="{{ asset('bootstrap/jquery-3.5.1.slim.min.js') }}"></script>
    <script src="{{ asset('bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</html>
