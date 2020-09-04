@extends('layouts.admin')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Caisse</li>
  </ol>
</nav>


  <div class="m-2">
    <h2 class="text-center">Caisse</h2>

    <div class="row">
      <div class="card card-body col-md-6 mx-auto shadow text-center">

        <p>Total encaissé : <span class="h5">{{ $total }} Fcfa</span> </p>
      </div>
    </div>
  </div>
@endsection
