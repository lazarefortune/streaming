<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Web Creation</title>

        <link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet" />

        <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- local -->
        <link href="{{ asset('bootstrap/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
        <script src="{{ asset('bootstrap/all.min.js') }}"></script>

        <link rel="stylesheet" href="{{ asset('admin/css/style-perso.css') }}">

        <style>
        @import url('https://fonts.googleapis.com/css2?family=Baloo+Da+2:wght@400;500;600;700;800&display=swap');

        body{
          /* font-family: 'Nunito', sans-serif; */
          font-family: 'Baloo Da 2', cursive;

        }

        .nav-account .active{
          border-left: 2px solid #6c757d !important;
          color: #6c757d !important;
        }
        .text-icon {
          vertical-align: middle !important;
        }
        </style>
        <!-- Toats notification files -->
        @toastr_css

        @yield('extra-css-admin')

        <!-- online -->
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script> -->

    </head>

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="{{ route('admin.home') }}">WEB CREATION</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#">
              <i class="fas fa-bars"></i>
            </button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Rechercher..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                          <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-user-circle fa-fw"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <span class="dropdown-item text-center" >
                          <b>{{ auth()->user()->name }}</b>
                        </span>
                        <hr>
                        <a class="dropdown-item" href="{{ route('account.profile') }}">
                          <i  class="fas fa-cog"></i>
                          Paramètres
                        </a>
                        <!-- <a class="dropdown-item" href="#">Activity Log</a> -->
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" class="dropdown-item text-danger"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                                 <i  class="fas fa-sign-out-alt"></i>
                                    {{ __('Se déconnecter') }}
                        </a>
                        <form  id="logout-form" action="{{ route('logout') }}" method="POST" >
                            @csrf
                        </form>
                        <!-- <a class="dropdown-item" href="login.html">Logout</a> -->
                    </div>
                </li>
            </ul>
        </nav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Liens</div>
                            <a class="nav-link" href="{{ route('admin.home') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Accueil
                            </a>
                            <div class="sb-sidenav-menu-heading">Options</div>
                            <!-- <a class="nav-link" href="{{ url('espace-admin') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a> -->
                            <a class="nav-link" href="{{ route('admin.users.index') }}">
                                <div class="sb-nav-link-icon">
                                  <i class="fas fa-users"></i>
                                </div>
                                Liste des clients
                            </a>
                            <a class="nav-link" href="{{ route('admin.streaming.command_list') }}">
                                <div class="sb-nav-link-icon">
                                  <i class="fas fa-store"></i>
                                </div>
                                Liste des commandes
                            </a>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon">
                                  <i class="fas fa-columns"></i>
                                </div>
                                Forfait
                                <div class="sb-sidenav-collapse-arrow">
                                  <i class="fas fa-angle-down"></i>
                                </div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('admin.streaming.create-forfait') }}">
                                      Créer un forfait
                                    </a>
                                    <a class="nav-link" href="{{ route('admin.streaming.forfaits') }}">
                                      Liste des forfaits
                                    </a>
                                    <!-- <a class="nav-link" href="{{ route('admin.streaming.command_list') }}">Liste des commandes</a> -->
                                </nav>
                            </div>

                            <div class="sb-sidenav-menu-heading">Autres services</div>

                            <a class="nav-link" href="{{ url('/') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-share"></i></div>
                                Retour au site web
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Conçu par:</div>
                        Web Creation 241
                    </div>
                </nav>
            </div>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Web Creation 241</div>
                            <div>
                                <a href="">Politique de confidentialité</a>
                                &middot;
                                <a href="">Termes &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <!-- offline script -->
        <script src="{{ asset('bootstrap/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('bootstrap/Chart.min.js') }}"></script>
        <script src="{{ asset('bootstrap/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('bootstrap/dataTables.bootstrap4.min.js') }}"></script>


        <!-- jquery local -->
        <script src="{{ asset('bootstrap/jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

        <!-- NEWWWWWW -->
        <script src="{{ asset('admin/js/scripts.js') }}"></script>
        <script src="{{ asset('admin/assets/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('admin/assets/demo/chart-bar-demo.js') }}"></script>
        <script src="{{ asset('admin/assets/demo/datatables-demo.js') }}"></script>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.19.0/feather.min.js" ></script>
        <script type="text/javascript">
        	feather.replace();
        </script>

    <!-- Toast notification files -->
        @jquery

        @toastr_js

        @toastr_render

    </body>
</html>
