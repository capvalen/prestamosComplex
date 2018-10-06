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
input{margin-bottom: 0px;}
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
				<div class="form-group"><label for="" style='margin-top:-3px'>Filtro de clientes:</label> <input type="text" class='form-control' id="txtClientesZon" placeholder='Clientes'>
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
							require 'php/listarUltimos20Clientes.php';
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

		direccionNeg: $('#txtDireccionNegocio').val(),
		zonaNeg: $('#sltDireccionExtraNegoc').val(),
		referenciaNeg: $('#txtReferenciaNegoc').val(),
		numeroNeg: $('#txtNumeroNegoc').val(),
		departamNeg: $('#divDireccionNegocio .optDepartamento:contains("'+$('#slpDepartamentosNegoc').val()+'")').attr('data-tokens'),
		provincNeg: $('#divDireccionNegocio .optProvincia:contains("'+$('#slpProvinciasNegoc').val()+'")').attr('data-tokens'),
		distritNeg: $('#divDireccionNegocio .optDistrito:contains("'+$('#slpDistritosNegoc').val()+'")').attr('data-tokens'),

		dni: $('#txtDniCliente').val(),
		nombres: $('#txtNombresCliente').val(),
		paterno: $('#txtPaternoCliente').val(),
		materno: $('#txtMaternoCliente').val(),
		hijos: $('#txtNumHijos').val(),
		sexo: $('#sltSexo').val(),
		celularPers: $('#txtCelPersonal').val(),
		celularRef: $('#txtCelReferencia').val(),
		civil: $('#sltEstadoCivil').val(),

		casa: casa}}).done(function(resp) {
			if( parseInt(resp)>0 ){
				location.reload();
			}
	});
});
// $('.soloNumeros').on('input', function () {
// 	this.value = this.value.replace(/[^0-9]/g,'');
// });
$('.soloNumeros').keypress(function (e) {
	if( !(e.which >= 48 /* 0 */ && e.which <= 90 /* 9 */)  ) { e.preventDefault(); }
});
$('#btnFiltrarClientes').click(function() {
	if( $('#txtClientesZon').val()!=''){
		window.location.href = 'clientes.php?buscar='+encodeURIComponent($('#txtClientesZon').val());
	}else{
		window.location.href = 'clientes.php';
	}
});
</script>
<?php } ?>
</body>

</html>