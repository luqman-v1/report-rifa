<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Form Rekap Absensi</h2>
   <form method="POST" autocomplete="off" action="{{ route('excel.store') }}"  enctype="multipart/form-data"> 
    @csrf
    {{-- <div class="form-group">
      <label for="usr">Name:</label>
      <input type="text" class="form-control" required name="name">
    </div> --}}
    <div class="form-group">
      <label for="pwd">Email:</label>
      <input required type="text" class="form-control" name="email">
    </div>
       <div class="form-group">
      <label for="pwd">File:</label>
      <input type="file" name="file" class="form-control">
    </div>
     <div class="form-group">
     <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>

</body>
</html>
