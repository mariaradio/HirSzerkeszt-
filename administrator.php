<?php 
class Administrator{
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
        $this->kapcsolat->connect_error;

    }
    public function adminnezet(){
            $table="<table class='tabla'><tr class='altabla><th class='head'></th><td class='body'></td></tr></table>";
            echo($table);
    }

    public function reg_felhasznalo($nev, $email, $jelszo){
        $jelszo = md5($jelszo);
        //titkositas
        $sql="SELECT * FROM felhasznalo WHERE felhasznalonev='$nev' or email='$email'";
        //jelszo és email ellenörzés
        $eredmeny = $this->kapcsolat->query($sql);
        $sorokSzama= $eredmeny->num_rows;
        if ($sorokSzama ==0){
            $sql="INSERT INTO felhasznalo(felhasznalonev,email,jelszo,jogosultsag)VALUES('$nev','$email','$jelszo','3')";
            $this->kapcsolat->query($sql);
            return true;
        }
        else{
            return false;
        }
    }
    
    
    /*if (isset($_REQUEST['submit'])){
        extract($_REQUEST);
        $register = $felh->reg_felhasznalo($nev, $email, $jelszo);
        if ($register) {
        // sikeres regisztráció
            echo 'Sikeres regisztráció <a href="login.php">Kattints ide!</a> a belépéshez';
            
        } else {
        // sikertelen regisztráció
            echo 'Sikertelen regisztráció. Email vagy felhasználónév már létezik. Próbáld újra!';
            
        }
    }*/
}
?>