

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>app glosario</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- include material design CSS -->
    <link rel="stylesheet" href="libs/css/bootstrap.min.css" />
    <link rel="stylesheet" href="libs/css/main2.css" />

    <!-- include jquery -->

	<script type="text/javascript" src="libs/js/jquery-2.1.4.min.js"></script>
	 
	<!-- material design js -->
	<script src="libs/js/bootstrap.min.js"></script>

	<!-- include angular js -->
	<script src="libs/js/angular.min.js"></script>

	
	<script type="text/javascript" src="libs/js/app.js"></script>
	<script type="text/javascript" src="libs/js/script.js"></script>
	<!--<script src="libs/js/jquery.dataTables.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			 $('#username').focus();
		});
	</script>-->
</head>	
<body ng-app="appGlosario" ng-controller="controllerSearch" >
<nav class="navbar navbar-default mynav" role="navigation" >
  <div class="container">
    
    <div class="navbar-header" >
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapsible">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">
      <span class="glyphicon glyphicon-education" aria-hidden="true"></span>
Glossary of Software Engineering</a>
    </div>
    
    <div class="navbar-collapse collapse" id="navbar-collapsible">
      
      
      
      <div class="navbar-form navbar-right btn-group">
        
        
        <a href="login.php" class="btn btn-primary"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>  Login</a>
      </div>
      
      <form class="navbar-form">
        <div class="form-group" style="display:inline;">
          <div class="input-group">
            <input type="text" class="form-control"  ng-model="search">
            <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
          </div>
        </div>
      </form>
      
    </div>
    
  </div>
</nav>





<div  ng-init="getAllTerminos()">
  <div class="row" >
    <div class="col-md-3 contenido">
      <div class="panel panel-default">
        <div class="panel-heading">Modelos de procesos</div>
        <div class="panel-body">
          <ul class="list-group">
            <!--<li class="list-group-item">MoproSoft</li>-->
            <li class="list-group-item"><a href="views/cmmi.php">CMMI </a></li>
            <!--<li class="list-group-item">ISO/IEC 15504</li>-->
           
          </ul>
        </div>
    </div>
    </div>
    
   
    <div class="col-md-6 " ng-repeat="d in terminos | filter:search" class="areaResultados" >
      <div class="termino">
      
        <h4>{{d.termino}}</h4>
        <span>{{d.fuente}}</span>
        <p>{{d.definicion}}</p>
      </div> 
    </div>
   
  
  </div>
</div>

<!--
<div class="col-md-10"  >
      <div class="termino">
        <h4>Buenas Prácticas</h4>
        <span>SWEBOK</span>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae iste fugit deserunt expedita aspernatur placeat possimus autem, repudiandae rerum! Ut dignissimos voluptates, praesentium facere provident dolor consequuntur natus impedit laudantium!</p>
      </div> 
    </div>
-->
</body>
</html>