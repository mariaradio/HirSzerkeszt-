<?php
class hirolvaso{
    private $servername="http://abraham.mariaradio.hu/phpmyadmin";
    private $username="hiradmin";
    private $password="IeoVTRgWDq3EQBHM";
    private $abNev="Hírolvaso és szerkesztŐ";
    private $kapcsolat;

    public function __construct() {
        $this->kapcsolat = new mysqli($this->servername, $this->username, $this->password,$this->abNev );
		if($this->kapcsolat->connect_error)
		{
			$szoveg="<p>Hiba: ".$this->kapcsolat->connect_error."</p>";
		}
		else{
			$szoveg="<p>Sikeres kapcsolódás.</p>";
		}
    echo $szoveg;
    $this->kapcsolat->query("SET NAMES UTF8");
	$this->kapcsolat->query("set character set UTF8");
    echo "Connected successfully";
    }

    public function adatLeker($oszlop1,$oszlop2,$tabla){
        $sql="Select  $oszlop1,$oszlop2,$tabla";
        $phpTomb= $this->kapcsolat->query($sql);
        while ($sor = $phpTomb->fetch_assoc());
        {

        }
    }
    function kapcsolatBezar(){
        $this->kapcsolat->close();
    } 

    

    /*public function Sormegjelenites($tabla,$oszlop1,$oszlop2){
        $sql="select $oszlop1, $oszlop2 From table";
        $eredmeny=$this->$lekerdezés($sql);
        while ($row=$eredmény->fetch_assoc()){
            echo "<div class='g'>";
					echo "<div>";
						echo $row["felhasznalonev"];
					echo "</div>";
					echo "<div>";
						echo $row["szuldatum"];
					echo "</div>";
					echo "--------";
				echo "</div>";
        }
    }*/
}

?>