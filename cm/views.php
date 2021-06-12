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
  <h1 class="text-center" >VIEWS</h1><br>
</div> 
<h3 class="text-center mx-4">POLICE   : <a class="btn btn-dark" href="view_police.php" role="button">VIEW</a><a class="btn btn-dark mx-4" href="case_police.php" role="button">NO_OF_CASES</a></h3>
<h3 class="text-center">COMPLAINT  : <a class="btn btn-dark" href="view_complaint.php" role="button">VIEW</a></h3>
<h3 class="text-center">FIR      : <a class="btn btn-dark" href="view_fir.php" role="button">VIEW</a></h3>
<h3 class="text-center">CASE     : <a class="btn btn-dark" href="view_case.php" role="button">VIEW</a></h3>
<h3 class="text-center">CRIMINAL : <a class="btn btn-dark" href="view_criminal.php" role="button">VIEW</a></h3>
  <br><br><br>

</form>
</div>


