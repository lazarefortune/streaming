@extends('layouts.admin')

@section('content')


<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Home</li>
</ol>

<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card  shadow font-weight-bold mb-4">
            <div class="card-body">
              <i  class="fas fa-users"></i>
              Utilisateurs
              <h2> {{ $users->count() }} </h2>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small font-weight-bold text-dark stretched-link" href="{{ route('admin.users.index') }}">Voir les details</a>
                <div class="small font-weight-bold text-dark"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success shadow font-weight-bold mb-4">
            <div class="card-body">
              <i  class="fas fa-comments"></i>
              Nombre de commandes
              <h2> {{ $streams->where('forfait_statut','En cours de validation')->count() + $notActiveCommands->count()  }} </h2>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small font-weight-bold text-dark stretched-link" href="{{ route('admin.streaming.command_list') }}">Voir les details</a>
                <div class="small font-weight-bold text-dark"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning shadow font-weight-bold mb-4">
            <div class="card-body">
              <i  class="fas fa-check"></i>
              Comptes activés
              <h2> {{ $streams->where('forfait_statut','Payé')->count() }} </h2>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small font-weight-bold text-dark stretched-link" href="{{ route('admin.streaming.actif_list') }}">Voir les details</a>
                <div class="small font-weight-bold text-dark"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger shadow text-white mb-4">
            <div class="card-body">
              <i  class="fas fa-hand-holding-usd"></i>
              En attente de paiement
              <h2> {{ $streams->where('forfait_statut','Non payé')->count() }} </h2>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="">Voir les details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
</div>

<!--
<div class="row">
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-area mr-1"></i>
                Area Chart Example
            </div>
            <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-bar mr-1"></i>
                Bar Chart Example
            </div>
            <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
        </div>
    </div>
</div>
 -->



@endsection
