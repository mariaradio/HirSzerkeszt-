<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<?php
class HirszerkesztoUjHir
{
    function __construct()
    {

        include_once 'kapcsolodas.php';
        $id = $_GET["id"];
        $sql = "SELECT * FROM hirszerkeszteslista";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        $maxlength = 300;
        if (isset($_POST["menu"])) {
            header('Location:hirszerkeszto.php');
        }
       
        $felulet = '<form action="feltoltes.php" method="post">

        <label>Cím:</label><br>

        <input type="text" id="Cim" name="cim" value="'. $row["hircim"].'"><br>

        <label>Tartalom:</label><br>

        <textarea onkeyup="szamlalo()" name="message" id="message" class="textarea" rows="10" placeholder="Ide írj..." maxlength=' . $maxlength . '>'. $row["szoveg"].'</textarea>
        
        <div id="character-counter">
                <span id="typed-characters">0</span>
                <span>/</span>
                <span id="maximum-characters">' . $maxlength . '</span>
            </div>

            <label>Lejárat ideje:</label>
            <input type="date" id="lejarat" name="lejarat" value="'. $row["lejardatum"].'"><br>

        <input type="submit" name="menu" value="Mentés">
        </form>';
        echo "$felulet";
    }
}
new HirszerkesztoUjHir;
?>
<script>
    function szamlalo() {
        var length = document.getElementById('message').value.length;
        document.getElementById('typed-characters').innerHTML = length;
    }
</script>