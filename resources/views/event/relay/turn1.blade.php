<div class="col-lg-12 group-seri1">
  <form class="" action="{{ route('selectRelay') }}" id="formTurn1" method="post">
    {{ csrf_field() }}
    <div class="panel panel-default">
      {{-- <div class="panel-heading">Seri 1</div> --}}
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
                  @for ($j=1; $j < 5; $j++)
                    {{-- @if (isset(App\Event::isFilledRelay($event[0]->id, 1, $i)[0]))
                      @php
                        $totalMember = count(App\Event::isFilledRelay($event[0]->id, 1, $i));
                      @endphp
                    @endif --}}
                    <div class="lintasan{{$i}} col-md-3">
                      <select class="form-control select2 seri1" data-validation="required" name="lintasan[{{$i}}][]" id="seri1[]">
                        <option value="0">-- Pilih Atlet {{$j}} --</option>
                        @foreach ($athlete_lists as $athlete_list)
                          <option value="{{ $athlete_list->classification_id."/".$athlete_list->athlete_id }}" >{{ $athlete_list->name }}</option>
                        @endforeach
                      </select>
                      <br>
                    </div>
                  @endfor
                </td>
              </tr>
            @endfor
          </tbody>
        </table>
        <button type="submit" class="btn btn-primary pull-right" name="button" id="save-seri1">Simpan</button>
        <input type="hidden" name="event_id" id="event_id" value="{{$event[0]->id}}">
        <input type="hidden" name="turn" value="1">
      </div>
    </div>
  </form>
</div>
