<?php
$servername = "localhost";
    $username = "hiradmin";
    $password = "IeoVTRgWDq3EQBHM";
    $dbname = "mrhirek";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Csatlakozás sikertelen: " . $conn->connect_error);
    }
    echo "Csatlakozás sikeres!";
    ?>