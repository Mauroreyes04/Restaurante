<?php
include_once '../modelo/conexiouno.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT * FROM mesas";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$usuarios=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>
<!Doctype html>
<html>
	<head>
    <title>3 ESTRELLAS</title>
		
		<!-- Icono Pestaña -->
	<link rel="shortcut icon" href="">
	
		<!--Bootstrap -->
		
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
		
		<!-- Poper Bootstrap --> 
	    
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
		
		<!--- CSS -->
		
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		 
	</head>
  <style>
      body {
        background-color: #87CEEB; /* Define el color de fondo del cuerpo de la página */
      }
      .nav {
	background-color: #180076;
  }
    </style>
	<body>
		
		<!-- Menu Navegacion nav -->
		<ul class="nav ">

  <li class="nav-item">
    <a class="nav-link text-white" href="../index.php">Inicio</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="faprendiz.php">Inscripcion</a>
  </li>
 <li class="nav-item">
    <a class="nav-link text-white" href="fconsulta.php">Consulta</a>
  </li>
 
</ul>
	
	<!-- Columnas Grillas -->
	<br>
	<div class="container text-center">
  <div class="row">
    <div class="col-8">
     <!-- Formulario --->
		<div class="card" style="width: 38rem;">
  <div class="card-header">
  <p style="color: blue;"><h1>Registro de Comensales</h1></p>
  </div>
		<form action="" method="post">
			<center>
		
		<label><p style="color: blue;">DOCUMENTO *</p></label>
		<input type="number" name="documento" class="form-control" placeholder="documento" ><br>
		<label><p style="color: blue;">NOMBRE COMPLETO *</p></label>
		<input type="text" name="Nombre"  class="form-control" placeholder="Nombre" ><br>
		<label> <p style="color: blue;">TELEFONO *</p></label>
		<input type="number" name="telefono" class="form-control" placeholder="telefono" ><br>
		<label> <p style="color: blue;">MESA---CHEFF *</p></label>
		<select name="Id_programa" class="form-control">
			  
			<option> --- Seleccione -- </option>
			 <?php
                        foreach($usuarios as $filtro){
                    ?>
			<option><?php echo $filtro['Id_programa']?>----<?php echo $filtro['Nombre']?></option>
			 <?php
                        }
                    ?>
			</select><br>
			<input type="submit" name="btn_guardar" class="btn btn-success" value="Guardar">
			  <br>
			<br>
				</center>
			<!--- Controlador Guardar - Insertar Datos -->
			<?php
			include("../modelo/conexioncrud.php");
			
			if(isset($_POST['btn_guardar']))
			{
			
			$documento = $_POST['documento'];
			$Nombre = $_POST['Nombre'];
			$telefono = $_POST['telefono'];
			$Id_programa = $_POST['Id_programa'];
				
			if($documento=="" || $Nombre="" || $telefono=="" || $Id_programa=="")
				
			{
			
			echo "<script> alert('Todos los campos son obligatorios')
			location.href = 'vista/faprendiz.php';</script>";
			}
				
			else{
			$query = mysqli_query($conectar, "INSERT INTO comensales (documento, Nombre, telefono, Id_programa) values ('$documento', '$Nombre', '$telefono', '$Id_programa')");	
			
				if($query){
					echo "<script> alert('Registro Exitoso')
			location.href = '../vista/faprendiz.php';</script>";
				}
			}
			
			}
			
			
			?>
		</form>
		
		</div>
    </div>
    <div class="col-4">
    <img src="../img/copa.jpg"
    width="120%">
    
    </div>
    <h1 class="text-center"><p style="color: blue;">ACA PUEDES DEGUSTAR UN BANQUETE SUPER DELICIOSO A NIVEL CAMPEONES DEL MUNDO</h1>
	
</div>
<div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © ARGENTINA CAMPEON QATAR 2022
    
  </div>
<img src="../img/pelo.jpg" class="rounded float-start"  alt="70%" width="45%">
<img src="../img/tete.jpg" class="rounded float-end"  alt="65%" width="37%">

	</body>
	</html>