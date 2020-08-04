@extends('layouts.template')
@section('extra-css-streaming')
<style>
  .cachet{
    border: 1px solid red;
    border-radius: 4px;
    color: red;
  }
  .btn-flat{
    border: 1px solid black !important;
  }
  .btn-flat:focus{
    box-shadow: none !important;
    /* border: 1px solid blue !important; */
  }
</style>
@endsection
@section('contenu')


<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('streaming.index') }}">Accueil</a></li>
    <li class="breadcrumb-item active" aria-current="page">Mes-commandes</li>
  </ol>
</nav>
@include('flash::message')

@if($streams->isEmpty())
<div class="alert alert-info text-center">
  Vous n'avez aucune commande, <a href="{{ route('streaming.index') }}">faite une commande</a>
</div>
@endif


<div class="row">
  @foreach($streams as $stream)
  <div class="col-md-4 mb-3">
    <!-- Card -->
    <div class="card promoting-card shadow">

      <!-- Card content -->
      <div class="card-body d-flex flex-row">

        <!-- Avatar -->
        <!-- <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-8.jpg" class="rounded-circle mr-3" height="50px" width="50px" alt="avatar"> -->

        <!-- Content -->
        <div>

          <!-- Title -->
          <h4 class="card-title font-weight-bold mb-2 @if($stream->forfait_end) text-success @endif">
            @if( $stream->forfait_statut == 'Non payé' )
              <h4 class="card-title font-weight-bold mb-2"> Commande n° {{ $stream->id }} </h4>
            @elseif( $stream->forfait_statut == 'Payé')
              <h4 class="card-title font-weight-bold mb-2 text-success"><i  class="fas fa-check"></i> Commande n° {{ $stream->id }} </h4>
            @else
              <h4 class="card-title font-weight-bold mb-2 text-info"> <i  class="fas fa-spinner"></i> Commande n° {{ $stream->id }} </h4>
            @endif


          <!-- Subtitle -->
          @if($stream->forfait_end)
          <p class="card-text"> <b>Début</b> : {{ $stream->forfait_start }} </p>
          <p class="card-text"> <b>Fin</b> : {{ $stream->forfait_end }} ( {{ Carbon\Carbon::parse($stream->forfait_end)->diffForHumans() }} )</p>
          <!-- <p class="card-text"><span  class="badge badge-danger"> termine {{ Carbon\Carbon::parse($stream->forfait_end)->diffForHumans() }} </span></p> -->
          <a href="{{ route('streaming.facture', $stream) }}"  class="btn btn-info btn-sm mb-1" download="facture"> <i  class="fas fa-file-download"></i> Télécharger votre reçu</a>
          <a href="{{ route('streaming.facture', $stream) }}"  class="btn btn-success  btn-sm" download="facture"> <i  class="fas fa-download"></i> Télécharger vos identifiants Netflix</a>

          @else
          <p class="card-text"><i class="far fa-clock pr-2"></i> {{ $stream->created_at->format('d/m/Y') }} (<span>{{ Carbon\Carbon::parse($stream->created_at)->diffForHumans() }}</span>) </p>
          <p class="card-text"><i class="fas fa-money-check-alt pr-2"></i> {{ $stream->forfait_price }} Fcfa</p>
          @endif

        </div>

      </div>

      <!-- Card image -->
      <div class="view overlay">
        <a href="#!">
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>

      <!-- Card content -->
      <div class="card-body">

        <div class="collapse-content">

          <!-- Text -->
          <p class="card-text collapse" id="collapseContent-{{ $stream->id }}">
            <!-- Recently, we added several exotic new dishes to our restaurant menu. They come from countries such as Mexico, Argentina, and Spain. Come to us, have some delicious wine and enjoy our juicy meals from around the world. -->

            @if($stream->forfait_end)
            <span>Crée: {{ $stream->created_at->format('d/m/Y') }} (<span>{{ Carbon\Carbon::parse($stream->created_at)->diffForHumans() }}</span>) </span>
            <br>
            @endif
            <span>Service : <b>{{ $stream->forfait_name }}</b></span> <br>
            <span>Type : <b>{{ $stream->forfait_type }}</b> </span>
          </p>
          <!-- Button -->
          <a class="btn btn-flat red-text p-1 my-1 mr-0 mml-1 collapsed" data-toggle="collapse" href="#collapseContent-{{ $stream->id }}" aria-expanded="false" aria-controls="collapseContent-{{ $stream->id }}"> <i  class="fas fa-info-circle"></i> Détails</a>

          <!-- @if(!$stream->forfait_end)
          <i class="fas fa-trash-alt text-muted float-right p-1 my-1" data-toggle="tooltip" data-placement="top" title="Share this post"></i>
          <a href=""  class="btn btn-success btn-sm float-right p-1 my-1 mr-3">Payer</a>
          @endif -->

          @if( $stream->forfait_statut == 'Non payé' )

          <!-- Button delete -->
          <a type="button" class=" float-right p-1 my-1" data-toggle="modal" data-target="#exampleModal-{{ $stream->id }}">
            <i class="fas fa-trash-alt text-muted" style="color: red !important;" data-toggle="tooltip" data-placement="top" title="delete this order"></i>
          </a>
          <a href="{{ route('streaming.payment', $stream) }}"  class="btn btn-primary btn-sm p-2 float-right p-1 my-1 mr-3"> <i class="fas fa-cash-register pr-2"></i> Passer à la caisse</a>
          @elseif( $stream->forfait_statut == 'Payé')
            <!-- <span class="badge badge-danger text-wrap float-right p-1 my-1 mr-3">{{ $stream->forfait_statut }} avec succès</span> -->
            <span class="cachet  btn-sm text-wrap float-right p-1 my-1 mr-3"> <i  class="fas fa-stamp"></i> {{ $stream->forfait_statut }}</span>
          @else
            <span class="badge badge-info text-wrap float-right p-1 my-1 mr-3">{{ $stream->forfait_statut }}</span>
          @endif
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal-{{ $stream->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Suppresion de la commande</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Souhaitez vous vraiment supprimer cette commande ?
                <p>Commande n° {{ $stream->id }}</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <form class="" action="{{ route('streaming.deleteForfait', $stream->id) }}"  method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit"  class="btn btn-danger" name="button">Supprimer</button>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
    <!-- Card -->
  </div>
  @endforeach
</div>
<hr>


  <!-- <h4  class="text-center" >Vos commandes</h4>
  <div class="row">

      @foreach($streams as $stream)
         <div class="card col-md-6 shadow mb-2">

           <a href="#"  class="card-link">Ticket n° {{ $stream->id }}</a>
           <p>Service : <b>{{ $stream->forfait_name }}</b></p>
           <p>Montant: <b>{{ $stream->forfait_price }} Fcfa</b></p>
           <p>Type : <b>{{ $stream->forfait_type }}</b> </p>
           <p>Crée le : <b>{{ $stream->created_at->format('d/m/Y') }}</b>
         </div>


      @endforeach

  </div> -->


<!--

<div class="card shadow-lg">
  <h4  class="card-header text-center" >Vos commandes</h4>
  <div class="card-body">
    <ul class="list-group list-group-flush">
      @foreach($streams as $stream)
        <li class="list-group-item"> <a href="#"  class="card-link">Ticket n° {{ $stream->id }}</a> </li>


      @endforeach
    </ul>
  </div>
</div>

<hr> -->


@endsection
