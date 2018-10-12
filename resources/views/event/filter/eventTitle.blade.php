<table>
  <tr>
    <td>
      <h5>Acara</h5>
    </td>
    <td style="padding-left:10px;padding-right:10px">:</td>
    <td>
      <h5>
        {{ $event[0]->name." - ".$race_number[0]->name }}
      </h5>
    </td>
  </tr>
  <tr>
    <td>
      <h5>Rekor Peparnas</h5>
    </td>
    <td style="padding-left:10px;padding-right:10px">:</td>
    <td>
      <h5>
        @isset($peparda[0])
          {{ substr($peparda[0]->time, 0, -5).":".substr(substr($peparda[0]->time, -5),0,-3).":".substr($peparda[0]->time, -3) }}
          , {{ $peparda[0]->athlete_name }}
          ({{ $peparda[0]->athlete_address }})
          / {{ $peparda[0]->recorded_at }}
        @endisset
      </h5>
    </td>
  </tr>
  <tr>
    <td>
      <h5>Rekor Peparda</h5>
    </td>
    <td style="padding-left:10px;padding-right:10px">:</td>
    <td>
      <h5>
        @isset($peparnas[0])
          {{ substr($peparnas[0]->time, 0, -5).":".substr(substr($peparnas[0]->time, -5),0,-3).":".substr($peparnas[0]->time, -3) }}
          , {{ $peparnas[0]->athlete_name }}
          ({{ $peparnas[0]->athlete_address }})
          / {{ $peparnas[0]->recorded_at }}
        @endisset
      </h5>
    </td>
  </tr>
</table>
