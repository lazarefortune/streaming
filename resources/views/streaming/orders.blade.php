@extends('layouts.template')
@section('extra-css-streaming')
  <style>
    .cachet{
      border: 1px solid red;
      border-radius: 4px;
      color: red;
    }
    .en-cours{
      border: 1px solid #17a2b8;
      border-radius: 4px;
      color: #17a2b8;
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
      <li class="breadcrumb-item active" aria-current="page">Vos-commandes</li>
    </ol>
  </nav>

  @include('flash::message')

  @if($streams->isEmpty())
    <div class="alert alert-info text-center">
      Vous n'avez aucune commande

    </div>

    <div class="row d-flex justify-content-center">
      <a href="{{ route('streaming.index') }}"  class="btn btn-primary">
        <i data-feather="mouse-pointer" stroke-width="2.5" width="16" height="16"></i>
        <span class="text-icon">Faire une commande</span>
        <!-- <i data-feather="arrow-right-c ircle" stroke-width="2.5" width="16" height="16"></i> -->
      </a>
    </div>
  @endif

  <div class="row">
    @foreach($streams as $stream)
    <div class="col-md-4 mb-3">
      <!-- Card -->
      <div class="card promoting-card shadow">
        <!-- Card content -->
        <div class="card-body d-flex flex-row">
          <div>
            @if( $stream->forfait_statut == 'Non payé' )
              <h4 class="card-title font-weight-bold mb-2"> Commande n° {{ $stream->id }} </h4>
            @elseif( $stream->forfait_statut == 'Payé')
              <h4 class="card-title font-weight-bold mb-2 text-success">
                <i  class="fas fa-check"></i> Commande n° {{ $stream->id }}
              </h4>
            @else
              <h4 class="card-title font-weight-bold mb-2 text-info">
                <i  class="fas fa-spinner"></i> Commande n° {{ $stream->id }}
              </h4>
            @endif

            <!-- Subtitle -->
            @if($stream->forfait_end)
              <p class="card-text">
                <b>Début</b> : {{ $stream->forfait_start }}
              </p>
              <p class="card-text">
                <b>Fin</b> : {{ $stream->forfait_end }} ( {{ Carbon\Carbon::parse($stream->forfait_end)->diffForHumans() }} )
              </p>
              <a href="{{ route('streaming.facture', $stream) }}"  class="btn btn-success btn-sm mb-1" download="facture">
                <i data-feather="download" stroke-width="2.5" width="16" height="16"></i>
                Télécharger votre reçu
              </a>
              @if($stream->connexion_idtf != null)
                <a href="{{ route('streaming.facture', $stream) }}"  class="btn btn-success  btn-sm" download="facture">
                  <i data-feather="download" stroke-width="2.5" width="16" height="16"></i>
                  Télécharger vos identifiants
                </a>
              @else
                <p class="text-danger">Patientez vos identifiants</p>
              @endif
            @else
              <p class="card-text">
                <i class="far fa-clock pr-2"></i>
                {{ $stream->created_at->format('d/m/Y') }} (<span>{{ Carbon\Carbon::parse($stream->created_at)->diffForHumans() }}</span>)
              </p>
              <p class="card-text">
                <i data-feather="credit-card"></i>
                {{ $stream->forfait_price }} Fcfa
              </p>
            @endif

          </div>

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
            <a class="btn btn-flat red-text p-1 my-1 mr-0 mml-1 collapsed" data-toggle="collapse" href="#collapseContent-{{ $stream->id }}" aria-expanded="false" aria-controls="collapseContent-{{ $stream->id }}">
              <i data-feather="info" stroke-width="2.5" width="20" height="20"></i>
              <span class="text-icon">Détails</span>
            </a>

            <!-- @if(!$stream->forfait_end)
            <i class="fas fa-trash-alt text-muted float-right p-1 my-1" data-toggle="tooltip" data-placement="top" title="Share this post"></i>
            <a href=""  class="btn btn-success btn-sm float-right p-1 my-1 mr-3">Payer</a>
            @endif -->

            @if( $stream->forfait_statut == 'Non payé' )

            <!-- Button delete -->
            <a type="button" class=" float-right p-1 my-1" data-toggle="modal" data-target="#exampleModal-{{ $stream->id }}">
              <i data-feather="trash-2" style="color: red !important;" data-toggle="tooltip" data-placement="top" title="delete this order"></i>
            </a>
            <a href="{{ route('streaming.payment', $stream) }}"  class="btn btn-primary btn-sm p-2 float-right p-1 my-1 mr-3"> <i class="fas fa-cash-register pr-2"></i> Passer à la caisse</a>
            @elseif( $stream->forfait_statut == 'Payé')
              <span class="cachet  btn-sm text-wrap float-right p-1 my-1 mr-3">
                <i data-feather="check-circle" stroke-width="2.5" width="20" height="20"></i>
                {{ $stream->forfait_statut }}
              </span>
            @else
              <span class="en-cours btn-sm text-wrap float-right p-1 my-1 mr-3">
                <i data-feather="loader" stroke-width="2.5" width="20" height="20"></i>
                {{ $stream->forfait_statut }}
              </span>
            @endif
          </div>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal-{{ $stream->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Commande n° {{ $stream->id }}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Souhaitez vous vraiment supprimer cette commande ?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i data-feather="x" stroke-width="2.5" width="20" height="20"></i> Annuler</button>
                  <!-- <a href="" data-dismiss="modal" class=" font-weight-bold" style="color: #1a73e8;">Annuler</a> -->
                  <form class="" action="{{ route('streaming.deleteStream', $stream->id) }}"  method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"  class="btn btn-danger" name="button">
                      <i data-feather="trash-2" stroke-width="2.5" width="20" height="20"></i>
                      Supprimer
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- end modal -->

        </div>
        <!-- end card body content -->
      </div>
      <!-- end Card -->
    </div>
    <!-- end column -->
    @endforeach
  </div>
  <!-- end row -->

@endsection
