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