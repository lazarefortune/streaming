@extends('layouts.admin')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Envoi-des-informations</li>
  </ol>
</nav>

<div class="container">
  <form action="{{ route('admin.streaming.store_info_idtf',$stream) }}" method="post">
    @csrf
    <h1>envoyer à : {{ $stream->user->name }}</h1>
    <h4>
      Montant: {{ $stream->forfait_price }} Fcfa
    </h4>
    <div class="form-group">
      <textarea name="text" rows="5" cols="80" placeholder="Saisir les identifiants de connexion Netflix" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Envoyer</button>
  </form>


</div>



@endsection
