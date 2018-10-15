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
  <input type="hidden" name="event_id" id="event_id" value="{{$event[0]->id}}">
  <input type="hidden" name="race_number_id" id="race_number_id" value="{{$event[0]->race_number_id}}">
  <input type="hidden" name="gender" id="gender" value="{{$event[0]->gender}}">

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
    @include('event.relay.turn1')
    {{-- @include('event.relay.turn2')
    @include('event.relay.turn3') --}}
  </div><!--/.row-->
@endsection

@section('extra-js')
  <script src="{{ URL::asset('js/bootstrap-datepicker.js') }}"></script>
  <script src="{{ URL::asset('js/bootstrap-table.js') }}"></script>
  <script src="{{ URL::asset('js/delete-alert.js') }}"></script>
  {{-- <script src="{{ URL::asset('js/view/filter.js') }}"></script> --}}
@endsection
