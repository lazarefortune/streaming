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
            <a href="{{ route('account.password') }}"  class="nav-link ">Sécurité</a>
          </nav>
        </div>
        <!-- end card -->
      </div>
      <!-- end column -->
      <div class="col-lg-8">
        <div class="card card-fluid shadow-sm">
          <h5 class="card-header text-success"> <i  class="fas fa-user"></i> Mes informations </h5>
          <div class="card-body">
            <form class="" action="{{ route('account.update') }}" method="post">
              @csrf
              <div class="form-row">
                <div class="col-md-6 mb-3">
                  <label for="nom"> <b> <i  class="fas fa-user"></i> Nom</b> </label>
                  <input type="text" class="form-control " id="nom" aria-describedby="nameHelp" placeholder="Entrez votre nom" value="{{ old('name') ?? $user->name }}" name="name" required>
                  @if($errors->has('name'))
                    <div class="alert alert-danger" role="alert">
                      {{ $errors->first('name') }}
                    </div>
                  @endif
                </div>
                <div class="col-md-6 mb-3">
                  <label for="contact"> <b><i class="fas fa-phone-alt"></i> Numéro de téléphone </b> </label>
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
                <label for="email"> <b><i class="fas fa-envelope"></i> Adresse mail </b></label>
                <input type="email" class="form-control " readonly id="email" aria-describedby="emailHelp" placeholder="Entrez votre adresse mail" value="{{ old('email') ?? $user->email }}" name="email">
                <small id="emailHelp" class="form-text text-danger"> <b>Modification indisponible temporairement.</b> </small>
                @if($errors->has('email'))
                  <div class="alert alert-danger" role="alert">
                    {{ $errors->first('email') }}
                  </div>
                @endif
              </div>
              <hr>
              <div class="form-actions d-flex justify-content-center">
                <button type="submit" class="btn btn-success " name="button">
                  <i  class="fas fa-check"></i> Valider
                </button>
              </div>
            </form>
          </div> <!-- end card-body -->
        </div> <!-- end card -->
      </div> <!-- end column -->
    </div> <!-- end row -->
  </div> <!-- end container -->

@endsection
