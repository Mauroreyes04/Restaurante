
<?php
include_once 'modelo/conexiouno.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();


$consulta = "SELECT * FROM comensales";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$usuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);


?>

<!Doctype html>
<html lang="es">
<head>
<title>3 ESTRELLAS</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

	
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
		
		<!-- Poper Bootstrap --> 
	    
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	
	<link rel="stylesheet" href="https://kit.fontawesome.com/dcb1bbced2.css" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/dcb1bbced2.js" crossorigin="anonymous"></script>

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
	<ul class="nav">

  <li class="nav-item ">
    <a class="nav-link text-white" href="index.php">Inicio</a>
  </li>
		
  <li class="nav-item">
    <a class="nav-link text-white" href="vista/faprendiz.php">Inscripcion</a>
  </li>
 <li class="nav-item">
    <a class="nav-link text-white" href="vista/fconsulta.php">Consulta</a>
  </li>
 
</ul>
	<br>

	<br><br>
	<div class="container">
	<h1 class="text-center">Listado de Comensales</h1>
	<br>
		<br>
	<table class="table table-striped">
   <thead>
    <tr>
	   <th scope="col">DOCUMENTO</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">TELEFONO</th>
      <th scope="col">MESA</th>
	  <th scope="col">Editar</th>
        <th scope="col">Eliminar</th>
		
		
    </tr>
  </thead>
		
  <tbody>
  <?php
			foreach($usuarios as $filtro){
			?>
			<tr>
				<td><?php echo $filtro['documento']?></td>
				<td><?php echo $filtro['Nombre']?></td>
				<td><?php echo $filtro['telefono']?></td>
				<td><?php echo $filtro['Id_programa']?></td>
<td><button type="button" class="btn btn-success editbtn" data-bs-toggle="modal" data-bs-target="#editar"><i class="fa-solid fa-file-pen"></button></td>
			
			
		<td><button type="button" class="btn btn-danger deletebtn" data-bs-toggle="modal" data-bs-target="#eliminar"><i class="fa-solid fa-trash-can"></i></button></td>
		
				</tr>
				<?php
			}
				?>
  </tbody>
</table>
	
	</div>
<!--- Modal de editar --->
		<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <h1 class="modal-title fs-5" id="exampleModalLabel">Actualización de Datos</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
   </div>
   <div class="modal-body">
   <form action="controlador/editar.php" method="post">
			  
					<div class="form-group">
					<label for="">Documento</label>
					<input type="number" name="documento" id="documento" class="form-control">
					</div>
					
					<div class="form-group">
					<label for="">Nombre</label>
					<input type="text" name="Nombre" id="Nombre" class="form-control">
					</div>
					
					<div class="form-group">
					<label for="">TELEFONO</label>
					<input type="text" name="telefono" id="telefono" class="form-control">
					</div>
					
				<div class="form-group">
					<label for="">MESA </label>
					<input type="number" name="Id_programa" id="Id_programa" class="form-control">
					</div><br>
		   <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success">Actualizar</button>
      </div>
					</form>
      </div>
   
    </div>
  </div>
</div>

	
	<!---- Eliminar --->
	<div class="modal fade" id="eliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="eliminar">Eliminar dato Seleccionado</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
		  <h4>Quieres Eliminar datos seleccionado</h4>
       <form action="controlador/eliminar.php" method="post">
		   <input type="hidden" name="documento" id="delete_id">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">No</button>
        <button type="submit" class="btn btn-danger">Eliminar</button>
      </div>
		  </form>
    </div>
  </div>
</div>

<script>
$('.editbtn').on('click',function(){
	
	$tr=$(this).closest('tr');
	var datos=$tr.children("td").map(function(){
	 return $(this).text();
	});
	$('#documento').val(datos[0]);
	$('#nombre').val(datos[1]);
	$('#telefono').val(datos[2]);
	$('#programa').val(datos[3]);
});

</script>
	<script>
$('.deletebtn').on('click',function(){
	
	$tr=$(this).closest('tr');
	var datos=$tr.children("td").map(function(){
	 return $(this).text();
	});
	
	$('#delete_id').val(datos['0']);
	
});

</script>
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