@extends('layouts.streaming')

@section('extra-css-streaming')
<style >
/* .input-file{
  border: 2px solid black;
  width: 100%;
  border-radius: 5px;
} */

// on personnalise le label comme on veut
.label-file {
    cursor: pointer;
    color: #00b1ca;
    font-weight: bold;
}
.label-file:hover {
    color: #25a5c4;
}

// et on masque le input
.input-file {
    display: none;
}
</style>
@endsection

@section('contenu')

@include('flash::message')
<form class="row d-flex justify-content-center" enctype="multipart/form-data" action="{{ route('streaming.payment-proof-store', $stream) }}" method="post">
  @csrf
  <div class="col-md-6">
    <h1>Procédure de paiement du ticket : {{ $stream->id }}</h1>
    <div class="card">
      <div class="card-header ">
        ETAPE 2
      </div>
      <div class="card-body">
        <div class="alert alert-danger">
          <b>Envoyer nous la preuve du paiement (Capture d'écran / le message de transaction)</b>
        </div>
        <hr>

        <!-- <div class="custom-file">
          <input type="file" class="custom-file-input" id="customFile">
          <label class="custom-file-label" for="customFile">Selectionner la capture d'écran</label>
        </div> -->

        <div class="control">
          <!-- <label  class="label">La preuve</label> -->
          <!-- <input type="file" name="proof"   class="input-file @error('proof') is-invalid @enderror"> -->

          <label for="file" class="label-file btn btn-primary">Choisir une image</label>
          <input id="file" class="input-file  @error('proof') is-invalid @enderror"" name="proof" type="file">

          @error('proof')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
        <hr>
        ou alors
        <hr>
        <textarea name="name" rows="2"  class="form-control" placeholder="Copier et coller le message du transfert" cols="80"></textarea>

      </div>
      <div class="card-footer">

        <!-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong  class="text-danger">Attention!</strong> en cas d'erreur vous devriez recommencer la procédure <b>SANS PAYER A NOUVEAU</b> !
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div> -->




        <button type="submit" name="button"  class="btn btn-primary">Envoyer</button>
      </div>

    </div>
  </div>


</form>







@endsection
