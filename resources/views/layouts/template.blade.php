<!doctype html>
<html lang="fr" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Procurez-vous votre Netflix">
    <meta name="author" content="Lazare Fortune, Mohamed Mama">
    <title>Web Creation</title>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/template_style.css') }}">
    <!-- Favicons -->
    <script src="https://kit.fontawesome.com/503d9b4d92.js" crossorigin="anonymous"></script>

    @yield('extra-css-streaming')
    @toastr_css
  </head>
  <body class="d-flex flex-column h-100">
    <header>
      <nav class="navbar navbar-icon-top navbar-expand-lg navbar-white menu shadow fixed-top">
        <a class="navbar-brand my-0 mr-md-auto font-weight-normal"  id="site-title" href="{{ route('streaming.index') }}">
          <img src="{{ asset('assets/img/new/Streaming2.png') }}" width="190" height="40" class="d-inline-block align-top p-0 m-0" alt="logo-Web-Creation-streaming" title="logo de Web Creation Streaming">
        </a>

        <a class="p-2 text-dark d-none d-sm-none d-md-block mr-2" href="{{ route('streaming.help') }}">
          Besoin d'aide ?
        </a>

        @auth
          @unless (auth()->user()->unreadNotifications->isEmpty())
            <div class="nav-item dropdown">
              <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i data-feather="bell"></i>
                <span class="badge badge-info">{{ auth()->user()->unreadNotifications->count() }}</span>
                <span  class="d-none d-sm-inline d-md-inline">Notifications</span>
              </a>

              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <div class="overflow-auto" style="height: 200px;">
                  @foreach (auth()->user()->unreadNotifications as $unreadNotification)
                  <a href="" class="dropdown-item text-wrap">
                    Bienvenue {{ $unreadNotification->data['name'] }}
                  </a>
                  <hr>
                  @endforeach
                </div>
              </div>
            </div>
          @endunless
        @endauth

        @guest

          <a class="btn btn-outline-primary" href="{{ route('login') }}">
            Se connecter
          </a>
          <a class="btn btn-primary ml-2 d-none d-sm-none d-md-block" href="{{ route('register') }}">
            S'inscrire
          </a>

        @else

          <a href="{{ route('streaming.orders') }}" class="text-success p-2 d-none d-sm-none d-md-block mr-2" type="button">
              <i data-feather="shopping-cart" stroke-width="2" width="20" height="20"></i>
              <span  class="text-icon">
                Mes abonnements
              </span>
          </a>

          <div class="btn-group">

            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i data-feather="user" stroke-width="2" width="20" height="20"></i>
              <span class="d-none d-sm-none d-md-inline text-icon"> </span>
            </button>

            <div class="dropdown-menu dropdown-menu-right shadow-lg" style="width: 344px !important; overflow-x: hidden; overflow-y: auto; border-radius: 8px; z-index: 991; position: absolute; right: 0px; top: 62px; max-height: calc(100vh - 62px -100px); line-height: normal;">
              <div class="card-body">
                <h6 class="text-center"> <strong>{{ auth()->user()->name }}</strong> </h6>
                <p class="text-center"> {{ auth()->user()->email }} </p>

                @can('manage-users')
                  <div class="text-center">
                    <a href="{{ route('admin.home') }}" class="btn btn-sm btn-outline-light text-dark" style="border-radius: 20px !important; border: 2px solid black !important" name="button">
                      <span>
                        <i data-feather="shield" stroke-width="2" width="20" height="20"></i>
                      </span> Espace admin
                    </a>
                  </div>
                  <hr>
                @endcan

                <a href="{{ route('streaming.orders') }}" class="btn btn-sm btn-outline-light text-dark d-block d-sm-block d-md-none" style="border-radius: 20px !important; border: 1px solid black !important" name="button">
                    <!-- <i class="fas fa-shopping-cart"></i> -->
                    <i data-feather="shopping-cart" stroke-width="2" width="20" height="20"></i>
                    <span  class="text-icon">
                      Mes abonnements
                    </span>
                </a>

                <hr class="d-block d-sm-block d-md-none">

                <div class="text-center">
                  <a href="{{ route('account.home') }}"  class="btn btn-sm btn-outline-light text-dark" style="border-radius: 20px !important; border: 1px solid black !important" name="button">
                    <b>Gérer votre compte</b>
                  </a>
                </div>
                <hr>
                <div class="text-center">
                  <a href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();"  class="btn btn-sm btn-outline-light text-dark" style=" border: 1px solid black !important" name="button">
                    <b>Déconnexion</b>
                  </a>
                  <form  id="logout-form" action="{{ route('logout') }}" method="POST" >
                      @csrf
                  </form>
                </div>
              </div>
              <!-- end card body -->
            </div>
            <!-- end dropdown menu -->
          </div>
          <!-- end div .btn-group -->
        @endguest
      </nav>
    </header>

    <!-- Begin page content -->

    <main role="main" class="flex-shrink-0 mb-3">
      <div class="container">
        @yield('contenu')
      </div>
    </main>

    <!-- end page content -->

    <footer class="footer mt-auto py-3">
      <div class="container">
        <div class="row">

          <div class="col-12 col-md">
            <!-- <img class="mb-2" src="{{ asset('assets/img/netflix.png') }}" alt="Logo-Netflix" width="70 " height="30" style="border-right: 2px solid black;"> -->
            <!-- <img src="{{ asset('assets/img/new/Streaming2.png') }}" width="100%" height="auto" class="d-inline-block align-top" alt="logo-Web-Creation-streaming"> -->
            <h5>Web Creation Streaming</h5>
            <small class="d-block mb-3 text-muted">&copy; 2020</small>

              <a href="https://facebook.com/WebCreation241/" target="_blank" style="font-size: 30px;"><i class="fab fa-facebook"></i></a>
              <a href="#" style="font-size: 30px;"><i class="fab fa-whatsapp"></i></a>
              <a href="#" style="font-size: 30px;"><i class="fab fa-instagram"></i></a>
              <a href="#" style="font-size: 30px;"><i class="fab fa-discord"></i></a>
              <p> <a href="developper-space">Êtes-vous développeur ?</a> </p>
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
              <li><a class="text-muted" href=""> <i  class="fas fa-info-circle"></i> Qui sommes nous ?</a></li>
              <li><a class="text-muted" href="{{ route('streaming.contact') }}"><i class="fas fa-phone-alt"></i> Nous contacter?</a></li>
              <li><a class="text-muted" href="{{ route('streaming.help') }}"> <i class="fas fa-headset"></i> Support Technique</a></li>
              <li>  <a class="text-muted" href="#">Politique de confidentialité</a></li>
            </ul>
          </div>

        </div>
        <!-- end div .row -->
      </div>
      <!-- end div .container -->
    </footer>


    @jquery
    @toastr_js
    @toastr_render
    <!-- jquery local -->
    <script src="{{ asset('bootstrap/jquery-3.5.1.slim.min.js') }}"></script>
    <script src="{{ asset('bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.19.0/feather.min.js" ></script>
    <script type="text/javascript">
    	feather.replace();
    </script>

  </body>
</html>
