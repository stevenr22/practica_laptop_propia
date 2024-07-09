<?php
session_start();
if (!isset($_SESSION['DBid_usu'])) {
	header("Location: index.html");
	exit();
}else{
	$id_usu = $_SESSION['DBid_usu'];	
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HOME</title>
</head>
<body>
	<h4>BIENVENIDO SEÑOR(A) <?php echo $id_usu?></h4>
	<a href="cerrar.php">CERRAR SESION</a>
</body>
</html>