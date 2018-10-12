<!-- Modal para decir que hubo un error  -->
<div class="modal fade modal-GuardadoCorrecto" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
<div class="modal-dialog modal-sm" role="document">
	<div class="modal-content">
		<div class="modal-header-primary">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class="icofont icofont-social-readernaut"></i> Datos guardados</h4>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
			<div class="row">
			<img src="images/path4585.png?ver=1.1" class="img-responsive" alt=""><br>
			<p class="text-center blue-text text-darken-1"><strong>Tu información fue guardada:</strong></p>
			<p class="text-center blue-text text-darken-1"><span id="spanBien"></span><h1 class="text-center blue-text text-darken-1" id="h1Bien"></h1></p>
			</div>
		</div>
			
		<div class="modal-footer">
			<button class="btn btn-primary btn-outline" data-dismiss="modal" ><i class="icofont icofont-social-smugmug"></i> Bien</button>
		</div>
	</div>
	</div>
</div>
</div>

<!-- Modal para decir que hubo un error  -->
<div class="modal fade modal-GuardadoError" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
<div class="modal-dialog modal-sm" role="document">
	<div class="modal-content">
		<div class="modal-header-danger">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class="icofont icofont-animal-cat-alt-4"></i> Faltan datos</h4>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
			<div class="row">
			<p><strong>Ups!</strong> Lo sentimos, <span id="spanMalo"></span></p>
			<p>Comunícalo al área de Informática.</p>
			</div>
		</div>
			
		<div class="modal-footer">
			<button class="btn btn-danger btn-outline" data-dismiss="modal" ><i class="icofont icofont-warning-alt"></i> Ok</button>
		</div>
	</div>
	</div>
</div>
</div>


<div class="modal fade modal-iniciarSesion" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
<div class="modal-dialog modal-sm" role="document">
	<div class="modal-content">
		<div class="modal-header">

			<h4 class="modal-title" id="myModalLabel"><i class="icofont icofont-help-robot"></i> Iniciar sesión</h4>
		</div>
		<div class="modal-body">
			<div class="text-center" style="margin: 0 auto; padding-bottom: 10px;"><img src="images/peto.png" width="128px" alt=""></div>
			<p>Lo siento, tu sesión ya expiró, ingresa tus credenciales nuevamente para acceder.</p>
			<input type="text" class="form-control input-lg input-block text-center" id="txtVolverUsuario" placeholder="Usuario" style="font-size: 24px;">
			<input type="password" class="form-control input-lg input-block text-center" id="txtVolverPasw" placeholder="Contraseña" style="font-size: 24px;">
			<div class="divError text-left animated fadeIn hidden" style="margin-bottom: 20px;"><i class="icofont icofont-animal-cat-alt-4"></i> Lo sentimos, <span class="spanError">La cantidad de producto no puede ser cero o negativo.</span></div>
			<button class="btn btn-morado btn-outline btn-block btn-lg" id='btnVolverIniciarSesion' ><i class="icofont icofont-atom"></i> Iniciar sesión</button>
		</div>

	</div>
	</div>
</div>

<!-- Modal para mostrar los clientes coincidentes -->
<div class="modal fade modal-mostrarResultadosProducto" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
<div class="modal-dialog modal-lg" role="document">
	<div class="modal-content">
		<div class="modal-header-indigo">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class="icofont icofont-help-robot"></i> Resultados de la búsqueda</h4>
		</div>
		<div class="modal-body">
			<!-- <div class="row container-fluid"> <strong>
				<div class="col-xs-5">Producto</div>
				<div class="col-xs-5">Nombre de Cliente</div>
				<div class="col-xs-2">Monto inicial</div></strong>
			</div> -->
			<div class="" id="rowProductoEncontrado">
				
			</div>
			
		</div>
		<div class="modal-footer"> <button class="btn btn-primary btn-outline" data-dismiss="modal"><i class="icofont icofont-alarm"></i> Aceptar</button></div>
	</div>
	</div>
</div>

<!-- Modal para decir que hubo un error  -->
<div class="modal fade" id="modalNewCliente" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
<div class="modal-dialog " role="document">
	<div class="modal-content">
		<div class="modal-header-infocat">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class="icofont icofont-animal-cat-alt-4"></i> Nuevo cliente</h4>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
			<div class="row">
				<p>Por favor rellene cuidadosamente los siguientes campos</p>
				<div class="row "><div class="col-xs-6">
					<label for="">D.N.I.</label> <input type="text" id='txtDniCliente' class='form-control soloNumeros'>
				</div>
				</div>
				<div class="row">
					<div class="col-xs-6"><span class="obligatorio">*</span> <label for="">Apellido paterno</label><input type="text" id="txtPaternoCliente" class="form-control"></div>
					<div class="col-xs-6"><span class="obligatorio">*</span> <label for="">Apellido materno</label><input type="text" id="txtMaternoCliente" class="form-control"></div>
				</div>
				<div class="row">
				<div class="col-xs-6"><label for="">Nombres</label> <input type="text" id="txtNombresCliente" class='form-control'></div>
				<div class="col-xs-6"><label for="">Sexo</label>
					<select class="selectpicker" id="sltSexo" title="Seleccione un sexo" data-width="100%" data-live-search="true" data-size="15">
						<option value="0">Femenino</option>
						<option value="1">Masculino</option>
					</select>
				</div>
				</div>
				<div class="row">
					<div class="col-xs-6">
					<label for="">Estado civil</label>
					<select class="selectpicker" title="Estados civiles" id="sltEstadoCivil" data-width="100%" data-live-search="true" data-size="15">
						<?php include 'OPTEstadoCivil.php'; ?>
					</select>
					</div>
					<div class="col-xs-6">
						<label for="">N° de hijos dependientes</label>
						<input type="number" class="form-control" value="0" id="txtNumHijos">
					</div>
				</div>
				<div class="row container-fluid" id="divDireccionCasa">
					<label for="">Dirección domiciliar</label>
					<div class="row container-fluid">
						<div class="col-xs-4" id="divCalles"><select id="slpCalles" class="selectpicker" data-width="100%" data-live-search="true"  data-size="15" title="Calle"><?php include 'php/OPTCalles.php'; ?></select></div>
						<div class="col-xs-12 col-sm-8"><input type="text" class="form-control" id="txtDireccionCasa"  placeholder='Dirección de hogar'></div>
						<div class="col-xs-4"><input type="text" class="form-control" id="txtNumeroCasa" placeholder='#'></div>
						<div class="col-xs-4"><select class="selectpicker" title="Zona" id="sltDireccionExtra" data-width="100%" data-live-search="true" data-size="15"><?php include 'php/OPTZona.php'; ?></select></div>
						<div class="col-xs-12"><input type="text" id='txtReferenciaCasa' class='form-control' placeholder='Referencia de la casa'></div>
						<div class="col-xs-4" id="divDepartamentos"><select id="slpDepartamentos" class="selectpicker" data-width="100%" data-live-search="true"  data-size="15" title="Departamento"><?php include 'php/OPTDepartamento.php'; ?></select></div>
						<div class="col-xs-4" id="idProvincias"><select id="slpProvincias" class="selectpicker" data-width="100%" data-live-search="true"  title="Ciudad"></select></div>
						<div class="col-xs-4" id="idDistritos"><select id="slpDistritos" class="selectpicker" data-width="100%" data-live-search="true" title="Distrito"></select></div>
					</div>
					<div class="checkbox checkbox-infocat checkbox-circle">
						<input type="checkbox" class="styled" checked id="chkDireccion">
						<label for="chkDireccion">Dirección de hogar y de negocio son iguales</label>
					</div>
				</div>
				<div class="row container-fluid hidden" id="divDireccionNegocio">
					<div class="col-xs-4" id="divCallesNeg"><select id="slpCallesNeg" class="selectpicker" data-width="100%" data-live-search="true"  data-size="15" title="Calle"><?php include 'php/OPTCalles.php'; ?></select></div>
				    <label style="display: table;">Dirección de negocio</label>
				    <div class="col-xs-12 col-sm-6"><input type="text" class="form-control" id="txtDireccionNegocio" placeholder='Dirección de negocio'></div>
						<div class="col-xs-4"><input type="text" class="form-control" id="txtNumeroNegoc" placeholder='#'></div>
						<div class="col-xs-4"><select class="selectpicker" title="Zona" id="sltDireccionExtraNegoc" data-width="100%" data-live-search="true" data-size="15"><?php include 'php/OPTZona.php'; ?></select></div>
						<div class="col-xs-12"><input type="text" id='txtReferenciaNegoc' class='form-control' placeholder='Referencia del negocio'></div>
						<div class="col-xs-4" id="divDepartamentosNegoc"><select id="slpDepartamentosNegoc" class="selectpicker" data-width="100%" data-live-search="true"  data-size="15" title="Departamento"><?php include 'php/OPTDepartamento.php'; ?></select></div>
						<div class="col-xs-4" id="idProvinciasNegoc"><select id="slpProvinciasNegoc" class="selectpicker" data-width="100%" data-live-search="true"  title="Ciudad"></select></div>
						<div class="col-xs-4" id="idDistritosNegoc"><select id="slpDistritosNegoc" class="selectpicker" data-width="100%" data-live-search="true" title="Distrito"></select></div>
				</div>
				<div class="row">
					<div class="col-xs-6"><label for="">Celular personal</label> <input type="text" id="txtCelPersonal" class="form-control"></div>
					<div class="col-xs-6"><label for="">Celular referencial</label> <input type="text" id="txtCelReferencia" class="form-control"></div>
				</div>
			
		</div>
			
		<div class="modal-footer">
			<button class="btn btn-infocat btn-outline" id="btnGuardarClienteNew" ><i class="icofont icofont-save"></i> Guardar</button>
		</div>
	</div>
	</div>
</div>
</div>