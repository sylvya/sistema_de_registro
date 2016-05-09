<?php 
	session_start();

	include("../conectar.php");
	$conectar=mysql_connect($host, $user, $password)or die("error en la conexion");
	mysql_select_db($db, $conectar)or die("error en la bd");

	$consulta=mysql_query("SELECT * FROM REGISTRAR WHERE USUARIO='$_SESSION[nombreusuario]' AND CORREO='$_SESSION[correo]' ")or die("Error en la consulta".mysql_error());

	$fila=mysql_fetch_array($consulta);
	$NOMBRE=$fila['NOMBRE'];
	$AP_PAT=$fila['APELLIDO_PATERNO'];
	$AP_MAT=$fila['APELLIDO_MATERNO'];
	$USUARIO=$fila['USUARIO'];
	$CORREO=$fila['CORREO'];
	//echo $NOMBRE."<br>";
	//echo $AP_PAT."<br>";
	//echo $AP_MAT."<br>";
	//echo $USUARIO."<br>";
	//echo $CORREO."<br>";
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
		<div class="cont-form">

			<form action="configuracion.php" method="POST" name="form-nombre"  enctype="multipart/form-data" class="form-config">
				<h1 class="actualiza-inf">Actualiza tu información</h1>
				<label class="nom-dato">Nombre</label>
				<input  class="nom-box"type="text" name="nombre" value="<?php echo $NOMBRE;?>"><br><br>
				<label class="nom-dato">Apellido Paterno</label>
				<input  class="nom-box"type="text" name="ap_paterno" value="<?php echo $AP_PAT;?>"><br><br>
				<label class="nom-dato">Apellido Materno</label>
				<input  class="nom-box"type="text" name="ap_materno" value="<?php echo $AP_MAT;?>"><br><br>
				<label class="nom-dato">Correo</label>
				<input  class="nom-box"type="text" name="correo" value="<?php echo $CORREO;?>"><br><br>
				<label class="nom-dato ">Avatar</label>
				<input  class="nom-box avatar"name="Imagen" type="file" id="adjuntar"><br><br><br><br>
				<input  class="nom-box guardarCamb-actualizar"type="submit" value="Guardar Cambios" name="btn-nombre"><br><br>
			</form>
		</div>
	
	<footer class="contenedor-footer">
			<h5 class="copy">Todos los derechos Reservados.</h5>	
	</footer>
	<section>
</body>
</html>
