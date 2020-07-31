@extends('layouts.admin')

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Paramètres</li>
    <li class="breadcrumb-item active" aria-current="page">Compte</li>
  </ol>
</nav>
  <div class="container">

    @include('flash::message')

    <div class="row">
      <div class="col-lg-4">
        <div class="card card-fluid mb-3 shadow">
          <h6  class="card-header"> <b>Paramètres</b> </h6>
          <nav  class="nav nav-tabs flex-column nav-account">
            <a href=""  class="nav-link active">Compte</a>
            <a href="{{ route('account_password') }}"  class="nav-link ">Sécurité</a>
          </nav>
        </div>
        <!-- end card -->
      </div>
      <!-- end column -->
      <div class="col-lg-8">
        <div class="card card-fluid">
          <h6  class="card-header"> <b>Compte</b> </h6>
          <div class="card-body">
            <form class="" action="{{ route('account.update') }}" method="post">
              @csrf
              <div class="form-row">
                <div class="col-md-6 mb-3">
                  <label for="nom"> <b> <i  class="fas fa-user"></i> Nom</b> </label>
                  <input type="text" class="form-control form-control-sm" id="nom" aria-describedby="nameHelp" placeholder="Entrez votre nom" value="{{ old('name') ?? $user->name }}" name="name" required>
                  <!-- <small id="nameHelp" class="form-text text-muted">Votre nom sera visible publiquement.</small> -->
                  @if($errors->has('name'))
                    <div class="alert alert-danger" role="alert">
                      {{ $errors->first('name') }}
                    </div>
                  @endif
                </div>
                <div class="col-md-6 mb-3">
                  <label for="contact"> <b><i class="fas fa-phone-alt"></i> Numéro de téléphone </b> </label>
                  <input type="text" class="form-control form-control-sm" id="contact" aria-describedby="contactHelp"  placeholder="Entrez votre numéro de téléphone" value="{{ old('contact') ?? $user->contact }}" name="contact" required>
                  <small id="contactHelp" class="form-text text-muted">Votre numéro de téléphone reste privé.</small>
                  @if($errors->has('contact'))
                    <div class="alert alert-danger" role="alert">
                      {{ $errors->first('contact') }}
                    </div>
                  @endif
                </div>
              </div>
              <div class="form-group">
                <label for="email"> <b><i class="fas fa-envelope"></i> Adresse mail </b></label>
                <input type="email" class="form-control form-control-sm" readonly id="email" aria-describedby="emailHelp" placeholder="Entrez votre adresse mail" value="{{ old('email') ?? $user->email }}" name="email">
                <small id="emailHelp" class="form-text text-danger"> <b>Modification indisponible temporairement.</b> </small>
                @if($errors->has('email'))
                  <div class="alert alert-danger" role="alert">
                    {{ $errors->first('email') }}
                  </div>
                @endif
              </div>
              <hr>
              <div class="form-actions d-flex justify-content-center">
                <button type="submit" class="btn btn-success btn-sm" name="button">
                  Mettre à jour les informations <i  class="fas fa-check"></i>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

        <!-- <div class="card-body"> -->
          <!-- <div class="row">
            <div class="col-md-8">
              <div class="row d-flex justify-content-center">
                <div class="card col-md-8">
                  <form method="post" action="{{ route('account.update') }}">
                    {{ csrf_field() }}
                        <h4  class="text-center">Informations du compte</h4>
                        <hr>
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
              <h4  class="text-center">Sécurité</h4>
              <hr>
              <a href="{{ route('account_password') }}"  class="card-link">Changer mon mot de passe <i  class="fas fa-arrow-alt-circle-right"></i> </a> <br>
              <a href=""  class="card-link text-info">Demande de changement d'adresse mail <i  class="fas fa-spinner"></i> </a> <br>
              <a href=""  class="card-link text-danger">Demande de suppression du compte <i  class="fas fa-trash"></i> </a>
            </div>
          </div> -->
        <!-- </div> -->
    <!-- </div> -->





</div>







@endsection
