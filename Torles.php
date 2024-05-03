<!-- <?php

use App\Http\Middleware\ValidateSignature;
include_once('TorlesController.php');

if(isset($_POST['torol']))
{
    $id = mysqli_real_escape_string($db->conn, $_POST['torol']);
    $torol = new TorlesController;
    $result = $torol->delete($id);
    if($result)
    {
        $_SESSION['message'] = "adat hozzáadása sikeresen";
        header("Location: hirszerkeszto.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "adat nem lett hozzáadva";
        header("Location: hirszerkeszto.php");
        exit(0);
    }
}
?> -->