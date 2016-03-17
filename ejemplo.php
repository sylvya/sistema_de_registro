<?php 
	include('conectar.php');

		$nombre=$_POST['nombre'];	
		$apellido_p=$_POST['apellido_p'];
		$apellido_m=$_POST['apellido_m'];
		$correo=$_POST['correo'];
		$usuario=$_POST['usuario'];
		$contrasena=$_POST['contrasena'];
		$contrasena2=$_POST['contrasena2'];


	$conexion=mysql_connect($host,$user,$password)
	or die("problemas con el servidor");
	mysql_select_db($db,$conexion);
	
	$consulta=mysql_query("SELECT * FROM REGISTRAR WHERE CORREO='$correo' and USUARIO='$usuario'") or die(mysql_error());

	//while ($resultado=mysql_fetch_array($consulta)) {
		//echo "ID: ".$resultado['ID']."<br>";
		//echo "nombre: ".$resultado['NOMBRE']."<br>";
		//echo "apellido paterno: ".$resultado['APELLIDO_PATERNO']."<br>";
		//echo "apellido MATERNO: ".$resultado['APELLIDO_MATERNO']."<br>";
		//echo "datos: ".$resultado['USUARIO']."<br>";
		//echo "CORREO: ".$resultado['CORREO']."<br>";
		//echo "CONTRASEÑA: ".$resultado['CONTRASENA']."<br>";
	//}
	$row=mysql_fetch_array($consulta);
	//echo "<pre>";
	//var_dump($row);
	//echo "</pre>";
	echo $row['CORREO'];
	echo $row['USUARIO'];


 ?>