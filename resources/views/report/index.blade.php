@extends('_layout.master')

@section('title', 'Laporan')
@section('event', 'active')

@section('breadcrumb')
  <li class="active">laporan</li>
@endsection

@section('page-header')

@endsection

@section('content')
  <meta name="csrf-token" content="{{ csrf_token() }}"/>
  <div class="row">
    <div class="col-lg-12">
      <h2>Hasil Perlombaan</h2>
    </div>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body tabs">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1" data-toggle="tab">Seri 1</a></li>
            <li><a href="#tab2" data-toggle="tab">Seri 2</a></li>
            <li><a href="#tab3" data-toggle="tab">Seri 3</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane fade in active" id="tab1">
              @include('event.result.turn1')
            </div>
            <div class="tab-pane fade" id="tab2">
              @include('event.result.turn2')
            </div>
            <div class="tab-pane fade" id="tab3">
              @include('event.result.turn3')
            </div>
          </div>
        </div>
      </div><!--/.panel-->
    </div><!--/.col-->
  </div><!-- /.row -->

@endsection

@section('extra-js')
  <script src="{{ URL::asset('js/bootstrap-datepicker.js') }}"></script>
  <script src="{{ URL::asset('js/bootstrap-table.js') }}"></script>
  <script src="{{ URL::asset('js/delete-alert.js') }}"></script>
  <script src="{{ URL::asset('ajax/event.js') }}"></script>
@endsection
