<?php
	session_start();
	/* Sprawdzanie czy formularz został przesłany*/
	if (isset($_POST['email']))
	{
		//Udana walidacja?
		$wszystko_OK=true;
		
		//Sprawdzanie poprawności nazwy uzytkownika
		$nick = $_POST['nick'];
		
		//Sprawdzenie długości nazwy użytkownika
		if ((strlen($nick)<3) || (strlen($nick)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_nick']="Nazwa użytkownika powinna składać się z minimum 3 znaków, a maksymalnie 20 .";
		}
		
		// ctype_alnum - sprawdza czy we wprowiadczone pole został wprowadzony typ alfanumeryczny
		if (ctype_alnum($nick)==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_nick']="Nazwa użytkownika może składać się tylko z liter i cyfr (bez polskich znaków).";
		}
		
		//Sprawdzanie poprawności adresu e-mail (filter_var - filtrowanie zmiennej przej określony parametr funkcji)
		$email = $_POST['email'];
		//emailB - email po sanityzacji - wyczyszczenie źrodla z potencjalnych groznych zapisow
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
		{
			$wszystko_OK=false;
			$_SESSION['e_email']="Proszę podać adres e-mail składajacy się z liter i cyfr.";
		}
		
		//Sprawdzanie poprawności hasłą
		$passw1 = $_POST['passw1'];
		$passw2 = $_POST['passw2'];
		
		if ((strlen($passw1)<6) || (strlen($passw1)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_passw']="Hasło musi posiadać od 6 do 20 znaków.";
		}
		
		if ($passw1!=$passw2)
		{
			$wszystko_OK=false;
			$_SESSION['e_passw']="Podane hasła muszą być identyczne.";
		}
		
		//PASSWORD_DEFAULT - używa najsliniejszego obecnie algorytmu hashującego
		$passw_hash = password_hash($passw1, PASSWORD_DEFAULT);
		
		//Akceptacja regulaminu
		if(!isset($_POST['regulamin']))
		{
			$wszystko_OK=false;
			$_SESSION['e_regulamin']="Proszę potwierdzić akceptację regulaminu.";
		}
		
		require_once "connect.php";
		
		//Zamiast rzucania ostrzezen będa rzucane wyjatki w przypadku bledu serwera
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try
		{
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			} else {
				
				//W przytpadku gdy podany email istnieje:
				$rezultat = $polaczenie->query("SELECT id FROM users WHERE email='$email'");
				
				if(!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_samych_maili = $rezultat->num_rows;
				If($ile_takich_samych_maili>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_email']="Istnieje już konto przypisane do tego adresu e-mail.";
				}
				
				//W przytpadku gdy podany nick istnieje:
				$rezultat = $polaczenie->query("SELECT id FROM users WHERE user='$nick'");
				
				if(!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_samych_nickow = $rezultat->num_rows;
				//W przypadku gyd nick znaleziono przestawiamy flage na wszystko_OK na false
				If($ile_takich_samych_nickow>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_nick']="Istnieje uzytkownik z taką samą nazwą. Proszę wybrać inną.";
				}
				
				if($wszystko_OK==true)
				{
					//Wszystko OK - dodajemy uzytkownika do bazy
					if ($polaczenie->query("INSERT INTO users VALUES (NULL, '$nick', '$passw_hash','$email', 30)"))
					{
						$_SESSION['udana_rejestracja']=true;
						header('Location: welcome.php');
					} else {
						throw new Exception($polaczenie->error);
					}
				}
				
				$polaczenie->close();
			}
		}
		catch(Exception $e)
		{
			echo '<h2>Błąd serwera! Rejestracja możliwa w innym terminie.</h2>';
		}		
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
					<li><a href="games">Gry</a></li>
					<li><a href="login">Login</a></li>
					<li><a href="register" class="current">Rejestracja</a></li>
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
		<a href="login"><td><i class="icon-login"></i></td>
		<h3>Login</h3></a>
	</section>
	<section class="small-section-4" id="register">
		<a href="register"><td><i class="icon-user-plus"></i></td>
		<h3>Rejestracja</h3></a>
	</section>
	<section class="small-section-4" id="wbase">
		<a href="miningpedia"><td><i class="icon-search"></i></td>
		<h3>Baza Wiedzy</h3></a>
	</section>
	<section class="small-section-4" id="games">
		<a href="games"><td><i class="icon-gamepad"></i></td>
		<h3>Gry</h3></a>
	</section>
<!-- Koniec małych sekcji -->
	<section class="inner-wrapper">
		<article id="article-1-3">
		<h2>Rejestracja</h2>
			<p>Wypełnij poniższe pola, aby założyć konto.</p>
			<form method="post">
				<p>Nazwa użytkownika:</p> <br/> <input type="text" name="nick"/> <br />
				<?php
					If (isset($_SESSION['e_nick']))
					{
						echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
						unset($_SESSION['e_nick']);
					}
				?>
				<p>E-mail:</p> <br/> <input type="text" name="email"/> <br />
				<?php
					If (isset($_SESSION['e_email']))
					{
						echo '<div class="error">'.$_SESSION['e_email'].'</div>';
						unset($_SESSION['e_email']);
					}
				?>
				<p>Twoje hasło:</p> <br/> <input type="password" name="passw1"/> <br />
				<?php
					If (isset($_SESSION['e_passw']))
					{
						echo '<div class="error">'.$_SESSION['e_passw'].'</div>';
						unset($_SESSION['e_passw']);
					}
				?>
				<p>Powtórz hasło:</p> <br/> <input type="password" name="passw2"/> <br />
				<label>
				<input type="checkbox" name="regulamin"/> <span style="font-size:24px">Akceptuję regulamin</span></label><br />
				<?php
					If (isset($_SESSION['e_regulamin']))
					{
						echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
						unset($_SESSION['e_regulamin']);
					}
				?>
				<input type="submit" value="Zarejestruj się" />
			</form>
		</article>
		<aside id="first-article">
			<h2> Czy wiesz, że... ? </h2>
			<p> Największa koparka jednonaczyniowa Terex RH400 potrafi za pomocą swojej łyżki jednorazowo przemieścić urobek o masie aż 85 ton .</p>
			<p>Pojemność łyżki koparki wynosi 45 m<sup>3</sup>, czyli tyle co <u>objętość niewielkiego mieszkania</u> o powierzchni blisko 20 m<sup>2</sup> .</p>
			<img src="img/rh400.jpeg">
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