<?php 
if (session_id()==null)
  session_start();
  if(isset($_SESSION['user'])){
    header("location: views/admin.php");
  }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>app glosario</title>
  <!-- include material design CSS -->
    <link rel="stylesheet" href="libs/css/main.css" />
      <link rel="stylesheet" href="libs/css/bootstrap.min.css" />
  
    <!-- include jquery -->

  <script type="text/javascript" src="libs/js/jquery-2.1.4.min.js"></script>
   
  <!-- material design js -->
  <script src="libs/js/bootstrap.min.js"></script>
   
  <!-- include angular js -->
 
  <!--<script src="libs/js/jquery.dataTables.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
       $('#username').focus();
    });
  </script>-->
</head> 
<body>
<?php if(isset($_SESSION['msj'])){ echo $_SESSION['msj'];} ?>
<!--
<form action="validate/login.php" method="POST">
  <label for="username">Username</label>
  <input type="text" name="username"></input>
  <br>
  <label for="password">Password</label>
  <input type="password" name="password"></input>
  <br>
  <input type="submit" value="Entrar"></input>
</form>-->
<div class="container">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="images/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" action="validate/login.php" method="POST">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" id="inputEmail" class="form-control" name="username" placeholder="usename" required autofocus>
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                <!--<div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>-->
                <input class="btn btn-lg btn-primary btn-block btn-signin" type="submit" value="Entrar"></input>
                <!--<button  type="submit">Entrar</button>-->
            </form><!-- /form -->
            <!--<a href="#" class="forgot-password">
                Forgot the password?
            </a>-->
        </div><!-- /card-container -->
    </div><!-- /container -->
</body>
</html>