<div class="col-lg-12 group-seri1">
  <form class="" action="{{ route('finalResult') }}" id="formTurn1" method="post">
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
              <th data-field="result" data-sortable="true">HASIL</th>
              <th data-field="dq" data-sortable="true">DQ</th>
              <th data-field="dn" data-sortable="true">DN</th>
              <th data-field="medal" data-sortable="true">MEDALI</th>
            </tr>
          </thead>
          <tbody>
            @php
              if (!isset($bigThree[0])) {
                $bigThree[0] = 99;
              }
              if (!isset($bigThree[1])) {
                $bigThree[1] = 99;
              }
              if (!isset($bigThree[2])) {
                $bigThree[2] = 99;
              }
            @endphp
            @for ($i=1; $i < 9; $i++)
              <tr>
                <td>{{ $i }}</td>
                <td>
                  <select class="form-control select2 seri1 lintasan1" data-validation="required" name="final[]" id="final[]">
                    <option value="0">-- Pilih Atlet --</option>
                    @foreach ($athlete_lists as $athlete_list)
                      @if (
                        ($athlete_list->id == $bigThree[0]) or
                        ($athlete_list->id == $bigThree[1]) or
                        ($athlete_list->id == $bigThree[2])
                      )
                      <option value="{{ $i."/".$athlete_list->id }}" {{ (App\Event::isFilledFinal($event[0]->id, $athlete_list->id, $i)) ? "selected" : " " }}>{{ $athlete_list->name }}</option>
                      @endif
                    @endforeach
                  </select>
                </td>
                <td>
                  @php
                    if ($final_result = App\Event::isFinalResult($event[0]->id, $i) == null) {
                      $final_result = null;
                    }else{
                      $final_result = App\Event::isFinalResult($event[0]->id, $i)[0];
                    }
                  @endphp
                  @if ($final_result != null)
                    @php
                      switch (strlen($final_result->final_result)) {
                        case 6:
                          $real_result_time = "0".$final_result->final_result;
                          break;
                        case 5:
                          $real_result_time = "00".$final_result->final_result;
                          break;
                        case 4:
                          $real_result_time = "000".$final_result->final_result;
                          break;
                        case 3:
                          $real_result_time = "0000".$final_result->final_result;
                          break;
                        default:
                          $real_result_time = $final_result->final_result;
                          break;
                      }
                    @endphp
                    <input
                      class="input-time3{{$i}}"
                      type="text"
                      name="time[{{$i}}]"
                      value="{{ ($real_result_time == 0) ? "0000000" : (($real_result_time != null) ? $real_result_time : " ") }}"
                      style="border:none; font-weight:bold;"
                      placeholder="-- : -- : ---"
                      data-validation="required">
                    <span class="label label-danger">{{ $errors->first('time.'.$i) }}</span>
                    <script>
                      var cleaveNumeral = new Cleave('.input-time3{{$i}}', {
                        numericOnly: true,
                        delimiters: [':', ':'],
                        blocks: [2, 2, 3]
                      });
                    </script>
                    @else
                      <input
                        class="input-time3{{$i}}"
                        type="text"
                        name="time[{{$i}}]"
                        value="0000000"
                        style="border:none; font-weight:bold;"
                        placeholder="-- : -- : ---"
                        data-validation="required">
                      <span class="label label-danger">{{ $errors->first('time.'.$i) }}</span>
                      <script>
                        var cleaveNumeral = new Cleave('.input-time3{{$i}}', {
                          numericOnly: true,
                          delimiters: [':', ':'],
                          blocks: [2, 2, 3]
                        });
                      </script>
                  @endif
                </td>
                <td>
                  <center>
                    <input type="checkbox" name="is_dq[{{$i}}]" value="true">
                  </center>
                </td>
                <td>
                  <center>
                    <input type="checkbox" name="is_dn[{{$i}}]" value="true">
                  </center>
                </td>
                <td>
                  @if ($final_result != null)
                    {{App\Event::showMedal($event[0]->id, $i)[0]->medal}}
                  @endif
                </td>
              </tr>
            @endfor
          </tbody>
        </table>
      </div>
    </div>
    <input type="hidden" name="event_id" id="event_id" value="{{$event[0]->id}}">
    <input type="hidden" name="turn" id="turn" value="final">
  </form>
</div>
