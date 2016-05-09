 <?php
 	session_start();
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
		<?php 
	
	if (!isset($_SESSION["nombreusuario"])) {
		echo '<script type="text/javascript">
				window.location="../index.html";
			 </script>';
	}
	if (isset($_POST['nombre'])&& !empty($_POST['nombre'])&&
		isset($_POST['ap_paterno'])&& !empty($_POST['ap_paterno'])&&
		isset($_POST['ap_materno'])&& !empty($_POST['ap_materno'])&&
		isset($_POST['correo'])&& !empty($_POST['correo']))

		{
			$nombre=$_POST['nombre'];
			$ap_paterno=$_POST['ap_paterno'];
			$ap_materno=$_POST['ap_materno'];
			$correo=$_POST['correo'];

			include("../conectar.php");
		
		if(filter_var($correo, FILTER_VALIDATE_EMAIL)){
			echo "La dirección de correo es buena";
			
		
			$ruta="images/";
			echo "<pre>";
			
			echo "</pre>";

			if ($_FILES['Imagen']['name']=="") {
			//echo "no hay imagen";

				$conexion=mysql_connect($host,$user,$password)or die(mysql_error());
				mysql_select_db($db,$conexion)or die(mysql_error());

				$modificar=mysql_query("UPDATE REGISTRAR SET NOMBRE='$nombre', APELLIDO_PATERNO='$ap_paterno', APELLIDO_MATERNO='$ap_materno', CORREO='$correo' WHERE USUARIO='$_SESSION[nombreusuario]'")
				or die("error".mysql_error());

				$_SESSION['correo']= $correo;
				
				echo '<script type="text/javascript">
					window.location="actualizar.php";
				 </script>';			
			}else{
				//echo "si hay imagen";

				$temp=$_FILES['Imagen']['tmp_name'];
				$nombreImg=$_FILES['Imagen']['name'];
				$size=$_FILES['Imagen']['size'];

				

				$extension=pathinfo($nombreImg);
				echo "<br>";
				

				$subir=move_uploaded_file($temp, $ruta.$_SESSION['nombreusuario'].".".$extension['extension']);
				


				$conexion=mysql_connect($host,$user,$password)or die(mysql_error());

				mysql_select_db($db,$conexion)or die(mysql_error());
				
				$rutaBase=$ruta.$_SESSION['nombreusuario'].".".$extension['extension'];
				
				$modificar=mysql_query("UPDATE REGISTRAR SET NOMBRE='$nombre', APELLIDO_PATERNO='$ap_paterno', APELLIDO_MATERNO='$ap_materno', CORREO='$correo', IMAGEN='$rutaBase' WHERE USUARIO='$_SESSION[nombreusuario]'")
				or die("error".mysql_error());

				$_SESSION['imagen']=$rutaBase;
				$_SESSION['correo']= $correo;

				//echo '<img src="'.$_SESSION['imagen'].'">';
				echo '<script type="text/javascript">
					window.location="actualizar.php";
				 </script>';
			}
		}else{
			echo "dirección de correo invalida.";

			echo '<script type="text/javascript">
					
						setTimeout(function(){ 
							window.location="actualizar.php"; 
						}, 3000);
				  </script> ';
		}



		
		
			
		}else{
			echo "Error en los datos";
			echo '<script type="text/javascript">
					window.location="actualizar.php";
				 </script>';
		}
 ?>

	<footer class="contenedor-footer">
			<h5 class="copy">Todos los derechos Reservados.</h5>	
	</footer>
	</section>
</body>
</html>