<?php

class StudentController
{
    public function __construct()
    {
        include_once 'kapcsolodas.php';
        $this->$conn = $db->$conn;
    }

    public function delete($id)
    {
        include_once 'kapcsolodas.php';
        $torles_id = mysqli_real_escape_string($this->$conn,$id);
        $TorlesQuery = "DELETE FROM /*students*/ WHERE id='$torles_id' LIMIT 1";
        $result = $this->$conn->query($TorlesQuery);
        if($result){
            return true;
        }else{
            return false;
        }
    }
}
?>