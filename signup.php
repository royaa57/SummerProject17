<?php
   include_once 'indexheader.php';
 ?>

<div class="container-fluid">
  <div class="row">
    <div class="col-xs-1 col-sm-4">
    </div>
    <div class="col-xs-10 col-sm-4">
      <h2>Sign Up</h2>
	     <form action="includes/signup.inc.php" method="POST">
         <div class="form-group">
           <input type="text" class="form-control" name="first" placeholder="First Name">
         </div>
         <div class="form-group">
		       <input type="text" class="form-control" name="last" placeholder="Last Name">
         </div>
         <div class="form-group">
		       <input type="email" class="form-control" name="email" placeholder="E-mail">
         </div>
         <div class="form-group">
		       <input type="text" class="form-control" name="uid" placeholder="User Name">
         </div>
         <div class="form-group">
		       <input type="password" class="form-control" name="pwd" placeholder="Password">
         </div>
		       <button type="submit" name="submit" class="btn btn-default">Sign Up</button>
	     </form>
    </div>
    <div class="col-xs-1 col-sm-4">
    </div>
  </div>
</div>


<?php
include_once 'footer.php';
?>
