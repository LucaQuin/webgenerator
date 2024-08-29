<?php 
	session_start();
	include_once("ayuditastool.php");

	if(isset($_SESSION['user'])){
		header("location: panel.php");
	}


	if (isset($_POST["aceptar"])) {
		$aux=0;
		$getEmail=getConection("tp12__usuarios" , "SELECT * FROM `tp12__usuarios` WHERE `email` LIKE '{$_POST['email']}' ");

		if (mysqli_num_rows($getEmail)>0) {
			echo "Este email ya esta registrado";
		}else{
				if ($_POST['contra'] != $_POST['contra2']) {
				echo "Las contraseñas no son iguales";
				}else{
					$fecha=date("y/m/d-h:i:s");
					// sleep(1);
					getConection("tp12__usuarios" ,"INSERT INTO `tp12__usuarios` (`idUsuario`, `email`, `password`, `fechaRegistro`) VALUES (NULL, '{$_POST['email']}', '{$_POST['contra']}', '{$fecha}')");
					echo "Usuario registrado correctamente.";
					header("location: login.php");
				}
			}
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registrarte es simple.</title>
</head>
<body>

<center><h1>Registrarte es simple.</h1></center>

<form method="POST">
	<input type="email" name="email" placeholder="email" required="">
	<input type="password" name="contra" placeholder="Contraseña" required="">
	<input type="password" name="contra2" placeholder="Validar Contraseña" required="">
	<input type="submit" value="validar" name="aceptar">
</form>

</body>
</html>