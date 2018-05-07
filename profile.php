<?php
	include 'header.php';
?>


<section class="main-container">
	<div class="main-wrapper">
		<h2>User Profile!!</h2>
		<?php
			if (isset($_SESSION['u_id'])) {
				echo "you are logged in!";
			}
		?>	
	</div>
</section>


<?php
	include 'footer.php';
?>
