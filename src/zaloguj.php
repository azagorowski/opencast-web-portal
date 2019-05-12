<?php

	session_start();
	
	if((!isset($_POST['login']))||(!isset($_POST['passw'])))
	{
		header('Location: login');
		exit();
	}
	
	require_once "connect.php";
	
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($polaczenie->connect_errno!=0)
	{
		 echo "NIE DZIALA: ".$polaczenie->connect_errno;
	}
	else
	{
	$login = $_POST['login'];
	$passw = $_POST['passw'];
	
	/*ochrona przed wstrzykiwaniem (encja to zastepczy znak, ENT_QUOTES - zamienia na encje cudzyslowie i apostrofy)*/
	$login = htmlentities($login, ENT_QUOTES, "UTF-8");
	$passw = htmlentities($passw, ENT_QUOTES, "UTF-8");

	/* mysqli_real_escape_string - funckja stworzona w celu zapobiegniecia ochrony przed manipulowaniem za pomoca myslnikow i apostrofami*/
	
	if ($rezultat = @$polaczenie->query(sprintf("SELECT * FROM users WHERE user='%s'",mysqli_real_escape_string($polaczenie,$login))))
	{
		$ilu_userow = $rezultat->num_rows;
		if($ilu_userow>0)
		{
			/*Tablica asocjacyjna*/
			$wiersz = $rezultat->fetch_assoc();
			//password_verify sluzy do weryfikacji zahashowanego hasłą wyjętego z bazy
			if (password_verify($passw, $wiersz['pass']))
			{
				/*Stworzenie zmiennej, aby sprawdzic czy jest się zalogowanym uzytkownikiem*/
				$_SESSION['zalogowany'] = true;
			
				$_SESSION['id'];
				$_SESSION['user'] = $wiersz['user'];
				
				unset($_SESSION['blad']);
				/*czyscienie zapytac z pamieci RAM*/
				$rezultat->free_result();
				header('Location: games.php');
			} else {
				
				$_SESSION['blad']='<span style="color:red"><p>Nieprawidłowy login lub hasło ! </p></span>';
				header('Location: login.php');
			
			}	
		} else {
			
			$_SESSION['blad']='<span style="color:red"><p>Nieprawidłowy login lub hasło ! </p></span>';
			header('Location: login.php');
		}
	}
	
	$polaczenie->close();
	}
	
?>