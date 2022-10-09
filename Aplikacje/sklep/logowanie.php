<html>
	<head>
		<title>Sklep</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div id="glowny">
			<div id="tytul">
				<h2>Logowanie</h2>
			</div>
			<div id="menu">
				<h3>Menu</h3>
				<a href="sklep.php">Home</a><br />
				<a href="produkty.php">Produkty</a><br />
				<a href="logowanie.php">Zaloguj</a><br />
				<a href="rejestracja.php">Rejestracja</a><br />
			</div>
			<div id="srodek">
			<form method="POST">
			Login<br />
			<input type="text" name="login"/><br />
			Hasło<br />
			<input type="password" name="haslo" /><br />
			<input type="submit" value="zaloguj"/>
			</form>
				<?php
				@$login=$_POST['login'];
				@$haslo=$_POST['haslo'];
				$con=mysqli_connect('localhost','root','','sklep obuwniczy');
				$zap="select Imie,Nazwisko,email,Haslo from klienci where email='".$login."' and Haslo='".$haslo."'";
				$s=mysqli_query($con,$zap);
				if(mysqli_num_rows($s)>0)
					echo "Zalogowano";
				else
					echo "<h3>Podaj dane do logowania</h3>";
				?>
			</div>
		</div>
	</body>
</html>