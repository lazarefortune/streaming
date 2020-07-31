@extends('layouts.admin')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Envoi-des-informations</li>
  </ol>
</nav>

<div class="container">
  id: 
  {{ $stream->id }}
</div>



@endsection
