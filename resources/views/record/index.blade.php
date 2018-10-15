@extends('_layout.master')

@section('title', 'Rekor')
@section('record', 'active')

@section('breadcrumb')
  <li class="active">Rekor</li>
@endsection

@section('page-header')
  <h1 class="page-header">Rekor</h1>
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
        <a href="#" data-toggle="modal" data-target="#popupAdd" class="btn btn-primary button-tambah"><em class="fa fa-plus">&nbsp;</em> Tambah Rekor</a>
        <div class="panel-body">
          <table data-toggle="table" data-url="#"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
            <thead>
              <tr>
                <th data-field="no" data-sortable="true">No</th>
                <th data-field="" data-sortable="true">Nama Atlet</th>
                <th data-field="gender" data-sortable="true">Jenis Kelamin</th>
                <th data-field="time"  data-sortable="true">Waktu</th>
                <th data-field="type" data-sortable="true">Tingkat</th>
                <th data-field="race_number" data-sortable="true">No Perlombaan</th>
                <th data-field="classification" data-sortable="true">Klasifikasi</th>
                <th data-field="action" data-sortable="true">Action</th>
              </tr>
            </thead>
            <tbody>
              @php
                $i = 1;
              @endphp
              @foreach ($records as $record)
                <tr>
                  <td data-sortable="true">{{ $i }}</td>
                  <td data-sortable="true">{{ strtoupper($record->athlete_name) }}</td>
                  <td data-sortable="true">
                    @if ($record->athlete_gender == "L")
                      LAKI-LAKI
                    @else
                      PEREMPUAN
                    @endif
                  </td>
                  @php
                    switch (strlen($record->time)) {
                      case 6:
                        $real_record_time = "0".$record->time;
                        break;
                      case 5:
                        $real_record_time = "00".$record->time;
                        break;
                      case 4:
                        $real_record_time = "000".$record->time;
                        break;
                      case 3:
                        $real_record_time = "0000".$record->time;
                        break;
                      default:
                        $real_record_time = $record->time;
                        break;
                    }
                  @endphp
                  <td data-sortable="true">{{ substr($real_record_time, 0, -5)." : ".substr(substr($real_record_time, -5),0,-3)." : ".substr($real_record_time, -3) }}</td>
                  <td data-sortable="true">{{ $record->type }}</td>
                  <td data-sortable="true">{{ $record->selectRaceNumber($record->race_number_id) }}</td>
                  <td data-sortable="true">{{ $record->selectClassification($record->classification_id) }}</td>
                  <td data-sortable="true">
                    <div class="btn-group">
                      <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle margin">Action <span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li><a href="#">Edit</a></li>
                        <li>
                          <a href="#"
                            class="font-bold"
                            data-toggle="modal"
                            data-target=".deleteRecord"
                            data-id="{{$record->id}}"
                            id="delete">Hapus
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
  @include('record.modal')
@endsection


@section('extra-js')
  <script>
    var cleaveNumeral = new Cleave('.input-time', {
      numericOnly: true,
      delimiters: [':', ':'],
      blocks: [2, 2, 3]
    });

    $(document).on('click', '#delete', function(){
      var id=$(this).data('id');
      $('#deletedId').val(id);
    });
  </script>
  <script src="{{ URL::asset('js/bootstrap-datepicker.js') }}"></script>
  <script src="{{ URL::asset('js/bootstrap-table.js') }}"></script>
  <script src="{{ URL::asset('js/delete-alert.js') }}"></script>
  <script src="{{ URL::asset('ajax/athlete.js') }}"></script>
@endsection
