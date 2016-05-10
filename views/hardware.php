<?php 
if (session_id()==null)
  session_start();
  if(!isset($_SESSION['user'])){
  	header("location: ../index.php");
  }
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>HARDWARE</title>
 	<!-- include material design CSS -->
    <link rel="stylesheet" href="../libs/css/materialize.min.css" />
    <link href="../libs/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" />
    <!-- include material design icons -->
   <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />-->
    <style>

   
	.active2{
		background: #424242;
		
	}
	.container{
		margin-top: 50px;
	}
	.modal{
		width: 70%;
		
	}
	.alerta{
		color: red;
	}
	th{
		font-size: 12px;
		align-items: center;
	}
	td{
		font-size: 13px;
		align-content: center;
	}
    </style>
    <!-- include jquery -->

	<script type="text/javascript" src="../libs/js/jquery-2.1.4.min.js"></script>
	 
	<!-- material design js -->
	<script src="../libs/js/materialize.min.js"></script>
	 
	<!-- include angular js -->
	<script src="../libs/js/angular.min.js"></script>

	
	<script type="text/javascript" src="../libs/js/app.js"></script>

	<script src="../libs/js/jquery.dataTables.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#div_actualizarComputadora").hide();
			  $('.datepicker').pickadate({
			    selectMonths: true, // Creates a dropdown to control month
			    selectYears: 3, // Creates a dropdown of 15 years to control year
                min: new Date(),
                format: 'yyyy-mm-dd',
                onSet: function (ele) {
				   if(ele.select){
				          this.close();
				   }
				}
			  });
			  /*
			$('select').material_select();
			$('select').material_select();*/
			/*$('.collapsible').collapsible({
		      accordion : true // A setting that changes the collapsible behavior to expandable instead of the default accordion style
		    });*/
		});
	</script>
 </head>
 <body ng-app="myApp">
 <nav>
    <div class="nav-wrapper #009688 teal">
      <a  class="brand-logo">Inventory</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
      	<li><a href="../index.php">Inicio</a></li>
        <li><a href="software.php" >Inventario de Software</a></li>
        <li><a class="z-depth-3 active2">Inventario de Hardware</a></li>
        <li><a href="bitacora.php">Bitacora</a></li>
        <!--<li><a><?php echo $_SESSION['user']['username']; ?></a></li>-->
        <li><a class='dropdown-button ' href="" data-activates='dropdown1'><i class="mdi mdi-account"></i></a></li>
        <!--<li><a href="../validate/logout.php">Cerrar Sesión</a></li>-->
      </ul>
    </div>
  </nav>
  <!-- Dropdown Structure -->
  <ul id='dropdown1' class='dropdown-content'>
    
    <li><a href="../validate/logout.php">Cerrar Sesión</a></li>
  </ul>

<!--TABS********************+-->
<div class="container">
	<div class="row">
        <div class="col s12">
          <ul class="tabs">
            <li class="tab col s3"><a href="#todos_los_hardwares" class="active">Otros hardwares</a></li>
            <li class="tab col s3"><a  href="#solo_computadoras">Computadoras</a></li>
            
          </ul>
        </div>
    </div>
</div>
<!--Fin de Tabs-->

<!--/////////////////////////////////////////////////-->

<!--}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}-->



<div class="container"  ng-controller="computadorasController" >
	<!--Estructura de mostrar solos mas computadoras-->
	<!--***********************************************************-->
	<div id="solo_computadoras">
	<div class="row">
		<div class="col s8">
			<h4>Buscar Equipos</h4>

            <!-- used for searching the current list -->
			<input type="text" ng-model="search" class="form-control" placeholder="Buscar Equipo...">
		</div>
		<div class="col s4">
			<a ng-click="showCreateForm()" class="waves-effect waves-light btn red">Nuevo Registro</a>
		</div>
	</div>
	
	<div class="row">
    <div class="col s12" >
            

			<!-- table that shows product record list -->
			<table class="hoverable striped " id="tablaProductos">
				<thead>
					<tr>
						<th class="">NOMBRE</th>
						<th class="">MODELO</th>
						<th class="">CARACTERISTICAS</th>
						<th >NÚMERO DE SERIE</th>
						<th class="">FECHA DE COMPRA</th>
						<th class="">COSTO</th>
						<th>NÚMERO ASIGNADO </th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody ng-init="getAll()">
					<tr ng-repeat="d in computadoras | filter:search">
						<td >{{ d.nombre }}</td>
						<td>{{ d.modelo }} </td>
						<td>{{ d.caracteristicas }}</td>
						<td>{{ d.numero_de_serie }}</td>
						<td>{{ d.fecha_de_compra }}</td>
						<td> $ {{ d.costo }}</td>
						<td>{{ d.numero_asignado }}</td>
						<td>
							<a ng-click="readOne(d.id)" class="waves-effect waves-light btn">Editar</a>
							<!--<a href="../methods/read_one_computadora.php?id={{d.id}}" class="waves-effect waves-light btn">Editar</a>-->
							
						</td>
						<td>
							<a ng-click="deleteSoftware(d.id)" class="waves-effect waves-light btn"><i class="mdi mdi-delete-forever material-icons"></i></a>
						</td>

					</tr>
				</tbody>
			</table>
	</div>
	
	</div>
	</div><!--div  de tabla-->


	<!--Formulario de nueva computadora-->
 	<form class="card-panel hoverable"  name="computadoraForm" novalidate="" id="div_actualizarComputadora">
 	<h5 id="form-computadora-title" >Sin titulo </h5>

 	<br>
 	<div class="row">
	 	<div class="col s6" ng-class="{ 'has-error' : computadoraForm.nombre.$invalid && !computadoraForm.nombre.$pristine }">
	        <label for="name">Nombre</label>
	        <input ng-model="nombre" type="text"  id="form-nombre" placeholder="Nombre..." name="nombre" required=""  />
	        <p ng-show="computadoraForm.nombre.$invalid && !computadoraForm.nombre.$pristine" class="help-block validform">Nombre es requerido</p>
			<!--<span ng-show="formsoftware.nombre.$touched && formsoftware.nombre.$invalid" class="alerta">Introduzca el nombre por favor</span>-->	
		</div>

		<div class="col s6" ng-class="{ 'has-error' : computadoraForm.modelo.$invalid && !computadoraForm.modelo.$pristine }">
	        <label for="modelo">Modelo</label>
	        <input ng-model="modelo" type="text"  id="form-modelo" placeholder="Modelo..." required="" name="modelo" />
		    <p ng-show="computadoraForm.modelo.$invalid && !computadoraForm.modelo.$pristine" class="help-block validform">Introduzca el modelo</p>
		    
		</div>
 	</div>

 	

 	<div class="row">
 		<div class="col s6" ng-class="{ 'has-error' : computadoraForm.numero_de_serie.$invalid && !computadoraForm.numero_de_serie.$pristine }">
 			<label for="numero_serie">Número de serie</label>
 			<input ng-model="numero_de_serie" type="text" id="form-numero_serie" placeholder="Numero de serie..." name="numero_de_serie" required="" />
			<p ng-show="computadoraForm.numero_de_serie.$invalid && !computadoraForm.numero_de_serie.$pristine" class="help-block validform">Introduzca el numero de serie</p>
			
 		</div>
 		<div class="col s6" ng-class="{ 'has-error' : computadoraForm.fecha_de_compra.$invalid && !computadoraForm.fecha_de_compra.$pristine }">
 			<label for="fecha_de_compra">Fecha de compra</label>
 			<input required="" ng-model="fecha_de_compra" type="text"  id="form-fecha_de_compra"   name="fecha_de_compra" class="datepicker"/>
			<p ng-show="computadoraForm.fecha_de_compra.$invalid && !computadoraForm.fecha_de_compra.$pristine" class="help-block validform">Introduzca la fecha </p>
 		</div>
 	</div>
	
 	<div class="row">
 		<div class="col s6" ng-class="{ 'has-error' : computadoraForm.costo.$invalid && !computadoraForm.costo.$pristine }">
 			<label for="costo">Costo</label>
 			<input ng-model="costo" type="text"  id="form-costo" placeholder="Costo..." required="" name="costo" onkeypress="return event.charCode >= 48 && event.charCode <= 57"/>
			<p ng-show="computadoraForm.costo.$invalid && !computadoraForm.costo.$pristine" class="help-block validform">el costo es requerido </p>
			
 		</div>
 		<div class="col s6" ng-class="{ 'has-error' : computadoraForm.numero_asignado.$invalid && !computadoraForm.numero_asignado.$pristine }">
 		 	<label for="numero_asignado">Numero de maquina</label>
 			<input ng-model="numero_asignado" type="text" id="form-numero_asignado" placeholder="Numero de maquina..." required="" name="numero_asignado" onkeypress="return event.charCode >= 48 && event.charCode <= 57"/>
			<p ng-show="computadoraForm.numero_asignado.$invalid && !computadoraForm.numero_asignado.$pristine" class="help-block validform">el numero de mauina es requerido	 </p>
			               
			     
 		</div>
 	</div>
	
 	<div class="row">
 		<div class="col s8" ng-class="{ 'has-error' : computadoraForm.caracteristicas.$invalid && !computadoraForm.caracteristicas.$pristine }">
 			<label for="caracteristicas">Caracteristicas</label>
 			<input ng-model="caracteristicas" type="text" id="form-caracteristcas" placeholder="Caracteristicas....." name="caracteristicas" required="" />
			<p ng-show="computadoraForm.caracteristicas.$invalid && !computadoraForm.caracteristicas.$pristine" class="help-block validform">Caracteristicas </p>
			
 		</div>
 	</div>

 	<div class="row">
 		<div class="col s3 offset-s3">
 			<!--<a class="waves-effect waves-light btn" ng-click="createProduct()">Aceptar</a>-->
 			<button type="submit" class="waves-effect waves-light btn" ng-disabled="computadoraForm.$invalid" id="btn-crear-form-computadora" ng-click="createProduct()">Crear</button>

 			<button type="submit" class="waves-effect waves-light btn" ng-disabled="computadoraForm.$invalid" id="btn-actualizar-form-computadora" ng-click="updateProduct()">Actualizar</button>			
 		</div>
 		<div class="col s6 ">
 			<a ng-click="cancelActualizarComputadora()" class="waves-effect waves-light btn ">Cancelar</a>
 		</div>
 	</div>


 	</form>

 	<!--Modal Confir eliminar registro computadora-->

			<div id="modal_eliminar_computadora" class="modal">
		        <div class="modal-content">
		            <h4>CONFIRMACION</h4>
		            <p>Esta seguro de eliminar el registro ?</p>
		        </div>
		        <div class="modal-footer">
		            <a  class=" modal-action modal-close waves-effect waves-red btn-flat" >Cancelar</a>
		            <a href="#" class="waves-effect waves-green btn-flat" ng-click="aceptDeleteSoftware()">Aceptar</a>
		       </div>
		    </div>
</div>
<!--*********************************************************************************************************************************************************************************************************************************************-->
<!--Inicio del contenido-->
<div class="container" ng-controller="hardwareController"  id="todos_los_hardwares">
	
	
    




	<!--Estructura de todos los hardwares-->
    <div class="row">
        <div class="col s12">
            <h4>Todos los Hardwares</h4>

            <!-- used for searching the current list -->
			<input type="text" ng-model="search" class="form-control" placeholder="Buscar Software...">

			<!-- table that shows product record list -->
			<table class="hoverable striped " id="tablaProductos">
				<thead>
					<tr>
						<th class="">HARDWARE</th>
						<th class="">CARACTERISTICAS</th>
						<th class="">MODELO</th>
						<th >NÚMERO DE SERIE</th>
						<th class="">FECHA DE COMPRA</th>
						<th class="">COSTO</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody ng-init="getAll()">
					<tr ng-repeat="d in hardwares | filter:search">
						<td >{{ d.nombre }}</td>
						<td>{{ d.caracteristicas }} </td>
						<td>{{ d.modelo }}</td>
						<td>{{ d.numero_serie }}</td>
						<td>{{ d.fecha_de_compra }}</td>
						<td> $ {{ d.costo }}</td>
			
						
						<td>
							<a ng-click="readOne(d.id)" class="waves-effect waves-light btn">Editar</a>

							
						</td>
						<td>
							<a ng-click="deleteSoftware(d.id)" class="waves-effect waves-light btn"><i class="mdi mdi-delete-forever material-icons"></i></a>
						</td>

					</tr>
				</tbody>
			</table>

		
			
			


            
			<!-- modal for for creating new product -->
			
			<div id="modal-product-form" class="modal modal-fixed-footer">
			    <div class="modal-content">
			        <h4 id="modal-product-title">Create New Product</h4>
			        <form name="formsoftware">
			        <div class="row">
			            <div class="input-field col s12">

			                <input ng-model="nombre" type="text" class="validate" id="form-nombre" placeholder="Nombre..." name="nombre" required="" />
			                <span ng-show="formsoftware.nombre.$touched && formsoftware.nombre.$invalid" class="alerta">Introduzca el nombre por favor</span>
			                
			                <label for="name">Nombre</label>
			                
			            </div>
			           
			            <div class="input-field col s12">
			                <input ng-model="caracteristicas" type="text" class="validate" id="form-version" placeholder="caracteristicas" name="caracteristicas" required="" />
			                <span ng-show="formsoftware.caracteristicas.$touched && formsoftware.caracteristicas.$invalid" class="alerta">Introduzca las caracteristicas por favor</span>
			                <label for="caracteristicas">Caracteristicas</label>
			            </div>
			            <div class="input-field col s6">
			                <input ng-model="modelo" type="text" class="validate" id="form-name" placeholder="Modelo..." required="" name="modelo" />
			                <span ng-show="formsoftware.modelo.$touched && formsoftware.modelo.$invalid" class="alerta">Introduzca la modelo por favor</span>
			                <label for="modelo">Modelo</label>
			            </div>
			            <!--documento de amparo opcional-->
			            <div class="input-field col s6">
			                <input ng-model="numero_serie" type="text" class="validate" id="form-numero_serie" placeholder="Numero de serie..." name="numero_serie" required="" />
			                <span ng-show="formsoftware.numero_serie.$touched && formsoftware.numero_serie.$invalid" class="alerta">Introduzca el número de serie por favor</span>
			                <label for="numero_serie">Número de serie</label>
			            </div>



			            <div class="input-field col s6">
			                <input required="" ng-model="fecha_de_compra" type="text"  id="form-fecha_de_compra"   name="fecha_de_compra" class="datepicker"/>
			                <!--<span ng-show="formsoftware.fecha_de_compra.$touched && formsoftware.fecha_de_compra.$invalid" class="alerta">Introduzca la fecha de compra</span>-->
			                <label for="fecha_de_compra">Fecha de compra</label>
			            </div>

			            <div class="input-field col s6">
			                <input ng-model="costo" type="text" class="validate" id="form-costo" placeholder="Costo..." required="" name="costo" onkeypress="return event.charCode >= 48 && event.charCode <= 57"/>
			                <span ng-show="formsoftware.costo.$touched && formsoftware.costo.$invalid" class="alerta">Introduzca el costo por favor</span>
			                <label for="costo">Costo</label>
			            </div>
			            <br>
			            <br>
			            
			          
			            
			            <!--<div class="input-field col s12">
			                <a id="btn-create-product" class="waves-effect waves-light btn margin-bottom-1em" ng-click="createProduct()">Crear</a>
			                 
			                <a id="btn-update-product" class="waves-effect waves-light btn margin-bottom-1em" ng-click="updateProduct()">Guardar Cambios</a>
			                 
			                <a class="modal-action modal-close waves-effect waves-light btn margin-bottom-1em">Cerrar</a>
			            </div>-->
			        </div>
			        </form>
			    </div>
			   <div class="modal-footer">
			   <a href="#!" class="modal-action modal-close waves-effect waves-green btn red" >Cancelar</a>
			      <a id="btn-create-product" class="modal-action modal-close waves-effect waves-light btn " ng-click="createProduct()" >Crear</a>
			      <a id="btn-update-product" class="modal-action modal-close waves-effect waves-light btn " ng-click="updateProduct()">Guardar Cambios</a>
			      
			    </div>
			</div>

			<!-- floating button for creating product -->
			<div class="fixed-action-btn" style="bottom:45px; right:10px;">
			   
			    <a class=" btn red" ng-click="showCreateForm()">Nuevo Registro</a>
			</div>

			<!--Modal Confir eliminar registro-->

			<div id="modal_eliminar_hardware" class="modal">
		        <div class="modal-content">
		            <h4>CONFIRMACION</h4>
		            <p>Esta seguro de eliminar el registro ?</p>
		        </div>
		        <div class="modal-footer">
		            <a  class=" modal-action modal-close waves-effect waves-red btn-flat" >Cancelar</a>
		            <a href="#" class="waves-effect waves-green btn-flat" ng-click="aceptDeleteSoftware()">Aceptar</a>
		       </div>
		    </div>
			
             
        </div> <!-- end col s12 -->
    </div> <!-- end row -->
</div> <!-- end container -->

 </body>
 </html>