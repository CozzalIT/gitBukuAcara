
@extends('_layout.master')

@section('title', 'Atlet')
@section('athlete', 'active')

@section('breadcrumb')
  <li class="active">Atlet</li>
@endsection

@section('page-header')
  <h1 class="page-header">Atlet</h1>
@endsection

@section('content')
  <meta name="csrf-token" content="{{ csrf_token() }}"/>
  @if(session('success'))
    <div class="alert bg-info" role="alert">
      <em class="fa fa-lg fa-warning">&nbsp;</em>
        {{ session('success') }}
      <a href="#" class="pull-right">
        <em class="fa fa-lg fa-close"></em>
      </a>
    </div>
  @endif
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <a href="#" data-toggle="modal" data-target="#popupAdd" class="btn btn-primary button-tambah"><em class="fa fa-plus">&nbsp;</em> Tambah Atlet</a>
        <div class="panel-body">
          <table data-toggle="table" data-url="#"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="#" data-sort-order="desc">
            <thead>
              <tr>
                <th data-field="no" data-sortable="true">No</th>
                <th data-field="name" data-sortable="true">Nama</th>
                <th data-field="gender"  data-sortable="true">Jenis Kelamin</th>
                <th data-field="birth_date"  data-sortable="true">Tanggal Lahir</th>
                <th data-field="address" data-sortable="true">Asal</th>
                <th data-field="classification" data-sortable="true">Klasifikasi</thS>
                <th data-field="action" data-sortable="true">Action</thS>
              </tr>
            </thead>
            <tbody>
              @php
                $i = 1;
              @endphp
              @foreach ($athletes as $athlete)
                <tr>
                  <td data-sortable="true">{{ $i }}</td>
                  <td data-sortable="true">{{ $athlete->name }}</td>
                  <td data-sortable="true">{{ $athlete->gender }}</td>
                  <td data-sortable="true">{{ $athlete->birth_date }}</td>
                  <td data-sortable="true">{{ $athlete->address }}</td>
                  <td data-sortable="true">{{ $athlete->selectClassification($athlete->classification_id) }}</td>
                  <td data-sortable="true">
                    <div class="btn-group">
                      <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle margin">Action <span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li><a href="#">Edit</a></li>
                        <li>
                          <a href="#"
                          class="font-bold"
                          data-toggle="modal"
                          data-target=".deleteAthlete"
                          data-id="{{ $athlete->id }}"
                          id="delete">Hapus
                        </a>
                        </li>
                        <li><a href="#">Perlombaan yang Diikuti</a></li>
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
@endsection

@include('athlete.modal')

@section('extra-js')
  <script>
    $(document).on('click', '#delete', function(){
      var id=$(this).data('id');
      $('#deletedId').val(id);
    });
  </script>
  <script src="{{ URL::asset('js/bootstrap-datepicker.js') }}"></script>
  <script src="{{ URL::asset('js/bootstrap-table.js') }}"></script>
  <script src="{{ URL::asset('ajax/athlete.js') }}"></script>
@endsection
