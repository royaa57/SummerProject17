<?php 
   include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<form class="signup-form" action="" method="POST">
		
		<input type="text" name="search" placeholder="Search">
		
		<button type="submit" name="submit">Search</button>
	</form>
	<?php
	if (isset($_POST['submit'])){ 
		include_once 'includes/dbh.inc.php';
		$searchTerm = mysqli_real_escape_string($conn, $_POST['search']);
		echo $searchTerm;
		$sql = "SELECT * FROM `items` WHERE type = '$searchTerm' LIMIT 5";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		while($row=mysqli_fetch_array($result)){ 
			 $name  =$row['name']; 
			 $url=$row['url']; 
			 $filename=$row['filepath'];
			 echo "<ul>\n"; 
			 echo "<li>" . "<a  href=\"".$url."\"><img class=\"search-result\" src=\"pictures/".$filename."\"></a></li>\n"; 
			 echo "</ul>"; 
		}
	
	}else{
		header("Location: search.php");
		exit();
	}
	   
?>
	</div>
</section>

<?php 
   include_once 'footer.php';
 ?>
