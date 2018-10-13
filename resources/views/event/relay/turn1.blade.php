<div class="col-lg-4 group-seri1">
  <form class="" action="{{ route('selectRelay') }}" id="formTurn1" method="post">
    {{ csrf_field() }}
    <div class="panel panel-default">
      <div class="panel-heading">Seri 1</div>
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
                  @for ($j=1; $j < 6; $j++)
                    <div class="lintasan{{$i}}-{{$j}}-1 {{ ($j != 1) ? 'hidden' : '' }}">
                      <select class="form-control select2 seri1" data-validation="required" name="seri1[{{$j}}][]" id="seri1[]">
                        <option value="0">-- Pilih Atlet {{$j}} --</option>
                        @foreach ($athlete_lists as $athlete_list)
                          <option value="{{ $i."/".$athlete_list->athlete_id }}" {{ (App\Event::isFilled($event[0]->id, $athlete_list->athlete_id, 1, $i) > 0 ? "selected" : "") }}>{{ $athlete_list->name }}</option>
                        @endforeach
                      </select>
                      <br>
                    </div>
                  @endfor
                </td>
                <script>
                  $(".lintasan{{$i}}-1-1").change(function(){
                    $(".lintasan{{$i}}-2-1").removeClass('hidden');
                  });
                  $(".lintasan{{$i}}-2-1").change(function(){
                    $(".lintasan{{$i}}-3-1").removeClass('hidden');
                  });
                  $(".lintasan{{$i}}-3-1").change(function(){
                    $(".lintasan{{$i}}-4-1").removeClass('hidden');
                  });
                  $(".lintasan{{$i}}-4-1").change(function(){
                    $(".lintasan{{$i}}-5-1").removeClass('hidden');
                  });
                </script>
              </tr>
            @endfor
          </tbody>
        </table>
        <button type="submit" class="btn btn-primary pull-right" name="button" id="save-seri1">Simpan</button>
        <input type="hidden" name="event_id" id="event_id" value="{{$event[0]->id}}">
      </div>
    </div>
  </form>
</div>
