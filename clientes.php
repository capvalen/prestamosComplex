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
		<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css?version=1.0.6">
</head>

<body>

<style>
/* input{margin-bottom: 0px;} */
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
			<h2 class="purple-text text-lighten-1"><i class="icofont-users"></i> Zona clientes</h2><hr>
			
			<div class="form-inline">
				<div class="form-group"><label for="" style='margin-top:-3px'>Filtro de clientes:</label> <input type="text" class='form-control' id="txtClientesZon" placeholder='Clientes' autocomplete="off" style="margin-bottom: 0px;">
				<button class="btn btn-infocat btn-outline btnSinBorde" id="btnFiltrarClientes"><i class="icofont-search"></i></button>
				<button class="btn btn-infocat btn-outline btnSinBorde" id="btnAddClientes"><i class="icofont-ui-add"></i> Nuevo cliente</button>

			</div></div>
			<div class="container-fluid row"><br>
				<h4><?php if(isset($_GET['buscar'])){echo 'Resultado de la búsqueda';}else{ echo 'Últimos clientes registrados';} ?></h4>
				<div class="table-responsive">
					<table class="table ">
					<thead>
						<tr>
							<th>Cod.</th>
							<th>D.N.I.</th>
							<th>Apellidos y nombres</th>
							<th>Dirección</th>
							<th>Celular</th>
							<th>Estado civil</th>
							<th>@</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						if (isset($_GET['buscar'])){
							require 'php/buscarCliente.php';
						}else{
							//require 'php/listarUltimos20Clientes.php';
						}
						?>
					</tbody>
					</table>
				</div>
			</div>
			
			<!-- Fin de contenido principal -->
			</div>
		</div>
</div>
<!-- /#page-content-wrapper -->
</div><!-- /#wrapper -->

<!-- Modal para mostrar buscar esposa -->
<div class="modal fade" id="mostrarAsignarEsposa" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
<div class="modal-dialog modal-sm" role="document">
	<div class="modal-content">
		<div class="modal-header-danger">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class="icofont icofont-help-robot"></i> Buscar esposa</h4>
		</div>
		<div class="modal-body ">
			<div class="row"><div class="col-xs-12">
				<p>Ingrese el DNI, y luego presione <kbd>Enter</kbd></p>
				<input type="text" id="txtDniConyugue" class="form-control input-lg text-center inputGrande" placeholder="DNI">
			</div></div>
			<label for="">Resultado:</label>
			<h4 class="text-center"><strong class="mayuscula" id="strNombreConyugue"></strong></h4>
			

		</div>
		<div class="modal-footer">
			<button class="btn btn-default btn-outline hidden" id="btnGuardarConyugue"><i class="icofont-love"></i> Agregar conyugue</button>
		</div>
	</div>
	</div>
</div>


<?php include 'footer.php'; ?>
<?php include 'php/modals.php'; ?>
<?php include 'php/existeCookie.php'; ?>

<?php if ( isset($_COOKIE['ckidUsuario']) ){?>
<script>
datosUsuario();

$(document).ready(function(){
	$('.selectpicker').selectpicker();
	$('#slpDepartamentos').change(function() {
		var depa = $('.optDepartamento:contains("'+$('#slpDepartamentos').val()+'")').attr('data-tokens');  //$('#divDepartamentos').find('.selected a').attr('data-tokens');
		$.ajax({url: 'php/OPTProvincia.php', type: 'POST', data: { depa: depa }}).done(function(resp) {
			$('#slpProvincias').html(resp).selectpicker('refresh');
		});
	});
	$('#slpProvincias').change(function() {
		var distri = $('.optProvincia:contains("'+$('#slpProvincias').val()+'")').attr('data-tokens');  //$('#divDepartamentos').find('.selected a').attr('data-tokens');
		
		$.ajax({url: 'php/OPTDistrito.php', type: 'POST', data: { distri: distri }}).done(function(resp) {
			$('#slpDistritos').html(resp).selectpicker('refresh');
		});
	});
	$('#slpDepartamentosNegoc').change(function() {
		var depa = $('.optDepartamento:contains("'+$('#slpDepartamentosNegoc').val()+'")').attr('data-tokens');  //$('#divDepartamentos').find('.selected a').attr('data-tokens');
		$.ajax({url: 'php/OPTProvincia.php', type: 'POST', data: { depa: depa }}).done(function(resp) {
			$('#slpProvinciasNegoc').html(resp).selectpicker('refresh');
		});
	});
	$('#slpProvinciasNegoc').change(function() {
		var distri = $('.optProvincia:contains("'+$('#slpProvinciasNegoc').val()+'")').attr('data-tokens');  //$('#divDepartamentos').find('.selected a').attr('data-tokens');
		$.ajax({url: 'php/OPTDistrito.php', type: 'POST', data: { distri: distri }}).done(function(resp) {
			$('#slpDistritosNegoc').html(resp).selectpicker('refresh');
		});
	});
});//fin de document ready
$('#btnAddClientes').click(function() {
	$('#modalNewCliente').modal('show');
});
$('#chkDireccion').change(function() {
	if( $('#chkDireccion').is(':checked') ){
		$(this).parent().find('label').text('Dirección de hogar y de negocio son iguales');
		$('#divDireccionNegocio').addClass('hidden');
		$('#txtCelPersonal').focus();
	}else{
		$(this).parent().find('label').text('Dirección de hogar y de negocio son diferentes');
		$('#divDireccionNegocio').removeClass('hidden');
		$('#txtDireccionNegocio').focus();
	}
});
$('#btnGuardarClienteNew').click(function() {
	var casa =0;

	if( $('#chkDireccion').is(':checked') ){//true
		casa=0;}else{ casa=1;}
		
	$.ajax({url: 'php/insertarCliente.php', type: 'POST', data: {
		direccion: $('#txtDireccionCasa').val(),
		zona: $('#sltDireccionExtra').val(),
		referencia: $('#txtReferenciaCasa').val(),
		numero: $('#txtNumeroCasa').val(),
		departam: $('#divDireccionCasa .optDepartamento:contains("'+$('#slpDepartamentos').val()+'")').attr('data-tokens'),
		provinc: $('#divDireccionCasa .optProvincia:contains("'+$('#slpProvincias').val()+'")').attr('data-tokens'),
		distrit: $('#divDireccionCasa .optDistrito:contains("'+$('#slpDistritos').val()+'")').attr('data-tokens'),
		calle: $('#slpCalles').val(),

		direccionNeg: $('#txtDireccionNegocio').val(),
		zonaNeg: $('#sltDireccionExtraNegoc').val(),
		referenciaNeg: $('#txtReferenciaNegoc').val(),
		numeroNeg: $('#txtNumeroNegoc').val(),
		departamNeg: $('#divDireccionNegocio .optDepartamento:contains("'+$('#slpDepartamentosNegoc').val()+'")').attr('data-tokens'),
		provincNeg: $('#divDireccionNegocio .optProvincia:contains("'+$('#slpProvinciasNegoc').val()+'")').attr('data-tokens'),
		distritNeg: $('#divDireccionNegocio .optDistrito:contains("'+$('#slpDistritosNegoc').val()+'")').attr('data-tokens'),
		calleNeg: $('#slpCallesNeg').val(),

		dni: $('#txtDniCliente').val(),
		nombres: $('#txtNombresCliente').val(),
		paterno: $('#txtPaternoCliente').val(),
		materno: $('#txtMaternoCliente').val(),
		hijos: $('#txtNumHijos').val(),
		sexo: $('#sltSexo').val(),
		celularPers: $('#txtCelPersonal').val(),
		celularRef: $('#txtCelReferencia').val(),
		civil: $('#sltEstadoCivil').val(),

		casa: casa}}).done(function(resp) { console.log(resp)
			if( parseInt(resp)>0 ){
				//location.reload();
				window.location.href = 'clientes.php?buscar='+resp;
			}
	});
});
// $('.soloNumeros').on('input', function () {
// 	this.value = this.value.replace(/[^0-9]/g,'');
// });
$('.soloNumeros').keypress(function (e) {
	if( !(e.which >= 48 /* 0 */ && e.which <= 90 /* 9 */)  ) { e.preventDefault(); }
});
$('#txtClientesZon').keypress(function (e) { if(e.keyCode == 13){ $('#btnFiltrarClientes').click(); } });
$('#btnFiltrarClientes').click(function() {
	if( $('#txtClientesZon').val()!=''){
		window.location.href = 'clientes.php?buscar='+encodeURIComponent($('#txtClientesZon').val());
	}else{
		window.location.href = 'clientes.php';
	}
});
$('.btnLlamarEsposo').click(function() {
	var id= $(this).attr('data-id')
	var elId= $(this).attr('data-sex')
	$('#strNombreConyugue').attr('data-llama', id );
	$('#strNombreConyugue').attr('data-idSexLlama', elId );
	$('#mostrarAsignarEsposa').modal('show');
});
$('#mostrarAsignarEsposa').on('shown.bs.modal', function () { $('#txtDniConyugue').focus(); });
$('#txtDniConyugue').keypress(function(e){
	var sex=0;
	if($('#strNombreConyugue').attr('data-idSexLlama')==1){
		sex=0;
	}else{
		sex=1
	}
	if(e.keyCode == 13){ 
		$.ajax({url: 'php/encontrarConyugue.php', type: 'POST', data: { dni: $('#txtDniConyugue').val(), sex: sex}}).done(function(resp) {
			var dato=JSON.parse(resp);
			
			if(dato.length==0){
				$('#btnGuardarConyugue').addClass('hidden');
				$('#strNombreConyugue').text('Aún no hay clientes de género opuesto con éste DNI');
			}else if(dato.length>1){
				$('#btnGuardarConyugue').addClass('hidden');
				$('#strNombreConyugue').text('Éste DNI está duplicado, comuníquelo con soporte');
			}else{
				$('#btnGuardarConyugue').removeClass('hidden');
				$('#strNombreConyugue').html('<i class="icofont-gavel"></i> ' +dato[0].cliApellidoPaterno.toLowerCase() + ' ' + dato[0].cliApellidoMaterno.toLowerCase() + ', ' +dato[0].cliNombres.toLowerCase());
				$('#strNombreConyugue').attr('data-id', dato[0].idCliente );
				$('#strNombreConyugue').attr('data-sex', dato[0].cliSexo );
			}
		});
	 }
});
$('#btnGuardarConyugue').click(function() {
	var idVaron =0, idDama =0;

	if( $('#strNombreConyugue').attr('data-sex')==1 ){
		idVaron=$('#strNombreConyugue').attr('data-id');
		idDama= $('#strNombreConyugue').attr('data-llama');
	}else{
		idDama=$('#strNombreConyugue').attr('data-id');
		idVaron= $('#strNombreConyugue').attr('data-llama');
	}
	$.ajax({url: 'php/insertarMatrimonio.php', type: 'POST', data: {idDama: idDama,
idVaron: idVaron }}).done(function(resp) {
		console.log(resp)
	});
});
</script>
<?php } ?>
</body>

</html>