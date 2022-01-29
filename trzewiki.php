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
						<a class="nav-link" href="#"> Osoby </a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="bramki/bramki.html"> Magazyn </a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="jpolski/index.html"> Dostawcy </a>
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
					<marquee direction='up'><h1 > Dostępne trzewiki</h1></marquee>
					
				

				</header>
				
				
				<div class="row">
				
					<div class="col-sm-6 col-md-9 offset-md-1">
					
						<figure>
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
							
							 <table id="myTable2">
							 
								<tr class="header">
    							<th style="width:60%;" onclick="sortTable(0)">ID_produktu&nbsp</th>
    							<th style="width:40%;" onclick="sortTable(1)">nazwa&nbsp</th>
								<th style="width:40%;" onclick="sortTable(2)">marka&nbsp</th>
								<th style="width:40%;" onclick="sortTable(3)">cena&nbsp</th>
								<th style="width:40%;" onclick="sortTable(4)">kolor&nbsp</th>
								<th style="width:40%;" onclick="sortTable(5)">materiał&nbsp</th>
								<th style="width:40%;" onclick="sortTable(5)">fason&nbsp</th>
								</tr>
								<?php
							$sql = "SELECT ID_produktu, nazwa, marka, cena, kolor, materiał,fason 
							from Produkt inner join Specyfikacja on Specyfikacja.ID_specyfikacji = Produkt.ID_specyfikacji
							where fason = 'trzewiki';";
							$result = mysqli_query($conn, $sql);

							if (mysqli_num_rows($result) > 0) {
							// output data of each row
							while($row = mysqli_fetch_assoc($result)) {
								echo "<tr><td>".$row["ID_produktu"]."</td><td>".$row["nazwa"]."</td><td>".$row["marka"]."</td><td>"
								.$row["cena"]."</td><td>".$row["kolor"]."</td><td>".$row["materiał"]."</td><td>".$row["fason"]."</td><td>"."</tr>";
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
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable2");
  switching = true;
  // Set the sorting direction to ascending:
  dir = "asc";
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "asc") {
        if (parseInt(x.innerHTML.toLowerCase()) > parseInt(y.innerHTML.toLowerCase())) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (parseInt(x.innerHTML.toLowerCase()) < parseInt(y.innerHTML.toLowerCase())) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}

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