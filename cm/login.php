<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
  include 'server.php';
  $username=$_POST["username"];
  $password1=$_POST["password"];
  
  $result = mysqli_query($mysqli, "SELECT * FROM user WHERE username='$username' AND password ='$password1'");
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
    header("location:basicforms.php");
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
    <title>login</title>
  </head>
  <body  class= "text-white bg-dark">
  <?php require 'partials/_nav.php'?>
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
  <h1 class="text-center" >Login to CrimelessZone</h1>
</div> 
<div class="container col-md-6">
  <form action="login.php" method="post">
    <div class="form-group">
    <label for="username">username</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required> 
  </div>
  
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
  <p>Not yet registered click: <a href="registration.php" class="text-white">REGISTER</a> </p>
</form>
</div>

















    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>