@extends('layouts.admin')

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Users</li>
  </ol>
</nav>
<div class="m-1">

  @include('flash::message')


  <!-- <div class="card">
    <div class="card-header font-weight-bold text-center">
      <h5>Liste des utilisateurs</h5>
    </div>
    <div class="card-body">

    <div class="table-responsive-sm">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Nom</th>
            <th scope="col">E-mail</th>
            @can('delete-users')
            <th scope="col">Role(s)</th>
            @endcan
            <th scope="col">Action(s)</th>
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
              <a href="{{ route('admin.users.edit', $user->id) }}"  class="btn btn-primary">Consulter</a>
              @endcan
              @can('delete-users')


              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter-{{ $user->id }}">
                Supprimer
              </button>


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
  </div> -->

  <!-- Hiring Section -->
<div class=" space-2">
  <!-- Title -->
  <div class="w-lg-65 text-center mx-auto mb-4 mb-sm-9">
    <h2 class="h4">Liste des utilisateurs</h2>
  </div>
  <!-- End Title -->

  <div class="mx-auto my-3 ">
    <input type="text" name="search" class="form-control" placeholder="Rechercher ..." value="">
  </div>

  <div class="w-lg-75 mx-lg-auto mb-5 mb-md-7">
    @foreach($users as $user)

    @if(($user->hasAnyRole(['auteur','admin'])) && ( (auth()->user()->isAdmin()) == false ))

    @else
      <!-- Card -->
      <a class="card card-frame py-3 px-4 mb-3" href="{{ route('admin.users.edit', $user->id) }}">

        <div class="row align-items-sm-center">
          <span class="col-sm-6 text-dark h5">
            <b>{{ $user->name }}</b>
          </span>
          <span class="col-6 col-sm-3 text-body">
            {{ $user->contact }}
            <!-- {{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }} -->
          </span>
          <span class="col-6 col-sm-3 text-right">
            @can('edit-users')

            Consulter <i class="fas fa-angle-right fa-sm ml-1"></i>

            @endcan
          </span>
        </div>
      </a>
      <!-- End Card -->
      @endif
      @endforeach
      <div class="d-flex justify-content-center">
        {{ $users->links() }}
      </div>
  </div>

  <!-- Link -->
  <!-- <div class="text-center">
    <a href="#">
      View all
      <span class="btn btn-xs btn-icon btn-soft-primary rounded-circle mx-2">
        <i class="fas fa-angle-right"></i>
      </span>
      careers
    </a>
  </div> -->
  <!-- End Link -->
</div>
<!-- End Hiring Section -->

</div>

@endsection
