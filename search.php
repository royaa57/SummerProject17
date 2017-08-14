<?php
   include_once 'header.php';
?>

<div class="container-fluid">
		<form action="" method="POST">
        <div class="input-group">
          <input type="text" class="form-control" name="search" placeholder="Search">
          <div class="input-group-btn">
            <button class="btn btn-default" name="submit" type="submit">
              <i class="glyphicon glyphicon-search"></i>
            </button>
          </div>
        </div>
	  </form>
	<?php
	if (isset($_POST['submit'])){
		include_once 'includes/dbh.inc.php';
		$searchTerm = mysqli_real_escape_string($conn, $_POST['search']);
		$sql = "SELECT * FROM `items` WHERE type = '$searchTerm' LIMIT 5";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
    if ($resultCheck>0){
      $i=1;
		  while($row=mysqli_fetch_array($result)){
        if ($i==1){
          echo '<div class="row">';
        }
        echo '<div class="col-md-4"><div class="thumbnail">';
        $name  =$row['name'];
			  $url=$row['url'];
			  $filename=$row['filepath'];
        echo '<a  href="'.$url.'"><img class=".img-responsive" src="pictures/'.$filename.'"></a></div></div>';
        $i=$i+1;
        if ($i==4){
          echo '</div>';
          $i=$i%3;
        }
		  }

   }else{
      echo 'No matching images';
    }

	}else{
		header("Location: search.php");
		exit();
	}

?>
</div>
<?php
   include_once 'footer.php';
 ?>
