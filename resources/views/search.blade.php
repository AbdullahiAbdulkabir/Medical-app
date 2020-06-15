
<!DOCTYPE html> 
<html lang="en">
<head>
  <title>Ailments</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

</head>
<body>

<div class="container">          
  <table class="table table-dark table-striped" id="myTable">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(window).on("load", function () {
        $.get("https://camp.mssnlagos.net/mssn_admin/ailments", function (data) {

            var result = JSON.parse(data);
            console.log(data)
            // $.each(result, function (i, item) {
            //     $('#myTable tbody').append('<tr><td>' + item.firstname + '</td><td>' + item.surname + '</td></tr>');
            // });
        });

    });
</script>
</body>
</html>