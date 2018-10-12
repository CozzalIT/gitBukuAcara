<!--Modal Add-->
  <div class="modal fade" id="popupAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <form class="" action="{{ route('addEvent') }}" method="post">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Tambah Acara</h4>
          </div>
          <div class="modal-body" style="padding-bottom: 0px;">
            <div class="panel panel-default" style="margin-bottom: 0px;">
              <div class="panel-body">
                <fieldset>
                  <h5 class="modal-title" id="myModalLabel">Masukan Data Acara</h5>
                  <br>
                  <div class="form-group">
                    <input class="form-control" placeholder="Nama Acara" name="name" type="text" autofocus="" required>
                  </div>
                  <div class="form-group">
                    <select class="form-control input-lg" name="gender" required>
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
                  <div class="form-group">
                    <select class="form-control input-lg" name="is_relay" id="is_relay" required>
                      <option value="0" selected="true" disabled="true">-- Pilih Jenis Perlombaan --</option>
                      <option value="1">ESTAFET</option>
                      <option value="0">PEORANGAN</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <select class="form-control input-lg" name="race_number" id="race_number" required>
                      <option value="0" selected="true" disabled="true">-- Pilih No Perlombaan --</option>
                      @foreach ($race_numbers as $race_number)
                        <option value="{{ $race_number->id }}">{{ $race_number->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </fieldset>
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

  <!--Modal Delete-->
    <div class="modal fade deleteEvent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <form class="" action="{{ route('deleteEvent') }}" method="post">
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

    <!--Modal Report-->
      <div class="modal fade" id="popupReport" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <form class="" action="#" method="post">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Laporan Acara</h4>
              </div>
              <div class="modal-body" style="padding-bottom: 0px;">
                <div class="panel panel-default" style="margin-bottom: 0px;">
                  <div class="panel-body">
                    <fieldset>
                      <div class="form-group">
                        <select class="form-control input-lg" name="race_number" id="race_number" required>
                          <option value="0" selected="true" disabled="true">-- Pilih Acara --</option>
                          <option value="0">Semua Acara</option>
                          <option value="0">Acara 001</option>
                          <option value="0">Acara 002</option>
                          <option value="0">Acara 003</option>
                        </select>
                      </div>
                    </fieldset>
                  </div>
                </div>
              </div>
              {{ csrf_field() }}
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Download Excel</button>
              </div>
            </div>
          </form>
        </div>
      </div>
