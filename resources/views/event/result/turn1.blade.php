<div class="col-lg-12 group-seri1">
  <form class="" action="{{ route('addResult') }}" id="formTurn1" method="post">
    {{ csrf_field() }}
    <div class="panel panel-default">
      <div class="panel-body">
        <button type="submit" class="btn btn-primary " name="button" id="save-seri1" style="margin:5px;">Simpan</button>
        <hr>
        <table data-toggle="table" data-url="#"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-order="desc">
          <thead>
            <tr>
              <th data-field="track" data-sortable="true">LINTASAN</th>
              <th data-field="atlet" data-sortable="true">ATLET</th>
              <th data-field="dateBirth" data-sortable="true">TGL LAHIR</th>
              <th data-field="classification" data-sortable="true">KELAS</th>
              <th data-field="result" data-sortable="true">HASIL</th>
              <th data-field="dq" data-sortable="true">DQ</th>
              <th data-field="dn" data-sortable="true">DN</th>
              <th data-field="medal" data-sortable="true">MEDALI</th>
            </tr>
          </thead>
          <tbody>
            @for ($i=1; $i < 9; $i++)
              @php
                if ($participant = App\Event::showParticipant($event[0]->id, 1, $i) == null) {
                  $participant = null;
                }else{
                  $participant = App\Event::showParticipant($event[0]->id, 1, $i)[0];
                }
              @endphp
              <tr>
                <td>{{ $i }}</td>
                <td>{{ ($participant != null) ? $participant->name : " " }}</td>
                <td>{{ ($participant != null) ? $participant->birth_date : " " }}</td>
                <td>{{ ($participant != null) ? $participant->classification_name : " " }}</td>
                <td>
                  @if ($participant != null)
                    @php
                      switch (strlen($participant->result_time)) {
                        case 6:
                          $real_result_time = "0".$participant->result_time;
                          break;
                        case 5:
                          $real_result_time = "00".$participant->result_time;
                          break;
                        case 4:
                          $real_result_time = "000".$participant->result_time;
                          break;
                        case 3:
                          $real_result_time = "0000".$participant->result_time;
                          break;
                        default:
                          $real_result_time = $participant->result_time;
                          break;
                      }
                    @endphp
                    <input
                      class="input-time{{$i}}"
                      type="text" name="time[{{$i}}]"
                      value="{{ ($real_result_time == 0) ? "0000000" : (($real_result_time != null) ? $real_result_time : " ") }}"
                      style="border:none; font-weight:bold;"
                      placeholder="-- : -- : ---"
                      data-validation="required">
                    <input class="" type="hidden" name="athlete_id[{{$i}}]" value="{{ ($participant != null) ? $participant->athlete_id : " " }}">
                    <span class="label label-danger">{{ $errors->first('time.'.$i) }}</span>
                    <script>
                      var cleaveNumeral = new Cleave('.input-time{{$i}}', {
                        numericOnly: true,
                        delimiters: [':', ':'],
                        blocks: [2, 2, 3]
                      });
                    </script>
                  @endif
                </td>
                <td>
                  @if ($participant != null)
                    <center>
                      <input type="checkbox" name="is_dq[{{$i}}]" value="true" {{ ($participant->is_dq == 1) ? 'checked' : '' }}>
                    </center>
                  @endif
                </td>
                <td>
                  @if ($participant != null)
                    <center>
                      <input type="checkbox" name="is_dn[{{$i}}]" value="true" {{ ($participant->is_dn == 1) ? 'checked' : '' }}>
                    </center>
                  @endif
                </td>
                <td>{{ ($participant != null) ? $participant->medal : " " }}</td>
              </tr>
            @endfor
          </tbody>
        </table>
      </div>
    </div>
    <input type="hidden" name="event_id" id="event_id" value="{{$event[0]->id}}">
    <input type="hidden" name="turn" id="turn" value="1">
  </form>
</div>
