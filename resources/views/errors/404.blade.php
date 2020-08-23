@extends('layouts.template')

@section('extra-css-streaming')
<style>
  .panel-error{
    background-image: url('{{ asset("public/assets/img/google/help-banner.svg") }}') ;
    background-repeat: no-repeat;
    background-color: white;
    background-position: center;
  }
</style>
@endsection


@section('contenu')

<div class="row panel-error d-flex justify-content-center">
  <div class="text-center">
    <h1>404</h1>
    <h2 class="mb-4">Page non trouvée</h2>

    <a href="{{ route('streaming.index') }}">
      <button type="button" class="btn btn-primary btn-lg shadow-lg" name="button">Retour à l'acceuil</button>
    </a>
  </div>

</div>
@endsection
