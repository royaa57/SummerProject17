<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="new-style.css">
</head>
<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
       <ul class="nav navbar-nav">
         <li>
           <a  href="index.php">Home</a>
         </li>
       </ul>
       <ul class="nav navbar-nav navbar-right">
         <?php
            if (isset($_SESSION['u_uid'])) {
               echo '<li><form class="navbar-form navbar-right" action="includes/logout.inc.php" method="POST">
               <button type ="submit" name="submit" class="btn btn-default">Logout</button>
            </form></li>';
            }
            else{
               echo '<li><form class="navbar-form navbar-right" action="includes/login.inc.php" method="POST">
               <div class="form-group"><input type="text" name="uid" placeholder="Username/e-mail"></div>
               <div class="form-group"><input type="password" name="pwd" placeholder="Password"></div>
               <button type="submit" name="submit" class="btn btn-default">Login</button></form></li>
               <li><a href="signup.php">Sign Up</a></li>';
             }
            ?>
        </ul>
      </div>
  </nav>
