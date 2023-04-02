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
      .nav {
	background-color: #180076;
  }
      body {
        background-color: #87CEEB; /* Define el color de fondo del cuerpo de la página */
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
    <a class="nav-link text-white" href="vista/fconsulta.php">Consulta</a>
  </li>
 
</ul>
		<center>
			<br>
<div id="container">
  
			<h2><p style="color: black;">Consulta los comensales</p>
</h2>
	<form action="" method="post">
	<table>
		<tr>
		<td>
      <label><p style="color: blue;">Señor usuario ingrese su numero de cedula</p></label><br><input type="text" name="ConsultaDocumento" class="form-control" style="width: 100%"> </td>
		</tr><br>
		<tr>
		<td colspan="2"><br><center><input type="submit" name="btn_consultar" value="Consultar" class="btn btn-success"></center></td>
		</tr>
		<tr>
		<td colspan="2"></td>
		</table>
	<br>
	</center>
	
	<?php
	include_once "../modelo/conexioncrud.php";
	if(isset($_POST['btn_consultar']))
	{
		$documento = $_POST['ConsultaDocumento'];
		$existe =0;
		
		if($documento=="")
		{
			echo "<script> alert('Campos obligatorio')
			location.href = '../vista/fconsulta.php';</script>";
		}
		else {
			$resultado = mysqli_query($conectar, "SELECT * FROM comensales WHERE Documento = '$documento'");
			
			while($consulta = mysqli_fetch_array($resultado))
			{
				echo "
				<center><table width=\"50%\border\"1\">
				<tr>
				<td><center><b>NUMERO DE DOCUMENTO </b></center></td>
				<td><center><b>NOMBRE</b></center></td>
				<td><center><b>TELEFONO</b></center></td>
				<td><center><b>MESA</b></center></td>
				</tr>
				<tr>
				<td><center>".$consulta['documento']."</center></td>
				<td><center>".$consulta['Nombre']."</center></td>
				<td><center>".$consulta['telefono']."</center></td>
				<td><center>".$consulta['Id_programa']."</center></td>
				</tr>
				</table></center>";
					
				$existe++;
			}
			if($existe==0){
				echo "<script> alert('Numero de Documento nunca a pedido una reserva con en el restaurante de los campeones')
			location.href = '../vista/fconsulta.php';</script>";
			}
	}
	
	}
	
	?>
	</form>

			</div>
		
		<br><br>
		
		<!-- Footer Pie de -->
<ul class="nav ">>
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <h2><a class="nav-link text-white"> <span>Aca comen los campeones del mundo y puedes apoyarlos</span></2>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-github"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
		  <a class="nav-link text-white">
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>AFA
          </h6>
          <p>
		  La Asociación del Fútbol Argentino es el ente rector del fútbol en Argentina, encargado de organizar y regular las distintas selecciones nacionales, y los campeonatos oficiales, en todas las modalidades del deporte en ese país, incluidas las ramas de futsal, fútbol playa y fútbol femenino
          </p>
        </div>
        
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © ARGENTINA CAMPEON QATAR 2022
    
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
	</body>
	</html>
		
		
		
		
		
		