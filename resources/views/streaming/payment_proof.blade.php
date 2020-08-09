@extends('layouts.template')

@section('extra-css-streaming')
  <link rel="stylesheet" href="{{ asset('assets/css/payment_proof_style.css') }}">
@endsection

@section('contenu')

  @include('flash::message')
  <div class="row d-flex justify-content-center">
    <div class="col-md-8">
      <h2  class="mb-3 text-center"> <i  class="fas fa-cash-register"></i> Caisse</h2>

      <div class="steps-form">
        <div class="steps-row setup-panel">
          <div class="steps-step">
            <a href="#step-9" type="button" class="btn btn-success btn-circle">1</a>
            <p>Paiement</p>
          </div>
          <div class="steps-step">
            <a href="#step-10" type="button" class="btn btn-success btn-circle" disabled="disabled">2</a>
            <p>Preuve du paiement</p>
          </div>
          <div class="steps-step">
            <a href="#step-11" type="button" class="btn btn-secondary btn-circle" disabled="disabled">3</a>
            <p>Validation</p>
          </div>
        </div>
      </div>

      <div class="card shadow p-3">
        <h4  class="text-center mb-2">Preuve du paiement</h4>

        <div class="card-body">
          <div class="">
            <h5  class="font-weight-bold mb-4">Commande n° {{ $stream->id }}</h5>
          </div>

          <div class="">
            <div class="alert alert-danger">
              <b>Envoyer nous la preuve du paiement (Capture d'écran / le message de transaction)</b>
            </div>
          </div>

          <form class="" enctype="multipart/form-data" action="{{ route('streaming.payment-proof-store', $stream) }}" method="post">
            @csrf
            <div class="control">
              <div class="box d-flex justify-content-center">
      					<input type="file" name="proof" id="file-5" class="inputfile inputfile-4 @error('proof') is-invalid @enderror" data-multiple-caption="{count} files selected" multiple hidden >
      					<label for="file-5">
                  <figure>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                      <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/>
                    </svg>
                  </figure>
                  <span>Choisir un fichier&hellip;</span>
                </label>
      				</div>

              @error('proof')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="">
              <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModalLong">
                Envoyer <i  class="fas fa-arrow-right"></i>
              </button>
              <!-- modal -->
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
                      Êtes-vous sur d'avoir la bonne preuve ?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal"> <i  class="fas fa-times"></i> Annuler</button>
                      <button type="submit" name="button"  class="btn btn-success"> <i  class="fas fa-check"></i> Oui, je confirme</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end modal -->
            </div>
            <!-- end send div -->
          </form>
        </div>
        <!-- end card body -->
      </div>
      <!-- end card -->
    </div>
    <!-- end column -->
  </div>
  <!-- end row -->

  <script src="{{ asset('assets/js/payment_proof_js.js') }}"></script>

@endsection
