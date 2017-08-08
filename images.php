<?php 
   include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<?php
		  if (isset($_SESSION['u_uid'])) 
		   {
            $files= glob("images/*.*");

            for ($i=0; ($i < min(5,count($files)) ; $i++) { 
            	$num = $files[$i];
            	echo '<img src = "'.$num.'"
                alt = "L"
                width ="200"
                height ="170">'."&nbsp;&nbsp";
            	
            }
          
            }
		?>
	</div>

</section>

<?php 
   include_once 'footer.php';
 ?>
