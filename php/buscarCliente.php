<?php 
//header('Content-Type: text/html; charset=utf8');
include 'conkarl.php';

$log = mysqli_query($conection,"call buscarCliente('".$_GET['buscar']."');");
$cantRow= mysqli_num_rows($log);

if($cantRow>0){
  while($row = mysqli_fetch_array($log, MYSQLI_ASSOC))
  {?>
    
    <tr>
      <td><?= $row['idCliente']; ?></td>
      <td><?= $row['cliDni']; ?></td>
      <td><?= ucwords($row['cliApellidoPaterno']).' '.ucwords($row['cliApellidoMaterno']).', '. ucwords($row['cliNombres']); ?></td>
      <td><?= ucwords($row['addrDireccion']); ?></td>
      <td><?= $row['cliCelularPersonal']; ?></td>
      <td><?= $row['civDescripcion']; ?></td>
      <td> <a class="btn btn-sm btn-azul btn-outline btnAsignarSocio" href="solicitud.php?titular=<?= $row['idCliente'];?>"><i class="icofont-ui-add"></i> Crear solicitud</a> </td>
    </tr>
  <?php
    
  }
}else{
	echo '<tr>
    <td>No hay resultados para: <strong>'.$_GET['buscar'].'</strong></td>
  </tr>';
}
/* liberar la serie de resultados */
mysqli_free_result($log);
/* cerrar la conexi贸n */
mysqli_close($conection);




?>