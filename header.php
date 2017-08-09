<?php
  session_start();
  if (!isset($_SESSION['u_uid'])) {
 	 header("Location: index.php");
 	 exit();
}

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<header>
   
   <nav>

      <div class="main-wrapper">

       <ul>
         <li>
         
          <a  href="index.php">Home</a>
          
         </li>
       </ul>
        <div class="nav-login">
          
            <?php 
            
            if (isset($_SESSION['u_uid'])) {
               echo '<form action="includes/logout.inc.php" method="POST">
               <button type ="submit" name="submit">Logout</button>
            </form>';
            }
            
            ?>

       </div>
      </div>

   </nav>  

</header>