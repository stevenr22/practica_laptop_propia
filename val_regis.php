<link rel="stylesheet" type="text/css" href="sweetalert2.css">
<script type="text/javascript" src="sweetalert2.js"></script>
<?php
include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$usu = $_POST['usu'];
	$contra = $_POST['contra'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$edad = $_POST['edad'];
	$ced = $_POST['ced'];

	$consulta = "SELECT * FROM usuario WHERE nusu = ?";
	$stmt = $conex->prepare($consulta);
	$stmt->bind_param("s", $usu);
	$stmt->execute();
	$resultado = $stmt->get_result();
	if ($resultado->num_rows > 0) {
		
		echo "
			<script>
				document.addEventListener('DOMContentLoaded', function(){
						Swal.fire({
							icon: 'info',
							title: 'Usuario se encuentra registrado.',
							text: 'Ingrese otro usuario que no este registrado actualmente.',
							confirmButtonText: 'Aceptar'
						}).then(function(){
							window.location.href = 'index.html';
							});
					});

			</script>
		";
		$stmt->close();
		$conex->close();
		
	} else {
		$insercion = "INSERT INTO usuario(id_usu, nusu, contra, nombre, apellido, edad)
		VALUES(?,?,?,?,?,?)";
		$stmt = $conex->prepare($insercion);
		$stmt->bind_param("ssssss", $ced, $usu, $contra, $nombre, $apellido, $edad);
		
		if ($stmt->execute()) {
			echo "
			<script>
				document.addEventListener('DOMContentLoaded', function(){
						Swal.fire({
							icon: 'success',
							title: 'Usuario registrado con exito.',
							text: 'Almacenamiento satisfactorio.',
							confirmButtonText: 'Aceptar'
						}).then(function(){
							window.location.href = 'index.html';
							});
					});

			</script>
		";
		$stmt->close();
		$conex->close();
		} else {
			echo "
			<script>
				document.addEventListener('DOMContentLoaded', function(){
						Swal.fire({
							icon: 'warning',
							title: 'Ocurrio un error intentelo de nuevo.',
							text: 'Error inesperado.',
							confirmButtonText: 'Aceptar'
						}).then(function(){
							window.location.href = 'regis.html';
							});
					});

			</script>
		";
		}
		
	}
	
}
?>