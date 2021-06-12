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
 <h1>welcome  <?php echo $_SESSION['username'];?> </h1>
<?php include 'server.php';?>
<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $evidence=$_POST["evidence"];
  $witness=$_POST["witness"];
  $suspect=$_POST["suspect"];
  $no_of_trails=$_POST["no_of_trails"];
  $status=$_POST["status"];
  $comp_no=$_POST["comp_no"];
  $police_id= $_POST["police_id"];
  $comp_no_check_query = "SELECT * FROM `case` where comp_no = '$comp_no' LIMIT 1";
 $result1=mysqli_query($mysqli,$comp_no_check_query);
 $no =mysqli_fetch_assoc($result1);


 $comp_no_check_query1 = "SELECT * FROM `complaint` where comp_no = '$comp_no' LIMIT 1";
 $result2=mysqli_query($mysqli,$comp_no_check_query1);
 $no1 =mysqli_fetch_assoc($result2);

$comp_no_check_query2 = "SELECT * FROM `police` where police_id = '$police_id' LIMIT 1";
$result3=mysqli_query($mysqli,$comp_no_check_query2);
$no3 =mysqli_fetch_assoc($result3); 

if(($no3) == 0 )
  {
  echo'<script>alert("please register police details into police id")</script>';
  ?>
  <script>
  window.location.href='case.php';
  </script>
  <?php
  die();  
  }
  if(($no1) == 0 )
  {
  echo'<script>alert("please register complaint details ")</script>';
  ?>
  <script>
  window.location.href='case.php';
  </script>
  <?php
  die();  
  }
  if(($no) > 0){
  if(strcasecmp($no['comp_no'],$comp_no)==0){
  echo'<script>alert("the case with this complaint number already exists")</script>';
  ?>
  <script>
  window.location.href='case.php';
  </script>
  <?php
  die();  
  }
}
else{
$sql = "INSERT INTO `case` (`id`, `comp_no`, `police_id`, `evidence`, `witness`, `suspect`, `no_of_trails`, `status`) VALUES (NULL, '$comp_no', '$police_id', '$evidence', '$witness', '$suspect', '$no_of_trails', '$status')";
$result=mysqli_query($mysqli,$sql);
header("location:view_case.php");}}
 ?>
 
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
  <h1 class="text-center"  >fill case details</h1>
</div> 
<form action="case.php" method="post">
<div class="container col-md-6">

  <div class="form-group">
    <label for="comp_no"> enter complaintent number in the document filled</label>
    <input type="int"   maxlength="4" name="comp_no" class="form-control" id="comp_no" placeholder="comp_no" required>
  </div>

  <div class="form-group">
    <label for="police_id"> enter police id</label>
    <input type="int"   maxlength="4" name="police_id" class="form-control" id="police_id" placeholder="police_id" required>
  </div>

<div class="form-group">
    <label for="evidence">Enter the evidences</label>
    <textarea input type ="text" class="form-control" name="evidence" maxlength="1000" id="evidence" rows="3" required></textarea>
  </div>
  <div class="form-group">
    <label for="witness">Enter the witnesses </label>
    <textarea input type ="text" class="form-control" name="witness" maxlength="1000" id="witness" rows="3" required></textarea>
  </div>
  <div class="form-group">
    <label for="suspect">Enter the suspects</label>
    <textarea input type ="text" class="form-control" name="suspect" maxlength="1000" id="suspect" rows="3" required></textarea>
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