<?php
 session_start();
 //if session is not set or logged in is not true
 if( !isset( $_SESSION['loggedin'])||$_SESSION['loggedin']!=true){
 header("location:index.php");
 exit;
}?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- background link -->
    <link rel="stylesheet" href="style4.css">
    <title>login</title>
  </head>
  <body  class= "text-white bg-dark">
  <?php require 'partials/_nav1.php'?>
  
<div class="container">
  <h1 class="text-center" >FORMS</h1><br>
</div> 
<h3 class="text-center mx-4 my-4">POLICE   : <a class="btn btn-dark " href="form.php" role="button">CREATE</a> </h3>
<h3 class="text-center mx-4 my-4">COMPLAINT  : <a class="btn btn-dark" href="complaint.php" role="button">CREATE</a></h3>
<h3 class="text-center ">FIR      : <a class="btn btn-dark" href="fir.php" role="button">CREATE</a><a class="btn btn-dark mx-4" href="update_fir.php" role="button">UPDATE_STATUS</a></h3>
<h3 class="text-center mx-4 my-4">CASE     : <a class="btn btn-dark" href="case.php" role="button">CREATE</a> <a class="btn btn-dark" href="update_case.php" role="button">UPDATE_STATUS</a></h3>
<h3 class="text-center mx-4 my-4">CRIMINAL : <a class="btn btn-dark" href="criminal.php" role="button">CREATE</a></a> <a class="btn btn-dark" href="update_criminal.php" role="button">UPDATE_STATUS</a></a> <a class="btn btn-dark mx-4" href="delete_criminal.php" role="button">DELETE</a></h3>
  <br><br><br>

</form>
</div>

















    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>