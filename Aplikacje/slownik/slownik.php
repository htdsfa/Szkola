<html>
	<head>
		<title>Słownik</title>
        <link rel="stylesheet" href="style.css">
	</head>
	<body>
    <div id="glowny">
		<h2>Słownik PL-EN-DE</h2>
        <div id="pola">
		<form method="POST">
			PL
			<input type="text" name="pl"/>
			EN
			<input type="text" name="en"/>
			DE
			<input type="text" name="de"/>
			<input type="submit" value="Pokaż"/>
		</form>

		<?php
			@$pl=$_POST['pl'];
			@$en=$_POST['en'];
			@$de=$_POST['de'];	
			
			if(strlen($pl)==0 && strlen($en)==0 && strlen($de)==0){
				echo "Podaj dane";
			}else{
				$con=mysqli_connect('localhost','root','','slownik');

				$p="select * from polski,english,deutsch where polski.ID_slowa=english.ID_word and 
				polski.ID_slowa=deutsch.ID_wort and (polski.slowo='$pl' or english.word='$en' or deutsch.wort='$de')";
				
				$t=mysqli_query($con,$p);
			
				$z=mysqli_fetch_array($t);	
				echo "Polski: ".$z['slowo']." Angielski: ".$z['word']." Niemiecki: ".$z['wort']."";
				mysqli_close($con);
			}				
		?>
        </div>
		<h3><a href="rejest.php">Zarejestruj sie żeby dodać słowo</a></h3>
		<h3><a href="logowanie.php">Zaloguj sie</a></h3>
    </div>
	</body>
</html>