<html>
	<head>
		<title>Słownik</title>
        <link rel="stylesheet" href="style.css">
	</head>
	<body>
    <div id="glowny">
		<h2>Rejestracja</h2>
        <div id="pola">
		<form method="POST">
			Imie:
			<input type="text" name="imie">
			Email:
			<input type="text" name="email">
			Hasło:
			<input type="text" name="haslo">
			<input type="submit" value="Zarejestruj">
		</form>
		<?php
			@$imie=$_POST['imie'];
			@$ema=$_POST['email'];
			@$has=$_POST['haslo'];
			$con=mysqli_connect('localhost','root','','slownik');
			$u=mysqli_query($con,"select email from uzytkownik where email='".@$_POST['email']."'");					
			if(mysqli_num_rows($u)>0){
				echo "Już jestes w bazie";
				mysqli_close($con);
			}else{
				$w=mysqli_query($con,"insert into uzytkownik values('','$imie','$ema','$has')");
				mysqli_close($con);
			}
			
		?>
        </div>
		<h3><a href="logowanie.php">Zaloguj sie</a></h3>
    </div>
	</body>
</html>