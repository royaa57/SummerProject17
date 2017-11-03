<?php
 include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
	<h2>Questionnaire</h2>
	<form class="signup-form" action="index.php" method="POST">
		<input type="text" name="name" placeholder="Full Name">
		<input type="text" name="interests" placeholder="Interests">
		<button type="submit" name="submit">Submit</button>
	</form>
		
	</div>

</section>

<?php
include_once 'footer.php'
?>;