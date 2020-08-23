@extends('layouts.admin')
@section('extra-css-admin')
<style>
  /* .card p{
    font-size: 14px;
  }
  .card ul{
    font-size: 14px;
  }
  .card a{
    font-size: 14px;
  } */
  .card{
    border-radius: 7px;
  }
  .card-footer{
    border-radius: 7px;
  }
</style>
@endsection
@section('content')

  <nav aria-label="breadcrumb" class="d-md-block d-sm-none d-none">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-weight-bolder"><a href="{{ route('streaming.index') }}">Accueil</a></li>
      <li class="breadcrumb-item active font-weight-bolder" aria-current="page">Paramètres</li>
    </ol>
  </nav>

  @include('flash::message')

  <div class="row">
    <div class="col-lg-4 col-md-4 d-md-block d-sm-none d-none">
      <div class="card card-fluid mb-3 shadow">
        <!-- <h6  class="card-header"> <b>Paramètres</b> </h6> -->
        <nav  class="nav nav-tabs flex-column nav-account">
          <a href=""  class="nav-link active">
            <i data-feather="home" stroke-width="2.5" width="20" height="20"></i>
            <span class="text-icon">
              <strong>Accueil</strong>
            </span>
          </a>
          <a href="{{ route('account.profile') }}"  class="nav-link">
            <i data-feather="user" stroke-width="2.5" width="20" height="20"></i>
            <span class="text-icon">
              <strong>Compte</strong>
            </span>
          </a>
          <a href="{{ route('account.password') }}"  class="nav-link">
            <i data-feather="lock" stroke-width="2.5" width="20" height="20"></i>
            <span class="text-icon">
              <strong>Sécurité</strong>
            </span>
          </a>
        </nav>
      </div>
      <!-- end card -->
    </div>
    <!-- end column 4 -->


    <div class="col-sm-12 col-12 d-block d-sm-block d-md-none menu_mobile">
      <ul class="list-inline d-flex justify-content-around">
        <li class="list-inline-item">
          <a href="" class="active_menu">
            <i data-feather="settings" stroke-width="2.5" width="16" height="16"></i>
            <span class="text-icon">Paramètres</span>
          </a>
        </li>
        <li class="list-inline-item">
          <a href="{{ route('account.profile') }}" >
            <i data-feather="user" stroke-width="2.5" width="16" height="16"></i>
            <span class="text-icon">Compte</span>
          </a>
        </li>
        <li class="list-inline-item">
          <a href="{{ route('account.password') }}">
            <i data-feather="lock" stroke-width="2.5" width="16" height="16"></i>
            <span class="text-icon">Sécurité</span>
          </a>
        </li>
      </ul>
    </div>

    <div class="col-lg-8 col-md-8 col-sm-12 col-12">

      <div class="card card-fluid border-0">
        <div class="card-body">
          <h4  class="mb-4 text-center">
            Bienvenue Administrateur <br> <span style="color: #677987;">{{ $user->name }}</span>
          </h4>
          <p class="text-center text-muted">
            Gérez vos informations, ainsi que la confidentialité et la sécurité de vos données pour profiter au mieux des services Web Creation
          </p>
        </div>
      </div>
      <!-- end card -->

      <div class="card my-3">
        <div class="card-body">
          <h5>
            <i data-feather="info" stroke-width="2.5" width="20" height="20"></i>
            <span class="text-icon">Informations</span>
          </h5>
          <p>Votre compte Web Creation vous permet d'accédez à l'ensemble de tous les services proposés par Web Creation.</p>
          <p>Quelque soit le service Web Creation ou vous vous trouvez, vous avez :</p>
          <ul style="list-style-type:none;">
            <li>- Les mêmes identifiants de connexion</li>
            <li>- Les mêmes informations concernant votre compte</li>
            <li>- Les mêmes paramètres</li>
          </ul>
        </div>
        <div class="card-footer" style="background-color: white !important;">
          <a href=""  class="card-link">
            <b  class="text-icon">
              En savoir plus
            </b>
            <i data-feather="arrow-right" stroke-width="2.5" width="16" height="16"></i>
          </a>
        </div>
      </div>
      <!-- end card -->

      <div class="card my-3">
        <div class="card-body">
            <div class="float-left ">
              <h5>
                <i data-feather="list" stroke-width="2.5" width="20" height="20"></i>
                <span class="text-icon">Vos services actifs</span>
              </h5>
              <ul style="list-style-type:none;">
                <li>
                  - Web Creation Coding
                  <i data-feather="x" stroke-width="2.5" width="20" height="20" color="red"></i>
                </li>
                <li>
                  - Web Creation Forum
                  <i data-feather="x" stroke-width="2.5" width="20" height="20" color="red"></i>
                </li>
                <li>
                  - Web Creation Shopping
                  <i data-feather="x" stroke-width="2.5" width="20" height="20" color="red"></i>
                </li>
                <li>
                  - Web Creation Streaming
                  <i data-feather="check" stroke-width="2.5" width="20" height="20" color="green"></i>
                </li>
              </ul>
            </div>
            <img src="{{ asset('assets/img/google/confi.png') }}" height="96" width="96" class="float-right d-none d-sm-none d-md-block d-lg-block" alt="">
        </div>
        <!-- end card body -->
        <div class="card-footer" style="background-color: white !important;">
          <a href=""  class="card-link">
            <b class="text-icon">
              Accéder aux services
            </b>
            <i data-feather="arrow-right" stroke-width="2.5" width="16" height="16"></i>
          </a>
        </div>
        <!-- end card footer -->
      </div>
      <!-- end card -->

    </div>
    <!-- end col-lg-8 -->
  </div>
  <!-- end row -->







@endsection
