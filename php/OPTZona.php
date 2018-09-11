<?php 
require("conkarl.php");

$sql = mysqli_query($conection,"SELECT * FROM `zona` ORDER BY `zona`.`zonTipo` ASC;");

while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC))
{

echo '<option class="optZona mayuscula" data-tokens="'.$row['idZona'].'">'.$row['zonTipo'].'</option>';

}
mysqli_close($conection); //desconectamos la base de datos

?>