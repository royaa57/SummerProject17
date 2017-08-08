<?php

if (isset($_POST['submit'])) {
	#echo $_POST['search'];
	include_once 'dbh.inc.php';
	$searchTerm = mysqli_real_escape_string($conn, $_POST['search']);
	if (!preg_match("/^[a-zA-Z]+$/", $searchTerm) || empty($searchTerm)){
		header("Location: ../search.php");
		exit();
	}else{
		#echo $searchTerm;
		$sql = "SELECT * FROM `items` WHERE type = '$searchTerm' LIMIT 5";
		#echo $sql;
	    $result = mysqli_query($conn, $sql);
	    #$resultCheck = mysqli_num_rows($result);
	    #echo $resultCheck;
	    while($row=mysqli_fetch_array($result)){ 
	        $name  =$row['name']; 
	        $url=$row['url']; 
	        $filename=$row['filepath'];
			echo "<ul>\n"; 
	        echo "<li>" . "<a  href=\"".$url."\"><img src=\"../images/".$filename."\"></a></li>\n"; 
	  		echo "</ul>"; 
	  	}
	}
}else{
	header("Location: ../search.php ");
	exit();
}
?>
	    
		