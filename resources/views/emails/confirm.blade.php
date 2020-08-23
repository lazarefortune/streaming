@extends('layouts.template')

@section('contenu')

<div class="alert alert-primary">
  Message envoyé avec succès
</div>

<div class="d-flex justify-content-center">
  <a href="{{ route('streaming.contact') }}" class="btn btn-primary">
    <i data-feather="arrow-left" stroke-width="2.5" width="16" height="16"></i>
    <span class="text-icon">Retour</span>
  </a>
</div>

@endsection
