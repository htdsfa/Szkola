<html>
	<head>
		<title>Sklep</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div id="glowny">
			<div id="tytul">
				<h2>Rejestracja</h2>
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
			Imię<br />
			<input type="text" name="imie"/><br />
			Nazwisko<br />
			<input type="text" name="nazwisko" /><br />
			E-mail<br />
			<input type="email" name="email"/><br />
			Telefon<br />
			<input type="tel" name="telefon"/><br />
			<input type="submit">
			</form>
				<?php
				function los($ile,$od,$do){
						$h='';
						for($i=0;$i<$ile;$i++)
							$h.=chr(rand($od,$do));
						return $h;
					}	
				@$imie=$_POST['imie'];
				@$nazwisko=$_POST['nazwisko'];
				@$email=$_POST['email'];
				@$telefon=$_POST['telefon'];
				if(strlen($imie)>=3 && strlen($nazwisko)>=3 && strlen($telefon)>=9){
					$p=mysqli_connect('localhost','root','','sklep obuwniczy');
					$u=mysqli_query($p,"select email from klienci where email='".@$_POST['email']."'");
					
					if(mysqli_num_rows($u)>0){
						echo "Już jestes w bazie";
						mysqli_close($p);
					}else{
					$haslo.=los(2,33,47).los(2,65,90).los(2,48,57).los(4,97,122);
					$con=mysqli_connect('localhost','root','','sklep obuwniczy');
					$zap="insert into klienci values('','$imie','$nazwisko','$email','$telefon','$haslo')";
					$w=mysqli_query($con,$zap);
					echo "Twoj login to: ".$email.", a haslo to:".$haslo;
					mysqli_close($con);
					}
				}else{
					echo "Złe dane";
				}
				
				?>
			</div>
		</div>
	</body>
</html>