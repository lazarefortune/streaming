@extends('layouts.template')
@section('extra-css-streaming')
<style>
  /* .card p{
    font-size: 14px;
  }
  .card ul{
    font-size: 14px;
  }
  .card a{
    font-size: 14px;
  } */
  .card{
    border-radius: 7px;
  }
  .card-footer{
    border-radius: 7px;
  }
</style>
@endsection
@section('contenu')


<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item font-weight-bolder"><a href="{{ route('streaming.index') }}">Accueil</a></li>
    <li class="breadcrumb-item active font-weight-bolder" aria-current="page">Paramètres</li>
  </ol>
</nav>

<div class="">

    @include('flash::message')


    <div class="row">
      <div class="col-lg-4">
        <div class="card card-fluid mb-3 shadow">
          <h6  class="card-header"> <b>Paramètres</b> </h6>
          <nav  class="nav nav-tabs flex-column nav-account">
            <a href=""  class="nav-link active">
              <i data-feather="home" stroke-width="2.5" width="20" height="20"></i>
              <span class="text-icon">
                <strong>Accueil</strong>
              </span>
            </a>
            <a href="{{ route('account.profile') }}"  class="nav-link">
              <i data-feather="user" stroke-width="2.5" width="20" height="20"></i>
              <span class="text-icon">
                <strong>Compte</strong>
              </span>
            </a>
            <a href="{{ route('account.password') }}"  class="nav-link">
              <i data-feather="lock" stroke-width="2.5" width="20" height="20"></i>
              <span class="text-icon">
                <strong>Sécurité</strong>
              </span>
            </a>
          </nav>
        </div>
        <!-- end card -->
      </div>
      <!-- end column -->
      <div class="col-lg-8">
        <div class="card card-fluid border-0">
          <div class="card-body">

            <h4  class="mb-4 text-center">
              <i data-feather="user" stroke-width="2.5" width="20" height="20"></i>
              <span class="text-icon">Bienvenue {{ $user->name }}</span>
            </h4>

            <p class="text-center text-muted">Gérez vos informations, ainsi que la confidentialité et la sécurité de vos données pour profiter au mieux des services Web Creation</p>


          </div>
        </div>

        <div class="card my-3">
          <div class="card-body">
            <h5>
              <i data-feather="info" stroke-width="2.5" width="20" height="20"></i>
              <span class="text-icon">Informations</span>
            </h5>
            <p>Votre compte Web Creation vous permet d'accédez à l'ensemble de tous les services proposés par Web Creation.</p>
            <p>Quelque soit le service Web Creation ou vous vous trouvez, vous avez :</p>
            <ul style="list-style-type:none;">
              <li>- Les mêmes identifiants de connexion</li>
              <li>- Les mêmes informations concernant votre compte</li>
              <li>- Les mêmes paramètres</li>
            </ul>
          </div>
          <div class="card-footer" style="background-color: white !important;">
            <a href=""  class="card-link">
              <b  class="text-icon">
                En savoir plus
              </b>
              <i data-feather="arrow-right" stroke-width="2.5" width="16" height="16"></i>
            </a>
          </div>

        </div>

        <div class="card my-3">
          <div class="card-body">
              <div class="float-left ">
                <h5>
                  <i data-feather="list" stroke-width="2.5" width="20" height="20"></i>
                  <span class="text-icon">Vos services actifs</span>
                </h5>
                <ul style="list-style-type:none;">
                  <li>
                    - Web Creation Coding
                    <i data-feather="x" stroke-width="2.5" width="20" height="20" color="red"></i>
                  </li>
                  <li>
                    - Web Creation Forum
                    <i data-feather="x" stroke-width="2.5" width="20" height="20" color="red"></i>
                  </li>
                  <li>
                    - Web Creation Shopping
                    <i data-feather="x" stroke-width="2.5" width="20" height="20" color="red"></i>
                  </li>
                  <li>
                    - Web Creation Streaming
                    <i data-feather="check" stroke-width="2.5" width="20" height="20" color="green"></i>
                  </li>
                </ul>
              </div>
              <img src="{{ asset('assets/img/google/confi.png') }}" height="96" width="96" class="float-right d-none d-sm-none d-md-block d-lg-block" alt="">
          </div>

          <div class="card-footer" style="background-color: white !important;">
            <a href=""  class="card-link">
              <b class="text-icon">
                Accéder aux services
              </b>
              <i data-feather="arrow-right" stroke-width="2.5" width="16" height="16"></i>
            </a>
          </div>
        </div>

        <div class="card my-3">
          <div class="card-body">

              <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-8">
                  <h5>
                    <i data-feather="lock" stroke-width="2.5" width="20" height="20"></i>
                    <span class="text-icon">Votre sécurité</span>
                  </h5>
                  <p>Votre sécurité est notre priorité. Nous prenons très au sérieux la sécurité de vos données confidentielles en garantissant une totale transparence avec vous.</p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                  <img src="{{ asset('assets/img/google/security.png') }}" height="96" width="96" class="float-right " alt="">

                </div>
              </div>
          </div>

          <div class="card-footer" style="background-color: white !important;">
            <a href=""  class="card-link">
              <b class="text-icon">
                Consulter les options
              </b>
              <i data-feather="arrow-right" stroke-width="2.5" width="16" height="16"></i>
            </a>
          </div>
        </div>

        <div class="card my-3">
          <div class="card-body">
              <div class="float-left ">
                <h5>
                  <i data-feather="credit-card" stroke-width="2.5" width="20" height="20"></i>
                  <span class="text-icon">Nos moyens de paiement</span>
                </h5>
                <p>Nous garantissons la fiabilité de notre système de paiement via :</p>
                <ul style="list-style-type:none;">
                  <li>- Airtel Money</li>
                  <li>- Mobicash</li>
                  <li>- Paypal</li>
                </ul>
              </div>
              <img src="{{ asset('assets/img/google/payment.png') }}" height="96" width="96" class="float-right d-none d-sm-none d-md-block d-lg-block" alt="">
          </div>

          <div class="card-footer" style="background-color: white !important;">
            <a href=""  class="card-link">
              <b class="text-icon">
                Consulter les options
              </b>
              <i data-feather="arrow-right" stroke-width="2.5" width="16" height="16"></i>
            </a>
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
