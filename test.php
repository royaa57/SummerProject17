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
if (isset($_POST['type'])){
   $file=$files[$_POST['key']];
   echo '<img width="200px"  src="'.$file.'"><br>';
   echo '<form action="test.php" method="Post"><button type="submit" name="material">Material</button><button type="submit" name="next">Next</button></form>';
   $statement='python -m scripts.label_image --graph=tf_files_type/retrained_graph.pb -labels=tf_files_type/retrained_labels.txt --image='.$file.' 2>&1';
   #$statement='/Users/dreamer/anaconda/bin/python -m scripts.label_image --graph=tf_files_type/retrained_graph.pb  --image='.$file.' 2>&1';
   #$statement='/Users/dreamer/anaconda/bin/python -m scripts.label_image --graph=tf_files_type/retrained_graph.pb  --labels=tf_files_type/retrained_labels.txt --image='.$file.' 2>&1';

   $i=shell_exec($statement);
   #echo $i;
   $pattern1 = "/(.+\.jpg)/";

   $new=preg_replace($pattern1, "", $i);
   $pattern2="/([a-zA-Z]+) ([0-9].[0-9]+.e?-?[0-9]?[0-9]?)/";
   preg_match_all($pattern2, $new, $matches);
   $c=count($matches[0]);
   for ($n=0;$n<$c;$n++){
	   echo "<li>".$matches[1][$n]." ".$matches[2][$n]."</li>";
   }
}
elseif (isset($_POST['material'])){
   $file=$files[$_POST['key']];
   echo '<img width="200px"  src="'.$file.'"><br>';
   echo '<form action="test.php" method="Post"><button type="submit" name="type">Type</button><button type="submit" name="next">Next</button></form>';
   $statement='python -m scripts.label_image --graph=tf_files_material/retrained_graph.pb  --labels=tf_files_material/retrained_labels.txt --image='.$file.' 2>&1';
   #$statement='/Users/dreamer/anaconda/bin/python -m scripts.label_image --graph=tf_files_material/retrained_graph.pb --labels=tf_files_material/retrained_labels.txt --image='.$file.' 2>&1';

   $i=shell_exec($statement);
   #echo $i;
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
    <button type="submit" name="type">Type</button>
    <button type="submit" name="material">Material</button>
    <button type="submit" name="next">Next</button></form>';
}
 ?>

<?php
 include_once 'footer.php';
?>
