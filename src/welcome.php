<?php
	session_start();
	
	if(!isset($_SESSION['udana_rejestracja']))
	{
		header('Location: login.php');
		exit();
	}
	else
	{
		unset($_SESSION['udana_rejestracja']);
	}
?>

<!DOCTYPE html>
<head>
	<meta charset="Utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- widok dla urzadzen mobilnych -->
	<title>Geologiczno-górniczy portal</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<link rel="stylesheet" href="css/fontello.css"> <!-- zrodlo fontów -->
	<link href="css/font-awsome.min.css" rel="stylesheet"/>
	<link rel="shortcut icon" type="image/png" href="img/mineicon.png"/>
</head>
<body>
	<header>
		<div id="inner-header"> <!-- wrapper -->
			<a href="#" id="logo-mine"></a>
			<nav>
				<a href="#" id="menu-icon"></a>
				<ul> <!-- unorder list -->
					<li><a href="index.php">Strona Główna</a></li>
					<li><a href="wbase.php">Baza wiedzy</a></li>
					<li><a href="games.php">Gry</a></li>
					<li><a href="login.php" class="current">Login</a></li>
					<li><a href="register.php">Rejestracja</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<!-- Koniec sekcji header -->
	<section class="banner">
		<div class="inner-banner"><!-- wrapper -->
			<img src="img/mine_banner.png">
		</div>
	</section>
	<!-- Koniec sekcji banner -->
	<section class="small-section-4" id="login">
		<a href="login.php"><td><i class="icon-login"></i></td>
		<h3>Login</h3></a>
	</section>
	<section class="small-section-4" id="register">
		<a href="register.php"><td><i class="icon-user-plus"></i></td>
		<h3>Rejestracja</h3></a>
	</section>
	<section class="small-section-4" id="wbase">
		<a href="wbase.php"><td><i class="icon-search"></i></td>
		<h3>Baza Wiedzy</h3></a>
	</section>
	<section class="small-section-4" id="games">
		<a href="games.php"><td><i class="icon-gamepad"></i></td>
		<h3>Gry</h3></a>
	</section>
<!-- Koniec małych sekcji -->
	<section class="inner-wrapper">
		<article id="article-1-3">
		<p>Konto zostało założone. Teraz możesz się zalogować:</p> 
		<a href="login.php"><h2>KLIKNIJ TUTAJ</h2></a>
		</article>
		<aside id="first-article">
		</aside>
	</section>
	<section class="inner-wrapper-2">
		<article id="second-article">
		
		</article>
		<aside class="second-aside">
			
		</aside>
	</section>
	
<!--Koniec sekcji trzykolumnowej-->
	<footer>
		<p>&copy; 2019 github.com/azagorowski</p>
	</footer>
<!--Koniec sekcji praw autorskich-->
</body>
</html>