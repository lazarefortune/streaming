@extends('layouts.template')

@section('extra-css-streaming')
  <style>
  .card{
    border-radius: 6px;
    /* border: 2px solid #0b2a64; */
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
    <p class="lead">
      Passez votre commande, procédez au paiement, et profitez !!.
    </p>
    <a href=""  class="card-link" name="button">
      En savoir plus <i data-feather="arrow-right" stroke-width="2.5" width="20" height="20"></i>
    </a>
  </div>


  <div class="card-deck mb-3 text-center">

    @foreach($forfaits as $forfait)
    <div class="card mb-4 shadow">
      <div class="card-body">
        <div class="mb-2 pb-2 border-bottom rounded-bottom rounded-lg">
          <h4 class="my-0 font-weight-normal"> <strong>{{ $forfait->type }}</strong> </h4>
        </div>
        <h2 class="card-title pricing-card-title">{{ $forfait->price }} Fcfa<small class="text-muted">/ mo</small></h2>
        <ul class="list-unstyled mt-3 mb-4">
          {!! $forfait->description !!}
        </ul>
        <a href="{{ route('streaming.store', $forfait->id) }}" class="btn btn-lg btn-block btn-primary">
          <i data-feather="shopping-cart" stroke-width="2.5" width="20" height="20"></i>
          <b class="text-icon">Commander</b>
        </a>
      </div>
    </div>
    @endforeach

  </div>

@endsection
