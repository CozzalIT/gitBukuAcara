
@extends('_layout.master')

@section('title', 'Dashboard')
@section('dashboard', 'active')

@section('breadcrumb')
  <li class="active">Dashboard</li>
@endsection

@section('page-header')
  <h1 class="page-header">Dashboard</h1>
@endsection

@section('content')
  <div class="panel panel-container">
    <div class="row">
      <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
        <div class="panel panel-teal panel-widget border-right">
          <div class="row no-padding"><em class="fa fa-xl fa-users color-blue"></em>
            <div class="large">{{ count($athletes) }}</div>
            <div class="text-muted">Atlete</div>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
        <div class="panel panel-blue panel-widget border-right">
          <div class="row no-padding"><em class="fa fa-xl fa-calendar color-orange"></em>
            <div class="large">{{ count($events) }}</div>
            <div class="text-muted">Acara</div>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
        <div class="panel panel-orange panel-widget border-right">
          <div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
            <div class="large">24</div>
            <div class="text-muted">New Users</div>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
        <div class="panel panel-red panel-widget ">
          <div class="row no-padding"><em class="fa fa-xl fa-search color-red"></em>
            <div class="large">25.2k</div>
            <div class="text-muted">Page Views</div>
          </div>
        </div>
      </div>
    </div><!--/.row-->
  </div>
@endsection
