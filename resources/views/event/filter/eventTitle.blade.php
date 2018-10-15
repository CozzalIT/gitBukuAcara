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
        @isset($peparnas[0])
          @php
          switch (strlen($peparnas[0]->time)) {
            case 6:
            $real_peparnas_time = "0".$peparnas[0]->time;
            break;
            case 5:
            $real_peparnas_time = "00".$peparnas[0]->time;
            break;
            case 4:
            $real_peparnas_time = "000".$peparnas[0]->time;
            break;
            case 3:
            $real_peparnas_time = "0000".$peparnas[0]->time;
            break;
            default:
            $real_peparnas_time = $peparnas[0]->time;
            break;
          }
          @endphp
          {{ substr($real_peparnas_time, 0, -5).":".substr(substr($real_peparnas_time, -5),0,-3).":".substr($real_peparnas_time, -3) }}
          , {{ $peparnas[0]->athlete_name }}
          ({{ $peparnas[0]->athlete_address }})
          / {{ $peparnas[0]->recorded_at }}
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
        @isset($peparda[0])
          @php
          switch (strlen($peparda[0]->time)) {
            case 6:
            $real_peparda_time = "0".$peparda[0]->time;
            break;
            case 5:
            $real_peparda_time = "00".$peparda[0]->time;
            break;
            case 4:
            $real_peparda_time = "000".$peparda[0]->time;
            break;
            case 3:
            $real_peparda_time = "0000".$peparda[0]->time;
            break;
            default:
            $real_peparda_time = $peparda[0]->time;
            break;
          }
          @endphp
          {{ substr($real_peparda_time, 0, -5).":".substr(substr($real_peparda_time, -5),0,-3).":".substr($real_peparda_time, -3) }}
          , {{ $peparda[0]->athlete_name }}
          ({{ $peparda[0]->athlete_address }})
          / {{ $peparda[0]->recorded_at }}
        @endisset
      </h5>
    </td>
  </tr>
</table>
