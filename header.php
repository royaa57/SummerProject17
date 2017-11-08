<?php

  session_start();
  if (!isset($_SESSION['u_uid'])) {
 	 header("Location: index.php");
 	 exit();
 }
 $pageName=basename($_SERVER['PHP_SELF']);
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
        <li class="<?php  echo ( $pageName == '' || $pageName == 'index.php' )? 'active': ''?>">
          <a  href="index.php">Home</a>
        </li>
        <li class="<?php  echo ( $pageName == 'search.php')? 'active': ''?>">
          <a  href="search.php">Search</a>
        </li>
        <li class="<?php  echo ( $pageName == 'test.php')? 'active': ''?>">
          <a  href="test.php">Test</a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php
          if (isset($_SESSION['u_uid'])) {
               echo '<li><form class="navbar-form navbar-right" action="includes/logout.inc.php" method="POST">
               <button type ="submit" name="submit" class="btn btn-default">Logout</button>
            </form></li>';
          }
          ?>
      </ul>
    </div>
  </nav>
