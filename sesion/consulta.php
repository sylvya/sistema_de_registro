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
		</article>
	
	
	

<?php 
	include("../conectar.php");
	$conectar=mysql_connect($host, $user, $password)or die("error en la conexion".mysql_error());
	mysql_select_db($db, $conectar)or die("problemas con la bd".mysql_error());

	$consultaUsuarios=mysql_query("SELECT ID, NOMBRE,APELLIDO_PATERNO, APELLIDO_MATERNO, CORREO, USUARIO, IMAGEN FROM REGISTRAR")or die("error en la consulta");

	//var_dump($consultaUsuarios);
	//while ($row1=mysql_fetch_array($consultaUsuarios)) {
		//echo $row1['ID']."<br>";
		//echo $row1['NOMBRE']."<br>";
		//echo $row1['APELLIDO_PATERNO']."<br>";
		//echo $row1['APELLIDO_MATERNO']."<br>";
		//echo $row1['CORREO']."<br>";
		//echo $row1['USUARIO']."<br>";
	//}



 ?>
 	<div class="cont-tabla">
		 <table align="center" border="1" bordercolor="gray" cellpadding="10" cellspacing="0" class="tabla">
		 	<tr>
		 		<td class="nom-titulo">ID</td>
		 		<td class="nom-titulo">NOMBRE</td>
		 		<td class="nom-titulo">APELLIDO PATERNO</td>
		 		<td class="nom-titulo">APELLIDO MATERNO</td>
		 		<td class="nom-titulo">CORREO</td>
		 		<td class="nom-titulo">USUARIO</td>
		 		<td class="nom-titulo">IMAGEN</td>
		 		<td class="nom-titulo">ELIMINAR</td>
		 	</tr>
		 	<?php while ($row1=mysql_fetch_array($consultaUsuarios)) {?>
		 	<tr>
		 		<td><?php echo $row1['ID']; ?></td>
		 		<td><?php echo $row1['NOMBRE']; ?></td>
		 		<td><?php echo $row1['APELLIDO_PATERNO']; ?></td>
		 		<td><?php echo $row1['APELLIDO_MATERNO']; ?></td>
		 		<td><?php echo $row1['CORREO']; ?></td>
		 		<td><?php echo $row1['USUARIO']; ?></td>
		 		<td><?php echo "<img src='".$row1['IMAGEN']."' width='40px'>"; ?></td>
		 		<td><a href="eliminarUsuario.php?eliminarId=<?php echo $row1['ID'];  ?>">Eliminar</a></td>
		 		<!--<td><?php //echo "<a href='eliminarUsuario.php?eliminarId=".$row1['ID']."'>Eliminar</a>";?></td>-->
		 	 	</tr>
		 	<?php } ?>
		 </table>
	</div>
	 
	 <footer class="contenedor-footer">
			<h5 class="copy">Todos los derechos Reservados.</h5>	
	 </footer>
	 </section>
 </body>
</html>
