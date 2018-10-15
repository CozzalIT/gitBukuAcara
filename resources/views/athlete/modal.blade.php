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
                    <input class="form-control" placeholder="Tanggal Lahir" name="birth_date" type="date" required>
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
                      @foreach ($city as $key)
                        <option value="{{ $key->id }}">{{ $key->name }}</option>
                      @endforeach
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

  <!-- Modal Edit -->
  <div class="modal fade editAthlete" id="popupAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <form class="" action="{{ route('updateAthlete') }}" method="post">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Edit Atlet</h4>
          </div>
          <div class="modal-body" style="padding-bottom: 0px;">
            <div class="panel panel-default" style="margin-bottom: 0px;">
              <div class="panel-body">
                <fieldset>
                  <h5 class="modal-title" id="myModalLabel">Data Atlet</h5>
                  <br>
                  <div class="form-group">
                    <input class="form-control" placeholder="Nama Lengkap" name="id" id="id" type="hidden" autofocus="" required>
                    <input class="form-control" placeholder="Nama Lengkap" name="name" id="editName" type="text" autofocus="" required>
                  </div>
                  <div class="form-group">
                    <input class="form-control" placeholder="Tanggal Lahir" name="birth_date" id="editDateBirth" type="date" required>
                  </div>
                  <div class="form-group">
                    <select class="form-control input-lg" name="gender" id="editGender" required>
                      <option value="0" selected="true" disabled="true">-- Pilih Jenis Kelamin --</option>
                      <option value="L">Laki-laki</option>
                      <option value="P">Perempuan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <select class="form-control input-lg" name="address" id="editCity" required>
                      <option value="0" selected="true" disabled="true">-- Pilih Asal Atlet --</option>
                      @foreach ($city as $key)
                        <option value="{{ $key->id }}">{{ $key->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group" name="classification">
                    <select class="form-control input-lg" name="classification" id="editClassification" required>
                      <option value="0" selected="true" disabled="true">-- Pilih Klasifikasi --</option>
                      @foreach ($classifications as $classification)
                        <option value="{{ $classification->id }}">{{ $classification->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </fieldset>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Ubah</button>
          </div>
        </div>
        {{ csrf_field() }}
      </form>
    </div>
  </div>

  <!-- Modal Edit Lomba -->
  <div class="modal fade editRace" id="popupAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <form class="" action="{{ route('updateRaceNumber') }}" method="post">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Edit Atlet</h4>
          </div>
          <div class="modal-body" style="padding-bottom: 0px;">
            <div class="panel panel-default" style="margin-bottom: 0px;">
              <div class="panel-body">
                <fieldset>
                  <div class="form-group" name="classification">
                    <input type="hidden" id="athleteId" name="athleteId" value="">
                    <select class="form-control input-lg" name="race_number1" id="race_number1" required>
                      <option value="0" selected="true">-- Pilih No Perlombaan --</option>
                      @foreach ($race_numbers as $race_number)
                        @if ($race_number->is_relay == false)
                          <option value="{{ $race_number->id }}">{{ $race_number->name }}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group" name="classification">
                    <select class="form-control input-lg" name="race_number2" id="race_number2" required>
                      <option value="0" selected="true">-- Pilih No Perlombaan --</option>
                      @foreach ($race_numbers as $race_number)
                        @if ($race_number->is_relay == false)
                          <option value="{{ $race_number->id }}">{{ $race_number->name }}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group" name="classification">
                    <select class="form-control input-lg" name="race_number3" id="race_number3" required>
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
                  <div class="form-group" name="classification">
                    <select class="form-control input-lg" name="race_number4" id="race_number4" required>
                      <option value="0" selected="true">-- Pilih No Perlombaan --</option>
                      @foreach ($race_numbers as $race_number)
                        @if ($race_number->is_relay == true)
                          <option value="{{ $race_number->id }}">{{ $race_number->name }}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group" name="classification">
                    <select class="form-control input-lg" name="race_number5" id="race_number5" required>
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
            <button type="submit" class="btn btn-primary">Ubah</button>
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
