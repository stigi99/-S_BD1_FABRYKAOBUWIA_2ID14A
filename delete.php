<?php

$link = mysqli_connect("localhost", "root", "", "fabryka");
 
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 

$ID_zlecenia = mysqli_real_escape_string($link, $_REQUEST['ID_zlecenia']);


$sql = "Delete from zlecenie where ID_zlecenia ='$ID_zlecenia'";
if(mysqli_query($link, $sql)){
    echo "Record deleted succesfuly.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


mysqli_close($link);
?>