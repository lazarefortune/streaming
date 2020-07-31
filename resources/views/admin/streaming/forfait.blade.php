@extends('layouts.admin')
@section('extra-css-admin')
<style >

</style>
@endsection
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Liste-des-forfaits</li>
  </ol>
</nav>

<div class="container">

<h1>forfaits</h1>

@include('flash::message')

<a href="{{ route('admin.streaming.create-forfait') }}"  class="btn btn-success" name="button"> <i  class="fas fa-plus"></i> Ajouter un forfait</a>
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
          <a href="{{ route('admin.streaming.edit-forfait', $forfait->id) }}"  class="btn btn-warning"> <i  class="fas fa-edit"></i> Editer</a>

          <form class="" action="{{ route('admin.streaming.delete-forfait', $forfait->id) }}" method="post">
            @csrf
            @method('DELETE')


            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal-{{ $forfait->id }}">
              <i  class="fas fa-trash"></i> Supprimer
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal-{{ $forfait->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Suppresion du forfait {{ $forfait->id }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Etes-vous sur de vouloir supprimer ?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" href=""  class="btn btn-danger">Supprimer</button>
                  </div>
                </div>
              </div>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>


  @endforeach

</div>

</div>


@endsection
