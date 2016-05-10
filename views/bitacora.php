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

	
	<script type="text/javascript" src="../libs/js/appBitacora.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			
			$.ajax({
			  url: "../methods/read_computadoras.php"
			})
		    .done(function( data ) {
		    	console.log(data);

		    	$("#selectNumeroDeMaquina").empty();
		    	$("#selectNumeroDeMaquina").append("<option value='Escoje un numero de maquina'>Escoje un numero de maquina</option");
		    	for (var i = 0; i < data.records.length; i++) {
					
					$("#selectNumeroDeMaquina").append("<option>"+String(data.records[i].numero_asignado)+"</option>");
				}
				
		    	
		    });
		  

			
			/*$("#div_actualizarComputadora").hide();
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
			  });*/
		
				
			/*$('.collapsible').collapsible({
		      accordion : true // A setting that changes the collapsible behavior to expandable instead of the default accordion style
		    });*/
		   
		    
		});
	</script>
 </head>
 <body ng-app="myAppLog">
 <nav>
    <div class="nav-wrapper #009688 teal">
      <a  class="brand-logo">Inventory</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
      	<li><a href="../index.php">Inicio</a></li>
        <li><a href="software.php" >Inventario de Software</a></li>
        <li><a href="hardware.php">Inventario de Hardware</a></li>
        <li><a class="z-depth-3 active2">Bitacora</a></li>
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
            <li class="tab col s3"><a href="#new_log" class="active">Maquinas</a></li>
            <li class="tab col s3"><a  href="#div_bitacora">Registro</a></li>
            
          </ul>
        </div>
    </div>
</div>
<!--Fin de Tabs-->

<!--/////////////////////////////////////////////////-->

<!--}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}-->



<div class="container"  ng-controller="logController" id="div_bitacora">
	<!--Estructura de mostrar solos mas computadoras-->
	<!--***********************************************************-->
	
	<div class="row">
		<div class="col s12">
			<h4>Buscar registro</h4>

            <!-- used for searching the current list -->
			<input type="text" ng-model="search" class="form-control" placeholder="Buscar en la bitacora...">
		</div>
		
	</div>
	
	<div class="row">
    <div class="col s12" >
            

			<!-- table that shows product record list -->
			<table class="hoverable striped " id="tablaProductos">
				<thead>
					<tr>
						<th class="">NUMERO DE MAQUINA</th>
						<th class="">MATRICULA</th>
						<th class="">HORA </th>
						<!--<th >HORA DE FIN</th>-->
						<th class="">FECHA </th>

						<th></th>
						
					</tr>
				</thead>
				<tbody ng-init="getAllRegistros()">
					<tr ng-repeat="d in registros | filter:search">
						<td >{{ d.numero_de_maquina }}</td>
						<td>{{ d.matricula }} </td>
						<td>{{ d.hora_entrada }}</td>
						<!--<td>{{ d.hora_salida }}</td>-->
						<td>{{ d.fecha }}</td>
						
						<td>
							<!--<a ng-click="readOne(d.id)" class="waves-effect waves-light btn">Editar</a>-->
							<!--<a href="../methods/read_one_computadora.php?id={{d.id}}" class="waves-effect waves-light btn">Editar</a>-->
							
						</td>
						<!--<td>
							<a ng-click="deleteSoftware(d.id)" class="waves-effect waves-light btn"><i class="mdi mdi-delete-forever material-icons"></i></a>
						</td>-->

					</tr>
				</tbody>
			</table>
	</div>
	
	</div>



	
</div>
<!--*********************************************************************************************************************************************************************************************************************************************-->
<!--Inicio del contenido-->

<div class="container" ng-controller="maquinasController"  id="new_log">
	<form class="card-panel hoverable" ng-submit="createRegistro()" name="nuevoRegistroForm" novalidate="">
	<h5>Nuevo Registro de uso de computadora</h5>
	<br>
	<br>
	<div class="row">
	 	<div class="col s6" ng-class="{ 'has-error' : nuevoRegistroForm.matricula.$invalid && !nuevoRegistroForm.matricula.$pristine }">
	        <label for="name">Matricula del estudiante</label>
	        <input ng-model="matricula" type="text"  id="form-matricula" placeholder="matricula..." name="matricula" required=""  />
	        <p ng-show="nuevoRegistroForm.matricula.$invalid && !nuevoRegistroForm.matricula.$pristine" class="help-block validform">Matricula necesaria</p>
			<!--<span ng-show="formsoftware.nombre.$touched && formsoftware.nombre.$invalid" class="alerta">Introduzca el nombre por favor</span>-->	
		</div>

		<div class="col s6" >
			<label>Numero de maquina</label>
	        <select id="selectNumeroDeMaquina" class="browser-default" ng-model="numero_de_maquina">
		      <option value="" disabled selected>Escoje un numero de maquina</option>
		      
		    </select>
		    
		    
		    
		</div>
 	</div>

	<div class="row">
		<div class="col s12" >
 			<label for="fecha">Fecha de uso</label>
 			<input required="" ng-model="fecha" type="text"  id="form-fecha"   name="fecha" disabled="" />
			
 		</div>
 		<!--<div class="col s4" >
 			<label for="fecha">Hora actual</label>
 			<input required="" ng-model="hora" type="text"  id="form-hora"   name="hora" disabled="" />
			
 		</div>-->
		
	</div>
	
	<div class="row">
 		<div class="col s8 offset-s4">
 			<!--<a class="waves-effect waves-light btn" ng-click="createProduct()">Aceptar</a>-->
 			<button type="submit" class="waves-effect waves-light btn" ng-disabled="nuevoRegistroForm.$invalid"  >Crear</button>
		
 		</div>
 		
 	</div>


	</form>
</div>

 </body>
 </html>