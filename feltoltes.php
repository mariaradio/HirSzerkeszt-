<?php

include_once 'kapcsolodas.php';

$cim=$_POST["cim"];
$szoveg=$_POST["message"];
$ldatum=$_POST["lejarat"];

var_dump($cim, $szoveg, $ldatum);

$sql = "INSERT INTO hirszerkeszteslista (hircim , szoveg, lejardatum)
        VALUES (?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
 
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "sss",
                       $cim,
                       $szoveg,
                       $ldatum);

mysqli_stmt_execute($stmt);


?>