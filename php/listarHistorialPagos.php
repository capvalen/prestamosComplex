<?php
require("conkarl.php");

$sql="SELECT pre.idPrestamo, presMontoDesembolso, pc.cuotCuota, presFechaDesembolso, pc.cuotFechaPago,  tpe.tpreDescipcion, presPeriodo, u.usuNick
FROM `prestamo` pre
inner join prestamo_cuotas pc on pc.idPrestamo = pre.idPrestamo
inner join tipoprestamo tpe on tpe.idTipoPrestamo = pre.idTipoPrestamo
inner join usuario u on u.idUsuario = pre.idUsuario
where pre.idPrestamo = 71
order by cuotfechaPago desc
limit 1;";

$resultado=$cadena->query($sql);
while($row=$resultado->fetch_assoc()){ ?>
  <tr>
    <td>Huancayo</td>
    <td><?= $row['idPrestamo']; ?></td>
    <td><?= $row['presMontoDesembolso']; ?></td>
    <td><?= $row['cuotCuota']; ?></td>
    <td>Saldo k</td>
    <td><?= $row['presFechaDesembolso']; ?></td>
    <td><?= $row['cuotFechaPago']; ?></td>
    <td><?= $row['tpreDescipcion']."-".$row['presPeriodo']; ?></td>

    <?php 
    $idPres= $row['idPrestamo'];
    
    ?>

  </tr>
<?php }

?>