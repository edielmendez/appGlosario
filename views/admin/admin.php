<?php 
if (session_id()==null)
  session_start();
  if(!isset($_SESSION['user'])){
    header("location: ../index.php");
  }
 /*
 include_once '../../config/database.php';

include_once '../../objects/termino.class.php';
$database = new Database();
$db = $database->getConnection();
 
$termino = new Termino($db);
    $terminos = array();
    $stmt = $termino->readAll();
    $num = $stmt->rowCount();

    
    if($num>0){
    $x=0;
    
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
        $data =  array();
        $data['id'] = $id;
        $data['termino'] = $termino;
        $data['definicion'] = $definicion;
        $data['fuente'] = $fuente;
        $terminos[$x]=$data;
        $x++;
    }
        
}*/
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Tablero de Administracion</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../libs/css/datatables.min.css">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />    
    <!-- full calendar css-->
    <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
	<link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <!-- owl carousel -->
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
	<link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <!-- Custom styles -->
	<link rel="stylesheet" href="css/fullcalendar.css">
	<link href="css/widgets.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
	<link href="css/xcharts.min.css" rel=" stylesheet">	
	<link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">



    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
  </head>

  <body ng-app='appGlosario'>

  
  <!-- container section start -->
  <section id="container" class="">
     
      
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="index.html" class="logo">Glossary<span class="lite"> of Software Engineering</span></a>
            <!--logo end-->

            <div class="nav search-row" id="top_menu">
                <!--  search form start -->
                <ul class="nav top-menu">                    
                    <li>
                        <form class="navbar-form">
                            <input class="form-control" placeholder="Search" type="text" ng-model="search2">
                        </form>
                    </li>                    
                </ul>
                <!--  search form end -->                
            </div>

            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    
                    
                    <!-- alert notification end-->
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="img/chat-avatar2.jpg">
                            </span> 
                            <span class="username"><?php echo $_SESSION['user']['username'] ?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            
                            <li class="eborder-top">
                                <a href="../../validate/logout.php"><i class="icon_profile"></i>Cerrar Sesión</a>
                            </li>
                            
                            
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>      
      <!--header end-->

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="" href="">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
				  <li class="sub-menu">
                      <a  class="btn btn-primary" href="../newTermino.php">
                          Nuevo Termino
                      </a>
                      
                  </li>
                  <li class="sub-menu">
                      <a href=""></a>
                      
                  </li> 
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>CMMI</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      
                  </li>
                  <li>
                      <a class="" href="widgets.html">
                          <i class="icon_genius"></i>
                          <span>MoproSoft</span>
                      </a>
                  </li>
                  <li>                     
                      <a class="" href="chart-chartjs.html">
                          <i class="icon_piechart"></i>
                          <span>TCP</span>
                          
                      </a>
                                         
                  </li>
                             
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_table"></i>
                          <span>PSP</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="basic_table.html">Basic Table</a></li>
                      </ul>
                  </li>
                  
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>SWEBOK</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">                          
                          <li><a class="" href="profile.html">Profile</a></li>
                          <li><a class="" href="login.html"><span>Login Page</span></a></li>
                          <li><a class="" href="blank.html">Blank Page</a></li>
                          <li><a class="" href="404.html">404 Error</a></li>
                      </ul>
                  </li>
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!--main content start-->
    <section id="main-content" ng-controller="controllerSearchTwo">
        <section class="wrapper" id="aux" ng-init="getAllTerminos()">            
        <h3 id="msj"><?php if(isset($_SESSION['msj'])){echo $_SESSION['msj'];$_SESSION['msj']="";} ?></h3>
      <?php
      /*
      for ($i=0; $i < count($terminos) ; $i++) { 
        # code...
        echo "<div class='row'>";
          echo "<form action='../../views/edit.php' method='POST'>";
          echo "<di class='col-md-6 termino'>";
            echo "<p class='titulo'>".$terminos[$i]["termino"]."</p>";
            echo "<span class='fuente'>".$terminos[$i]["fuente"]."</span>";
            echo "<p class='definicion'>".$terminos[$i]["definicion"]."</p>";
            echo "<div class='pie'>";
              echo "<input type='hidden' value=".$terminos[$i]["id"]." name='idTermino'/>";
              echo "<input type='submit' name='editar' value='Editar' class='btn btn-primary'>";
              echo "  <input type='submit' value='Eliminar' class='btn btn-red eliminar' id=".$terminos[$i]["id"].">";
            echo "</div>";
          echo "</div>";
          echo "</form>";
        echo "</div>";
      }*/
       ?>
            <div class="row" ng-repeat="d in terminos | filter:search2">
              <form action='../../views/edit.php' method='POST'>
                <div class="col-md-6 termino">
                    <p class="titulo">{{d.termino}}</p>
                    <span class="fuente">{{d.fuente}}</span>
                    <p class="definicion">{{d.definicion}}</p>
                    <div class="pie">
                        <input type="hidden" value="{{d.id}}" name="idTermino"> </input>
                        <input type="submit" value="Editar" class="btn btn-primary">
                        <a type='submit'  class='btn btn-red ' ng-click="eliminarTermino(d.id)">Eliminar</a>
                    </div>
                </div>
              </form>
            </div> 
            
		  
		  <!-- Today status end -->
			
        </section>
				
    </section>
  <!-- container section start -->

    <!-- javascripts -->
 

    <script src="../../libs/js/jquery-2.1.4.min.js"></script>
    <script src="../../libs/js/angular.min.js"></script>
    <!-- bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <script src="../../libs/js/app.js"></script>

    
  <script>
/*
$(document).on('click','.eliminar',function(){
  id = $(this).attr('id');
  var r = confirm("Eliminar Termino ?");
  if (r == true   ) {

      $.ajax({
        method: "POST",
        url: "../../methods/delete_termino.php",
        data: { id: id }
      })
      .done(function( msg ) {
        window.location.reload();
        
        
      });
  }

  return false;
  
});*/

  </script>

  </body>
</html>
