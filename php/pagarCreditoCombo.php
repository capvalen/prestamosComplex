<?php 
require 'variablesGlobales.php';
require("conkarl.php");
require_once('../vendor/autoload.php');
$base58 = new StephenHill\Base58();

$k=0;
$dinero= $_POST['dinero'];
$idPrestamo = $base58->decode($_POST['credito']);
$sql= "SELECT * FROM prestamo_cuotas where idPrestamo = {$idPrestamo} and idTipoPrestamo = 79
  order by cuotFechaPago asc";

$resultado=$cadena->query($sql);
$fechaHoy = new DateTime();
while($row=$resultado->fetch_assoc()){
  $fechaCuota = new DateTime($row['cuotFechaPago']);
	$diasDebe=$fechaHoy ->diff($fechaCuota);
  $restaDias= floatval($diasDebe->format('%a'));
  if($restaDias>0){
		//sumar Dia y Mora
		if($k==0){
			$diasMora = $restaDias;
    }
  }else{
    $diasMora -= 1;
  }
	$k++;
  // $debePendiente = $row['cuotCuota']-$row['cuotPago'];
  // if($dinero >= $debePendiente){
  //   echo 'Pagar el id: '.$row['idCuota'];
  // }
  // else{
  //   if( $dinero == 0){
  //     break;
  //   }else{
  //     echo 'Pagar un pedazo en id: '.$row['idCuota'];
  //   }
  // }
}

if($diasMora>0){
  $moraTotal = $diasMora*$mora;
  /* HACER INSERT a CAJA por MORA por X días*/
  
  $sqlMora="INSERT INTO `caja`(`idCaja`, `idPrestamo`, `idCuota`, `idTipoProceso`, `cajaFecha`, `cajaValor`, `cajaObservacion`, `cajaMoneda`, `cajaActivo`, `idUsuario`)
  VALUES (null,{$idPrestamo},0,81,now(),{$moraTotal},'Mora de {$diasMora}',1,1,{$_COOKIE['ckidUsuario']})";
  $resultadoMora=$cadena->query($sqlMora);
  while($rowMora=$resultadoMora->fetch_assoc()){ 
    
  }

}

?>