<!DOCTYPE html>
<html lang="pl">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Fabryka Obuwia</title>
	<meta name="description" content="Projekt fabryka obuwia Bazy Danych">
	<meta name="keywords" content="js,css,html,php, i inne">
	<meta name="author" content="Mateusz Misiak">
	<meta http-equiv="X-Ua-Compatible" content="IE=edge">
	<link rel="icon" type="image/png" href="img/logo.png">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="main.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">

	<!--[if lt IE 9]>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
	<![endif]-->

</head>

<body>

	<header>

		<nav class="navbar navbar-dark bg-jumpers navbar-expand-lg">

			<a class="navbar-brand" href="https://github.com/stigi99/-S_BD1_FABRYKAOBUWIA_2ID14A"><img src="img/logo.png" width="30" height="30"
					class="d-inline-block mr-1 align-bottom" alt=""> Github</a>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainmenu"
				aria-controls="mainmenu" aria-expanded="false" aria-label="Przełącznik nawigacji">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="mainmenu">

				<ul class="navbar-nav mr-auto">

					<li class="nav-item active">
						<a class="nav-link" href="index.php"> Start </a>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button"
							aria-expanded="false" id="submenu" aria-haspopup="true"> Kolekcje </a>

						<div class="dropdown-menu" aria-labelledby="submenu">

							<a class="dropdown-item" href="wiosna.php"> Wiosna </a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="lato.php"> Lato </a>

							<div class="dropdown-divider"></div>

							<a class="dropdown-item" href="jesien.php"> Jesien </a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="zima.php"> Zima </a>

						

						</div>

					</li>

					<li class="nav-item ">
						<a class="nav-link" href="zamowienia.php"> Zamówienia </a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="osoby.php"> Osoby </a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="magazyn.php"> Magazyn </a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="dostawcy.php"> Dostawcy </a>
					</li>

				</ul>

				
			</div>

		</nav>

	</header>

	<main>

		<section class="jumpers">

			<div class="container">

				<header>
				<!--	<div id="clock"></div> -->
					<h1>Bierzące Zamówienia</h1>
					
				

				</header>

				<div class="row">
				<div class="col-sm-6 col-md-11 ">
					<figure>
						<h3> Wprowadz nową osobę </h3>
							<form action="insert_osoba.php" method="post">
   							 <p>
								ID_osoby:
								<input type="text" name="ID_osoby" id="IDosoby">
								
							
							
								Imie:
								<input type="text" name="Imie" id="Imie">
							
								Nazwisko:
								<input type="text" name="Nazwisko" id="Nazwisko">
								</p>
							<p>
								Wiek:
								<input type="text" name="Wiek" id="Wiek">
								Telefon:
								<input type="text" name="Telefon" id="Telefon">
							
								Pesel:
								<input type="text" name="Pesel" id="Pesel">
								
								
							</p>
							<p>
								Email:
								<input type="text" name="Email" id="Email">
								ID_adres:
								<input type="text" name="Wiek" id="Wiek">
								Panstwo:
								<input type="text" name="Telefon" id="Telefon">
							</p>
							<p>
								Miasto:
								<input type="text" name="Pesel" id="Pesel">
								Kod pocztowy:
								<input type="text" name="Pesel" id="Pesel">
								Ulica:
								<input type="text" name="Email" id="Email">
								<p>
								Numer:
								<input type="text" name="Email" id="Email">
							</p>
							<input type="submit"  value="Wprowadz">
						</form>
						</figure>
						</div>
				</div>
				<div class="row">
				<div class="col-sm-6 col-md-9 offset-md-1">
					<h3> Usuń osobe </h3>
					<form action="delete_osoba.php" method="post">
   							 <p>
								ID Osoby:
								<input type="text" name="ID_osoby" id="IDosoby">
								<input type="submit" class="btn" value="Wprowadz">
								
							</p>
							
				</div>
				
				<div class="row">
				
					<div class="col-sm-6 col-md-9 offset-md-1">
					
						<figure>
						<h3> Lista osób </h3>
						<?php
							$servername = "localhost";
							$username = "root";
							$password = "";
							$dbname = "fabryka";

							// Create connection
							$conn = mysqli_connect($servername, $username, $password, $dbname);
							// Check connection
							if (!$conn) {
							die("Connection failed: " . mysqli_connect_error());
							}


							?>
							<table>
							 <table id="myTable2">
								<tr class="header">
    							<th style="width:60%;" onclick="sortTable(0)">ID_osoby&nbsp</th>
    							<th style="width:40%;" onclick="sortTable(1)">Imie&nbsp</th>
								<th style="width:40%;" onclick="sortTable(2)">Nazwisko&nbsp</th>
								<th style="width:40%;" onclick="sortTable(3)">Wiek&nbsp</th>
								<th style="width:40%;" onclick="sortTable(4)">Stan cywilny&nbsp</th>
								<th style="width:40%;" onclick="sortTable(5)">Telefon&nbsp</th>
								<th style="width:40%;" onclick="sortTable(6)">Pesel&nbsp</th>
								<th style="width:40%;" onclick="sortTable(7)">Email&nbsp</th>
								<th style="width:40%;" onclick="sortTable(7)">ID adres&nbsp</th>
								</tr>
								<?php
							$sql = "SELECT * FROM osoba";
							$result = mysqli_query($conn, $sql);

							if (mysqli_num_rows($result) > 0) {
							// output data of each row
							while($row = mysqli_fetch_assoc($result)) {
								echo "<tr><td>".$row["ID_osoby"]."</td><td>".$row["Imie"]."</td><td>".$row["Nazwisko"]."</td><td>"
								.$row["Wiek"]."</td><td>".$row["Stan_cywilny"]."</td><td>".$row["Telefon"]."</td><td>".$row["Pesel"]."</td><td>".$row["Email"].
								"</td><td>".$row["ID_adres"]."</td><td>".
								"</td><td>"."</tr>";
							}
							} else {
							echo "0 results";
							}
						

							mysqli_close($conn);
							?>
							</table>
						<figure>
							

					</div>
					


				</div>

			</div>

		</section>


	</main>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
		crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
		integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
		crossorigin="anonymous"></script>

	<script src="js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.10.2/p5.min.js"></script>
	<script>
	function setup() {
		var canvas = createCanvas(400, 400);
		 canvas.parent('clock');
		 angleMode(DEGREES);
		
	   }
	  
	   function draw() {
		 background(0);
		 textSize(50);
		
		text('1 2', 170, 40);
		text('3', 360, 200);
		text('6', 180, 390);
		text('9', 20, 200);
		fill(0, 102, 153);
		 translate(200, 200);
		 rotate(-90);
	  
		 let hr = hour();
		 let mn = minute();
		 let sc = second();
		
		


		 strokeWeight(8);
		 stroke(255, 100, 150);
		 noFill();
		 let secondAngle = map(sc, 0, 60, 0, 360);
		 arc(0, 0, 300, 300, 0, secondAngle);
	  
		 stroke(150, 100, 255);
		 let minuteAngle = map(mn, 0, 60, 0, 360);
		 arc(0, 0, 280, 280, 0, minuteAngle);
	  
		 stroke(150, 255, 100);
		 let hourAngle = map(hr % 12, 0, 12, 0, 360);
		 arc(0, 0, 260, 260, 0, hourAngle);
	  
		 push();
		 rotate(secondAngle);
		 stroke(255, 100, 150);
		 line(0, 0, 100, 0);
		 pop();
	  
		 push();
		 rotate(minuteAngle);
		 stroke(150, 100, 255);
		 line(0, 0, 75, 0);
		 pop();
	  
		 push();
		 rotate(hourAngle);
		 stroke(150, 255, 100);
		 line(0, 0, 50, 0);
		 pop();
	  
		 stroke(255);
		 point(0, 0);
	  
	  
		 //  fill(255);
		 //  noStroke();
		 //  text(hr + ':' + mn + ':' + sc, 10, 200);
	  
	  
	   }
</script>
</body>

</html>