

@extends('layouts.streaming')
@section('extra-css-streaming')
<style>

.ou{
  text-align: center;
  overflow: hidden;
}
.ou:before, .ou:after {
  content: '';
  width: 3em;
  border-bottom: 1px black solid;
  display: inline-block;
  vertical-align: middle;
}
.or{
  width: 10%;
  font-weight: bold;
}
.line{
  height: 1px;
  width: 45%;
  background-color: #E0E0E0;
  margin-top: 10px;
}

.text-color
{
  color: #0b2a64;
}
.form-group input{
  /* border-bottom: 1px solid black !important; */
  border-top:none;
  border-left:none;
  border-right:none;
  box-shadow: none;
  border-radius: 0;
    /* outline: blue auto 0px ; */
}
.form-group input:focus{
  border: 2px solid blue;
  border-radius: 4px;
  box-shadow: none;
    /* outline: blue auto 0px ; */
}
.form-group .is-invalid input:focus{
  border: 2px solid red !important;
  border-radius: 4px;
  box-shadow: none !important;
}
.btn-primary
{
  background-color: #0b2a64 !important;
  border: none;
}
.btn-primary:hover
{
  background-color: #303d72 !important;
  border: none;
}

</style>
@endsection

@section('contenu')

<div class="container mt-4">
  <div class="row">
    <div class="col-12 col-sm-6 col-md-6 pl-4 pr-4">

      <div class="my-4 d-flex justify-content-center">
        <img src="{{ asset('assets/img/Web-Creation2.png') }}"   height="100" width="250" alt="">
        <!-- <h3  class="text-color"> <b>Web Creation</b> </h3> -->
      </div>

      @include('flash::message')

      <form method="POST" action="{{ route('login') }}">
          @csrf
        <div class="form-group">

          <input id="login" type="text"
                 class="form-control {{ $errors->has('contact') || $errors->has('email') ? ' is-invalid' : '' }}"
                 name="login" value="{{ old('contact') ?: old('email') }}" placeholder="Téléphone ou e-mail"  >

          @if ($errors->has('contact') || $errors->has('email'))
              <span class="invalid-feedback text-center">
                  <strong>{{ $errors->first('contact') ?: $errors->first('email') }}</strong>
              </span>
          @endif
        </div>

        <div class="form-group">
          <input id="password" placeholder="Mot de passe" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password">

          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>

        <div class="form-group">

                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="custom-control-label" for="remember">
                        {{ __('Rester connecté') }}
                    </label>
                </div>

        </div>

        <!-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong  class="text-danger">Attention!</strong> système en phase de test.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div> -->

        <button type="submit"  class="btn btn-primary btn-block" name="button"> <strong>Connexion</strong> </button>
      </form>

      <div class="mt-1 mb-4 d-flex justify-content-center">
        @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}">
            <strong  class="text-color">{{ __('Mot de passe oublié ?') }}</strong>
        </a>
        @endif
      </div>

      <div class="row px-3 mb-4">
        <div class="line"></div>
        <small  class="or text-center">Ou</small>
        <div class="line"></div>
      </div>

      <!-- <p class="ou"> ou </p> -->
      <!-- <div class="blockquote-footer">Ou </div> -->

      <div class="p-4">
        <a href="{{ route('register') }}"  class="btn btn-success btn-block btn-sm" type="button" name="button"> <strong>Créer un compte</strong> </a>
      </div>

    </div>

    <div class="col-md-6 col-sm-6 d-none d-sm-block d-md-block d-lg-block">
      <!-- <img src="{{ asset('image/img1.png') }}" height="50px" width="50px" alt=""> -->
      <img src="{{ asset('assets/img/img3.png') }}"  class="img-fluid" alt="">
    </div>

  </div>


  <!-- <input type="text"  class="form-control" name="" value=""> -->
</div>


@endsection
