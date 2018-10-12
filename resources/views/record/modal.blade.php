<!--Modal Add-->
  <div class="modal fade" id="popupAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <form class="" action="{{ route('addRecord') }}" method="post">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Tambah Rekor</h4>
          </div>
          <div class="modal-body" style="padding-bottom: 0px;">
            <div class="panel panel-default" style="margin-bottom: 0px;">
              <div class="panel-body">
                <fieldset>
                  <h5 class="modal-title" id="myModalLabel">Masukan Data Atlet</h5>
                  <br>
                  <div class="form-group">
                    <input class="form-control" placeholder="Nama Atlet" name="athlete_name" type="text" autofocus="" required>
                  </div>
                  <div class="form-group">
                    <input class="form-control" placeholder="Asal Atlet" name="athlete_address" type="text" autofocus="" required>
                  </div>
                  <div class="form-group">
                    <select class="form-control input-lg" name="athlete_gender" required>
                      <option value="0" selected="true" disabled="true">-- Pilih Jenis Kelamin --</option>
                      <option value="L">Laki-laki</option>
                      <option value="P">Perempuan</option>
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
                  <h5 class="modal-title" id="myModalLabel">Masukan Data Perlombaan</h5>
                  <br>
                  <div class="form-group" name="classification">
                    <select class="form-control input-lg" name="race_number" required>
                      <option value="0" selected="true" disabled="true">-- Pilih No Perlombaan --</option>
                      @foreach ($race_numbers as $race_number)
                        <option value="{{ $race_number->id }}">{{ $race_number->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <select class="form-control input-lg" name="type" required>
                      <option value="0" selected="true" disabled="true">-- Pilih Tingkat Rekor --</option>
                      <option value="PEPARNAS">PEPARNAS</option>
                      <option value="PEPARDA">PEPARDA</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <input class="form-control input-time" placeholder="Waktu Rekor" name="time" type="text" data-validation="required" required>
                    <span class="label label-danger">{{ $errors->first('time') }}</span>
                  </div>
                  <div class="form-group">
                    <input class="form-control" placeholder="Tempat" name="location" type="text" required>
                  </div>
                  <div class="form-group">
                    <input class="form-control" placeholder="Tanggal" name="recorded_at" type="date" placeholder="Tanggal" required>
                  </div>
                </fieldset>
                <hr>
              </div>
            </div>
          </div>
          {{ csrf_field() }}
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!--Modal Edit-->
    <div class="modal fade" id="popupAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <form class="" action="{{ route('addRecord') }}" method="post">
          {{-- <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Tambah Rekor</h4>
            </div>
            <div class="modal-body" style="padding-bottom: 0px;">
              <div class="panel panel-default" style="margin-bottom: 0px;">
                <div class="panel-body">
                  <fieldset>
                    <h5 class="modal-title" id="myModalLabel">Masukan Data Atlet</h5>
                    <br>
                    <div class="form-group">
                      <input class="form-control" placeholder="Nama Atlet" name="athlete_name" type="text" autofocus="" required>
                    </div>
                    <div class="form-group">
                      <input class="form-control" placeholder="Asal Atlet" name="athlete_address" type="text" autofocus="" required>
                    </div>
                    <div class="form-group">
                      <select class="form-control input-lg" name="athlete_gender" required>
                        <option value="0" selected="true" disabled="true">-- Pilih Jenis Kelamin --</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
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
                    <h5 class="modal-title" id="myModalLabel">Masukan Data Perlombaan</h5>
                    <br>
                    <div class="form-group" name="classification">
                      <select class="form-control input-lg" name="race_number" required>
                        <option value="0" selected="true" disabled="true">-- Pilih No Perlombaan --</option>
                        @foreach ($race_numbers as $race_number)
                          <option value="{{ $race_number->id }}">{{ $race_number->name }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <select class="form-control input-lg" name="type" required>
                        <option value="0" selected="true" disabled="true">-- Pilih Tingkat Rekor --</option>
                        <option value="PEPARNAS">PEPARNAS</option>
                        <option value="PEPARDA">PEPARDA</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <input class="form-control input-time" placeholder="Waktu Rekor" name="time" type="text" data-validation="required">
                      <span class="label label-danger">{{ $errors->first('time') }}</span>
                    </div>
                    <div class="form-group">
                      <input class="form-control" placeholder="Tempat" name="location" type="text">
                    </div>
                    <div class="form-group">
                      <input class="form-control" placeholder="Tanggal" name="recorded_at" type="date" placeholder="Tanggal">
                    </div>
                  </fieldset>
                  <hr>
                </div>
              </div>
            </div>
            {{ csrf_field() }}
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
          </div> --}}
        </form>
      </div>
    </div>

    <!--Modal Delete-->
      <div class="modal fade deleteRecord" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <form class="" action="{{ route('deleteRecord') }}" method="post">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Hapus Rekor</h4>
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
