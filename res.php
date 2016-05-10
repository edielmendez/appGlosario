

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>app glosario</title>
	<!-- include material design CSS -->
    <link rel="stylesheet" href="libs/css/materialize.min.css" />
     
    <!-- include material design icons -->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <style>
    nav{
      background: #2196F3;
    }

    .actionCard{
      color: #727272;
    }

    #formLogin{
      display: none;
    }
   

    </style>
    <!-- include jquery -->

	<script type="text/javascript" src="libs/js/jquery-2.1.4.min.js"></script>
	 
	<!-- material design js -->
	<script src="libs/js/materialize.min.js"></script>
	 
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
<body class="blue lighten-5">
  <nav>
    <div class="nav-wrapper">
      <form>
        <div class="input-field">
          <input id="search" type="search" required>
          <label for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
  </nav>

  
      <div class="row">
      <div class="col s12 m3 card-panel " >
        <!-- Grey navigation panel -->
        <div class="row" id="btnMostrarFormLogin">
            <div class="input-field offset-s3 col s6">
              <button class="btn  col s12" style="background: #727272">Login</button>
            </div>
        </div>

        <div class="collection z-depth-3" id="formLogin">
          <h5>Iniciar Sesión</h5>
          <div class="row margin">
            <div class="input-field  col s12">
              <i class="mdi-social-person-outline prefix"></i>
              <input id="username" type="text" name="username" required="">
              <label for="username" class="center-align">Username</label>
            </div>
          </div>
          <div class="row margin">
            <div class="input-field  col s12">
              <i class="mdi-action-lock-outline prefix"></i>
              <input id="password" type="password" name="password" required="">
              <label for="password">Password</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field offset-s3 col s6">
              <input type="submit" value="Aceptar" class="btn  col s12" style="background: #727272"></input>
              
            </div>
          </div>
          <a id="btnCerrarFormLogin" href="#"> Cerrar</a>
        </div>
        <div class="row" style="background: #B6B6B6">
          <div class="col s12">
            <h5>Modelos de Procesos</h5>
          </div>
        </div>
        <div class="collection z-depth-3" id="salas">
          <a href="#!" class="collection-item active" style="font-size:18px;">MoProsof</a>
          <a href="#!" class="collection-item active" style="font-size:18px;">CMMI</a>
          <a href="#!" class="collection-item active" style="font-size:18px;">ISO/IEC 15504</a>
        </div>


      </div>

      <!--Fin de la barra lateral-->

      <div class="col s12 m9">
        <!-- Teal page content  -->
        <div class="col s12 m10">
          <div class="card z-depth-3">
            <div class="card-content ">
              <span class="card-title">Buenas Prácticas</span>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque, explicabo hic quae. Pariatur odit ducimus exercitationem magni tempora, provident tempore est, eligendi reiciendis dolore veritatis optio quos, quasi omnis iusto.</p>
            </div>
            <div class="card-action">
              <a href="" class="actionCard">Según SWEBOK</a>
              <a href="" class="actionCard">Según MoProsoft</a>
            </div>
          </div>


        </div>
      </div>

    </div>
    
</body>
</html>