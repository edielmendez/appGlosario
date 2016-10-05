<?php 
if (session_id()==null)
  session_start();
  if(!isset($_SESSION['user'])){
    header("location: ../index.php");
  }
?>
<?php 

$id = $_POST['idTermino'];

include_once '../config/database.php';
include_once '../objects/termino.class.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare prcomputadoraoduct object
$termino = new Termino($db);
 



// set ID property of product to be edited
$termino->id = $id;


 
// read the details of termino to be edited
$termino->readOne();

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>app glosario</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- include material design CSS -->
    <link rel="stylesheet" href="../libs/css/bootstrap.min.css" />


    <!-- include jquery -->

	<script type="text/javascript" src="../libs/js/jquery-2.1.4.min.js"></script>
	 
	<!-- material design js -->
	<script src="../libs/js/bootstrap.min.js"></script>

	<style>
  form{
 
    padding: 30px;
    -webkit-box-shadow: 0px 0px 5px 4px rgba(50, 50, 50, 0.75);
-moz-box-shadow:    0px 0px 5px 4px rgba(50, 50, 50, 0.75);
box-shadow:         0px 0px 5px 4px rgba(50, 50, 50, 0.75);

  }
  .pie{
    border-top:solid 1px gray;
    margin-top: 50px;
    padding: 20px;
  }
  .btn-red{
    background: rgba(255,0,0,0.4);
    color: white;
    margin-left: 20px;
  }
  a{
    margin-left: 200px;
  }
  .container{
    margin-top: 100px;
  }
  </style>


	

	<script type="text/javascript" src="../libs/js/script.js"></script>
	<!--<script src="libs/js/jquery.dataTables.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			 $('#username').focus();
		});
	</script>-->
</head>	
<body  >

<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-2">
      <form action="../methods/update_termino.php" method="POST">
        <label>Termino</label>
          <input type="hidden" name="id" value="<?php echo $termino->id ?>">
         <input type="text"  name="termino" class="form-control" value="<?php echo $termino->termino ?>" required>
       
         <div class="form-group">
          <label for="comment">Definición:</label>
          <textarea class="form-control" rows="5" id="comment" name="definicion" required ><?php echo $termino->definicion ?></textarea>
        </div>
        
         <label>Fuente</label>
         <input type="text" id="inputPassword" name="fuente" class="form-control" value="<?php echo $termino->fuente ?>" required>
         <div class="pie">
           <input type='submit' name='editar' value='Actualizar' class='btn btn-primary'>
           <a href="admin/admin.php" class='btn btn-red'>Cancelar</a>
           <a href="admin/admin.php">regresar</a>
         </div>
    
      </form>
    </div>
  </div>
</div>


</body>
</html>