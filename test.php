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

$sql = "SELECT * FROM adres";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "id: " . $row["ID_adres"]. " - Panstwo: " . $row["Panstwo"]. " " . $row["Miasto"]. "<br>";
  }
} else {
  echo "0 results";
}
for($i = 1; $i < 100; $i++)
{
	echo "<marquee>NOPOWCY PRAWDZIWI PATRYJOCI</marquee><br>";
}

mysqli_close($conn);
?>