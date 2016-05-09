<?php 
	session_start();
	if (!isset($_SESSION['nombreusuario'])) {
		echo "<script type=text/javascript>
				window.location='../index.html'
			 </script>";
	}
	include("../conectar.php");

	$eliminar=$_GET['eliminarId'];
	//echo $eliminar;

	$conectar=mysql_connect($host, $user, $password)or die(mysql_error());
	mysql_select_db($db,$conectar)or die(mysql_error());
	$consulta=mysql_query("SELECT ID FROM REGISTRAR WHERE ID='$eliminar'")or die("error en la consulta".mysql_error());

	if ($registro=mysql_fetch_array($consulta)) {
		mysql_query("DELETE FROM REGISTRAR WHERE ID='$eliminar'",$conectar);
		echo "Registro Eliminado Correctamente";
	}else{
		echo "No se ha encontrado el registro";
	}
	
 ?>