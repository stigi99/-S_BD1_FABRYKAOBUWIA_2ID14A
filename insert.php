<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "fabryka");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$ID_zlecenia = mysqli_real_escape_string($link, $_REQUEST['ID_zlecenia']);
$ID_produktu = mysqli_real_escape_string($link, $_REQUEST['ID_produktu']);
$ID_dostawcy = mysqli_real_escape_string($link, $_REQUEST['ID_dostawcy']);
$ID_klienta = mysqli_real_escape_string($link, $_REQUEST['ID_klienta']);
$ID_magazynu = mysqli_real_escape_string($link, $_REQUEST['ID_magazynu']);
$Data_zlozenia = mysqli_real_escape_string($link, $_REQUEST['Data_zlozenia']);
// Attempt insert query execution
$sql = "INSERT INTO Zlecenie  VALUES ('$ID_zlecenia', '$ID_produktu', '$ID_dostawcy','$ID_klienta','$ID_magazynu','$Data_zlozenia')";
if(mysqli_query($link, $sql)){
    echo "Dodano pomyślnie.";
} else{
    echo "Błąd, nie mozna wprowadzić wartości";
}
 
// Close connection
mysqli_close($link);

?>