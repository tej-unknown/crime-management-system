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
<?php include 'server.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $police_name=$_POST["police_name"];
  $police_department=$_POST["police_department"];
  $police_id=$_POST["police_id"];
  $police_station_name=$_POST['police_station_name'];
$comp_no_check_query2 = "SELECT * FROM `police` where police_id = '$police_id' LIMIT 1";
$result3=mysqli_query($mysqli,$comp_no_check_query2);
$no3 =mysqli_fetch_assoc($result3); 

if(($no3) > 0 )
  {
  echo'<script>alert("the police details has been already registerd")</script>';
  ?>
  <script>
  window.location.href='form.php';
  </script>
  <?php
  die();  
  }

  else{
  $sql = "INSERT INTO `police` (`id`, `police_name`, `police_department`, `police_station_name`, `police_id`,`no_of_cases`) VALUES (NULL, '$police_name', '$police_department', '$police_station_name', '$police_id','0')";

   $result=mysqli_query($mysqli,$sql);
  header("location:complaint.php");}

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
    <!-- background link -->
     <link rel="stylesheet" href="style3.css">
  </head>
  <body >
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<form action="form.php" method="post">
<div class="container"  >
  <h1 class="text-center"  >POLICE</h1>
</div> 
<div class="container col-md-6">
    <div class="form-group">
    <label for="police_name">police name</label>
    <input type="text" class="form-control" id="police_name" name="police_name" placeholder="Enter policename" required> 
  </div>
  <div class="form-group ">
    <label for="police_department">enter department name</label>
    <input type="text" class="form-control" id="police_department" aria-describedby="police_department" name="police_department" placeholder="Enter police department" required>
  </div>
  <div class="form-group ">
    <label for="police_station_name">enter station name</label>
    <input type="text" class="form-control" id="police_station_name" aria-describedby="police_station_name" name="police_station_name" placeholder="Enter police station name" required>
  </div>
  <div class="form-group">
    <label for="police_id"> enter police id</label>
    <input type="int"   maxlength="4" name="police_id" class="form-control" id="police_id" placeholder="police_id" required>
  </div>
 

  <button type="submit" class="btn btn-primary">Submit</button>





</form>
  </body>
</html>