<?php
   include_once 'header.php';
?>
<?php
	$dir='pictures';
	#$num=1;
    $files = glob($dir . '/*.*');
    #echo $_GLOBALS['key'];
    
  ?>
  
<?php
if (isset($_POST['material'])){
   $file=$files[$_POST['key']];
   echo '<img width="200px"  src="'.$file.'"><br>';
   echo '<form action="test.php" method="Post"><button type="submit" name="next">Next</button></form>';
   $statement='python -m scripts.label_image --graph=tf_files/retrained_graph.pb  --image='.$file.' 2>&1';
   $i=shell_exec($statement);
   #echo $statement;
   $pattern1 = "/(.+\.jpg)/";

   $new=preg_replace($pattern1, "", $i);
   $pattern2="/([a-zA-Z]+) ([0-9].[0-9]+.e?-?[0-9]?[0-9]?)/";
   preg_match_all($pattern2, $new, $matches);
   $c=count($matches[0]);
   for ($n=0;$n<$c;$n++){
	   echo "<li>".$matches[1][$n]." ".$matches[2][$n]."</li>";
   }
}else{
	$key = array_rand($files);
    $file=$files[$key];
    echo '<img width="200px"  src="'.$file.'"><br>';
    echo '<form action="test.php" method="Post">
    <input type="hidden" name="key" value="'.$key.'" />
    <button type="submit" name="material">Material</button>
    <button type="submit" name="next">Next</button></form>';
}
 ?>
  
<?php
 include_once 'footer.php';
?>
