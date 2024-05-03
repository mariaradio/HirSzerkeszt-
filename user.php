<?php
class user{
    private $host="localhost";
		private $felhasznalonev="root";
		private $jelszo="";
		private $abNev="pizzahot";
		private $kapcsolat;
        public function __construct(){
			$this->kapcsolat = new mysqli($this->host, $this->felhasznalonev, $this->jelszo, $this->abNev);

			if ($this->kapcsolat->connect_error) {
				echo "Hibás csatlakozás.";
				exit();
			}
		}
        public function bejelentkezes($emailVagyNev, $jelszo){
			$jelszo  = md5($jelszo);
			$sql="SELECT * FROM felhasznalo WHERE felhasznalonev='$emailVagyNev' or email='$jelszo'";
			$eredmeny= $this->kapcsolat->query($sql);
			$sorokSzama=$eredmeny->num_rows;
			if ($sorokSzama==1){
				return true;
			}
			else{
				return false;
			}
		}

		public function get_nev($felhAzon){

		}
		public function get_session(){
			return $_SESSION['login'];
		}
		public function kijelentkezes(){
			$_SESSION['login']=FALSE;
		session_destroy();
		}

}
?>