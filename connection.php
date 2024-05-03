<?php
$servername = "localhost";
    $username = "test";
    $password = "test123";
    $dbname = "hirszerkeszto";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Csatlakozás sikertelen: " . $conn->connect_error);
    }
    echo "Csatlakozás sikeres!";
    ?>