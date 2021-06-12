<?php
$showAlert = false;
$showError=false;
include 'partials/_nav.php';
 include 'server.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){

  $username=$_POST["username"];
  $email=$_POST["email"];
  $password1=$_POST["password1"];
  $password2=$_POST["password2"];
  //$exists=false;


  //check whether this username exists
  $existssql= "SELECT * FROM USER WHERE username= '$username' and email = '$email'";
  $result=mysqli_query($mysqli,$existssql);
  $numExistRows = mysqli_num_rows ($result);

  //ill check if exists are not
  if($numExistRows > 0){
    $exists=true;
  }else{
    $exists=false;
  }

  if(($password1 == $password2) && ($exists == false))
  {
    $sql="INSERT INTO user ( `username`, `email`, `password`) VALUES ( '$username', '$email', '$password1')";
   $result=mysqli_query($mysqli,$sql);

   if($result){
    $showAlert = true;
   }

  }else{
    $showError="passwords do not match or already registered";
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
     <link rel="stylesheet" href="style1.css">

    <title>registration</title>
  </head>
  <body class= "text-white bg-dark">
  
  <?php
  if($showAlert){
  echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>success</strong> your account is created you can login.
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
<div class="container"  >
  <h1 class="text-center"  >REGISTER TO CrimelessZone</h1>
</div> 
<div class="container col-md-6">
  <form action="registration.php" method="post">
    <div class="form-group">
    <label for="username">username</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required> 
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group ">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" placeholder="Enter email" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="password1">Password</label>
    <input type="password" name="password1" class="form-control" id="password1" placeholder="Password" required>
  </div>
  <div class="form-group">
    <label for="password2">confirm Password</label>
    <input type="password" name="password2" class="form-control" id="password2" placeholder="Password" required>
    <small id="emailHelp" class="form-text text-muted">make sure to write correct password.</small>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
  <p>Alredy registered login here: <a href="login.php">login</a></p>
</form>
</div>

















    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>