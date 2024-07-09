<link rel="stylesheet" type="text/css" href="sweetalert2.css">
<script type="text/javascript" src="sweetalert2.js"></script>
<?php
include("conexion.php");
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$usu = $_POST['usu'];
	$contra = $_POST['contra'];

	$consulta = "SELECT * FROM usuario
	WHERE nusu = ? AND contra = ? AND estado = 1";
	$stmt = $conex->prepare($consulta);
	$stmt->bind_param("ss", $usu, $contra);
	$stmt->execute();
	$resultado = $stmt->get_result();

	if ($resultado->num_rows > 0) {
		while($fila = $resultado->fetch_array()){
			$_SESSION['DBid_usu'] = $fila["id_usu"];

		}
		

		header("Location: home.php");
		exit();
	} else {
		echo "
			<script>
			    document.addEventListener('DOMContentLoaded', function(){
			        Swal.fire({
			            icon: 'info',
			            title: 'Usuario no existente',
			            text: 'Regístrese para que pueda ingresar',
			            confirmButtonText: 'Aceptar'
			        }).then(function() {
			            window.location.href = 'index.html';
			        	});
			    });


			</script>";
	}
	$stmt->close();
	$conex->close();
	
}
?>