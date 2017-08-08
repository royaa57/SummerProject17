<?php 
   include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<?php
		  if (isset($_SESSION['u_id'])) {
		    echo '<h2> Welcome Back </h2>';
		  }
		?>
	</div>

</section>

<?php 
   include_once 'footer.php';
 ?>
