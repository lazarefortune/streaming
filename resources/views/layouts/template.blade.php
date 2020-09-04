<!doctype html>
<html lang="fr" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Procurez-vous votre Netflix">
    <meta name="author" content="Lazare Fortune, Mohamed Mama">
    <title>Streaming | Web Creation | @yield('title') </title>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/template_style.css') }}">
    <!-- icons -->
    <script src="https://kit.fontawesome.com/503d9b4d92.js" crossorigin="anonymous"></script>

    <!-- favicon -->

    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/img/favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/img/favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/img/favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/img/favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/img/favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/img/favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/img/favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('assets/img/favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/img/favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/img/favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    @yield('extra-css-streaming')
    @toastr_css

    <!-- Smartsupp Live Chat script -->
  <script type="text/javascript">
  var _smartsupp = _smartsupp || {};
  _smartsupp.key = '579115c36a13b81bb40bedd37511dfa9e1f5122f';
  window.smartsupp||(function(d) {
    var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
    s=d.getElementsByTagName('script')[0];c=d.createElement('script');
    c.type='text/javascript';c.charset='utf-8';c.async=true;
    c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
  })(document);
  </script>

  </head>
  <body class="d-flex flex-column h-100">
    <header>
      <nav class="navbar navbar-icon-top navbar-expand-lg navbar-white menu shadow fixed-top pl-lg-5 pr-lg-5 pt-lg-3 pb-lg-3">
        <a class="navbar-brand my-0 mr-md-auto font-weight-normal"  id="site-title" href="{{ route('streaming.index') }}">
          <img src="{{ asset('assets/img/new/Streaming2.png') }}" width="190" height="40" class="d-inline-block align-top p-0 m-0" alt="logo-Web-Creation-streaming" title="logo de Web Creation Streaming">
        </a>
        @auth
          <a class="p-2  d-none d-sm-none d-md-block mr-2" href="{{ route('streaming.help') }}">
            Besoin d'aide ?
          </a>
        @else
        <a class="p-2  d-none d-sm-none d-md-block mr-2" href="{{ route('streaming.contact') }}">
          Nous contacter
        </a>
        @endauth

        @auth
          @unless (auth()->user()->unreadNotifications->isEmpty())
            <div class="nav-item dropdown">
              <!-- <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i data-feather="bell"></i>
                <span class="badge badge-info">{{ auth()->user()->unreadNotifications->count() }}</span>
                <span  class="d-none d-sm-inline d-md-inline">Notifications</span>
              </a> -->

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

          <a class="btn btn-primary  d-none d-sm-none d-md-block" href="{{ route('register') }}">
            S'inscrire
          </a>

          <a class="btn btn-success ml-2" href="{{ route('login') }}">
            Se connecter
          </a>
        @else

          <a href="{{ route('streaming.orders') }}" class="p-2 d-none d-sm-none d-md-block mr-2" type="button">
              <i data-feather="shopping-cart" stroke-width="2" width="20" height="20"></i>
              <span  class="text-icon">
                Mes commandes
              </span>
          </a>

          <div class="btn-group">

            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i data-feather="user" stroke-width="2" width="20" height="20"></i>
              <span class="d-none d-sm-none d-md-inline text-icon"> </span>
            </button>

            <div class="dropdown-menu dropdown-menu-right shadow-lg">
              <div class="card-body">
                <h6 class="text-center">
                  <strong>
                    @if(auth()->user()->isAdmin())
                      <i data-feather="user-check" stroke-width="2" width="16" height="16"></i>
                    @endif
                    <span class="text-icon">{{ auth()->user()->name }}</span>
                  </strong>
                </h6>
                <p class="text-center text-muted">
                  {{ auth()->user()->email }}
                  @if(empty(auth()->user()->email))
                  {{ auth()->user()->contact }}
                  @endif
                </p>

                @can('manage-users')
                  <div class="text-center">
                    <a href="{{ route('admin.home') }}" class="btn btn-sm btn-outline-light btn-menu text-dark" style="" name="button">
                      <span>
                        <i data-feather="shield" stroke-width="2" width="20" height="20"></i>
                      </span> Espace admin
                    </a>
                  </div>
                  <hr>
                @endcan

                <div class="text-center mb-3">
                  <a href="{{ route('streaming.orders') }}" class="d-block d-sm-block d-md-none" name="button">
                      <i data-feather="shopping-cart" stroke-width="2" width="20" height="20"></i>
                      <span  class="text-icon">
                        <b>Mes commandes</b>
                      </span>
                  </a>
                </div>
                <!-- btn btn-sm btn-outline-light btn-menu text-dark -->
                <!-- <hr class="d-block d-sm-block d-md-none"> -->

                <div class="text-center mb-3">
                  <a href="{{ route('account.home') }}"  class="" name="button">
                    <i data-feather="settings" stroke-width="2" width="20" height="20"></i>
                    <span  class="text-icon">
                      <b>Gérer votre compte</b>
                    </span>
                    <!-- <b>Gérer votre compte</b> -->
                  </a>
                </div>


                <div class="text-center mb-3">
                  <a href="{{ route('streaming.help') }}" class="d-block d-sm-block d-md-none" name="button">
                      <i data-feather="help-circle" stroke-width="2" width="20" height="20"></i>
                      <span  class="text-icon">
                        <b>Besoin d'aide</b>
                      </span>
                  </a>
                </div>
                <!-- btn btn-sm btn-outline-light btn-menu text-dark -->
                <!-- <br class="d-block d-sm-block d-md-none"> -->

                <div class="text-center">
                  <a href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();"  class="btn btn-primary btn-block btn-logout" name="button">
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
            <h5> Conçu par
              <a href="https://web-creation.lazarefortune.com" target="_blank">
                <i data-feather="external-link" stroke-width="2" width="20" height="20"></i>
                <span class="text-icon">Web Creation</span>
              </a>
            </h5>
            <small class="d-block mb-3 text-muted">&copy; 2020</small>

              <a href="https://facebook.com/WebCreation241/" target="_blank" style="font-size: 30px;"><i class="fab fa-facebook"></i></a>
              <a href="#" style="font-size: 30px;"><i class="fab fa-whatsapp"></i></a>
              <a href="#" style="font-size: 30px;"><i class="fab fa-instagram"></i></a>
              <a href="#" style="font-size: 30px;"><i class="fab fa-discord"></i></a>
              <p> <a href="https://developers.lazarefortune.com" class="text-muted">Espace développeurs</a> </p>
              <!-- <p> <a href="{{ route('streaming.developers') }}">Espace développeurs</a> </p> -->
          </div>
          <div class="col-6 col-md">
            <h5>Autres </h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="">Forum</a></li>
              <li><a class="text-muted" href="">Boutique</a></li>
              <li>  <a class="text-muted" href="{{ route('streaming.privacy') }}">Politique de confidentialité</a></li>
            </ul>
          </div>
          <div class="col-6 col-md">
            <h5>Aide & support</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="{{ route('streaming.about') }}"> Qui sommes nous ?</a></li>
              <li><a class="text-muted" href="{{ route('streaming.contact') }}"> Nous contacter</a></li>
              <li><a class="text-muted" href="{{ route('streaming.help') }}"> Support Technique</a></li>
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
