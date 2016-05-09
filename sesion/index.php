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
	
		<article class="contenedor-interno">
			<h1 class="bienvenido">Bienvenido...</h1>
			<p class="desc-contenedor">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa aperiam debitis fugit aliquam, porro repellendus,
				eos laudantium dolorem animi eius ad sed eveniet impedit nulla minus voluptatibus excepturi deleniti quas.}
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae vitae ipsam, beatae asperiores excepturi,
				rem nihil, similique provident quidem repellat unde sapiente mollitia. Dolorum explicabo ipsa soluta, 
				similique, temporibus reiciendis. 	Lorem ipsum dolor sit amet, consectetur adipisicing elit.
				 Quia facilis illo nobis vitae amet aliquam at unde ut dignissimos, eaque sint explicabo, est, 
				 culpa delectus. Dolorum eos, deleniti quidem odio.
			</p>
			<img class="img-bienvenido"src="../img/gifs-animados.jpg" height="404" width="587" alt="">
			<p class="desc-contenedor">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa aperiam debitis fugit aliquam, porro repellendus,
				eos laudantium dolorem animi eius ad sed eveniet impedit nulla minus voluptatibus excepturi deleniti quas.}
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae vitae ipsam, beatae asperiores excepturi,
				rem nihil, similique provident quidem repellat unde sapiente mollitia. Dolorum explicabo ipsa soluta, 
				similique, temporibus reiciendis. 	Lorem ipsum dolor sit amet, consectetur adipisicing elit.
				 Quia facilis illo nobis vitae amet aliquam at unde ut dignissimos, eaque sint explicabo, est, 
				 culpa delectus. Dolorum eos, deleniti quidem odio.
			</p>
		</article>
		<footer class="contenedor-footer">
			<h5 class="copy">Todos los derechos Reservados.</h5>	
		</footer>
	</section>
	
	
</body>
</html>
