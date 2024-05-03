<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<?php
class HirszerkesztoUjHir
{
    function __construct()
    {
        $maxlengthTart = /*Tart_length;*/
        $maxlengthCim = /*Cim_length;*/
        if (isset($_POST["menu"])) {
            header('Location:hirszerkeszto.php');
        }
        $felulet = '  <div class="form-popup" id="myForm">
    <form action="/action_page.php" class="form-container">
    <form action="feltoltes.php" method="post">

    <label>Cím:</label><br>

    <input type="text" onkeyup="szamlaloCim()" id="Cim" name="cim" maxlength=' . $maxlengthCim . '><br>

    <div id="character-counter">
    <span id="typed-charactersCim">0</span>
    <span>/</span>
    <span id="maximum-characters">' . $maxlengthCim . '</span>
    </div>
    
    <label for="comment">Tartalom:</label><br>

    <textarea onkeyup="szamlaloTartalom()" name="message" id="comment" class="form-control" rows="10" placeholder="Ide írj..." maxlength=' . $maxlengthTart . '></textarea>
    
    <div id="character-counter">
            <span id="typed-characters">0</span>
            <span>/</span>
            <span id="maximum-characters">' . $maxlengthTart . '</span>
        </div>

        <label>Lejárat ideje:</label>
        <input type="date" id="lejarat" name="lejarat"><br>

    <input type="submit" name="menu" value="Mentés">
    </form>
    </div>';
        echo "$felulet";
    }
}
new HirszerkesztoUjHir;
?>
<script>
    function szamlaloTartalom() {
        var length = document.getElementById('message').value.length;
        document.getElementById('typed-characters').innerHTML = length;
    }
</script>
<!DOCTYPE html>
<html lang="hu">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="x-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tegzes Márton</title>
</head>

    function szamlaloCim() {
        var length = document.getElementById('Cim').value.length;
        document.getElementById('typed-charactersCim').innerHTML = length;
    }
</script>
