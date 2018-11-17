<?
require 'variablesGlobales.php';
include 'conkarl.php';
require_once('../vendor/autoload.php');
$base58 = new StephenHill\Base58();

// $mora -> 2.00
$fechaHoy = new DateTime();
$deudaAHoy =0;

$sql="SELECT idCuota, cuotFechaPago, cuotCuota FROM `prestamo_cuotas`
where cuotFechaPago <=curdate() and cuotCuota<>0 and idTipoPrestamo=79
and idPrestamo={$base58->decode($_POST['credito'])};";
$resultado=$cadena->query($sql);
while($row=$resultado->fetch_assoc()){
	$fechaCuota = new DateTime($row['cuotFechaPago']);
	$diasDebe=$fechaHoy ->diff($fechaCuota);
	if($diasDebe->format('%a')>0){
		//sumar Dia y Mora
	}else{
	//  sólo sumar día
	}
}


?>