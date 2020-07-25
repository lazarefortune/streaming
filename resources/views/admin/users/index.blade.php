@extends('layouts.admin')

@section('content')

<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Users</li>
    </ol>
  </nav>

  @include('flash::message')


  <div class="card">
    <div class="card-header">
      liste des utilisateurs
    </div>
    <div class="card-body">

    <div class="table-responsive-sm">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">nom</th>
            <th scope="col">email</th>
            @can('delete-users')
            <th scope="col">Role(s)</th>
            @endcan
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)

          @if(($user->hasAnyRole(['auteur','admin'])) && ( (auth()->user()->isAdmin()) == false ))
            
          @else
          <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            @can('delete-users')
            <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
            @endcan
            <td>
              @can('edit-users')
              <a href="{{ route('admin.users.edit', $user->id) }}"  class="btn btn-primary">Editer</a>
              @endcan
              @can('delete-users')

              <!-- Button trigger modal -->
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter-{{ $user->id }}">
                supprimer
              </button>

              <!-- Modal -->
              <div class="modal fade" id="exampleModalCenter-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalCenterTitle">Suppression</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Souhaitez vous vraiment supprimer l'utilisateur <b>{{ $user->name }}</b>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                      <form class="d-inline" action="{{ route('admin.users.destroy', $user->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>



              @endcan
            </td>
          </tr>
          @endif
          @endforeach
        </tbody>
      </table>
    </div>

      <blockquote class="blockquote mb-0">
        <footer class="blockquote-footer">Tableau récuperé depuis <cite title="Source Title">la BDD</cite></footer>
      </blockquote>
    </div>
  </div>



</div>

@endsection
