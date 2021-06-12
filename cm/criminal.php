<?php
 session_start();
 //if session is not set or logged in is not true
 if( !isset( $_SESSION['loggedin'])||$_SESSION['loggedin']!=true){
 header("location:index.php");
 exit;
}
?>
<?php require 'partials/_nav1.php'?>
 <h1>welcome  <?php echo $_SESSION['username'];?> </h1>
<?php include 'server.php';?>

<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
$comp_no=$_POST["comp_no"];
$criminal_name=$_POST["criminal_name"];
$criminal_address=$_POST["criminal_address"];
$criminal_phone_no=$_POST["criminal_phone_no"];
$status=$_POST["status"];

$criminal_phone_no_check_query = "SELECT * FROM `criminal` where criminal_phone_no = '$criminal_phone_no'  LIMIT 1";
 $result2=mysqli_query($mysqli,$criminal_phone_no_check_query);
 $no2 =mysqli_fetch_assoc($result2);


 
 if(($no2) > 0){
  {
  echo'<script>alert("this criminal number already exists,please give a validate phone number")</script>';
  ?>
  <script>
  window.location.href='basicforms.php';
  </script>
  <?php
  die();  
  }
}

$comp_no_check_query = "SELECT * FROM `complaint` where comp_no = '$comp_no' LIMIT 1";
$result1=mysqli_query($mysqli,$comp_no_check_query);
$no =mysqli_fetch_assoc($result1);

$comp_no_check_query2 = "SELECT * FROM `police` where police_id = '$police_id' LIMIT 1";
$result3=mysqli_query($mysqli,$comp_no_check_query2);
$no3 =mysqli_fetch_assoc($result3); 



if(($no) ==  0){
  echo'<script>alert("please enter the complaint number in complaint form")</script>';
  ?>
  <script>
  window.location.href='basicforms.php';
  </script>
  <?php
  die();  
}else{

$sql = "INSERT INTO `criminal` (`id`,  `comp_no`, `criminal_name`, `criminal_address`, `criminal_phone_no`, `status`) VALUES (NULL, '$comp_no', '$criminal_name', '$criminal_address', '$criminal_phone_no', '$status')";
$result=mysqli_query($mysqli,$sql);
header("location:view_criminal.php");

}

}?>
<!doctype html>
<html lang="en">
  <head>
    <title>criminal</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- background link -->
     <link rel="stylesheet" href="style3.css">
  </head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<div class="container"  >
  <h1 class="text-center"  >fill criminal details</h1>
</div> 
<div class="container col-md-6">
<form action="criminal.php" method="post">
  <div class="form-group">
    <label for="comp_no"> enter complaintent number in the document filled</label>
    <input type="int"   maxlength="4" name="comp_no" class="form-control" id="comp_no" placeholder="comp_no" required>
  </div>

  

  <div class="form-group">
    <label for="criminal_name">enter the criminal name</label>
    <input type="text"    name="criminal_name"  class="form-control" id="criminal_name" placeholder="criminal_name" required>
  </div>

  <div class="form-group">
    <label for="criminal_address">enter the criminal address</label>
    <input type="text"    name="criminal_address"  class="form-control" id="criminal_address" placeholder="criminal_address" required>
  </div>
<div class="form-group">
    <label for="criminal_phone_no"> enter criminal phone number</label>
    <input type="text"   maxlength="10" name="criminal_phone_no" class="form-control" id="criminal_phone_no" placeholder="criminal_phone_no" required>
  </div>


  <div class="form-group">
    <label for="status">the criminal status</label>
    <input type="text"    name="status"  class="form-control" id="status" placeholder="bailed/custody/arrested/released" required>
  </div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
  </body>
</html>