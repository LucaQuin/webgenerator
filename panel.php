<?php 
session_start();
include_once("ayuditastool.php");

if (!isset($_SESSION['id_user'])) {
	header("location: login.php");
}

if (isset($_POST['aceptar'])) {
	$nom="{$_SESSION['id_user']}{$_POST["nombre"]}";

	$getDom=getConection("tp12__webs" , "SELECT * FROM `tp12__webs` WHERE `dominio` LIKE '{$nom}' ");

	if (mysqli_num_rows($getDom)==0) {
		$fecha=date("y/m/d-h:i:s");
		getConection("tp12__webs" ,"INSERT INTO `tp12__webs` (`idWeb`, `idUsuario`, `dominio`, `fechaCreacion`) VALUES (NULL, '{$_SESSION['id_user']}', '{$nom}', '{$fecha}')");
		shell_exec("./wix.sh {$nom} {$_POST["nombre"]}");
		shell_exec("zip -r {$nom} {$nom}");
	}else{
		echo "Ya existe una pagina con ese dominio";
	}
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bienvenido a tu panel</title>
</head>
<body>
	<center><h1>Bienvenido a tu panel</h1></center>

	<a href="logout.php">Cerrar sesión de <?php echo($_SESSION['id_user'])	 ?> </a><br><br>

	<form method="POST">
		<input type="text" name="nombre" required><br>
		<input type="submit" name="aceptar" value="Crear web">
	</form><br><br>


</body>
</html>


<?php 
if ($_SESSION['id_user']==9) {
	$getAllDatos=getConection("tp12__webs" , "SELECT * FROM `tp12__webs`");
}
else{
	$getAllDatos=getConection("tp12__webs" , "SELECT * FROM `tp12__webs` WHERE `idUsuario` LIKE '{$_SESSION['id_user']}' ");
}


	while($file = mysqli_fetch_array($getAllDatos, MYSQLI_ASSOC)){
		echo "<a href={$file["dominio"]}>{$file["dominio"]}</a> <a href={$file["dominio"]}.zip>descargar web</a> <a href=panel.php?idDelete={$file["idWeb"]}&&dominio={$file["dominio"]}>Eliminar</a><br>";
	}

if (isset($_GET['idDelete'])) {
	shell_exec("rm -r {$_GET['dominio']}");
	shell_exec("rm -r {$_GET['dominio']}.zip");

	$deleteWhereDominio=getConection("tp12__webs" , "DELETE FROM `tp12__webs` WHERE `tp12__webs`.`idWeb` = '{$_GET['idDelete']}' ");

	header('location: panel.php');
}

 ?>