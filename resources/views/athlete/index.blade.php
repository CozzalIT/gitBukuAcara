
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
          <table data-toggle="table" data-url="#"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
            <thead>
              <tr>
                <th data-field="no" data-sortable="true">No</th>
                <th data-field="" data-sortable="true">Nama</th>
                <th data-field="gender"  data-sortable="true">Jenis Kelamin</th>
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

  <!--Modal Popup-->
    <div class="modal fade" id="popupAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <form class="" action="{{ route('addAthlete') }}" method="post">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Tambah Atlet</h4>
            </div>
            <div class="modal-body" style="padding-bottom: 0px;">
              <div class="panel panel-default" style="margin-bottom: 0px;">
                <div class="panel-body">
                  <fieldset>
                    <h5 class="modal-title" id="myModalLabel">Masukan Data Atlet</h5>
                    <br>
                    <div class="form-group">
                      <input class="form-control" placeholder="Nama Lengkap" name="name" type="text" autofocus="" required>
                    </div>
                    <div class="form-group">
                      <select class="form-control input-lg" name="gender" required>
                        <option value="0" selected="true" disabled="true">-- Pilih Jenis Kelamin --</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <select class="form-control input-lg" name="address" required>
                        <option value="0" selected="true" disabled="true">-- Pilih Asal Atlet --</option>
                        <option value="Kabupaten Bandung">Kabupaten Bandung</option>
                        <option value="Kabupaten Bandung Barat">Kabupaten Bandung Barat</option>
                        <option value="Kabupaten Bekasi">Kabupaten Bekasi</option>
                        <option value="Kabupaten Bogor">Kabupaten Bogor</option>
                        <option value="Kabupaten Ciamis">Kabupaten Ciamis</option>
                        <option value="Kabupaten Cianjur">Kabupaten Cianjur</option>
                        <option value="Kabupaten Cirebon">Kabupaten Cirebon</option>
                        <option value="Kabupaten Garut">Kabupaten Garut</option>
                        <option value="Kabupaten Indramayu">Kabupaten Indramayu</option>
                        <option value="Kabupaten Karawang">Kabupaten Karawang</option>
                        <option value="Kabupaten Kuningan">Kabupaten Kuningan</option>
                        <option value="Kabupaten Majalengka">Kabupaten Majalengka</option>
                        <option value="Kabupaten Pangandaran">Kabupaten Pangandaran</option>
                        <option value="Kabupaten Purwakarta">Kabupaten Purwakarta</option>
                        <option value="Kabupaten Subang">Kabupaten Subang</option>
                        <option value="Kabupaten Sukabumi">Kabupaten Sukabumi</option>
                        <option value="Kabupaten Sumedang">Kabupaten Sumedang</option>
                        <option value="Kabupaten Tasikmalaya">Kabupaten Tasikmalaya</option>
                        <option value="Kota Bandung">Kota Bandung</option>
                        <option value="Kota Banjar">Kota Banjar</option>
                        <option value="Kota Bekasi">Kota Bekasi</option>
                        <option value="Kota Bogor">Kota Bogor</option>
                        <option value="Kota Cimahi">Kota Cimahi</option>
                        <option value="Kota Cirebon">Kota Cirebon</option>
                        <option value="Kota Depok">Kota Depok</option>
                        <option value="Kota Sukabumi">Kota Sukabumi</option>
                        <option value="Kota Tasikmalaya">Kota Tasikmalaya</option>
                      </select>
                    </div>
                    <div class="form-group" name="classification">
                      <select class="form-control input-lg" name="classification" required>
                        <option value="0" selected="true" disabled="true">-- Pilih Klasifikasi --</option>
                        @foreach ($classifications as $classification)
                          <option value="{{ $classification->id }}">{{ $classification->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </fieldset>
                  <hr>
                  <fieldset>
                    <h5 class="modal-title" id="myModalLabel">Perorangan</h5>
                    <br>
                    <div class="form-group" name="classification">
                      <select class="form-control input-lg" name="single1" id="single1" required>
                        <option value="0" selected="true">-- Pilih No Perlombaan --</option>
                        @foreach ($race_numbers as $race_number)
                          @if ($race_number->is_relay == false)
                            <option value="{{ $race_number->id }}">{{ $race_number->name }}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group" name="classification">
                      <select class="form-control input-lg" name="single2" id="single2" required>
                        <option value="0" selected="true">-- Pilih No Perlombaan --</option>
                        @foreach ($race_numbers as $race_number)
                          @if ($race_number->is_relay == false)
                            <option value="{{ $race_number->id }}">{{ $race_number->name }}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group" name="classification">
                      <select class="form-control input-lg" name="single3" id="single3" required>
                        <option value="0" selected="true">-- Pilih No Perlombaan --</option>
                        @foreach ($race_numbers as $race_number)
                          @if ($race_number->is_relay == false)
                            <option value="{{ $race_number->id }}">{{ $race_number->name }}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                  </fieldset>
                  <fieldset>
                    <h5 class="modal-title" id="myModalLabel">Estafet</h5>
                    <br>
                    <div class="form-group" name="classification">
                      <select class="form-control input-lg" name="relay1" id="relay1" required>
                        <option value="0" selected="true">-- Pilih No Perlombaan --</option>
                        @foreach ($race_numbers as $race_number)
                          @if ($race_number->is_relay == true)
                            <option value="{{ $race_number->id }}">{{ $race_number->name }}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group" name="classification">
                      <select class="form-control input-lg" name="relay2" id="relay2" required>
                        <option value="0" selected="true">-- Pilih No Perlombaan --</option>
                        @foreach ($race_numbers as $race_number)
                          @if ($race_number->is_relay == true)
                            <option value="{{ $race_number->id }}">{{ $race_number->name }}</option>
                          @endif
                        @endforeach
                      </select>
                    </div>
                    {{ csrf_field() }}
                  </fieldset>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!--Modal Delete-->
      <div class="modal fade deleteAthlete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <form class="" action="{{ route('deleteAthlete') }}" method="post">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Hapus Acara</h4>
              </div>
              <div class="modal-body" style="padding-bottom: 0px;">
                <div class="panel panel-default" style="margin-bottom: 0px;">
                  <div class="panel-body">
                    <fieldset>
                      <h5 class="modal-title" id="myModalLabel">Yakin ingin menghapus data?</h5>
                      <input type="hidden" class="form-control" name="deletedId" id="deletedId" value="" >
                      <br>
                    </fieldset>
                  </div>
                </div>
              </div>
              {{ csrf_field() }}
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Delete</button>
              </div>
            </div>
          </form>
        </div>
      </div>
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
  <script src="{{ URL::asset('ajax/athlete.js') }}"></script>
@endsection
