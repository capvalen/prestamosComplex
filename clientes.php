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
				<div class="form-group"><label for="" style='margin-top:-3px'>Filtro de clientes:</label> <input type="text" class='form-control' placeholder='Clientes'>
				<button class="btn btn-infocat btn-outline btnSinBorde" id="btnFiltrarClientes"><i class="icofont-search"></i></button>
				<button class="btn btn-infocat btn-outline btnSinBorde" id="btnAddClientes"><i class="icofont-ui-add"></i> Nuevo cliente</button>

			</div></div>
			<div class="container row"><br>
			Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestias, deleniti odit at temporibus sapiente eius pariatur exercitationem reprehenderit similique tenetur dignissimos. Dignissimos ipsam doloremque beatae voluptatibus nobis eveniet dolores molestiae?</div>
			<div class='container row' id="divResultados"></div>
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
		$('#divDireccionNegocio').find('input').focus();
	}
});

</script>
<?php } ?>
</body>

</html>