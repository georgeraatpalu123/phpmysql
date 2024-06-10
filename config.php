<?php
$servername = "localhost"; 
$username = "musicgeorge"; 
$password = "0000"; 
$database = "muusikapood";


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Ühendus ebaõnnestus: " . $conn->connect_error);
}
?>