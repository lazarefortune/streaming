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

      <div class="text-center my-3">
        <!-- {{ __('Confirmez le mot de passe') }} -->

        {{ __('Veuillez confirmer votre mot de passe avant de continuer.') }}
      </div>

      <form method="POST" action="{{ route('password.confirm') }}">
          @csrf

          <div class="form-group">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Mot de passe" autofocus>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <button type="submit" class="btn btn-primary btn-block">
              {{ __('Confirmez le mot de passe') }}
          </button>

      </form>

      <div class="mt-1 mb-4 d-flex justify-content-center">
        @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}">
            <strong  class="text-color">{{ __('Mot de passe oublié ?') }}</strong>
        </a>
        @endif
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
