<html>
	<head>
		<title>Słownik</title>
        <link rel="stylesheet" href="style.css">
	</head>
	<body>
    <div id="glowny">
		<h2>Zaloguj</h2>
        <div id="pola">
			<?php
				session_start()
			?>
		<form method="POST">
			Email
			<input type="text" name="email">			
			Hasło
			<input type="text" name="haslo">			
			<input type="submit" value="Zaloguj">
		</form>
		<?php
			@$ema=$_POST['email'];
			@$has=$_POST['haslo'];
			$con=mysqli_connect('localhost','root','','slownik');
			$s=mysqli_query($con,"select ID_uzytkownika,imie,email,haslo from uzytkownik where email='".@$_POST['email']."' && haslo='".@$_POST['haslo']."'");
				$t=mysqli_fetch_array($s);
				if(mysqli_num_rows($t)>0){
					echo "ok"; $_SESSION['log']=TRUE;
					$_SESSION['imie']=$t['imie'];header('Location:pozalogowaniu.php');
				}
				else
					echo "<h2>nie</h2>";
				mysqli_close($con);
		?>
        </div>
        </div>
	</body>
</html>