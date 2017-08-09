<?php 
   include_once 'indexheader.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<?php

		  if (isset($_SESSION['u_uid'])) {
		    echo '<h2> Welcome Back</h2>','</br>',
		     '<h3> <a href="images.php">Images you liked </a></h3>';

		  }
		?>
	</div>

</section>

<?php 
   include_once 'footer.php';
 ?>