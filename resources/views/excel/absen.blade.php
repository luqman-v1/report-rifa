<html>

<head>
  <title>absen</title>
</head>

<body>
  <table>
    <thead>
      <tr>
        <th>pengecekan</th>
        <th>Nopek</th>
        <th>Nama</th>
        <th>Fungsi</th>
        <th>Direktorat</th>
        <th>Tgl Webinar</th>
        <th>BulanTgl Webinar</th>
        <th>Judul</th>
      </tr>
    </thead>
    <tbody>
      @foreach($datas as $data)
      <tr>
        <th>{{ $data['nopek'] .'_'. $data['tgl_webinar']  }}</th>
        <th>{{ $data['nopek'] }}</th>
        <td>{{ $data['nama'] }}</td>
        <td>{{ $data['fungsi'] }}</td>
        <td>{{ $data['direktorat'] }}</td>
        <td>{{$data['tgl_webinar']}}</td>
        <td>{{$data['bulantgl_webinar']}}</td>
        <td></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>

</html>