@extends('layouts.admin')

@section('content')

  @include('flash::message')

<h1>forfaits</h1>


<div class="row p-4">
  @if($forfaits->isEmpty())
    <div class="alert alert-info">
      Vous n'avez aucun forfait créé <a href="{{ route('admin.streaming.create-forfait') }}">créer en un</a>
    </div>
  @endif

  @foreach($forfaits as $forfait)

  <div class="col-sm-4 mb-2">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{ $forfait->name }}</h5>
        <p class="card-text">
          <p>TYPE : {{ $forfait->type }}</p>
          <p>MONTANT : {{ $forfait->price }} Fcfa</p>
          <p>DESCRIPTION : {!! $forfait->description !!} </p>

        </p>
        <div class="d-flex justify-content-between">
          <a href="{{ route('admin.streaming.edit-forfait', $forfait->id) }}"  class="btn btn-warning">Editer</a>

          <form class="" action="{{ route('admin.streaming.delete-forfait', $forfait->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" href=""  class="btn btn-danger">Supprimer</button>
          </form>

        </div>
      </div>
    </div>
  </div>


  @endforeach

</div>



@endsection
