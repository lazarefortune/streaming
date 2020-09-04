@extends('layouts.template')

@section('title', 'Moyen de paiement')

@section('extra-css-streaming')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
.choix a:hover{
  border: 1px solid #0944b3 !important;
}
.choix a:focus{
  border: 2px solid #0944b3 !important;
}



  label {
  width: 100%;
  font-size: 1rem;
}

.card-input-element+.card {
  /* height: calc(36px + 2*1rem); */
  color: var(--primary);
  -webkit-box-shadow: none;
  box-shadow: none;
  border: 2px solid transparent;
  border-radius: 4px;
}

.card-input-element+.card:hover {
  cursor: pointer;
}

.card-input-element:checked+.card {
  border: 2px solid var(--primary) !important;
  -webkit-transition: border .3s;
  -o-transition: border .3s;
  transition: border .3s;
}



.card-input-element:checked+.card::before {
  content: '\e5ca';
  color: #0944b3;
  font-family: 'Material Icons';
  font-size: 24px;
  -webkit-animation-name: fadeInCheckbox;
  animation-name: fadeInCheckbox;
  -webkit-animation-duration: .5s;
  animation-duration: .5s;
  -webkit-animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
  animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}

@-webkit-keyframes fadeInCheckbox {
  from {
    opacity: 0;
    -webkit-transform: rotateZ(-20deg);
  }
  to {
    opacity: 1;
    -webkit-transform: rotateZ(0deg);
  }
}

@keyframes fadeInCheckbox {
  from {
    opacity: 0;
    transform: rotateZ(-20deg);
  }
  to {
    opacity: 1;
    transform: rotateZ(0deg);
  }
}

/* new 2 */
label {
    width: 100%;
}

.card-input-element {
    display: none;
}

.card-input {
    /* margin: 10px; */
    /* padding: 00px; */
}

.card-input:hover {
    cursor: pointer;
}

.card-input-element:checked + .card-input {
     /* box-shadow: 0 0 1px 1px #2ecc71; */
 }
</style>
@endsection

@section('contenu')

  <nav aria-label="breadcrumb" class="d-none d-sm-none d-md-block">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ route('streaming.index') }}">Accueil</a>
      </li>
      <li class="breadcrumb-item" aria-current="page">
        <a href="{{ route('streaming.orders') }}">Mes-commandes</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">
        Caisse
      </li>
    </ol>
  </nav>

  @include('flash::message')

  <h3 class="h4 text-center mb-5">Choisissez votre moyen de paiement <span class="text-danger">Airtel Money</span> </h3>

    <!-- <div class="container space-2">
      <div class="row choix">
        <div class="col-lg-6 mb-3 mb-lg-5">
          <a class="card card-frame h-100" href="{{ route('streaming.payment', ['choice' => 'byPhone', 'stream' => $stream]) }}">
            <div class="card-body">
              <div class="media d-block d-sm-flex">
                <div class="media-body">
                  <h2 class="h5">Depuis votre téléphone</h2>
                  <p class="font-size-1 text-body">Cliquez ici si vous pouvez payer par Airtel Money depuis votre téléphone</p>
                </div>
              </div>
            </div>
          </a>
        </div>

        <div class="col-lg-6 mb-3 mb-lg-5">
          <a class="card card-frame h-100" href="{{ route('streaming.payment', ['choice' => 'byAgent', 'stream' => $stream]) }}">
            <div class="card-body">
              <div class="media d-block d-sm-flex">
                <div class="media-body">
                  <h5>Depuis un agent</h5>
                  <p class="font-size-1 text-body">Cliquez ici si vous allez payer chez un agent (boutiquier, Kiosque ...)</p>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div> -->

<!-- <div class="container">
  <div class="row">
    <label>
      <input type="radio" name="demo" class="card-input-element d-none" id="demo1">
      <div class=" card card-body bg-light d-flex flex-row justify-content-between align-items-center text-dark">
        <img src="{{ asset('assets/img/freepik/Mobile payments-rafiki.png') }}" alt="" width="150px" height="auto">
      </div>
      </label>
    <label class="mt-3">
      <input type="radio" name="demo" class="card-input-element d-none" value="demo2">
      <div class="card card-body bg-light d-flex flex-row justify-content-between align-items-center text-dark">
      Organization 2
      </div>
    </label>
  </div>
</div> -->



<div class="container">
  <form class="" action="{{ route('streaming.moyen_payment_store', $stream) }}" method="post">
    @csrf

    <div class="row">

      <div class="col-md-6 col-lg-6 col-sm-6 col-6">

        <label>
          <input type="radio" name="choice" onclick="undisable()" value="byPhone" class="card-input-element" required />

          <div class="panel panel-default card card-body card-input border text-dark">
            <div class="panel-heading font-weight-bold">Sur mobile</div>
            <div class="panel-body">
              <img src="{{ asset('assets/img/freepik/Mobile payments.gif') }}" alt="" width="100px" height="auto">
              <p>Cliquez ici si vous pouvez payer par Airtel Money depuis votre téléphone</p>
            </div>
          </div>

        </label>

      </div>
      <div class="col-md-6 col-lg-6 col-sm-6 col-6">

        <label>
          <input type="radio" name="choice" onclick="undisable()" value="byAgent" class="card-input-element" required />

          <div class="panel panel-default card card-body card-input border text-dark">
            <div class="panel-heading font-weight-bold">Agent AM</div>
            <div class="panel-body">
              <img src="{{ asset('assets/img/freepik/Mobile payments(1).gif') }}" alt="" width="100px" height="auto">
              <p>Cliquez ici si vous allez payer chez un agent (boutiquier, Kiosque ...)</p>
            </div>
          </div>
        </label>

      </div>
    </div>
    <div class="row">
      <!-- <button type="button" class="btn btn-primary mr-auto btn-lg" name="button">retour</button> -->
      <button type="submit" class="mx-auto my-3 btn btn-primary" id="soumi"  disabled name="button">
        <span class="text-icon">Continuer</span>
        <i data-feather="arrow-right" stroke-width="2.5" width="20" height="20"></i>
      </button>
    </div>
  </form>
</div>


<script>
  function undisable() {
    document.getElementById("soumi").disabled = false;
  }
</script>



@endsection
