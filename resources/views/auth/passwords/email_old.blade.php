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
        {{ __('Vous avez oublié votre mot de passe? pas de panique.') }}
        <!-- {{ __('Réinitialisation du mot de passe') }} -->
      </div>

      <form method="post" action="{{ route('password.email') }}"  class="mb-4">
          @csrf

          <div class="form-group">



              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Entrez votre adresse mail">

              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror

          </div>


          <button type="submit" class="btn btn-primary btn-block">
              {{ __('Envoyer le lien de réinitialisation') }}
          </button>


      </form>



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
