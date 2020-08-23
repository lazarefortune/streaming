@extends('layouts.template')
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
        <img src="{{ asset('assets/img/Web_Creation_transparent.png') }}"   height="auto" width="150" alt="">
        <!-- <h3  class="text-color"> <b>Web Creation</b> </h3> -->
      </div>

      @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
      @endif

      <div class="text-center my-3">
        {{ __('Réinitialisation du mot de passe') }}
      </div>

      <form method="POST" action="{{ route('password.update') }}">
          @csrf

          <input type="hidden" name="token" value="{{ $token }}">

          <div class="form-group">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group ">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Nouveau mot de passe" autofocus>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group ">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmez le mot de passe">
          </div>

          <button type="submit" class="btn btn-primary btn-block">
              {{ __('réinitialiser le mot de passe') }}
          </button>

      </form>


    </div>

    <div class="col-md-6 col-sm-6 d-none d-sm-block d-md-block d-lg-block">
      <!-- <img src="{{ asset('image/img1.png') }}" height="50px" width="50px" alt=""> -->
      <img src="{{ asset('assets/img/img3.png') }}"  class="img-fluid" alt="">
    </div>

  </div>


  <!-- <input type="text"  class="form-control" name="" value=""> -->
</div>


@endsection
