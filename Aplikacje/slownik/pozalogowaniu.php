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
			<input type="submit" name="id" value="wyloguj"/>
		</form>
		<?php
			session_start();
			if(@$_POST['id'] =='wyloguj'){
				unset($_SESSION['log']);
				session_destroy();
				header("Location: slownik.php");
			}

		?>
		<form method="POST">
			PL
			<input type="text" name="pl">
			EN
			<input type="text" name="en">
			DE
			<input type="text" name="de">
			<input type="submit" value="Pokaż">
		</form>
		<br />
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
		<h2>Dodaj słowo </h2>
		<form method="POST">
			PL
			<input type="text" name="pl1">
			EN
			<input type="text" name="en1">
			DE
			<input type="text" name="de1">
			<input type="submit" value="Dodaj">
		</form>
		<?php
			@$pl=$_POST['pl1'];
			@$en=$_POST['en1'];
			@$de=$_POST['de1'];
			$con=mysqli_connect('localhost','root','','slownik');
			if(strlen($pl)>=1 && strlen($en)>=1 && strlen($de)>=1){
				$y=mysqli_query($con,"select slowo from polski where slowo='$pl'");
				if(mysqli_num_rows($y)>0){
					echo "juz jest";
					mysqli_close($con);
				}else{
					$zap="insert into polski values ('','$pl')";
					mysqli_query($con,$zap);
					$zap1="insert into english values ('','$en')";
					mysqli_query($con,$zap1);
					$zap2="insert into deutsch values ('','$de')";
					mysqli_query($con,$zap2);
					mysqli_close($con);
				}
			}
		?>
        </div>
    </div>
	</body>
</html>