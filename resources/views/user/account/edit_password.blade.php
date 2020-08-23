@extends('layouts.template')
@section('extra-css-streaming')
<style>
  input{
    /* border-bottom: 1px solid black !important; */
    border-top:none !important;
    border-left:none !important;
    border-right:none !important;
    box-shadow: none !important;
    border-radius: 0 !important;
      /* outline: blue auto 0px ; */
  }
  .card{
    border-radius: 7px;
  }
  .card-footer{
    border-radius: 7px;
  }

</style>
@endsection
@section('contenu')


  <nav aria-label="breadcrumb" class="d-md-block d-sm-none d-none">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-weight-bolder"><a href="{{ route('streaming.index') }}">Accueil</a></li>
      <li class="breadcrumb-item active font-weight-bolder" aria-current="page"><a href="{{ route('account.home') }}">Paramètres</a></li>
      <li class="breadcrumb-item active font-weight-bolder" aria-current="page">Sécurité</li>
    </ol>
  </nav>

  <div class="row">
    <div class="col-lg-4 col-md-4 d-md-block d-sm-none d-none">
      <div class="card card-fluid mb-3 shadow">
        <!-- <h6  class="card-header"> <b>Paramètres</b> </h6> -->
        <nav  class="nav nav-tabs flex-column nav-account">
          <a href="{{ route('account.home') }}"  class="nav-link">
            <i data-feather="home" stroke-width="2.5" width="20" height="20"></i>
            <span class="text-icon">
              <strong>Accueil</strong>
            </span>
          </a>
          <a href="{{ route('account.profile') }}"  class="nav-link">
            <i data-feather="user" stroke-width="2.5" width="20" height="20"></i>
            <span  class="text-icon font-weight-bolder">Compte</span>
          </a>
          <a href=""  class="nav-link active">
            <i data-feather="lock" stroke-width="2.5" width="20" height="20"></i>
            <span  class="text-icon font-weight-bolder">Sécurité</span>
          </a>
        </nav>
      </div>
      <!-- end card -->
    </div>
    <!-- end column -->

    <div class="col-sm-12 col-12 d-block d-sm-block d-md-none menu_mobile">
      <ul class="list-inline d-flex justify-content-around">
        <li class="list-inline-item">
          <a href="{{ route('account.home') }}" class="">
            <i data-feather="settings" stroke-width="2.5" width="16" height="16"></i>
            <span class="text-icon">Paramètres</span>
          </a>
        </li>
        <li class="list-inline-item">
          <a href="{{ route('account.profile') }}" >
            <i data-feather="user" stroke-width="2.5" width="16" height="16"></i>
            <span class="text-icon">Compte</span>
          </a>
        </li>
        <li class="list-inline-item">
          <a href="{{ route('account.password') }}" class="active_menu">
            <i data-feather="lock" stroke-width="2.5" width="16" height="16"></i>
            <span class="text-icon">Sécurité</span>
          </a>
        </li>
      </ul>
    </div>

    <div class="col-lg-8 col-md-8 col-sm-12 col-12">

      <div class="card card-fluid border-0">
        <div class="card-body">
          <h3  class="mb-1 text-center">
            <span class="text-icon">Sécurité</span>
          </h3>
          <p class="text-center text-muted">Paramètres et recommandations pour vous aider à protéger votre compte</p>
        </div>
      </div>

      <div class="card card-fluid my-3">
        <div class="card-body">

          <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-12 mb-3">
              <h5>
                <span class="text-icon">Modification du mot de passe</span>
              </h5>
            </div>
            <div class="col-lg-4 col-md-4 d-none d-sm-none d-md-block d-lg-block">
              <img src="{{ asset('assets/img/google/password.jpg') }}" height="auto" width="100%" class="float-right " alt="">
            </div>
          </div>

          <form class="my-2" action="{{ route('account.password.update') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="oldpassword"> <b> Ancien mot de passe</b> </label>
              <input type="password" class="form-control" id="oldpassword" placeholder="saisir le mot de passe" name="password_old" required>
              @if($errors->has('password_old'))
                <div class="alert alert-danger" role="alert">
                  {{ $errors->first('password_old') }}
                </div>
              @endif
            </div>
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="passwordnew"> <b> Nouveau mot de passe</b> </label>
                <input type="password" class="form-control" id="passwordnew" placeholder="saisir le mot de passe" name="passwordnew" required>
                @if($errors->has('passwordnew'))
                  <div class="alert alert-danger" role="alert">
                    {{ $errors->first('passwordnew') }}
                  </div>
                @endif
              </div>
              <div class="col-md-6 mb-3">
                <label for="passwordnew_confirm"> <b> Confirmation</b> </label>
                <input type="password" class="form-control" id="passwordnew_confirm" placeholder="saisir le mot de passe" name="passwordnew_confirmation" required>
              </div>
            </div>

            <div class="form-actions d-flex justify-content-center">
              <button type="submit" class="btn btn-primary" name="button">
                <i data-feather="check"></i> Changer le mot de passe
              </button>
            </div>

            <div class="form-actions d-flex justify-content-center mt-2 ">
              <a href="{{ url('password/reset') }}"  class="text-danger mb-2"> <b>Vous avez oublié votre mot de passe ?</b> </a>
            </div>

          </form>
        </div>
      </div>
      <!-- end card -->

      <div class="card card-fluid ">
        <div class="card-body">

          <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
              <h5>
                <!-- <i data-feather="lock" stroke-width="2.5" width="20" height="20"></i> -->
                <span class="text-icon">Méthodes pour vérifier votre identité</span>
              </h5>
              <p style="font-size: 14px;">
                Ces informations peuvent nous permettre de vérifier votre identité au moment de la connexion ou de vous contacter en cas d'activité suspecte sur votre compte.
              </p>
            </div>
            <div class="col-lg-4 col-md-4 d-none d-sm-none d-md-block d-lg-block">
              <img src="{{ asset('assets/img/google/secur.png') }}" height="auto" width="100%" class="float-right " alt="">
            </div>
          </div>

          <div class="mt-4">
            <a href="" class="row text-dark">
              <span class="col-lg-8 col-md-8 col-sm-12 col-12 "> <b>Numéro de téléphone de récupération</b> </span>
              <span class="col-lg-4 col-md-4 col-sm-12 col-12">
                <span class="text-icon">{{ $user->contact }}</span>
                <!-- <i data-feather="chevron-right" width="20" height="20"></i> -->
              </span>
            </a>
          </div>
          <hr>
          <div class="">
            <a href="" class="row text-dark">
              <span class="col-lg-8 col-md-8 col-sm-12 col-12 "> <b>Adresse e-mail de récupération</b> </span>
              <span class="col-lg-4 col-md-4 col-sm-12 col-12">
                <span class="text-icon">{{ $user->email }}</span>
                <!-- <i data-feather="chevron-right" width="20" height="20"></i> -->
              </span>
            </a>
          </div>
          <hr>
          <div class="">
            <a href="" class="row text-dark">
              <span class="col-lg-8 col-md-8 col-sm-12 col-12  "> <b>Validation en deux étapes</b> </span>
              <span class="col-lg-4 col-md-4 col-sm-12 col-12">
                <i data-feather="x-circle" width="20" height="20" color="red"></i>
                <span class="text-icon">
                  Désactivé
                </span>
                <!-- <i data-feather="chevron-right" width="20" height="20"></i> -->
              </span>
            </a>
          </div>
          <hr>
          <div class="">
            <a href="" class="row text-dark">
              <span class="col-lg-8 col-md-8 col-sm-12 col-12  "> <b>Connexion direct à tous les services</b> </span>
              <span class="col-lg-4 col-md-4 col-sm-12 col-12">
                <i data-feather="check-circle" width="20" height="20" color="green"></i>
                <span class="text-icon">
                  Activé
                </span>
                <!-- <i data-feather="chevron-right" width="20" height="20"></i> -->
              </span>
            </a>
          </div>

        </div>
        <!-- end card body -->
        <div class="card-footer" style="background-color: white !important;">
          <a href="{{ route('account.profile') }}"  class="card-link">
            <b class="text-icon">
              Modifier les informations
            </b>
            <i data-feather="arrow-right" stroke-width="2.5" width="16" height="16"></i>
          </a>
        </div>
        <!-- end card footer -->
      </div>
      <!-- end card body -->

      <div class="card card-fluid my-3">
        <div class="card-body">
          <h4  class="mb-3">Sécurité supplémentaire</h4>

          <div class="form-group custom-control custom-switch">
            <input type="checkbox"  class="custom-control-input" name="opt" value="opt"  id="opt">
            <label for="opt" class="custom-control-label">Recevoir un message à chaque connexion</label>
          </div>

          <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="customSwitch1">
            <label class="custom-control-label" for="customSwitch1">Authentication à deux facteurs</label>
          </div>

          <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" disabled id="customSwitch2">
            <label class="custom-control-label" for="customSwitch2">Lier à votre compte à Facebook (Indisponible)</label>
          </div>

        </div>
      </div>
      <!-- end card -->
    </div>
    <!-- end column 8 -->
  </div>
  <!-- end row -->

@endsection
