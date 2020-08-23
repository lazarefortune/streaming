@extends('layouts.template')

@section('contenu')

<h2 class="my-4 text-center">Espace dédié aux développeurs web</h2>

<h4 class="my-2 text-center">Bonjour développeur <b>"{{ auth()->user()->name }}"</b> </h4>

<div class="header d-flex justify-content-center">
  <a href="developers-area/project/create" class="btn btn-primary">
    <i data-feather="folder-plus" stroke-width="2" width="20" height="20"></i>
    <span class="text-icon">Créer un projet</span>
  </a>
</div>

@endsection
