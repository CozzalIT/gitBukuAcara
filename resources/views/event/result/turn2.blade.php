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
            <tr>
              <td>
                <center>
                  <h5>1</h5>
                </center>
              </td>
              <td>
                <select class="form-control select2" data-validation="required" name="seri2[]" id="seri2[]">
                  <option value="0">-- Pilih Atlet --</option>
                  @foreach ($athlete_lists as $athlete_list)
                    <option value="{{ "1/".$athlete_list->athlete_id }}" {{ (App\Event::isFilled($event[0]->id, $athlete_list->athlete_id, 2, 1) > 0 ? "selected" : "") }}>{{ $athlete_list->name }}</option>
                  @endforeach
                </select>
              </td>
            </tr>
            <tr>
              <td>
                <center>
                  <h5>2</h5>
                </center>
              </td>
              <td>
                <select class="form-control select2" data-validation="required" name="seri2[]" id="seri2[]">
                  <option value="0">-- Pilih Atlet --</option>
                  @foreach ($athlete_lists as $athlete_list)
                    <option value="{{ "2/".$athlete_list->athlete_id }}" {{ (App\Event::isFilled($event[0]->id, $athlete_list->athlete_id, 2, 2) > 0 ? "selected" : "") }}>{{ $athlete_list->name }}</option>
                  @endforeach
                </select>
              </td>
            </tr>
            <tr>
              <td>
                <center>
                  <h5>3</h5>
                </center>
              </td>
              <td>
                <select class="form-control select2" data-validation="required" name="seri2[]" id="seri2[]">
                  <option value="0">-- Pilih Atlet --</option>
                  @foreach ($athlete_lists as $athlete_list)
                    <option value="{{ "3/".$athlete_list->athlete_id }}" {{ (App\Event::isFilled($event[0]->id, $athlete_list->athlete_id, 2, 3) > 0 ? "selected" : "") }}>{{ $athlete_list->name }}</option>
                  @endforeach
                </select>
              </td>
            </tr>
            <tr>
              <td>
                <center>
                  <h5>4</h5>
                </center>
              </td>
              <td>
                <select class="form-control select2" data-validation="required" name="seri2[]" id="seri2[]">
                  <option value="0">-- Pilih Atlet --</option>
                  @foreach ($athlete_lists as $athlete_list)
                    <option value="{{ "4/".$athlete_list->athlete_id }}" {{ (App\Event::isFilled($event[0]->id, $athlete_list->athlete_id, 2, 4) > 0 ? "selected" : "") }}>{{ $athlete_list->name }}</option>
                  @endforeach
                </select>
              </td>
            </tr>
            <tr>
              <td>
                <center>
                  <h5>5</h5>
                </center>
              </td>
              <td>
                <select class="form-control select2" data-validation="required" name="seri2[]" id="seri2[]">
                  <option value="0">-- Pilih Atlet --</option>
                  @foreach ($athlete_lists as $athlete_list)
                    <option value="{{ "5/".$athlete_list->athlete_id }}" {{ (App\Event::isFilled($event[0]->id, $athlete_list->athlete_id, 2, 5) > 0 ? "selected" : "") }}>{{ $athlete_list->name }}</option>
                  @endforeach
                </select>
              </td>
            </tr>
            <tr>
              <td>
                <center>
                  <h5>6</h5>
                </center>
              </td>
              <td>
                <select class="form-control select2" data-validation="required" name="seri2[]" id="seri2[]">
                  <option value="0">-- Pilih Atlet --</option>
                  @foreach ($athlete_lists as $athlete_list)
                    <option value="{{ "6/".$athlete_list->athlete_id }}" {{ (App\Event::isFilled($event[0]->id, $athlete_list->athlete_id, 2, 6) > 0 ? "selected" : "") }}>{{ $athlete_list->name }}</option>
                  @endforeach
                </select>
              </td>
            </tr>
            <tr>
              <td>
                <center>
                  <h5>7</h5>
                </center>
              </td>
              <td>
                <select class="form-control select2" data-validation="required" name="seri2[]" id="seri2[]">
                  <option value="0">-- Pilih Atlet --</option>
                  @foreach ($athlete_lists as $athlete_list)
                    <option value="{{ "7/".$athlete_list->athlete_id }}" {{ (App\Event::isFilled($event[0]->id, $athlete_list->athlete_id, 2, 7) > 0 ? "selected" : "") }}>{{ $athlete_list->name }}</option>
                  @endforeach
                </select>
              </td>
            </tr>
            <tr>
              <td>
                <center>
                  <h5>8</h5>
                </center>
              </td>
              <td>
                <select class="form-control select2" data-validation="required" name="seri2[]" id="seri2[]">
                  <option value="0">-- Pilih Atlet --</option>
                  @foreach ($athlete_lists as $athlete_list)
                    <option value="{{ "8/".$athlete_list->athlete_id }}" {{ (App\Event::isFilled($event[0]->id, $athlete_list->athlete_id, 2, 8) > 0 ? "selected" : "") }}>{{ $athlete_list->name }}</option>
                  @endforeach
                </select>
              </td>
            </tr>
          </tbody>
        </table>
        <button type="submit" class="btn btn-primary pull-right" name="button" id="save-seri2">Simpan</button>
        <input type="hidden" name="event_id" id="event_id" value="{{$event[0]->id}}">
      </div>
    </div>
  </form>
</div>
