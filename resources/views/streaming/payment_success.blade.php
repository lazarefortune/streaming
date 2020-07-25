@extends('layouts.streaming')

@section('extra-css-streaming')
<style >

</style>
@endsection

@section('contenu')

<div  class="">
  <div class="d-flex justify-content-center">
    <div class="card">

      <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Envoyé avec succès!</h4>
        <p>Une fois que nôtre équipe aura confirmé votre transfert, vous recevrez vos <b>informations de connexion Netflix</b>. Merci de patientez.</p>
        <hr>
        <p class="mb-0">Consultez régulièrement votre boîte mail, votre messagerie et vos notifications sur notre app.</p>
        <hr>
        <a href="{{ route('streaming.account') }}"  class="btn btn-primary">Cliquez ici</a>
      </div>


    </div>

  </div>

</div>

@endsection
