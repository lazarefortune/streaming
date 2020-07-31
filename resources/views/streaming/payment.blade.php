@extends('layouts.template')

@section('extra-css-streaming')
<style >

</style>
@endsection

@section('contenu')

@include('flash::message')
<form class="row d-flex justify-content-center" method="post">

  <div class="col-md-6">
    <h1>Procédure de paiement du ticket : {{ $stream->id }}</h1>
    <div class="card">
      <div class="card-header">
        ETAPE 1
      </div>
      <div class="card-body">
        <p> <i  class="fas fa-comment-dollar"></i> Envoyez le montant suivant : <strong>{{ $stream->forfait_price }} Fcfa</strong> par </p>
        <hr>
        <h5 class="text-danger">Airtel Money</h5>
        <p>077-11-22-33</p>
        ou
        <hr>
        <h5  class="text-danger">MOBICASH</h5>
        <p>066-11-22-33</p>

      </div>
      <div class="card-footer d-flex justify-content-between">
        <a href="{{ route('streaming.account') }}"  class="btn btn-warning"> <i  class="fas fa-arrow-left"></i> Abandonner</a>


        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
          Poursuivre <i  class="fas fa-arrow-right"></i>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Attention</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                En poursuivant, <span  class="text-danger">vous confirmez avoir effectué le transfert mobile money</span>, toute tentative de fraude sera sanctionné.
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"> <i  class="fas fa-times"></i> Annuler</button>
                <a href="{{ route('streaming.payment-proof', $stream) }}"  class="btn btn-success"> <i  class="fas fa-check"></i> Oui, je confirme</a>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>


</form>



@endsection
