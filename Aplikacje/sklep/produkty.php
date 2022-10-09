<html>
	<head>
		<title>Sklep</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div id="glowny">
			<div id="tytul">
				<h2>Produkty</h2>
			</div>
			<div id="menu">
				<h3>Menu</h3>
				<a href="sklep.php">Home</a><br />
				<a href="produkty.php">Produkty</a><br />
				<a href="logowanie.php">Zaloguj</a><br />
				<a href="rejestracja.php">Rejestracja</a><br />
			</div>
			<div id="srodek">
				Wyszukaj:<input type='text'>
				Sortuj:<select>
				<option>A-Z</option>
				<option>Z-A</option>
				<option>Cena rosnąco</option>
				<option>Cena malejąco</option>
				</select>
				<input type="submit">
				<hr>
				<?php
					$servername = "localhost";
					$username = "root";
					$conn = mysqli_connect($servername, $username, '', 'sklep obuwniczy');
					$rekordy="Select * from towar";
					$table=mysqli_query($conn,$rekordy);
						while($cos=mysqli_fetch_array($table))
						{
							echo "<div class='tak1'>".$cos["marka"]."</div> ";
							echo "<div class='tak'>".$cos["ID_kategori"]."</div> ";
							echo "<div class='tak'>".$cos["rozmiar"]."</div> ";
							echo "<div class='tak'>".$cos["cena"]."</div> ";
							echo "<div class='tak'>".$cos["ilosc"]."</div>";
							echo "<div class='aa'></div>";
						}
					mysqli_close($conn);
				?>
			</div>
		</div>
	</body>
</html>