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
            <div class="col-md-8">
                <form method="POST" action="{{ route('report.generate') }}">
                    @csrf
                    <div class="form-group fieldGroup">
                        <input class="form-control" autocomplete="off" type="text" name="nama" placeholder="nama">
                    </div>
                    <div class="form-group fieldGroup">
                        <input class="form-control" autocomplete="off" type="text" name="email" placeholder="email">
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary btn-sm" value="Generate" />
                </form>
            </div>
        </div>
    </div>


    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/tilt/tilt.jquery.min.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>


    <script>
        $(document).ready(function() {
            // membatasi jumlah inputan
            var maxGroup = 11;

            //melakukan proses multiple input 
            $(".addMore").click(function() {
                if ($('body').find('.fieldGroup').length <= maxGroup) {
                    var fieldHTML = '<div class="form-group fieldGroup">' + $(".fieldGroupCopy").html() + '</div>';
                    $('body').find('.fieldGroup:last').after(fieldHTML);
                } else {
                    alert('Maximum 10 groups are allowed.');
                }
            });

            //remove fields group
            $("body").on("click", ".remove", function() {
                $(this).parents(".fieldGroup").remove();
            });
        });

        $('#date').datepicker({
            format: "yyyy-mm-dd",

        });

    </script>


</body>
</html>

