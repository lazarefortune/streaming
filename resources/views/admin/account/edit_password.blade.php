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
            <a href="{{ route('account') }}"  class="nav-link ">Compte</a>
            <a href=""  class="nav-link active">Sécurité</a>
          </nav>
        </div>
        <!-- end card -->
      </div>
      <!-- end column -->
      <div class="col-lg-8">
        <div class="card card-fluid">
          <h6  class="card-header"> <b>Sécurité</b> </h6>
          <div class="card-body">
            <form class="" action="{{ route('account.password.update') }}" method="post">
              @csrf
              <div class="form-group">
                <label for="oldpassword"> <b><i class="fas fa-unlock"></i> Ancien mot de passe</b> </label>
                <input type="password" class="form-control form-control-sm" id="oldpassword" placeholder="Entrez votre mot de passe actuel" name="password_old" required>
                @if($errors->has('password_old'))
                  <div class="alert alert-danger" role="alert">
                    {{ $errors->first('password_old') }}
                  </div>
                @endif
              </div>
              <div class="form-row">
                <div class="col-md-6 mb-3">
                  <label for="passwordnew"> <b><i class="fas fa-unlock"></i> Nouveau mot de passe</b> </label>
                  <input type="password" class="form-control form-control-sm" id="passwordnew" placeholder="Entrez le nouveau mot de passe" name="passwordnew" required>
                  @if($errors->has('passwordnew'))
                    <div class="alert alert-danger" role="alert">
                      {{ $errors->first('passwordnew') }}
                    </div>
                  @endif
                </div>
                <div class="col-md-6 mb-3">
                  <label for="passwordnew_confirm"> <b><i class="fas fa-unlock"></i> Confirmation</b> </label>
                  <input type="password" class="form-control form-control-sm" id="passwordnew_confirm" placeholder="Entrez à nouveau le mot de passe" name="passwordnew_confirmation" required>
                </div>
              </div>


              <div class="form-actions d-flex justify-content-center mb-2">
                <button type="submit" class="btn btn-danger" name="button">
                  Changer le mot de passe
                </button>

              </div>
              <hr>
              <div class="form-actions d-flex justify-content-center">

                <a href="{{ url('password/reset') }}"  class="card-link  mb-2"> <b>Vous avez oublié votre mot de passe ?</b> </a>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- <div class="">
      <h2>Mon compte</h2>
    </div>
    @include('flash::message')

    <div class="row justify-content-center">
      <div class="col-md-12 col-sm-12 col-lg-12 col-12">

    <div class="card mb-4">
        <div class="card-header bg-white font-weight-bold" style="border: 2px solid red;">
            <h6> <img src="{{ URL::asset('/image/font16/key.svg') }}" alt=""> <b>Modification du mot de passe</b> </h6>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('account.password.update') }}">
              {{ csrf_field() }}

              <div class="row">
                <div class="form-group col-sm-6">
                    <label for="oldpassword"> <b><i class="fas fa-unlock"></i> Ancien mot de passe</b> </label>

                    <input type="password" class="form-control" id="oldpassword" placeholder="Entrez votre mot de passe actuel" name="password_old" required>
                    @if($errors->has('password_old'))
                      <div class="alert alert-danger" role="alert">
                        {{ $errors->first('password_old') }}
                      </div>
                    @endif

                </div>
                <div class="form-group col-sm-6">
                    <label for="passwordnew"> <b><i class="fas fa-unlock"></i> Nouveau mot de passe</b> </label>
                    <input type="password" class="form-control" id="passwordnew" placeholder="Entrez le nouveau mot de passe" name="passwordnew" required>
                    @if($errors->has('passwordnew'))
                      <div class="alert alert-danger" role="alert">
                        {{ $errors->first('passwordnew') }}
                      </div>
                    @endif
                </div>
              </div>
              <div class="row">
                <div class="form-group col-sm-6">
                    <label for="passwordnew_confirm"> <b><i class="fas fa-unlock"></i> Nouveau mot de passe (Confirmation)</b> </label>
                    <input type="password" class="form-control" id="passwordnew_confirm" placeholder="Entrez à nouveau le mot de passe" name="passwordnew_confirmation" required>

                </div>

              </div>
              <button type="submit" class="btn btn-danger" name="button">
                Changer le mot de passe
              </button>

            </form>

        </div>
        <a href="{{ url('password/reset') }}"  class="text-danger mb-2"> <b>j'ai oublié mon mot de passe actuel</b> </a>
    </div>
    </div>
  </div> -->


</div>







@endsection
