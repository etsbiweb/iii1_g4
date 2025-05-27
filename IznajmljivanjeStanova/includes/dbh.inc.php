<?php

$servername = "localhost";      
$username = "root";             
$password = "";                 
$dbname = "sona";      

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Greška pri spajanju na bazu: " . $conn->connect_error);
}
else{
    echo "Konekcija uspijela";
}