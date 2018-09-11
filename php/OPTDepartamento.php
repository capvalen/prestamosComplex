<?php 
require("conkarl.php");

$sql = mysqli_query($conection,"SELECT * FROM `departamento`;");

while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC))
{

echo '<option class="optDepartamento mayuscula" data-tokens="'.$row['idDepartamento'].'">'.strtolower($row['departamento']).'</option>';

}
mysqli_close($conection); //desconectamos la base de datos

?>