<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
  include 'server.php';
  $username=$_POST["username"];
  $password1=$_POST["password"];
  
  $result = mysqli_query($mysqli, "SELECT * FROM user_view WHERE username='$username' AND password ='$password1'");
 /* $sql="SELECT * FROM user 
        WHERE username='$username' AND password1='$password1'";
  $result=mysqli_query($mysqli,$sql);*/
  $num = mysqli_num_rows($result);
  if($num == 1){
    $login = true;
    //user logs in with his username and password 
    session_start();
    $_SESSION['loggedin']= true;
    $_SESSION['username']= $username;
    $_SESSION['password']= $password1;
    header("location:views_user.php");
  }

else{
    $showError="invalid login";
  }
}

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- background link -->
     <link rel="stylesheet" href="style2.css">
    <title>login_user</title>
  </head>
  <body  class= "text-white bg-dark">
  <?php require 'partials/_nav3.php'?>
  <?php
  if($login){
  echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>success</strong> your account is logged in.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
  }
  // if passwords do not match
  if($showError){
  echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>ERROR</strong> '. $showError.'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
  }
?>
<div class="container">
  <h1 class="text-center" >Login to CrimelessZone users view only</h1>
</div> 
<div class="container col-md-6">
  <form action="login_user.php" method="post">
    <div class="form-group">
    <label for="username">username</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required> 
  </div>
  
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
  <p>Not yet registered click: <a href="registration_user.php" class="text-white">REGISTER to user view only</a> </p>
</form>
</div>