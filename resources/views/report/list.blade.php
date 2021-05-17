<!DOCTYPE html>
<html lang="en">
<head>
    <title>Report</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.min.css">

    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">

    <!--===============================================================================================-->
</head>
<body>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
              <table class="table">
                  <thead>
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">Tanggal</th>
                          <th scope="col">Opsi</th>
                      </tr>
                  </thead>
                  <tbody>
                  @php
                      $count = 1;
                  @endphp
                  @foreach($report_all as $key => $value)
                      <tr>
                          <th scope="row">{{ $count }}</th>
                          <td>{{ $key }}</td>
                          <td> <a href="{{ route('report.delete',$key) }}" <button type="button" class="btn btn-danger">Hapus</button></a></td>
                      </tr>
                      @php
                          $count +=1;
                      @endphp
                  @endforeach
                  </tbody>
              </table>

            </div>
        </div>
    </div>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>

