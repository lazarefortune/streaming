@extends('layouts.template')
@section('extra-css-streaming')
<style>
.card{
  border-radius: 6px;
}
.card-header{
  border-radius: 6px 6px 0px 0px !important;
}
#help-banner
{
  /* background-image: url('{{ asset("image/support.jpg") }}') ; */
}
</style>
@endsection
@section('contenu')
<div class="jumbotron"  id="help-banner">
  <div class="container text-center d-flex justify-content-center">
    <!-- <p>Bienvenue dans le centre d'aide, que pouvons nous faire pour vous ?.</p> -->
    <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Lire plus &raquo;</a></p> -->

    <form class="col-md-8" action="" method="post"  class="form-inline">
      <h1 class="display-5 ">Contact</h1>
      <div class="form-group">
        <label for="name">Votre nom</label>
        <input type="text" name="name" value=""  class="form-control" placeholder="ex: John Doe">
      </div>

      <div class="form-group">
        <label for="email">Votre adresse mail</label>
        <input type="email" name="email" value=""  class="form-control" placeholder="ex: exemple@gmail.com">
      </div>

      <div class="form-group mb-2">


        <label for="question" class=""> <strong>Votre message</strong> </label>
        <!-- <input type="text" name="question" placeholder="Qu'est ce qui vous pose problème ?"  class="form-control" value=""> -->
        <textarea name="question" placeholder="" class="form-control" rows="2" cols="80"></textarea>
      </div>
      <button type="submit" name="button"  class="btn btn-primary btn-block">Envoyer</button>
    </form>
  </div>
</div>

<div class="container">

  <div  id="contact-us">
    <!-- <h2 class="text-center mx-auto mb-3">Contact</h2> -->

  <div class="row d-flex d-inline">
    <h5  class="m-2">Nous contacter autrement ?</h5>
    <a href="" class="btn btn-success m-2" name="button"><i class="fab fa-whatsapp"></i> Via whatsapp</a>
    <a href="" class="btn btn-primary m-2" name="button"><i class="fab fa-facebook-messenger"></i> Via Messenger</a>
    <a href="" class="btn btn-warning m-2" name="button"><i class="fas fa-phone-alt"></i> Nous appeler</a>
  </div>
</div>

</div>


@endsection
