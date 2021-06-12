<?php
 session_start();
 //if session is not set or logged in is not true
 if( !isset( $_SESSION['loggedin'])||$_SESSION['loggedin']!=true){
 header("location:index.php");
 exit;
}
?>
<!-- program  -->
<?php require 'partials/_nav1.php'?>
<?php include 'server.php';?>
<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
  
  $no_of_trails=$_POST["no_of_trails"];
  $status=$_POST["status"];
  $comp_no=$_POST["comp_no"];


 $comp_no_check_query = "SELECT * FROM `case` where comp_no = '$comp_no' ";
 $result1=mysqli_query($mysqli,$comp_no_check_query);
 $no =mysqli_fetch_assoc($result1);


 $comp_no_check_query1 = "SELECT * FROM `complaint` where comp_no = '$comp_no' LIMIT 1";
 $result2=mysqli_query($mysqli,$comp_no_check_query1);
 $no1 =mysqli_fetch_assoc($result2);

 if(($no1) == 0 )
  {
  echo'<script>alert("please register complaint details ")</script>';
  ?>
  <script>
  window.location.href='basicforms.php';
  </script>
  <?php
  die();  
  }
 if(($no) == 0){
  if(strcasecmp($no['comp_no'],$comp_no)==0){
  echo'<script>alert("the case with this complaint number dosent exists")</script>';
  ?>
  <script>
  window.location.href='basicforms.php';
  </script>
  <?php
  die();  
  }
}
else{
$sql = "UPDATE `case` SET `status` = '$status' ,  `no_of_trails` = '$no_of_trails'  WHERE `comp_no` ='$comp_no' ";
$result=mysqli_query($mysqli,$sql);
header("location:view_case.php");}
} ?>
 
<!doctype html>
<html lang="en">
  <head>
    <title>update case</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- background link -->
     <link rel="stylesheet" href="style3.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
  </head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<div class="container"  >
  <h1 class="text-center"  >update case status</h1>
</div> 
<form action="update_case.php" method="post">
<div class="container col-md-6">
<div class="form-group">
    <label for="comp_no"> enter complaintent number in the document filled</label>
    <input type="int"   maxlength="4" name="comp_no" class="form-control" id="comp_no" placeholder="comp_no" required>
  </div>
  <div class="form-group">
    <label for="no_of_trails"> enter number of trails </label>
    <input type="number"   maxlength="3" name="no_of_trails" class="form-control"  id="no_of_trails" placeholder="no_of_trails" required>
  </div>
   
  <div class="form-group">
    <label for="status">the case status</label>
    <input type="text"    name="status"  class="form-control" id="status" placeholder="solved/unsolved" required>
  </div>

<button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
  </body>
</html> 