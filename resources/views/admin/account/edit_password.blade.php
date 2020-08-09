@extends('layouts.admin')

@section('content')

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Paramètres</li>
      <li class="breadcrumb-item active" aria-current="page">Sécurité</li>
    </ol>
  </nav>

  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card card-fluid mb-3 shadow">
          <h6  class="card-header"> <b>Paramètres</b> </h6>
          <nav  class="nav nav-tabs flex-column nav-account">
            <a href="{{ route('account.profile') }}"  class="nav-link ">Compte</a>
            <a href=""  class="nav-link active">Sécurité</a>
          </nav>
        </div> <!-- end card -->
      </div> <!-- end column -->

      <div class="col-lg-8">
        <div class="card card-fluid shadow-sm">
          <h5  class="card-header text-success"> <i class="fas fa-lock"></i> Changer mon mot de passe </h5>
          <div class="card-body">
            <form class="" action="{{ route('account.password.update') }}" method="post">
              @csrf
              <div class="form-group">
                <label for="oldpassword"> <b> Ancien mot de passe</b> </label>
                <input type="password" class="form-control " id="oldpassword" placeholder="" name="password_old" required>
                @if($errors->has('password_old'))
                  <div class="alert alert-danger" role="alert">
                    {{ $errors->first('password_old') }}
                  </div>
                @endif
              </div>
              <div class="form-row">
                <div class="col-md-6 mb-3">
                  <label for="passwordnew"> <b> Nouveau mot de passe</b> </label>
                  <input type="password" class="form-control " id="passwordnew" placeholder="" name="passwordnew" required>
                  @if($errors->has('passwordnew'))
                    <div class="alert alert-danger" role="alert">
                      {{ $errors->first('passwordnew') }}
                    </div>
                  @endif
                </div>
                <div class="col-md-6 mb-3">
                  <label for="passwordnew_confirm"> <b> Réécrire le nouveau mot de passe</b> </label>
                  <input type="password" class="form-control " id="passwordnew_confirm" placeholder="" name="passwordnew_confirmation" required>
                </div>
              </div>

              <div class="form-actions d-flex justify-content-center mb-2">
                <button type="submit" class="btn btn-danger" name="button">
                  <i  class="fas fa-check"></i> Valider
                </button>
              </div>
              <hr>
              <div class="form-actions d-flex justify-content-center">
                <a href="{{ url('password/reset') }}" class="card-link  mb-2"> <b>Vous avez oublié votre mot de passe ?</b> </a>
              </div>
            </form>
          </div> <!--end card body -->
        </div> <!-- end card -->
      </div> <!-- end column -->
    </div> <!-- end row -->
  </div> <!-- end container -->

@endsection
