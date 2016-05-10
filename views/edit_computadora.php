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
 	<title>Actualizar Computadora</title>
 	<!-- include material design CSS -->
    <link rel="stylesheet" href="../libs/css/materialize.min.css" />
    <link href="../libs/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" />
    <!-- include material design icons -->
   <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />-->
    <style>
    .width-30-pct{
	    width:30%;
	}
	 
	.text-align-center{
	    text-align:center;
	}
	 
	.margin-bottom-1em{
	    margin-bottom:1em;
	}
	.active2{
		background: #424242;
	
	}
	.container{
		margin-top: 50px;
	}
	.validform{
		color: red;
	}
    </style>
    <!-- include jquery -->

	<script type="text/javascript" src="../libs/js/jquery-2.1.4.min.js"></script>
	 
	<!-- material design js -->
	<script src="../libs/js/materialize.min.js"></script>
	 
	<!-- include angular js -->
	<script src="../libs/js/angular.min.js"></script>

	

	<script type="text/javascript" src="../libs/js/script.js"></script>
	<script src="../libs/js/jquery.dataTables.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			 $('.datepicker').pickadate({
			    selectMonths: true, // Creates a dropdown to control month
			    selectYears: 3, // Creates a dropdown of 15 years to control year
                format: 'yyyy-mm-dd',
                onSet: function (ele) {
				   if(ele.select){
				          this.close();
				   }
				}
			  });

		});
	</script>
 </head>
 <body>
  <nav>
    <div class="nav-wrapper #009688 teal">
      <a  class="brand-logo">Inventory</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
      	<li><a href="../index.php">Inicio</a></li>
        <li><a href="software.php" >Inventario de Software</a></li>
        <li><a href="hardware.php">Inventario de Hardware</a></li>
        <li><a href="bitacora.php" class="z-depth-3 active2">Bitacora</a></li>
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

<div class="container " ng-app="myApp" ng-controller="computadorasEditController">
 	<!--Formulario de nueva computadora-->
 	<form class="card-panel hoverable" >
 	<h5>Actualizar Registro de Computadora </h5>
	
 	<br>
 	<div class="row">
 		<input type="hidden" ng-model="id" value="<?php echo $_SESSION['computadora_id'];?>"></input>
	 	<div class="col s6" >
	        <label for="name">Nombre</label>
	    
	         
	        <input ng-model="nombre" type="text"  id="form-nombre" placeholder="Nombre..." name="nombre" required="" value="<?php echo $_SESSION['computadora_nombre'];?>" />
	 
			<!--<span ng-show="formsoftware.nombre.$touched && formsoftware.nombre.$invalid" class="alerta">Introduzca el nombre por favor</span>-->	
		</div>

		<div class="col s6">
	        <label for="modelo">Modelo</label>
	        <input ng-model="modelo" type="text"  id="form-modelo" placeholder="Modelo..." required="" name="modelo" value="<?php echo $_SESSION['computadora_modelo'];?>" />
		    
		    
		</div>
 	</div>

 	<!--

 	<div class="row">
 		<div class="col s6" ng-class="{ 'has-error' : computadoraForm.numero_de_serie.$invalid && !computadoraForm.numero_de_serie.$pristine }">
 			<label for="numero_serie">Número de serie</label>
 			<input ng-model="numero_de_serie" type="text" id="form-numero_serie" placeholder="Numero de serie..." name="numero_de_serie" required="" value="<?php echo $_SESSION['computadora_numero_de_serie'];?>" />
			<p ng-show="computadoraForm.numero_de_serie.$invalid && !computadoraForm.numero_de_serie.$pristine" class="help-block validform">Introduzca el numero de serie</p>
			
 		</div>
 		<div class="col s6" ng-class="{ 'has-error' : computadoraForm.fecha_de_compra.$invalid && !computadoraForm.fecha_de_compra.$pristine }">
 			<label for="fecha_de_compra">Fecha de compra</label>
 			<input required="" ng-model="fecha_de_compra" type="date"  id="form-fecha_de_compra"   name="fecha_de_compra" class="datepicker" value="<?php echo $_SESSION['computadora_fecha_de_compra'];?>" />
			<p ng-show="computadoraForm.fecha_de_compra.$invalid && !computadoraForm.fecha_de_compra.$pristine" class="help-block validform">Introduzca la fecha </p>
 		</div>
 	</div>
	
 	<div class="row">
 		<div class="col s6" ng-class="{ 'has-error' : computadoraForm.costo.$invalid && !computadoraForm.costo.$pristine }">
 			<label for="costo">Costo</label>
 			<input ng-model="costo" type="text"  id="form-costo" placeholder="Costo..." required="" name="costo" value="<?php echo $_SESSION['computadora_costo'];?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57"/>
			<p ng-show="computadoraForm.costo.$invalid && !computadoraForm.costo.$pristine" class="help-block validform">el costo es requerido </p>
			
 		</div>
 		<div class="col s6" ng-class="{ 'has-error' : computadoraForm.numero_asignado.$invalid && !computadoraForm.numero_asignado.$pristine }">
 		 	<label for="numero_asignado">Numero de maquina</label>
 			<input ng-model="numero_asignado" type="text" id="form-numero_asignado" placeholder="Numero de maquina..." required="" name="numero_asignado" value="<?php echo $_SESSION['computadora_numero_asignado'];?>" onkeypress="return event.charCode >= 48 && event.charCode <= 57"/>
			<p ng-show="computadoraForm.numero_asignado.$invalid && !computadoraForm.numero_asignado.$pristine" class="help-block validform">el numero de mauina es requerido	 </p>
			               
			     
 		</div>
 	</div>
	
 	<div class="row">
 		<div class="col s8" ng-class="{ 'has-error' : computadoraForm.caracteristicas.$invalid && !computadoraForm.caracteristicas.$pristine }">
 			<label for="caracteristicas">Caracteristicas</label>
 			<input ng-model="caracteristicas" type="text" id="form-caracteristcas" placeholder="Caracteristicas....." name="caracteristicas" required="" value="<?php echo $_SESSION['computadora_caracteristicas'];?>" />
			<p ng-show="computadoraForm.caracteristicas.$invalid && !computadoraForm.caracteristicas.$pristine" class="help-block validform">Caracteristicas </p>
			
 		</div>
 	</div>-->

 	<div class="row">
 		<div class="col s3 offset-s3">
 			<!--<a class="waves-effect waves-light btn" ng-click="createProduct()">Aceptar</a>-->
 			<button type="submit" class="waves-effect waves-light btn" >Actualizar</button>			
 		</div>
 		<div class="col s6 ">
 			<a href="hardware.php" class="waves-effect waves-light btn ">Cancelar</a>
 		</div>
 	</div>


 	</form>
	
            
				

				
          
     
	<!--fin de formulario-->
	<script type="text/javascript" src="../libs/js/app.js"></script>
</div><!--fin del container-->
 </body>
 </html>