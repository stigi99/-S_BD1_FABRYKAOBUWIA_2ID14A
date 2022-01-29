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
					<h1 > Zamówienia</h1>
					
				

				</header>
				<div class="row">
				<div class="col-sm-6 col-md-11 ">
					<figure>
						<h3> Wprowadz nowe zamówienie </h3>
							<form action="insert.php" method="post">
   							 <p>
								ID_zlecenia:
								<input type="text" name="ID_zlecenia" id="IDzlecenia">
								
							
							
								ID_produktu:
								<input type="text" name="ID_produktu" id="IDproduktu">
							
								ID_dostawcy:
								<input type="text" name="ID_dostawcy" id="IDdostawcy">
								</p>
							<p>
								ID_klienta:
								<input type="text" name="ID_klienta" id="IDklienta">
								ID_magazynu:
								<input type="text" name="ID_magazynu" id="IDmagazynu">
							
								Data_złozenia:
								<input type="text" name="Data_zlozenia" id="DataZlozenia">
							</p>
							<input type="submit"  value="Wprowadz">
						</form>
						</figure>
						</div>
				</div>
				<div class="row">
				<div class="col-sm-6 col-md-9 offset-md-1">
					<h3> Usuń zlecenie </h3>
					<form action="delete.php" method="post">
   							 <p>
								ID Zlecenia:
								<input type="text" name="ID_zlecenia" id="IDzlecenia">
								<input type="submit" class="btn" value="Wprowadz">
								
							</p>
							
				</div>
				</div>
				<div class="row">
				
					<div class="col-sm-6 col-md-9 offset-md-1">
					
						<figure>
						<h3> Bierzące zamówienia </h3>
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
    							<th style="width:60%;" onclick="sortTable(0)">ID_zlecenia&nbsp</th>
    							<th style="width:40%;" onclick="sortTable(1)">ID_produktu&nbsp</th>
								<th style="width:40%;" onclick="sortTable(2)">ID_dostawcy&nbsp</th>
								<th style="width:40%;" onclick="sortTable(3)">ID_klienta&nbsp</th>
								<th style="width:40%;" onclick="sortTable(4)">ID_magazynu&nbsp</th>
								<th style="width:40%;" onclick="sortTable(5)">Data_zlozenia&nbsp</th>
								</tr>
								<?php
							$sql = "SELECT * FROM zlecenie";
							$result = mysqli_query($conn, $sql);

							if (mysqli_num_rows($result) > 0) {
							// output data of each row
							while($row = mysqli_fetch_assoc($result)) {
								echo "<tr><td>".$row["ID_Zlecenia"]."</td><td>".$row["ID_produktu"]."</td><td>".$row["ID_dostawcy"]."</td><td>"
								.$row["ID_klienta"]."</td><td>".$row["ID_magazynu"]."</td><td>".$row["Data_zlozenia"]."</td><td>"."</tr>";
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
  
  dir = "asc";
 
  while (switching) {
    
    switching = false;
    rows = table.rows;
   
    for (i = 1; i < (rows.length - 1); i++) {
      
      shouldSwitch = false;
     
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      
      if (dir == "asc") {
        if (parseInt(x.innerHTML.toLowerCase()) > parseInt(y.innerHTML.toLowerCase())) {
          
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (parseInt(x.innerHTML.toLowerCase()) < parseInt(y.innerHTML.toLowerCase())) {
         
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      
      switchcount ++;
    } else {
      
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}


</script>
</body>

</html>