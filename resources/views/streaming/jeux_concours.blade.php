@extends('layouts.template')

@section('title', 'Jeux Concours')

@section('extra-css-streaming')

@endsection

@section('contenu')

<div class="container">
  <div class="row d-flex justify-content-center">
    <div class="card card-body col-md-6">
      <h4 class="text-center">Aucun jeux concours pour le moment</h4>
      <a href="{{ route('streaming.index') }}" class="btn btn-primary mt-3">Retour à l'accueil</a>
    </div>
  </div>
</div>

@endsection
