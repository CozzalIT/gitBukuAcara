<div class="col-lg-4 group-seri2">
  <form class="" action="{{ route('selectAthlete') }}" id="formTurn2" method="post">
    {{ csrf_field() }}
    <div class="panel panel-default">
      <div class="panel-heading">Seri 2</div>
      <div class="panel-body">
        <table class="table">
          <thead>
            <tr>
              <th>
                <center>
                  Lintasan
                </center>
              </th>
              <th>
                <center>
                  Atlet
                </center>
              </th>
            </tr>
          </thead>
          <tbody>
            @for ($i=1; $i < 9; $i++)
              <tr>
                <td>
                  <center>
                    <h5>{{$i}}</h5>
                  </center>
                </td>
                <td>
                  <select class="form-control select2 seri2 lintasan1" data-validation="required" name="seri2[]" id="seri2[]">
                    <option value="0">-- Pilih Atlet --</option>
                    @foreach ($athlete_lists as $athlete_list)
                      <option value="{{ $i."/".$athlete_list->athlete_id }}" {{ (App\Event::isFilled($event[0]->id, $athlete_list->athlete_id, 2, $i) > 0 ? "selected" : "") }}>{{ $athlete_list->name }}</option>
                    @endforeach
                  </select>
                </td>
              </tr>
            @endfor
          </tbody>
        </table>
        <button type="submit" class="btn btn-primary pull-right" name="button" id="save-seri2">Simpan</button>
        <input type="hidden" name="event_id" id="event_id" value="{{$event[0]->id}}">
      </div>
    </div>
  </form>
</div>
