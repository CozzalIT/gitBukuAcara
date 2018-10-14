
@extends('_layout.master')

@section('title', 'Acara')
@section('event', 'active')

@section('breadcrumb')
  <li class="active">Acara</li>
@endsection

@section('page-header')

@endsection

@section('content')
  <meta name="csrf-token" content="{{ csrf_token() }}"/>

  @if(session('success'))
    <div class="alert bg-info" role="alert">
      <em class="fa fa-lg fa-check">&nbsp;</em>
        {{ session('success') }}
      <a href="#" class="pull-right close-btn" >
        <em class="fa fa-lg fa-close"></em>
      </a>
    </div>
  @endif
  @if ($errors->any())
    <div class="alert bg-warning" role="alert">
      <em class="fa fa-lg fa-warning">&nbsp;</em>
        ERROR!!
      <a href="#" class="pull-right close-btn">
        <em class="fa fa-lg fa-close"></em>
      </a>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  @include('event.filter.eventTitle')

  <div class="row">
    <div class="col-lg-12">
      <h2>Hasil Perlombaan</h2>
    </div>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body tabs">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1" data-toggle="tab">Seri 1</a></li>
            @if ($turn2 == true)
              <li><a href="#tab2" data-toggle="tab">Seri 2</a></li>
            @endif
            @if ($turn3 == true)
              <li><a href="#tab3" data-toggle="tab">Seri 3</a></li>
            @endif
            @if ($bigThree != false)
              <li><a href="#tab4" data-toggle="tab">Final</a></li>
            @endif
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
            <div class="tab-pane fade" id="tab4">
              @include('event.result.final')
            </div>
          </div>
        </div>
      </div><!--/.panel-->
    </div><!--/.col-->
  </div><!-- /.row -->

@endsection

@section('extra-js')
  <script>
    $(document).on('click', '#delete', function(){
      var id=$(this).data('id');
      $('#deletedId').val(id);
    });
  </script>
  <script src="{{ URL::asset('js/bootstrap-datepicker.js') }}"></script>
  <script src="{{ URL::asset('js/bootstrap-table.js') }}"></script>
  <script src="{{ URL::asset('js/delete-alert.js') }}"></script>
  <script src="{{ URL::asset('ajax/event.js') }}"></script>
@endsection
