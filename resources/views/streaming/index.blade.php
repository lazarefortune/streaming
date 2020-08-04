@extends('layouts.template')

@section('extra-css-streaming')
<style>
.card{
  border-radius: 6px;
  border: 2px solid #0b2a64;
}
.card-header{
  border-radius: 6px 6px 0px 0px !important;
}
.card-link{
  color: green;
}
</style>

<link rel="stylesheet" href="{{ asset('assets/css/sweetalert.css') }}">
<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
@endsection
@section('contenu')

<!-- @include('sweet::alert') -->


<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h1 class="display-4 font-weight-bold"> <strong>Netflix</strong> </h1>
  <p class="lead">Passez votre commande, procédez au paiement, et profitez !!.</p>
  <a href=""  class="card-link" name="button">En savoir plus <i class="fas fa-long-arrow-alt-right"></i></a>
  <!-- <a href=""  class="card-link" name="button">En savoir plus <i class="fas fa-arrow-circle-right"></i></a> -->
</div>


  <div class="card-deck mb-3 text-center">

    @foreach($forfaits as $forfait)
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal"> <strong>{{ $forfait->type }}</strong> </h4>
      </div>
      <div class="card-body">
        <h2 class="card-title pricing-card-title">{{ $forfait->price }} Fcfa<small class="text-muted">/ mo</small></h2>
        <ul class="list-unstyled mt-3 mb-4">
          {!! $forfait->description !!}

          <!-- <li>Priority email support</li>
          <li>Help center access</li> -->
        </ul>
        <!-- <form class="" action="{{ route('streaming.store', $forfait->id) }}" method="post">
          @csrf
          <button type="submit" class="btn btn-lg btn-block btn-primary"> <b>Commander</b> </button>
        </form> -->
        <a href="{{ route('streaming.store', $forfait->id) }}" class="btn btn-lg btn-block btn-primary"> <i class="fas fa-shopping-cart"></i> <b>Commander</b> </a>
      </div>
    </div>
    @endforeach
    <!-- <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal">Pro</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">14.500 Fcfa<small class="text-muted">/ mo</small></h1>
        <ul class="list-unstyled mt-3 mb-4">
          <li>5 écrans</li>
          <li>Films et series illimités</li>
        </ul>
        <form class="" action="{{ route('streaming.store', 2) }}" method="post">
          @csrf
          <button type="submit" class="btn btn-lg btn-block btn-primary">Commander</button>
        </form>
      </div>
    </div> -->

  </div>

@endsection
