<?php 
header('Content-Type: text/html; charset=utf8');
date_default_timezone_set('America/Lima');
 ?>
<!DOCTYPE html>
<html lang="es">

<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Principal - Sistema Préstamos</title>

		<!-- Bootstrap Core CSS -->
		<?php include 'headers.php'; ?>
</head>

<body>

<style>

</style>
<div id="wrapper">
	<!-- Sidebar -->
	<?php include 'menu-wrapper.php' ?>
	<!-- /#sidebar-wrapper -->
<!-- Page Content -->
<div id="page-content-wrapper">
	<div class="container-fluid ">
		<div class="row noselect">
			<div class="col-lg-12 contenedorDeslizable ">
			<!-- Empieza a meter contenido principal -->
			<h2 class="purple-text text-lighten-1">Crear solicitud de préstamo <small><?php print $_COOKIE["ckAtiende"]; ?></small></h2><hr>
			
			<div class="panel panel-default">
				<div class="panel-body">
				<p><strong>Filtro de clientes:</strong></p>
					<div class="row">
						<div class="col-xs-6 col-sm-3">
							<input type="text" id="txtAddCliente" class="form-control">
						</div>
						<div class="col-xs-3">
							<button class="btn btn-primary btn-outline" id="btnBuscarClientesDni"><i class="icofont-search-1"></i> Buscar</button>
						</div>
					</div>
				</div>
			</div>

<?php if(isset( $_GET['titular'])): ?>
			<div class="panel panel-default">
				<div class="panel-body">
					<p><strong>Involucrados</strong></p>
					<table class="table" style="margin-bottom: 0px;">
						<thead>
							<tr>
								<th>D.N.I.</th>
								<th>Apellidos y nombres</th>
								<th>Estado civil</th>
								<th>Cargo</th>
							</tr>
						</thead>
						<tbody id="tbodySocios"></tbody>
					</table>

				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-body">
					<p><strong>Cálculos</strong></p>
					<div class="row">
						<div class="col-xs-6 col-sm-3">
							<label for="">Tipo de préstamo:</label>
							<select class="form-control selectpicker" id="sltTipoPrestamo" title="Seleccione un préstamo" data-width="100%" data-live-search="true" data-size="15">
								<?php include 'php/OPTTipoPrestamo.php'; ?>
							</select>
						</div>
						<div class="col-xs-6 col-sm-3">
							<label for="">Periodo</label>
							<input type="number" class="form-control esNumero noEsDecimal text-center" id="txtPeriodo" value=0>
						</div>
						<div class="col-xs-6 col-sm-3">
							<label for="">Monto</label>
							<input type="number" class="form-control esMoneda text-center" id="txtMontoPrinc" value=0.00>
						</div>
						<div class="col-xs-6 col-sm-3">
							<label for="">Fecha Desembolso</label>
							<input type="text" id="dtpFechaIniciov3" class="form-control text-center" placeholder="Fecha para controlar citas" autocomplete="off">
						</div>
						<div class="col-xs-6 col-sm-3 hidden" id="divPrimerPago">
							<label for="">Fecha primer pago</label>
							<input type="text" id="dtpFechaPrimerv3" class="form-control text-center" placeholder="Fecha para controlar citas" autocomplete="off">
						</div>
						<div class="col-xs-6 col-sm-3">
							<button class="btn btn-azul btn-lg btn-outline btnSinBorde" style="margin-top: 10px;" id="btnSimularPagos"><i class="icofont-support-faq"></i> Simular</button>
							<button class="btn btn-infocat btn-lg btn-outline btnSinBorde" style="margin-top: 10px;" id="btnGuardarCred"><i class="icofont-save"></i> Guardar</button>
						</div>
						<label class="orange-text text-darken-1 hidden" id="labelFaltaCombos" for=""><i class="icofont-warning"></i> Todas las casillas tienen que estar rellenadas para proceder</label>
					</div>
					
				</div>
			</div>
			<div class="panel panel-default">
			<div class="panel-body">
				<p><strong>Resultados:</strong></p>
				<div class="container row" id="divVariables">
				</div>
				<table class="table">
				<thead id="theadResultados">
				
				</thead>
					<tbody id="tbodyResultados"></tbody>
				</table>
				</div>
			</div>

<?php endif; ?>
				
			<!-- Fin de contenido principal -->
			</div>
		</div>
</div>
<!-- /#page-content-wrapper -->
</div><!-- /#wrapper -->

<!-- Modal para mostrar los clientes coincidentes -->
<div class="modal fade" id="mostrarResultadosClientes" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
<div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header-indigo">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class="icofont icofont-help-robot"></i> Resultados de la búsqueda</h4>
		</div>
		<div class="modal-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>D.N.I.</th>
						<th>Apellidos y nombres</th>
						<th>@</th>
					</tr>
				</thead>
				<tbody id="rowClientesEncontrados">
				</tbody>
			</table>
		</div>
	</div>
	</div>
</div>

<?php include 'footer.php'; ?>
<script src="js/bootstrap-material-datetimepicker.js?version=2.0.1"></script>
<?php include 'php/modals.php'; ?>
<?php include 'php/existeCookie.php'; ?>

<?php if ( isset($_COOKIE['ckidUsuario']) ){?>
<script>
datosUsuario();
$('.selectpicker').selectpicker();

$(document).ready(function(){
<?php
if(isset($_GET['titular'])){
?>
agregarClienteCanasta(<?= $_GET['titular']; ?>, 1);
<?php
}
?>

$('#dtpFechaIniciov3').val('<?php
	$date = new DateTime();
	echo  $date->format('d/m/Y');
?>');
$('#dtpFechaIniciov3').bootstrapMaterialDatePicker({
	format: 'DD/MM/YYYY',
	lang: 'es',
	time: false,
	weekStart: 1,
	nowButton : true,
	switchOnClick : true,
	//minDate : new Date(),
	// okButton: false,
	okText: '<i class="icofont-check-alt"></i> Aceptar',
	nowText: '<i class="icofont-bubble-down"></i> Hoy',
	cancelText : '<i class="icofont-close"></i> Cerrar'
});
$('#dtpFechaPrimerv3').val('<?php
	$date = new DateTime();
	$saltoDia = new DateInterval('P1D');
	$date->add($saltoDia);
	echo  $date->format('d/m/Y');
?>');
$('#dtpFechaPrimerv3').bootstrapMaterialDatePicker({
	format: 'DD/MM/YYYY',
	lang: 'es',
	time: false,
	weekStart: 1,
	nowButton : false,
	switchOnClick : true,
	minDate :  moment().add(1, 'days'),
	// okButton: false,
	okText: '<i class="icofont-check-alt"></i> Aceptar',
	nowText: '<i class="icofont-bubble-down"></i> Hoy',
	cancelText : '<i class="icofont-close"></i> Cerrar'
});
$('#txtAddCliente').keypress(function (e) {
	if(e.keyCode == 13){ $('#btnBuscarClientesDni').click(); }
});
$('#btnBuscarClientesDni').click(function () {
	if( $('#txtAddCliente').val()!='' ){
		$('#rowClientesEncontrados').children().remove();
		$.ajax({url: 'php/ubicarCliente.php', type: 'POST', data: { buscar: $('#txtAddCliente').val() }}).done(function(resp) {
			//console.log(resp);
			var json=JSON.parse(resp);
			if(json.length==0){
				$('#rowClientesEncontrados').append(`<tr">
						<td>No se encontraron coincidencias</td>
					</tr>`);
			}else{
				$.each( JSON.parse(resp) , function(i, dato){
					$('#rowClientesEncontrados').append(`<tr data-cli="${dato.idCliente}">
							<td>${dato.cliDni}</td>
							<td class="mayuscula">${dato.cliApellidoPaterno} ${dato.cliApellidoMaterno} ${dato.cliNombres} </td>
							<td><button class="btn btn-success btn-sm btn-outline btnSelectCliente" data-id="${dato.idCliente}" ><i class="icofont-ui-add"></i></button></td>
						</tr>`);				
				});
				}
			});
		$('#mostrarResultadosClientes').modal('show');
	}
});
$('#rowClientesEncontrados').on('click','.btnSelectCliente', function() {
	agregarClienteCanasta($(this).attr('data-id'), 3);
	$('#mostrarResultadosClientes').modal('hide');
});
$('#tbodySocios').on('click','.btnRemoveCanasta',function() {
	$(this).parent().parent().remove();
	//console.log( $(this).parent().parent().html() );
});
});

$('#btnSimularPagos').click(function() {
	if( $('#sltTipoPrestamo').val()=='' || $('#txtPeriodo').val()=='' || $('#txtMontoPrinc').val()=='' ||  parseFloat($('#txtPeriodo').val())==0 || parseFloat($('#txtMontoPrinc').val())==0 ){
		//console.log('falta algo')
		$('#labelFaltaCombos').removeClass('hidden');
	}else{
		$('#labelFaltaCombos').addClass('hidden');
	$.ajax({url: 'php/simularPrestamoOnline.php', type: 'POST', data: {
		modo: $('#sltTipoPrestamo').val(),
		periodo: $('#txtPeriodo').val(),
		monto: $('#txtMontoPrinc').val(),
		fDesembolso: moment($('#dtpFechaIniciov3').val(), 'DD/MM/YYYY').format('YYYY-MM-DD'),
		primerPago: moment($('#dtpFechaPrimerv3').val(), 'DD/MM/YYYY').format('YYYY-MM-DD')
		}}).done(function(resp) { console.log(resp)
		$('#tbodyResultados').html(resp);
		$('#tbodyResultados td').last().text('0.00');
	});
	$('#divVariables').children().remove();
	switch ($('#sltTipoPrestamo').val()) {
		
		case "1":
			$('#divVariables').append(`<p><strong>TED:</strong> <span>0.66%</span></p>`);
			$('#theadResultados').html(`	<th>#</th>
					<th>Fecha</th>
					<th>Cuota</th>
					<th>Interés</th>
					<th>Amortización</th>
					<th>Saldo</th>
					<th>Saldo Real</th>`);
			break;
		case "2":
			$('#divVariables').append(`<p><strong>TES:</strong> <span>1.52%</span></p>`);
			$('#theadResultados').html(`	<th>#</th>
					<th>Fecha</th>
					<th>Cuota</th>
					<th>Interés</th>
					<th>Amortización</th>
					<th>Saldo</th>
					<th>Saldo Real</th>`);
			break;
		case "4":
			$('#divVariables').append(`<p><strong>TEQ:</strong> <span>2.95%</span></p>`);
			$('#theadResultados').html(`	<th>#</th>
					<th>Fecha</th>
					<th>Cuota</th>
					<th>Interés</th>
					<th>Amortización</th>
					<th>Saldo</th>
					<th>Saldo Real</th>`);
			break;
		case "3":
			$('#theadResultados').html(`	<th>#</th>
					<th>Fecha pago</th>
					<th>Días</th>
					<th>Días Acum.</th>
					<th>FRC</th>
					<th>SK</th>
					<th>Amortización</th>
					<th>Interés</th>
					<th>Seg 1</th>
					<th>Seg Def</th>
					<th>Cuota sin ITF</th>
					<th>ITF</th>
					<th>Total Cuota</th>`);
			break;
		default:
			break;
	}
	} //fin de else
});
function agregarClienteCanasta(idCl, cargo) {
	$.ajax({url: 'php/ubicarDatosCliente.php', type: 'POST', data: { idCli: idCl }}).done(function(resp) {
//	console.log(resp);
	var dato = JSON.parse(resp);
	var botonDelete;
	if(cargo!=1){
		botonDelete='<button class="btn btn-danger btn-sm btn-outline btn-sinBorde btn-circle btnRemoveCanasta" data-id="${dato.idCliente}" ><i class="icofont-close"></i></button>';
	}else{botonDelete="";}
	$('#tbodySocios').append(`<tr data-cli="${dato[0].idCliente}">
			<td>${dato[0].cliDni}</td>
			<td class="mayuscula">${dato[0].cliApellidoPaterno} ${dato[0].cliApellidoMaterno} ${dato[0].cliNombres} </td>
			<td>${dato[0].civDescripcion}</td>
			<td><select class="form-control"><?php include 'php/OPTTipoCliente.php';?></select></td>
			<td>${botonDelete}</td>
		</tr>`);

	

		if(cargo==1 || cargo==2){
			$(`[data-cli="${dato[0].idCliente}"]`).find('select').val(cargo).attr('disabled','true');
		}else{
			$(`[data-cli="${dato[0].idCliente}"]`).find('select').val(cargo);
			$(`[data-cli="${dato[0].idCliente}"]`).find('select').find('[value="1"]').attr('disabled', 'true');
			$(`[data-cli="${dato[0].idCliente}"]`).find('select').find('[value="2"]').attr('disabled', 'true');
		}
			
		
});
if(cargo==1){
	$.ajax({url: 'php/listarMatrimonio.php', type: 'POST', data: { conyugue: idCl }}).done(function(resp) { //console.log(resp)
		var datoMatri= JSON.parse(resp);
		if(datoMatri.length==1){

			if(datoMatri[0].idEsposo==idCl){
			//	console.info('esposo') //listar a la esposa
				agregarClienteCanasta(datoMatri[0].idEsposa, 2);
			}else{
				//console.info('esposa') //listar al esposo
				agregarClienteCanasta(datoMatri[0].idEsposo, 2);
			}
		}
	});
}
}//fin de function
$('#btnGuardarCred').click(function() {
	if( $('#sltTipoPrestamo').val()=='' || $('#txtPeriodo').val()=='' || $('#txtMontoPrinc').val()=='' ||  parseFloat($('#txtPeriodo').val())==0 || parseFloat($('#txtMontoPrinc').val())==0 ){
		//console.log('falta algo')
		$('#labelFaltaCombos').removeClass('hidden');
	}else{
		$('#labelFaltaCombos').addClass('hidden');

	

		var clientArr = [];
		$.each( $('#tbodySocios tr') , function(i, objeto){
			clientArr.push( { 'id': $(objeto).attr('data-cli'), 'grado':  $(objeto).find('select').val()}  )
		});

		$.ajax({url: 'php/insertarPrestamoOnline.php', type: 'POST', data: {
			clientes: clientArr,
			modo: $('#sltTipoPrestamo').val(),
			periodo: $('#txtPeriodo').val(),
			monto: $('#txtMontoPrinc').val(),
			fDesembolso: moment($('#dtpFechaIniciov3').val(), 'DD/MM/YYYY').format('YYYY-MM-DD'),
			primerPago: moment($('#dtpFechaPrimerv3').val(), 'DD/MM/YYYY').format('YYYY-MM-DD')
		}}).done(function(resp) {
			console.log(resp)
			if( parseInt(resp)>0 ){
				$('#spanBien').text('Código de préstamo:')
				$('#h1Bien').html(`<a href="creditos.php?idCredito=`+resp+`">#`+resp+`</a> <br> <button class="btn btn-default " id="btnImpresionPrevia" data-pre="`+resp+`"><i class="icofont-print"></i> Imprimir</button>`)
				$('#modalGuardadoCorrecto').modal('show');
			}
		});
	}
});
$('#h1Bien').on('click', '#btnImpresionPrevia', function(){
		var dataUrl="php/printCronogramaPagos.php?prestamo="+$(this).attr('data-pre');
		window.open(dataUrl, '_blank' );
});
$('#sltTipoPrestamo').change(function() {
	if( $(this).val()==3 ){
		$('#divPrimerPago').removeClass('hidden');
	}else{
		$('#divPrimerPago').addClass('hidden');
	}
});
$('#dtpFechaIniciov3').change(function() {
	$('#dtpFechaPrimerv3').bootstrapMaterialDatePicker( 'setMinDate', moment($('#dtpFechaIniciov3').val(), 'DD/MM/YYYY').add(1, 'days') );
});
</script>
<?php } ?>
</body>

</html>