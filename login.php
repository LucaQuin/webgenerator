 <?php
session_start();
include_once("ayuditastool.php");

if(isset($_SESSION['id_user'])){
	header("location: panel.php");
}



if (isset($_POST['aceptar'])) {
	$emailExists=getConection("tp12__usuarios" , "SELECT * FROM `tp12__usuarios` WHERE `email` LIKE '{$_POST['email']}' ");
	$contraExists=getConection("tp12__usuarios" , "SELECT * FROM `tp12__usuarios` WHERE `email` LIKE '{$_POST['email']}' AND `password` LIKE '{$_POST['contra']}'");

	if (mysqli_num_rows($emailExists)==0) {
		echo "Email no registrado";
	}elseif (mysqli_num_rows($contraExists)==0) {
		echo "Contraseña incorrecta";
	}else{
		while($file = mysqli_fetch_array($contraExists, MYSQLI_ASSOC)){
			$_SESSION['id_user']=$file["idUsuario"];
		}
	 	header("location: panel.php");
	}
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>webgenerator Luca Quinteros</title>
</head>
<body>
<center><h1>Luca Quinteros</h1></center>
<form method="POST">
	
	<input type="email" name="email" placeholder="email" required><br>
	<input type="password" name="contra" placeholder="contraseña" required><br>
	<input type="submit" value="ingresar" name="aceptar"><br><br>
</form>

<a href="register.php">register</a>
</body>
</html>