<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SpaceDust</title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tween.js/17.2.0/Tween.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>
	<script src="https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/js/TweenLite.min.js"></script>
	<script src="http://static.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js"></script>
	<script src="https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/js/EasePack.min.js"></script>
	<script src="https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/js/rAF.js"></script>

</head>
<body>


<header>
	<nav>
		<div class="main-wrapper">
			<ul>
				<li><a href="index.php">SpaceDust</a></li>
			</ul>
			<div class="nav-login">
				<?php 
					if (isset($_SESSION['u_id'])) {
						echo '
						<form action="includes/logout.inc.php" method="POST">
							<button type="submit" name="submit">Logout</button>
						</form>
						';
					} else{
						echo '
						<form action="includes/login.inc.php" method="POST">
							<input type="text" name="uid" placeholder="username/email">
							<input type="password" name="pwd" placeholder="password">
							<button type="submit" name="submit">LOGIN</button>
						</form>
						<a href="signup.php">SIGN UP</a>
						';
					}
				?>
				
				
			</div>
		</div>
	</nav>
</header>

	
	