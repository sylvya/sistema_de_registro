<?php 
include("conectar.php");
	if (isset($_POST['nombre']) && !empty($_POST['nombre'])&&
		isset($_POST['apellido_p']) && !empty($_POST['apellido_p'])&&
		isset($_POST['apellido_m']) && !empty($_POST['apellido_m'])&&
		isset($_POST['correo']) && !empty($_POST['correo']) &&
		isset($_POST['usuario']) && !empty($_POST['usuario'])&&
		isset($_POST['contrasena']) && !empty($_POST['contrasena'])&&
		isset($_POST['contrasena2']) && !empty($_POST['contrasena2']))
	{

		$nombre=$_POST['nombre'];	
		$apellido_p=$_POST['apellido_p'];
		$apellido_m=$_POST['apellido_m'];
		$correo=$_POST['correo'];
		$usuario=$_POST['usuario'];
		$contrasena=$_POST['contrasena'];
		$contrasena2=$_POST['contrasena2'];
		$fecha=date("Y-m-d");
		$hora=date("H:i:s");

		if ($nombre=="" || $nombre==" ") {
			echo "Debes ingresar un nombre";
		}else if ($apellido_p=="" || $apellido_p==" ") {
			echo "Debes ingresar un Apellido";
		}else if($apellido_m=="" || $apellido_m==" "){
			echo "Debes ingresar un apellido materno";
		}else if ($correo=="" || $correo==" ") {
			echo "Debes ingresar un correo válido";
		}else if ($usuario=="" || $usuario==" ") {
			echo "Debes ingresar un Nombre de Usuario";
		}else if ($contrasena=="" || $contrasena==" ") {
			echo "Debres ingresar una contraseña";
		}else if ($contrasena2=="" || $contrasena2==" ") {
			echo "Debes repetir  contraseña ";
		}else if ($contrasena!=$contrasena2) {
			echo "Las contraseñas no coinciden";
		}else{

			$conexion=mysql_connect($host,$user,$password)or die
			("problemas con el servidor");
			mysql_select_db($db,$conexion)or die
			("problemas al conectar con la base de datos");
			
			$consulta=mysql_query("SELECT * FROM REGISTRAR
			 WHERE CORREO='$correo' AND USUARIO='$usuario'")or die(mysql_error());

				//$row=mysql_fetch_array($consulta);
				//echo $row['NOMBRE']."<br>";
				//echo $row['APELLIDO_PATERNO']."<br>";
				//echo $row['APELLIDO_MATERNO']."<br>";
				//echo $row['CORREO']."<br>";
				//echo $row['USUARIO']."<br>";
				//echo $row['CONTRASENA']."<br>";

				$resultado=mysql_num_rows($consulta);

				//echo $resultado;

				if ($resultado==1) {
					echo "EL usuario o correo ya estan registrados";
				}else{
				
						mysql_query("INSERT INTO REGISTRAR(NOMBRE, APELLIDO_PATERNO, APELLIDO_MATERNO, USUARIO, CORREO, CONTRASENA, FECHA, HORA)
							VALUES('$nombre','$apellido_p','$apellido_m','$usuario','$correo','$contrasena','$fecha','$hora')",$conexion);
						echo "Datos insertados exitosamente"."<br>";

						echo "nombre: ".$nombre."<br><br>";
						echo "apellido paterno: ".$apellido_p."<br><br>";
						echo "apellido materno: ".$apellido_m."<br><br>";
						echo "correo: ".$correo."<br><br>";
						echo "usuario: ".$usuario."<br><br>";
						echo "contraseña: ".$contrasena."<br><br>";
						echo "contraseña2: ".$contrasena2."<br><br>";
				}			
		}

	}else{
		echo "verifica que tus datos estan correctos.";
	}


 ?>