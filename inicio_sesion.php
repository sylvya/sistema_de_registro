
	<?php 
	session_start();
	include("conectar.php");

	if (isset($_POST['name_user']) && !empty($_POST['name_user'])&&
		isset($_POST['pass'])&& !empty($_POST['pass'])) 
	{
		

		$name_user=$_POST['name_user'];
		$pass=$_POST['pass'];
		//echo "nombre de usuario: ".$name_user."<br>";
		//echo "contraseña: ".$pass."<br>";

		if ($name_user=="") {
			echo "Debes ingresar un nombre de usuario";
			echo '<script type="text/javascript">
				function redireccionar(){
				  window.location="index.html";
				}
				setTimeout ("redireccionar()", 5000);
				</script>';
		}else if ($pass=="") {
			echo "Debes ingresar una contraseña válida.";
			echo '<script type="text/javascript">
				function redireccionar(){
				  window.location="index.html";
				}
				setTimeout ("redireccionar()", 5000);
				</script>';

		}else{
			
					
			$conectar=mysql_connect($host,$user,$password);
			mysql_select_db($db,$conectar);

			$consulta_sesion=mysql_query("SELECT * FROM REGISTRAR 
				WHERE USUARIO='$name_user' AND CONTRASENA='$pass'")
				or die(mysql_error());


			$row=mysql_num_rows($consulta_sesion);

			if ($row==0) {
				echo "El usuario no esta registrado o los datos son incorrectos";
				echo '<script type="text/javascript">
				function redireccionar(){
				  window.location="index.html";
				}
				setTimeout ("redireccionar()", 5000);
				</script>';
			}else{
				//$sesion=mysql_fetch_assoc($consulta_sesion);
				//echo "sesion: ".$sesion['USUARIO']."<br>";
				//echo "sesion: ".$sesion['CONTRASENA'];
				//var_dump($sesion);
				//echo "todo bien";
				$array=mysql_fetch_array($consulta_sesion);
				$_SESSION['nombreusuario']=$array['USUARIO'];
				$_SESSION['correo']=$array['CORREO'];
				$_SESSION['imagen']=$array['IMAGEN'];

				header("Location:sesion/index.php");
			}
			

			//echo $row['USUARIO'];
		}
	}else{
		echo "Todos los campos son requeridos";
		echo '<script type="text/javascript">
				function redireccionar(){
				  window.location="index.html";
				}
				setTimeout ("redireccionar()", 5000);
				</script>';
	}



	

 ?>	
