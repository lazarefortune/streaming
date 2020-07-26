@extends('layouts.streaming')
@section('extra-css-streaming')
<script>

</script>
@endsection
@section('contenu')

@include('flash::message')

@if($streams->isEmpty())
<div class="alert alert-info text-center">
  Vous n'avez aucune commande, <a href="{{ route('streaming.index') }}">faite une commande</a>
</div>
@endif

<div class="row">

@foreach($streams as $stream)


<div class="col-md-4 mb-3">
  <div class="card">
    <div class="card-header">
      recap ticket n° {{ $stream->id }}
    </div>
    <div class="card-body d-flex justify-content-between">
      <div>
        <p>Service : <b>{{ $stream->forfait_name }}</b></p>
        <p>Montant: <b>{{ $stream->forfait_price }} Fcfa</b></p>
        <p>Type : <b>{{ $stream->forfait_type }}</b> </p>
        <p>Crée le : <b>{{ $stream->created_at->format('d/m/Y') }}</b>
        (<span><b>{{ Carbon\Carbon::parse($stream->created_at)->diffForHumans() }}</b></span>)</p>
        <!-- <p><span class="badge badge-info">{{ $stream->forfait_statut }}</span></p> -->
        @if($stream->forfait_end)
        <p> Forfait activé le : <b>{{ $stream->forfait_start }}</b> </p>
        <p> Forfait expire le : <b>{{ $stream->forfait_end }}</b> (<span  class="badge badge-danger"> {{ Carbon\Carbon::parse($stream->forfait_end)->diffForHumans() }} </span>)</p>
        <p><span  class="badge badge-danger"> termine {{ Carbon\Carbon::parse($stream->forfait_end)->diffForHumans() }} </span></p>
        <a href="{{ route('streaming.facture', $stream) }}"  class="btn btn-primary btn-sm" download="facture">Télécharger votre Facture</a>
        @endif
      </div>
      <div class="">
        @if( $stream->forfait_statut == 'Non payé' )
        <a href="{{ route('streaming.payment', $stream) }}" type="button"  class="btn btn-success btn-sm mr-2 mb-2" name="button">Payer</a>

        <!-- Button delete -->
        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
          Supprimer
        </button>
        @elseif( $stream->forfait_statut == 'Payé')
          <span class="badge badge-success text-wrap">{{ $stream->forfait_statut }}</span>
        @else
          <span class="badge badge-info text-wrap">{{ $stream->forfait_statut }}</span>
        @endif

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
  </div>

</div>
@endforeach
</div>

@endsection
