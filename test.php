<?php
   include_once 'header.php';
?>
<form action="test.php" method="Post">
  <input type="text"><br>
  <button type="submit" name="submit">Search</button>
</form>
<?php
if (isset($_POST['submit'])){
  #$res=system('add.py',$retval);
  #echo $r;
  #$i =`python add.py`;
  $i=shell_exec('python -m scripts.label_image --graph=tf_files/retrained_graph.pb  --image=Baxton-Studio-Vino-Modern-Upholstered-Full-size-Bed-Headboard-P15358380.jpg 2>&1');
  #$i=shell_exec('/Users/dreamer/anaconda/bin/python -V 2>&1');
  echo $i;
}
 ?>
<?php
 include_once 'footer.php';
?>
