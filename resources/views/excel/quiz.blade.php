<html>

<head>
  <title>quiz</title>
</head>
<body>
  <table>
    <thead>
      <tr>
        @foreach($headers as $header)
        <th>{{ str_replace('_',' ',$header) }}</th>
        @endforeach
      </tr>
    </thead>
    <tbody>
      @foreach($rows as $row)
        @php
      $row = $row->sortByDesc('sum_nilai')->unique('tanggal_webbinar');
      @endphp
      @foreach($row as $r)
      @php
      // dd($r);
      @endphp
       <tr>
      @foreach($r as $k => $v)
      @php
        if($k == 'waktu_mulai'){
          $v = \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($v))->format('m-d-Y H:i:s');
        }

        if($k == 'waktu_selesai'){
          $v = \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($v))->format('m-d-Y H:i:s');
        }
      @endphp
        <td>{{ $v }}</td>
      @endforeach
      </tr>
      @endforeach
      @endforeach
    </tbody>
  </table>
</body>
</html>