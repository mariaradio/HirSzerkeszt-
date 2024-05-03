<html>
<head>
  <title>
  </title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="hirszerkesztoUjHir.php"></script>
</head>
<body>
  
</body>
</html>

<?php
class Hirszerkeszto{    
    
function __construct(){

 include_once 'kapcsolodas.php';

 $sql = "SELECT * FROM hirszerkeszteslista";
 $result = $conn->query($sql);

if(isset($_POST["ujhir"]))
{
    header('Location:hirszerkesztoUjHir.php');
}

/* if(isset($_POST["torol"]))
{
    header('Location:torles.php');
}
 */
 $felulet= '<form name="hiratiranyitas" action="" method="post">';
 $felulet.= '<div class="position-relative">
 <div class="position-absolute top-0 end-0">
 <input type="submit" name="ujhir" value="Új Hír" style="position:fixed; top:10px; right:10px;"><br>
 </div>
</div>
</form>';

            
    if ($result->num_rows > 0) {
      $felulet.='<table>';
      $felulet.='<tr>';
      $felulet.= "<td>id: 
                    </td>  <td>hircim: 
                    </td>  <td>felolvasások száma: 
                    </td>  <td>feltöltés dátuma: 
                    </td>  <td>lejáratidátum:
                    </td>  <td>szerkesztő neve:
                    </td>  <td>feltoltő:
                    </td>  <td>szerkesztés:
                    </td>  <td>törlés:
                    </td>";
                    
          $felulet.='</tr>';

        while($row = $result->fetch_assoc()) {
          $felulet.='<tr name="'. $row["hircim"].'">';
        $felulet.= "<td>" . $row["id"]. 
                    "</td>  <td>" . $row["hircim"]. 
                    "</td>  <td>" . $row["felszam"]. 
                    "</td>  <td>" . $row["feltdatum"]. 
                    "</td>  <td>" . $row["lejardatum"]. 
                    "</td>  <td>" . $row["szer_nev"]. 
                    "</td>  <td>: " . $row["feltolto"] . 
                    "</td>
                    <td>
                    <form action='hirszerkesztoregi.php'>
                    <button type='submit' name='regi' value='<$row[id]>' class='open-button onclick='openForm()' id=" . $row["id"] . "'>❌</button>
                    </form>
                    </td>
                    <td>
                    <form action='torles.php'>
                    <button type='submit' name='torol' value='<$row[id]>' class='torol' id=" . $row["id"] . "'>❌</button>
                    </form>
                    </td>";
          $felulet.='</tr>';
      }
      $felulet.='</table>';
    } else {
      echo "0 találat";
    };
        echo "$felulet";
        return $felulet;
    }
}

function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}

new Hirszerkeszto;
?>