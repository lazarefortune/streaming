@extends('layouts.admin')
@section('extra-css-admin')
<style >
  textarea:focus{
    border: none !important;
    box-shadow: none !important;
  }
  input{
    border: none !important;
    box-shadow: none !important;
  }
  input:focus{
    border: none !important;
    box-shadow: none !important;
  }
  .btn-primary{
    border-radius: 4px !important;
  }
</style>
@endsection
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
    @if(isset($user))
    <li class="breadcrumb-item"><a href="{{ route('admin.users.edit', $user) }}">{{ $user->id }}</a></li>
    @endif
    <li class="breadcrumb-item active" aria-current="page">E-mail</li>
  </ol>
</nav>

<div class="container">
  <h4 class="mb-4 text-center">Envoyer un e-mail</h4>

  
  @if(isset($user) and empty($user->email))
  <div class="alert alert-primary shadow col-md-7 mx-auto mb-5 text-dark text-center font-weight-bold">
    Cet utilisateur ne possède pas d'adresse mail
  </div>
  @else
  <div class="row">
    <div class="card shadow col-md-7 mx-auto mb-5">
      <form action="{{ route('admin.streaming.send_mail_action') }}" method="post">
        @csrf
        <div class="card-body" >
          <div class="my-2">
            <input type="text" class="form-control" placeholder="Nom" name="name" value="{{ isset($user->name) ? $user->name : '' }}" '@if(isset($user->name)) readonly @endif' required>
          </div>
          <hr>
          <div class="my-2">
            <input type="email" class="form-control" placeholder="Email" name="email" value="{{ isset($user->email) ? $user->email : '' }}" '@if(isset($user->email)) readonly @endif' required>
          </div>
          <hr>
          <div class="my-2">
            <input type="text" placeholder="Objet" class="form-control" name="object"  required>
          </div>
          <hr>
          <textarea name="message" class="form-control border-0"  rows="3" cols="80" placeholder="Saisir votre message" required></textarea>
        </div>
        <div class="card-footer bg-white border-0 mb-3">
          <button type="submit" class="btn btn-primary btn-sm pl-3 pr-3" name="button">Envoyer</button>
        </div>
      </form>

    </div>
  </div>
  @endif

</div>


<!-- <script type="text/javascript" src="{{ asset('assets/tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <script type="text/javascript">
      tinymce.init({
        selector : "textarea",
        plugins : ["advlist autolink lists link image charmap print preview anchor", "searcheplace visualblocks code fullscreen", "insertdatetime media table contectmenu paste"],
        toolbar : "insertfile undo redo | styleselect | blod italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent | link image"
      });
    </script> -->

@endsection
