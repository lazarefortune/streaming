@extends('layouts.template')

@section('extra-css-streaming')
<style >
.js .inputfile {
  width: 0.1px;
  height: 0.1px;
  opacity: 0;
  overflow: hidden;
  position: absolute;
  z-index: -1;
}

.inputfile + label {
  max-width: 80%;
  font-size: 1.25rem;
  /* 20px */
  font-weight: 700;
  text-overflow: ellipsis;
  white-space: nowrap;
  cursor: pointer;
  display: inline-block;
  overflow: hidden;
  padding: 0.625rem 1.25rem;
  /* 10px 20px */
}

.no-js .inputfile + label {
  display: none;
}

.inputfile:focus + label,
.inputfile.has-focus + label {
  outline: 1px dotted #000;
  outline: -webkit-focus-ring-color auto 5px;
}

.inputfile + label * {
  /* pointer-events: none; */
  /* in case of FastClick lib use */
}

.inputfile + label svg {
  width: 1em;
  height: 1em;
  vertical-align: middle;
  fill: currentColor;
  margin-top: -0.25em;
  /* 4px */
  margin-right: 0.25em;
  /* 4px */
}


/* style 1 */

.inputfile-1 + label {
  color: #f1e5e6;
  background-color: #d3394c;
}

.inputfile-1:focus + label,
.inputfile-1.has-focus + label,
.inputfile-1 + label:hover {
  background-color: #722040;
}


/* style 2 */

.inputfile-2 + label {
  color: #d3394c;
  border: 2px solid currentColor;
}

.inputfile-2:focus + label,
.inputfile-2.has-focus + label,
.inputfile-2 + label:hover {
  color: #722040;
}


/* style 3 */

.inputfile-3 + label {
  color: #d3394c;
}

.inputfile-3:focus + label,
.inputfile-3.has-focus + label,
.inputfile-3 + label:hover {
  color: #722040;
}


/* style 4 */

.inputfile-4 + label {
  color: #d3394c;
}

.inputfile-4:focus + label,
.inputfile-4.has-focus + label,
.inputfile-4 + label:hover {
  color: #722040;
}

.inputfile-4 + label figure {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  background-color: #d3394c;
  display: block;
  padding: 20px;
  margin: 0 auto 10px;
}

.inputfile-4:focus + label figure,
.inputfile-4.has-focus + label figure,
.inputfile-4 + label:hover figure {
  background-color: #722040;
}

.inputfile-4 + label svg {
  width: 100%;
  height: 100%;
  fill: #f1e5e6;
}


/* style 5 */

.inputfile-5 + label {
  color: #d3394c;
}

.inputfile-5:focus + label,
.inputfile-5.has-focus + label,
.inputfile-5 + label:hover {
  color: #722040;
}

.inputfile-5 + label figure {
  width: 100px;
  height: 135px;
  background-color: #d3394c;
  display: block;
  position: relative;
  padding: 30px;
  margin: 0 auto 10px;
}

.inputfile-5:focus + label figure,
.inputfile-5.has-focus + label figure,
.inputfile-5 + label:hover figure {
  background-color: #722040;
}

.inputfile-5 + label figure::before,
.inputfile-5 + label figure::after {
  width: 0;
  height: 0;
  content: '';
  position: absolute;
  top: 0;
  right: 0;
}

.inputfile-5 + label figure::before {
  border-top: 20px solid #dfc8ca;
  border-left: 20px solid transparent;
}

.inputfile-5 + label figure::after {
  border-bottom: 20px solid #722040;
  border-right: 20px solid transparent;
}

.inputfile-5:focus + label figure::after,
.inputfile-5.has-focus + label figure::after,
.inputfile-5 + label:hover figure::after {
  border-bottom-color: #d3394c;
}

.inputfile-5 + label svg {
  width: 100%;
  height: 100%;
  fill: #f1e5e6;
}


/* style 6 */

.inputfile-6 + label {
  color: #d3394c;
}

.inputfile-6 + label {
  border: 1px solid #d3394c;
  background-color: #f1e5e6;
  padding: 0;
}

.inputfile-6:focus + label,
.inputfile-6.has-focus + label,
.inputfile-6 + label:hover {
  border-color: #722040;
}

.inputfile-6 + label span,
.inputfile-6 + label strong {
  padding: 0.625rem 1.25rem;
  /* 10px 20px */
}

.inputfile-6 + label span {
  width: 200px;
  min-height: 2em;
  display: inline-block;
  text-overflow: ellipsis;
  white-space: nowrap;
  overflow: hidden;
  vertical-align: top;
}

.inputfile-6 + label strong {
  height: 100%;
  color: #f1e5e6;
  background-color: #d3394c;
  display: inline-block;
}

.inputfile-6:focus + label strong,
.inputfile-6.has-focus + label strong,
.inputfile-6 + label:hover strong {
  background-color: #722040;
}

@media screen and (max-width: 50em) {
.inputfile-6 + label strong {
  display: block;
}
}

</style>
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

          <!-- <label for="file" class="label-file btn btn-primary"> <i  class="fas fa-image"></i> Choisir une image</label>
          <input id="file" class="input-file  @error('proof') is-invalid @enderror" name="proof" type="file" hidden > -->

          <div class="box">
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
        <!-- <hr>
        ou alors
        <hr>
        <textarea name="name" rows="2"  class="form-control" placeholder="Copier et coller le message du transfert" cols="80"></textarea> -->

      </div>
      <div class="card-footer">




        <!-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong  class="text-danger">Attention!</strong> en cas d'erreur vous devriez recommencer la procédure <b>SANS PAYER A NOUVEAU</b> !
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div> -->

        <button type="submit" name="button"  class="btn btn-primary"> Envoyer <i  class="fas fa-arrow-right"></i> </button>
      </div>

    </div>
  </div>


</form>


<script>
  (function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);
</script>

<script>
/*
By Osvaldas Valutis, www.osvaldas.info
Available for use under the MIT License
*/

'use strict';

;( function ( document, window, index )
{
var inputs = document.querySelectorAll( '.inputfile' );
Array.prototype.forEach.call( inputs, function( input )
{
  var label	 = input.nextElementSibling,
    labelVal = label.innerHTML;

  input.addEventListener( 'change', function( e )
  {
    var fileName = '';
    if( this.files && this.files.length > 1 )
      fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
    else
      fileName = e.target.value.split( '\\' ).pop();

    if( fileName )
      label.querySelector( 'span' ).innerHTML = fileName;
    else
      label.innerHTML = labelVal;
  });

  // Firefox bug fix
  input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
  input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });
});
}( document, window, 0 ));
</script>




@endsection
