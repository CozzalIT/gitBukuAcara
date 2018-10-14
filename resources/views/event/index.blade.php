
@extends('_layout.master')

@section('title', 'Acara')
@section('event', 'active')

@section('breadcrumb')
  <li class="active">Acara</li>
@endsection

@section('page-header')
  <h1 class="page-header">Acara</h1>
@endsection

@section('content')
  <meta name="csrf-token" content="{{ csrf_token() }}"/>
  @if(session('success'))
    <div class="alert bg-info" role="alert">
      <em class="fa fa-lg fa-check">&nbsp;</em>
        {{ session('success') }}
      <a href="#" class="pull-right">
        <em class="fa fa-lg fa-close"></em>
      </a>
    </div>
  @endif
  @if ($errors->any())
    <div class="alert bg-warning" role="alert">
      <em class="fa fa-lg fa-warning">&nbsp;</em>
        ERROR!!
      <a href="#" class="pull-right">
        <em class="fa fa-lg fa-close"></em>
      </a>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <a href="#" data-toggle="modal" data-target="#popupAdd" class="btn btn-primary button-tambah"><em class="fa fa-plus">&nbsp;</em> Tambah Acara</a>
        <a href="#" data-toggle="modal" data-target="#popupReport" class="btn btn-primary button-tambah"><em class="fa fa-print">&nbsp;</em> Laporan Acara</a>
        <div class="panel-body">
          <table data-toggle="table" data-url="#"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
            <thead>
              <tr>
                <th data-field="no" data-sortable="true">No</th>
                <th data-field="" data-sortable="true">Nama Acara</th>
                <th data-field="race_number" data-sortable="true">No Perlombaan</th>
                <th data-field="race_type" data-sortable="true">Jenis Perlombaan</th>
                <th data-field="classification" data-sortable="true">Klasifikasi</th>
                <th data-field="gender" data-sortable="true">Jenis Kelamin</th>
                <th data-field="action" data-sortable="true">Action</th>
              </tr>
            </thead>
            <tbody>
              @php
                $i = 1;
              @endphp
              @foreach ($events as $event)
                <tr>
                  <td data-sortable="true">{{ $i }}</td>
                  <td data-sortable="true">{{ ($event->name) }}</td>
                  <td data-sortable="true">{{ $event->selectRaceNumber($event->race_number_id) }}</td>
                  <td data-sortable="true">
                    @if ($event->is_relay == true)
                      ESTAFET
                    @else
                      PERORANGAN
                    @endif
                  </td>
                  <td data-sortable="true">{{ (isset($event->classification_id)) ? $event->selectClassification($event->classification_id) : "MAX 49 POINT"  }}</td>
                  <td data-sortable="true">
                    @if ($event->gender == "L")
                      LAKI-LAKI
                    @else
                      PEREMPUAN
                    @endif
                  </td>
                  <td data-sortable="true">
                    <div class="btn-group">
                      <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle margin">Action <span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li><a href="#">Edit</a></li>
                        <li>
                          <a href="#"
                            class="font-bold"
                            data-toggle="modal"
                            data-target=".deleteEvent"
                            data-id="{{$event->id}}"
                            id="delete">Hapus
                          </a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="#">Pra Acara</a></li>
                        <li>
                          @if ($event->is_relay == 0)
                            <a
                              href="{{action('EventController@filterAthlete', [
                                'event_id'=>$event->id,
                                'race_number_id'=> $event->race_number_id,
                                'classification_id'=> $event->classification_id,
                                'gender'=> $event->gender])
                              }}"
                              id="show" name="show">Filter Atlet
                            </a>
                          @else
                            <a
                              href="{{action('EventController@filterRelay', [
                                'event_id'=>$event->id,
                                'race_number_id'=> $event->race_number_id,
                                'gender'=> $event->gender])
                              }}"
                              id="show" name="show">Filter Atlet
                            </a>
                          @endif
                        </li>
                        <li>
                          <a
                            href="{{action('EventController@eventResult', [
                              'event_id'=>$event->id,
                              'race_number_id'=> $event->race_number_id,
                              'classification_id'=> $event->classification_id,
                              'gender'=> $event->gender])
                            }}">Input Hasil Lomba
                          </a>
                        </li>
                      </ul>
                    </div>
                  </td>
                </tr>
                @php
                  $i++;
                @endphp
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div><!--/.row-->
  @include('event.modal')
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
