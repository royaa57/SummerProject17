<?php
   include_once 'header.php';
?>
<div class="container">
  <div class="row">
    <div class="col-lg-6 col-md-6">
<?php
	$dir='pictures';
	#$num=1;
    $files = glob($dir . '/*.*');
    #echo $_GLOBALS['key'];

  ?>

<?php
if (isset($_POST['type'])){
   $file=$_POST['file'];
   echo '<img width="200px"  src="'.$file.'"><br>';
   echo '<form action="test.php" method="Post"><input type="hidden" name="file" value="'.$file.'" /><button type="submit" name="material">Material</button><button type="submit" name="next">Next</button></form>';
   #$statement='python -m scripts.label_image --graph=tf_files/retrained_graph.pb  --image='.$file.' 2>&1';
   #$statement='/Users/dreamer/anaconda/bin/python -m scripts.label_image --graph=tf_files_type/retrained_graph.pb  --image='.$file.' 2>&1';
   $statement='/Users/dreamer/anaconda/bin/python -m scripts.label_image --graph=tf_files_type/retrained_graph.pb  --labels=tf_files_type/retrained_labels.txt --image='.$file.' 2>&1';
   #echo $statement;
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
   $file=$_POST['file'];
   echo '<img width="200px"  src="'.$file.'"><br>';
   echo '<form action="test.php" method="Post"><input type="hidden" name="file" value="'.$file.'" /><button type="submit" name="type">Type</button><button type="submit" name="next">Next</button></form>';
   #$statement='python -m scripts.label_image --graph=tf_files/retrained_graph.pb  --image='.$file.' 2>&1';
   $statement='/Users/dreamer/anaconda/bin/python -m scripts.label_image --graph=tf_files_material/retrained_graph.pb --labels=tf_files_material/retrained_labels.txt --image='.$file.' 2>&1';
   #echo $statement;
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
}elseif (isset($_GET['upload'])){
    $file='uploads/'.$_GET['upload'];
    echo '<img width="200px"  src="'.$file.'"><br>';
    echo '<form action="test.php" method="Post">
    <input type="hidden" name="file" value="'.$file.'" />
    <button type="submit" name="type">Type</button>
    <button type="submit" name="material">Material</button>
    <button type="submit" name="next">Next</button></form>';

  }else{
    $key = array_rand($files);
    $file=$files[$key];
    echo '<img width="200px"  src="'.$file.'"><br>';
    echo '<form action="test.php" method="Post">
    <input type="hidden" name="file" value="'.$file.'" />
    <button type="submit" name="type">Type</button>
    <button type="submit" name="material">Material</button>
    <button type="submit" name="next">Next</button></form>';
}
 ?>
</div>
<div class="col-lg-6 col-md-6">
  <form action="upload.php" method="post" enctype="multipart/form-data">
      Select image to upload:
      <input type="file" name="fileToUpload" id="fileToUpload">
      <br>
      <input type="submit" value="Upload Image" name="submit">
  </form>
</div>
</div>
</div>
<?php
 include_once 'footer.php';
?>
