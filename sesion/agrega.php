<?php 
	session_start();
	if (!isset($_SESSION["nombreusuario"])) {
    	echo '<script type="text/javascript">
				window.location="../index.html";
			</script>';
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../style.css">
</head>
<body>
	<section class="general">	
		<u class="menu">
			<li class="item">
				<a href="index.php" class="item-link">Inicio</a>
			</li>
			<li class="item">
				<a href="consulta.php" class="item-link">Consulta</a>
			</li>
			<li class="item">
				<a href="agrega.php" class="item-link">Agregar</a>
			</li>
			<li class="item enlace">
				<a href="actualizar.php" class="item-link">Configuración</a>
			</li>
			<li class="item">
				<a href="salir.php" class="item-link">Salir</a>
			</li> 
			<li class="item imagen">
				<?php 
					
					echo "<img src='".$_SESSION['imagen']."' width='40px' height='40px' class='stilos-img'>"." ";
					echo "<h3 class='stilos-nombre'>".$_SESSION['nombreusuario']."</h3>";
				 ?>
			</li>
		</u>
	

		<div class="seccion-registrate">
			
			<form action="agregarusuario.php" method="POST" class="registro">
				<h1 class="titulo-registro">Agregar usuario</h1>
				<div class="bloque1">
					<label class="titulo-texto" >Nombre</label><br>
					<input type="text" name="nombre" class="datos"><br><br>
					<label class="titulo-texto" >Apellido Paterno</label><br>
					<input type="text" name="apellido_p" class="datos"><br><br>
					<label class="titulo-texto" >Apellido Materno</label><br>
					<input type="text" name="apellido_m" class="datos"><br><br>
					<label class="titulo-texto" >Correo</label><br>
					<input type="email" name="correo" class="datos">
				</div>
				<div class="bloque2">
					<label class="titulo-texto" >Usuario</label><br>
					<input type="text" name="usuario" class="datos"><br><br>
					<label class="titulo-texto" >Contraseña</label><br>
					<input type="password" name="contrasena" class="datos"><br><br>
					<label class="titulo-texto" >Repetir Contraseña</label><br>
					<input type="password" name="contrasena2" class="datos"><br><br><br>
					<div class="boton-registro">
					<input type="submit" name="btn-registro" value="Agregar" class="btn-registro">
				</div>
				</div>


			</form>
		</div>
	
	<footer class="contenedor-footer">
			<h5 class="copy">Todos los derechos Reservados.</h5>	
	</footer>
	</section>
</body>
</html>