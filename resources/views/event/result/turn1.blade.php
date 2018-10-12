<div class="col-lg-12 group-seri1">
  <form class="" action="#" id="formTurn1" method="post">
    {{ csrf_field() }}
    <div class="panel panel-default">
      <div class="panel-body">
        <button type="submit" class="btn btn-primary " name="button" id="save-seri1" style="margin:5px;">Simpan</button>
        <button type="submit" class="btn btn-primary " name="button" id="save-seri1" style="margin:5px;">Cetak Hasil</button>
        <hr>
        <table data-toggle="table" data-url="#"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-order="desc">
          <thead>
            <tr>
              <th data-field="track" data-sortable="true">Lintasan</th>
              <th data-field="atlet" data-sortable="true">ATLET</th>
              <th data-field="dateBirth" data-sortable="true">TGL LAHIR</th>
              <th data-field="classification" data-sortable="true">KELAS</th>
              <th data-field="result" data-sortable="true">HASIL</th>
              <th data-field="medal" data-sortable="true">MEDALI</th>
              <th data-field="action" data-sortable="true">ACTION</th>
            </tr>
          </thead>
          <tbody>
            @php
              $participant = App\Event::showParticipant($event[0]->id, 1, 1)[0];
            @endphp
            <tr>
              <td>1</td>
              <td>{{ $participant->name }}</td>
              <td>7 Des</td>
              <td>S1</td>
              <td><input class="" type="text" name="" value="" style="border:none; font-weight:bold;" placeholder="-- : -- : ---"></td>
              <td>Emas</td>
              <td>
                <div class="btn-group">
                  <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle margin">Action <span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    <li><a href="#">Simpan</a></li>
                    <li><a href="#">Reset Hasil</a></li>
                  </ul>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </form>
</div>
