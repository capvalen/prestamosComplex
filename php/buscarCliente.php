<?php 
//header('Content-Type: text/html; charset=utf8');
include 'conkarl.php';
include 'verificarMatrimonio.php';

$log = mysqli_query($conection,"call buscarCliente('".$_GET['buscar']."');");
$cantRow= mysqli_num_rows($log);

$botonMatri='';
if($cantRow>0){
  while($row = mysqli_fetch_array($log, MYSQLI_ASSOC)){
    $respuesta= json_encode(verificarMatri($row['idCliente'], $cadena), true);
    
    if($respuesta==0){
      if($row['idEstadoCivil']=='2' && $row['cliSexo']=='1' ){
        $botonMatri='<button class="btn btn-sm btn-rojoFresa btn-outline btnLlamarEsposo" data-id="'.$row['idCliente'].'" data-sex="'.$row['cliSexo'].'"><i class="icofont-heart-alt"></i> Asociar esposa</button>';
      }
      if($row['idEstadoCivil']=='2' && $row['cliSexo']=='0' ){
        $botonMatri='<button class="btn btn-sm btn-rojoFresa btn-outline btnLlamarEsposo" data-id="'.$row['idCliente'].'" data-sex="'.$row['cliSexo'].'"><i class="icofont-heart-alt"></i> Asociar esposo</button>';
      }
    }
  
  ?>
    
    <tr>
      <td><?= $row['idCliente']; ?></td>
      <td><?= $row['cliDni']; ?></td>
      <td><?= ucwords($row['cliApellidoPaterno']).' '.ucwords($row['cliApellidoMaterno']).', '. ucwords($row['cliNombres']); ?></td>
      <td><?= ucwords($row['addrDireccion']); ?></td>
      <td><?= $row['cliCelularPersonal']; ?></td>
      <td><?= $row['civDescripcion']; ?></td>
      <td> <a class="btn btn-sm btn-azul btn-outline btnAsignarSocio" href="creditos.php?titular=<?= $row['idCliente'];?>"><i class="icofont-ui-add"></i> Crear solicitud</a> <?php echo $botonMatri;?> </td>
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