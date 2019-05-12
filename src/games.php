<?php
	session_start();
	/*Przekierowanie w przypadku gdy jest się niezalogowanym*/
	if(!isset($_SESSION['zalogowany']))
	{
		header('Location: zaloguj.php');
		exit();
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
					<li><a href="main">Strona Główna</a></li>
					<li><a href="miningpedia">Baza wiedzy</a></li>
					<li><a href="games" class="current">Gry</a></li>
					<li><a href="login">Login</a></li>
					<li><a href="register">Rejestracja</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<!-- Koniec sekcji header -->
	<section class="banner">
		<div class="inner-banner">
			<img src="img/mine_banner.PNG">
		</div>
		<div class="large-inner-banner">
			<img src="img/mine_banner_large.jpg">
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
<section class="gra">
<?php
	echo "<p>Witaj ".$_SESSION['user'].' ! [<a href="logout.php"> Wyloguj się ! </a>]</p>';
?>
<h2> Teraz możesz zagrać w grę: </h2>
<h2><a href="gra.html">ZGADYWANIE HASŁA</a></h2>
</section>
<!--Koniec sekcji trzykolumnowej-->
	<footer>
		<p>&copy; 2019 github.com/azagorowski</p>
	</footer>
<!--Koniec sekcji praw autorskich-->
</body>
</html>