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
 
  
  
  
  $criminal_phone_no=$_POST["criminal_phone_no"];


 $criminal_phone_no_check_query = "SELECT * FROM `criminal` where criminal_phone_no = '$criminal_phone_no'  limit 1 ";
 $result1=mysqli_query($mysqli,$criminal_phone_no_check_query);
 $no =mysqli_fetch_assoc($result1);


 
 if(($no) == 0){
  {
  echo'<script>alert("this criminal number dosent exists")</script>';
  ?>
  <script>
  window.location.href='basicforms.php';
  </script>
  <?php
  die();  
  }
}
else{
$sql = "DELETE  FROM `criminal` where criminal_phone_no = '$criminal_phone_no' ";
$result=mysqli_query($mysqli,$sql);
header("location:view_criminal.php");
}
} ?>
 
<!doctype html>
<html lang="en">
  <head>
    <title>case</title>
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
  <h1 class="text-center"  >delete criminal data</h1>
</div> 
<form action="delete_criminal.php" method="post">
<div class="container col-md-6">
<div class="form-group">
    <label for="criminal_phone_no"> enter criminal phone number</label>
    <input type="text"   maxlength="10" name="criminal_phone_no" class="form-control" id="criminal_phone_no" placeholder="criminal_phone_no" required>
  </div>
  
   


<button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
  </body>
</html> 