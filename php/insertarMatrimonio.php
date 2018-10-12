<?php 
session_start();
header('Content-Type: text/html; charset=utf8');
require("conkarl.php");


$sql= "INSERT INTO `matrimonio`(`idMatrimonio`, `idEsposo`, `idEsposa`, `matrActivo`) VALUES (null, {$_POST['idVaron']},{$_POST['idDama']},1);";
//echo $sql;

if ($llamadoSQL = $conection->query($sql)) { //Ejecución mas compleja con retorno de dato de sql del procedure.
	/* obtener el array de objetos */
  $last_id = $conection->insert_id;
  echo $last_id;
	/* liberar el conjunto de resultados */
	
}else{echo '0';}



?>