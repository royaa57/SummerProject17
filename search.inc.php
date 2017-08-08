<?php

if (isset($_POST['submit'])) 
{
	echo $_POST['search'];
	include_once 'dbh.inc.php';
	$searchTerm = mysqli_real_escape_string($conn, $_POST['search']);
	if (!preg_match("/^[a-zA-Z]+$/", $searchTerm) || (empty($searchTerm)){
		header("Location: ../search.php");
	}else{
		$sql = "SELECT * FROM `items` WHERE type = '$searchTerm' LIMIT 5";
	    $result = mysqli_query($conn, $sql);
	    #$resultCheck = mysqli_num_rows($result);
	    while($row=mysql_fetch_array($result)){ 
	          $name  =$row['name']; 
	          $url=$row['url']; 
			  echo "<ul>\n"; 
	          echo "<li>" . "<a  href=\"".$url."\">"   .$name.  "</a></li>\n"; 
	  		  echo "</ul>"; 
	  	}
	  	
	}else{
		header("Location: ../search.php");
	}
	    
		