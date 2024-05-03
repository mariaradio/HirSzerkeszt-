<?php
session_start();
//importáljuk az osztályt
//létrehozunk egy példányt
$felhAzon = $_SESSION['felhAzon'];

if (!$felh->get_session()){
	//átirányít a login oldalra
    header("location:login.php");
}

if (isset($_GET['q'])){
    $felh->kijelentkezes();
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="x-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Dobrocsi Kornél</title>
</head>
<body>
    <header>
    </header>
    <nav>
    </nav>
    <article>
        <div id="container">
			<div id="header">
				<a href="home.php?q=logout">LOGOUT</a>
			</div>
			<div id="main-body">
				<h1>Hello <?php $felh->get_nev($felhAzon); ?>!</h1>
			</div>
			<div id="footer"></div>
        </div>
    </article>
    <footer>
    </footer>

</body>
</html>