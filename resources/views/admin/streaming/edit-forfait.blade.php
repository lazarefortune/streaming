@extends('layouts.admin')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.streaming.forfaits') }}">Liste-des-forfaits</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edition-du-forfait</li>
  </ol>
</nav>

<div class="container">
  <div class="d-flex justify-content-center row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h5>Edition du forfait</h5>
        </div>
        <div class="card-body">
          <form class="" action="{{ route('admin.streaming.update-forfait', $forfait->id) }}" method="post">
            @csrf
            <div class="form-group">
              <label for="name">Nom du forfait :</label>
              <input type="text" name="name" value="{{ old('name') ?? $forfait->name }}"  class="form-control @error('name') is-invalid @enderror">
              @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="type">Type de forfait :</label>
              <input type="text" name="type" value="{{ old('type') ?? $forfait->type }}"  class="form-control @error('type') is-invalid @enderror">
              @error('type')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="Description">Description du forfait :</label>
              <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3" cols="80">{{ old('description') ?? $forfait->description }}</textarea>
              @error('description')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="price">Montant du forfait :</label>
              <input type="text" name="price" value="{{ old('price') ?? $forfait->price }}"  class="form-control @error('price') is-invalid @enderror">
              @error('price')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <button type="submit" name="button"  class="btn btn-success btn-block">Mettre à jour le forfait</button>

          </form>
        </div>

      </div>

    </div>

  </div>

</div>

@endsection
