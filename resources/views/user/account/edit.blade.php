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
</style>
@endsection
@section('contenu')


<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item font-weight-bolder"><a href="{{ route('streaming.index') }}">Accueil</a></li>
    <li class="breadcrumb-item active font-weight-bolder" aria-current="page"> <a href="{{ route('account.home') }}">Paramètres</a> </li>
    <li class="breadcrumb-item active font-weight-bolder" aria-current="page">Compte</li>
  </ol>
</nav>

<div class="">

    @include('flash::message')


    <div class="row">
      <div class="col-lg-4">
        <div class="card card-fluid mb-3 shadow">
          <h6  class="card-header"> <b>Paramètres</b> </h6>
          <nav  class="nav nav-tabs flex-column nav-account">
            <a href="{{ route('account.home') }}"  class="nav-link">
              <i data-feather="home" stroke-width="2.5" width="20" height="20"></i>
              <span class="text-icon">
                <strong>Accueil</strong>
              </span>
            </a>
            <a href=""  class="nav-link active">
              <i data-feather="user" stroke-width="2.5" width="20" height="20"></i>
              <span class="text-icon font-weight-bolder">Compte</span>
            </a>
            <a href="{{ route('account.password') }}"  class="nav-link">
              <i data-feather="lock" stroke-width="2.5" width="20" height="20"></i>
              <span class="text-icon font-weight-bolder">Sécurité</span>
            </a>
          </nav>
        </div>
        <!-- end card -->
      </div>
      <!-- end column -->
      <div class="col-lg-8">
        <div class="card card-fluid">
          <!-- <h4  class="card-header">
            <i data-feather="user" stroke-width="2.5" width="20" height="20"></i>
            <span class="text-icon">Informations personnelles</span>
          </h4> -->
          <div class="card-body">
            <!-- <h4>Informations personnelles</h4> -->
            <!-- <hr> -->
            <h5  class="mb-4">
              <i data-feather="user" stroke-width="2.5" width="20" height="20"></i>
              <span class="text-icon">Informations personnelles</span>
            </h5>
            <form class="" action="{{ route('account.update') }}" method="post">
              @csrf
              <div class="form-row">
                <div class="col-md-6 mb-3">
                  <label for="nom">
                    <!-- <i data-feather="user" stroke-width="2.5" width="20" height="20"></i> -->
                    <b  class="text-icon"> Nom complet</b>
                  </label>
                  <input type="text" class="form-control " id="nom" aria-describedby="nameHelp" placeholder="Entrez votre nom" value="{{ old('name') ?? $user->name }}" name="name" required>
                  <!-- <small id="nameHelp" class="form-text text-muted">Votre nom sera visible publiquement.</small> -->
                  @if($errors->has('name'))
                    <div class="alert alert-danger" role="alert">
                      {{ $errors->first('name') }}
                    </div>
                  @endif
                </div>
                <div class="col-md-6 mb-3">
                  <label for="contact">
                    <!-- <i data-feather="phone" stroke-width="2.5" width="20" height="20"></i> -->
                    <b  class="text-icon"> Numéro de téléphone </b>
                  </label>
                  <input type="text" class="form-control " id="contact" aria-describedby="contactHelp"  placeholder="Entrez votre numéro de téléphone" value="{{ old('contact') ?? $user->contact }}" name="contact" required>
                  <small id="contactHelp" class="form-text text-muted">Votre numéro de téléphone reste privé.</small>
                  @if($errors->has('contact'))
                    <div class="alert alert-danger" role="alert">
                      {{ $errors->first('contact') }}
                    </div>
                  @endif
                </div>
              </div>
              <div class="form-group">
                <label for="email">
                  <!-- <i data-feather="at-sign" stroke-width="2.5" width="20" height="20"></i> -->
                  <b  class="text-icon"> Adresse mail </b>
                </label>
                <input type="email" class="form-control " readonly id="email" aria-describedby="emailHelp" placeholder="Entrez votre adresse mail" value="{{ old('email') ?? $user->email }}" name="email">
                <small id="emailHelp" class="form-text text-danger"> Modification indisponible temporairement. </small>
                @if($errors->has('email'))
                  <div class="alert alert-danger" role="alert">
                    {{ $errors->first('email') }}
                  </div>
                @endif
              </div>
              <div class="form-actions d-flex justify-content-center">
                <button type="submit" class="btn btn-primary shadow" name="button">
                  <i data-feather="check" stroke-width="3" width="20" height="20"></i> Mettre à jour les informations
                </button>
              </div>
            </form>

          </div>
        </div>

        <div class="card card-fluid my-4">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                <h5>
                  <!-- <i data-feather="lock" stroke-width="2.5" width="20" height="20"></i> -->
                  <span class="text-icon">Connexion à Web Creation</span>
                </h5>
                <p style="font-size: 14px;">Informations conçernant votre inscription à nos services.</p>
              </div>
              <div class="col-lg-4 col-md-4 d-none d-sm-none d-md-block d-lg-block">
                <img src="{{ asset('assets/img/google/password.png') }}" height="auto" width="100%" class="float-right " alt="">

              </div>
            </div>
            <div class="mt-4">
              <a href="" class="row text-dark">
                <span class="col-lg-8 col-md-8 col-sm-12 col-12  "> <b>Date de création du compte</b> </span>
                <span class="col-lg-4 col-md-4 col-sm-12 col-12">
                  <span class="text-icon">{{ $user->created_at->format('d/m/Y à H:m:s') }}</span>
                  <!-- <i data-feather="chevron-right" width="20" height="20"></i> -->
                </span>
              </a>
            </div>
            <hr>
            <div class="">
              <a href="" class="row text-dark">
                <span class="col-lg-8 col-md-8 col-sm-12 col-12  "> <b>Dernière mise à jour du compte</b> </span>
                <span class="col-lg-4 col-md-4 col-sm-12 col-12">
                  <span class="text-icon">{{ $user->updated_at->format('d/m/Y à H:m:s') }}</span>
                  <!-- <i data-feather="chevron-right" width="20" height="20"></i> -->
                </span>
              </a>
            </div>
            <hr>
            <div class="">
              <a href="" class="text-danger font-weight-bold">Demander la suppression du compte</a>
              <!-- <i data-feather="arrow-right" width="20" height="20" color="red"></i> -->
            </div>

          </div>
        </div>

        <div class="card card-fluid my-4">
          <div class="card-body">
            <h5>
              <i data-feather="mail" stroke-width="2.5" width="20" height="20"></i>
              <span class="text-icon">Newsletter</span>
            </h5>

            <div class="alert alert-success">
              <i data-feather="check" stroke-width="3" width="20" height="20"></i>
              <span class="text-icon">Vous êtes abonné </span>
            </div>

              <p>Vous recevrez par mail :</p>
              <ul>
                <li>Les informations du compte</li>
                <li>Les annonces de mise à jour</li>
                <li>Les nouvelles offres</li>
                <li>Les jeux concours</li>
              </ul>
              <!-- <button type="button" name="button"  class="btn btn-outline-danger"> -->
                <a href="" class="text-danger font-weight-bold">
                  <i data-feather="bell-off" stroke-width="2.5" width="20" height="20"></i>
                  <span class="text-icon">Se désabonner</span>
                </a>
              <!-- </button> -->
          </div>



        </div>
      </div>
    </div>

<!--
    <div class="row">
      <div class="col-12 col-md-3">
        <nav class ="navbar bg-light">
          <ul class ="nav navbar-nav">
            <li class ="nav-item">
              <a class ="nav-link" href="#"> Profil </a>
            </li>
            <li class ="nav-item">
              <a class ="nav-link" href="#"> Sécurité </a>
            </li>
          </ul>
        </nav>
      </div>
      <div class="col-12 col-md-9">
        <div class="container">
          <form method="post" action="{{ route('account.update') }}">
            {{ csrf_field() }}
            <div class="row justify-content-center">

              <div class="col-md-8">
                <div class="form-group">
                  <label for="nom"> <b> Votre nom</b> </label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i  class="fas fa-user"></i>
                      </div>
                    </div>

                    <input type="text" class="form-control form-control-sm" id="nom" aria-describedby="nameHelp" placeholder="Entrez votre nom" value="{{ old('name') ?? $user->name }}" name="name" required>
                    <small id="nameHelp" class="form-text text-muted">Votre nom sera visible publiquement.</small>
                    @if($errors->has('name'))
                      <div class="alert alert-danger" role="alert">
                        {{ $errors->first('name') }}
                      </div>
                    @endif
                  </div>
                </div>
                <div class="form-group ">
                    <label for="contact"> <b><i class="fas fa-phone-alt"></i> Votre contact</b> </label>
                    <input type="text" class="form-control form-control-sm" id="contact" aria-describedby="contactHelp"  placeholder="Entrez votre numéro de téléphone" value="{{ old('contact') ?? $user->contact }}" name="contact" required>
                    <small id="contactHelp" class="form-text text-muted">Votre numéro de téléphone reste privé.</small>
                    @if($errors->has('contact'))
                      <div class="alert alert-danger" role="alert">
                        {{ $errors->first('contact') }}
                      </div>
                    @endif
                </div>
                <div class="form-group ">
                    <label for="email"> <b><i class="fas fa-envelope"></i> Email </b></label>
                    <input type="email" class="form-control form-control-sm is-invalid" readonly id="email" aria-describedby="emailHelp" placeholder="Entrez votre adresse mail" value="{{ old('email') ?? $user->email }}" name="email">
                    <small id="emailHelp" class="form-text text-danger"> <b>Modification indisponible temporairement.</b> </small>
                    @if($errors->has('email'))
                      <div class="alert alert-danger" role="alert">
                        {{ $errors->first('email') }}
                      </div>
                    @endif
                </div>
              </div>

            </div>
            <button type="submit" class="btn btn-success" name="button">
              Mettre à jour les informations <i  class="fas fa-check"></i>
            </button>

          </form>
        </div>
      </div>
    </div> -->





    <!-- <div class="card mb-4"> -->
        <!-- <div class="card-header text-center">
          <h3>Vos informations</h3>
        </div> -->



        <!-- <div class="card-body"> -->
          <!-- <div class="row">
            <div class="col-md-8">
              <div class="row d-flex justify-content-center">
                <div class="card col-md-12 mr-2">
                  <form method="post" action="{{ route('account.update') }}">
                    {{ csrf_field() }}
                        <div class="card-header">
                          <h4  class="text-center">Informations du compte</h4>
                        </div>

                        <div class="form-group">
                          <label for="nom"> <b> <i  class="fas fa-user"></i> Votre nom</b> </label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i  class="fas fa-user"></i>
                              </div>
                            </div>

                            <input type="text" class="form-control form-control-sm" id="nom" aria-describedby="nameHelp" placeholder="Entrez votre nom" value="{{ old('name') ?? $user->name }}" name="name" required>
                            @if($errors->has('name'))
                              <div class="alert alert-danger" role="alert">
                                {{ $errors->first('name') }}
                              </div>
                            @endif
                          </div>
                        </div>
                        <div class="form-group ">
                            <label for="contact"> <b><i class="fas fa-phone-alt"></i> Votre contact</b> </label>
                            <input type="text" class="form-control form-control-sm" id="contact" aria-describedby="contactHelp"  placeholder="Entrez votre numéro de téléphone" value="{{ old('contact') ?? $user->contact }}" name="contact" required>
                            <small id="contactHelp" class="form-text text-muted">Votre numéro de téléphone reste privé.</small>
                            @if($errors->has('contact'))
                              <div class="alert alert-danger" role="alert">
                                {{ $errors->first('contact') }}
                              </div>
                            @endif
                        </div>
                        <div class="form-group ">
                            <label for="email"> <b><i class="fas fa-envelope"></i> Email </b></label>
                            <input type="email" class="form-control form-control-sm is-invalid" readonly id="email" aria-describedby="emailHelp" placeholder="Entrez votre adresse mail" value="{{ old('email') ?? $user->email }}" name="email">
                            <small id="emailHelp" class="form-text text-danger"> <b>Modification indisponible temporairement.</b> </small>
                            @if($errors->has('email'))
                              <div class="alert alert-danger" role="alert">
                                {{ $errors->first('email') }}
                              </div>
                            @endif
                        </div>

                    <button type="submit" class="btn btn-success btn-sm" name="button">
                      Mettre à jour les informations <i  class="fas fa-check"></i>
                    </button>

                  </form>
                </div>
              </div>
            </div>
            <div class="card col-md-4">
              <div class="card-header">
                <h4  class="text-center">Sécurité</h4>
              </div>

              <a href="{{ route('account.password') }}"  class="card-link">Changer mon mot de passe <i  class="fas fa-arrow-alt-circle-right"></i> </a> <br>
              <a href=""  class="card-link text-info">Demande de changement d'adresse mail <i  class="fas fa-spinner"></i> </a> <br>
              <a href=""  class="card-link text-danger">Demande de suppression du compte <i  class="fas fa-trash"></i> </a>
            </div>
          </div> -->
        <!-- </div> -->
    <!-- </div> -->







</div>





@endsection
