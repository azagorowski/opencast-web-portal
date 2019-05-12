<!DOCTYPE html>
<head>
	<meta charset="Utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- widok dla urzadzen mobilnych -->
	<title>Portal górnictwa odkrywkowego</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<link rel="stylesheet" href="css/fontello.css"> <!-- zrodlo fontów -->
	<link href="css/font-awsome.min.css" rel="stylesheet"/>
	<link rel="shortcut icon" type="image/png" href="img/mineicon.png"/>
	
	<!-- Styles and scripts for slider -->
	<link href="https://fonts.googleapis.com/css?family=Nova+Mono" rel="stylesheet">
	<link rel="stylesheet" href="slider-ib/style-ib.css" type="text/css" />
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>	
	<script src="slider-ib/script-ib.js"></script>
</head>
<body>
	<header>
		<div id="inner-header"> <!-- wrapper -->
			<a href="#" id="logo-mine"></a>
			<nav>
				<a href="#" id="menu-icon"></a>
				<ul> <!-- unorder list -->
					<li><a href="main" class="current">Strona Główna</a></li>
					<li><a href="miningpedia">Baza wiedzy</a></li>
					<li><a href="games">Gry</a></li>
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
	<section class="inner-wrapper">
		<article id="article-1-3">
			<!-- <img src="img/om-1.png"> -->
			<div class="container">
				<div id="slider">
					<ul class="slides">
						<li class="slide slide1"></li>
						<li class="slide slide2"></li>
						<li class="slide slide3"></li>
						<li class="slide slide1"></li>
					</ul>
				</div>
			</div>
		</article>
		<aside id="first-article">
		<h2>O PORTALU.</h2>
		<p>Portal o tematyce górnictwa odkrywkowego wykonany w celach niekomercyjnych przy zastosowaniu technologii: JavaScript, jQuery, PHP, MySQL, HTML5, CSS3. 
		</aside>
	</section>
	<section class="inner-wrapper-2">
		<article id="second-article">
		<h2>DEFININICJA GÓRNICTWA.</h2>
		<p>Górnictwo – dziedzina przemysłu obejmująca ogół działalności zmierzającej do wydobycia kopaliny i jej przygotowania w procesie wzbogacania (przeróbczym) do zastosowania w różnych dziedzinach przemysłu bądź bezpośredniego wykorzystania w życiu codziennym.</p>
		</article>
		<aside class="second-aside">
			<img src="img/om-2.png">
		</aside>
	</section>
	<section class="inner-wrapper-3">
		<article id="article-3-3">
			<img src="img/om-3.png">
		</article>
		<aside id="third-article">
		<h2>GÓRNICTWO ODKRYWKOWE</h2>
		<p>Jeden z trzech głównych rodzajów górnictwa (pozostałe: górnictwo podziemne oraz otworowe). Wszelkie prace wydobywcze wykonywane są na powierzchni, a proces wydobywczy odbywa się poprzez odkrywanie kolejnych warstw kopaliny.</p>
		<p>Trzy największe kopalnie odkrywkowe na świecie to: Bingham Canyon (USA), Mirny (Rosja), Grasberg (Indonezja).</p>
		</aside>
	</section>
<!--Koniec sekcji dwukolumnowej-->
	<footer>
		<p>&copy; 2019 github.com/azagorowski</p>
	</footer>
<!--Koniec sekcji praw autorskich-->
</body>
</html>