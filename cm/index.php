
<html>
 <head>
  <title>CrimelessZone</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <!-- font link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 </head>
 <body>
  <div class=hero>
   <!-- navabr -->
   <div class="nav-bar">
    <div class="nav-logo">
     <h1><em>CrimelessZone</em></h1>
    </div>
   <div class="nav-links" id="nav-links">
    <ul>
     <i class="fa fa-close" onclick="closeMenu()"></i>
     <a href="#"><li>HOME</li></a>
     <a href="registration.php"><li>REGISTER</li></a>
     <a href="registration_user.php"><li>VIEWREGISTER</li></a>
    
    
    </ul>
    <button type="button" class="btn"><a href="login.php" style="color:white;">LOGIN</a></button><br>
    <button type="button" class="btn "><a href="login_user.php" style="color:white;">VIEWLOGIN</a></button>
   </div>
   <i class="fa fa-bars" onclick="showMenu()"></i>
   </div>
   <div class="banner-title">
    <h1>our <span>Goal is always</span> to maintain <br> <span>peace between</span> humanity.</h1><br>
    <button type="button" class="btn"><a href="registration.php" style="color:white;">EXPLORE</a></button>
   </div>
   <div class="icon-bar">
    <a class="active" href="#"><i class="fa fa-home"></i></a>
     
    <a href="#"><i class="fa fa-facebook"></i></a>
    <a href="#"><i class="fa fa-instagram"></i></a>
    
   </div>
   </div>
  </div>
 </body>
 <script>
  var show = document.getElementById("nav-links");
  function showMenu(){
   show.style.right="0";
  }
  function closeMenu() {
    show.style.right = "-200px";
   }
 </script>
</html>