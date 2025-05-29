<?php

$hostname = "localhost:3306";      
$username = "root";             
$password = "";                 
$dbname = "sona";      

$conn = new mysqli($hostname, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Greška pri spajanju na bazu: " . $conn->connect_error);
}