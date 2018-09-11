<?php 
require("conkarl.php");

$sql = mysqli_query($conection,"SELECT * FROM `provincia` where idDepartamento={$_POST['depa']}");

while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC))
{

echo '<option class="optProvincia mayuscula" data-tokens="'.$row['idProvincia'].'">'.strtolower($row['provincia']).'</option>';

}
mysqli_close($conection); //desconectamos la base de datos

?>