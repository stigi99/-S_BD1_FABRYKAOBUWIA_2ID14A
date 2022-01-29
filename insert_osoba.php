<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "fabryka");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$ID_osoby = mysqli_real_escape_string($link, $_REQUEST['ID_osoby']);
$Imie = mysqli_real_escape_string($link, $_REQUEST['Imie']);
$Nazwisko = mysqli_real_escape_string($link, $_REQUEST['Nazwisko']);
$Wiek = mysqli_real_escape_string($link, $_REQUEST['Wiek']);
$Stan_cywilny = mysqli_real_escape_string($link, $_REQUEST['Stan_cywilny']);
$Telefon = mysqli_real_escape_string($link, $_REQUEST['Telefon']);
$Pesel = mysqli_real_escape_string($link, $_REQUEST['Pesel']);
$Email = mysqli_real_escape_string($link, $_REQUEST['Email']);
$ID_adres = mysqli_real_escape_string($link, $_REQUEST['ID_adres']);

$Panstwo = mysqli_real_escape_string($link, $_REQUEST['Panstwo']);
$Miasto = mysqli_real_escape_string($link, $_REQUEST['Miasto']);
$Kod_pocztowy = mysqli_real_escape_string($link, $_REQUEST['Kod_pocztowy']);
$ulica = mysqli_real_escape_string($link, $_REQUEST['Ulica']);
$Nr = mysqli_real_escape_string($link, $_REQUEST['Nr']);

// Attempt insert query execution
$sql = "INSERT INTO Osoba  VALUES ('$ID_osoby', '$Imie', '$Nazwisko','$Wiek','$Stan_cywilny','$Telefon','$Pesel','$Email','$ID_adres')";
if(mysqli_query($link, $sql)){
    echo "Dodano pomyślnie.";
} else{
    echo "Błąd, nie mozna wprowadzić wartości";
}
$sql = "INSERT INTO Adres  VALUES ('$ID_adres', '$Panstwo', '$Miasto','$Kod_pocztowy','$Ulica','$Nr')";
if(mysqli_query($link, $sql)){
    echo "Dodano pomyślnie.";
} else{
    echo "Błąd, nie mozna wprowadzić wartości";
}
 
// Close connection
mysqli_close($link);

?>