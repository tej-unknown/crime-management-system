<?php
 session_start();
 //if session is not set or logged in is not true
 if( !isset( $_SESSION['loggedin'])||$_SESSION['loggedin']!=true){
 header("location:index.php");
 exit;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
  
    <!-- background link -->
     <link rel="stylesheet" href="style3.css">
  
  </head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- datatable jquery -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script>$(document).ready( function () {
             $('#myTable').DataTable();
            } );
    </script>
  
  <?php 
 require 'partials/_nav1.php';
 include 'server.php';?>

 
 <?php
  $sql = "SELECT * FROM `police`";
  $result=mysqli_query($mysqli,$sql);
  $sno=0;
?>
<div class="container my-4" >
<hr>
<table class="table table-dark text-dark" id="myTable">
  <thead>
    <tr>
      <th scope="col" class="text-white">sl.no</th>
      <th scope="col" class="text-white">police_name</th>
      <th scope="col" class="text-white">police_department</th>
      <th scope="col" class="text-white">police_station_name</th>
      <th scope="col" class="text-white">police_id</th>
      
    </tr>
  </thead>
  <tbody>
  <?php while($row = mysqli_fetch_assoc($result)){
   $sno=$sno+1;
  echo"
 
    <tr>
      <th scope='row'>" . $sno . "</th>
      <td>" . $row['police_name'] . "</td>
      <td>" . $row['police_department'] . "</td>
      <td>" . $row['police_station_name'] . "</td>
      <td>" . $row['police_id'] . "</td>
     
    </tr>";}
    ?>
  </tbody>
</table>
<!-- for the line -->
<hr>
</div>
  </body>
</html>
