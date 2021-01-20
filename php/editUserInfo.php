<?php 

require 'connection.inc.php';
session_start();

if (isset($_POST['update'])) {
	$oldName = $_SESSION['userName'];
	$newName = $_POST['userName'];
	$newEmail = $_POST['email'];

	// Validations
	$getUser = "SELECT * FROM usuarios WHERE Name = '$newName'";
	$verUser = mysqli_query($conn, $getUser);

	if (mysqli_num_rows($verUser) > 0) {
		
		$_SESSION['alertMessage'] = 'Nombre de usuario ya existente';
		header("Location: ../edit.php");

	}else{

		// GetId
		$query = "SELECT * FROM usuarios WHERE Name = '$oldName'";
        $resultQuery = mysqli_query($conn,$query);
        $userInfo = mysqli_fetch_array($resultQuery);
        $idUsuario = $userInfo['idUsuario'];

		$query = "UPDATE usuarios set Name = '$newName', Email = '$newEmail' WHERE idUsuario = '$idUsuario'";
		if (mysqli_query($conn,$query)) {
			
			echo "Actualizando";
			$_SESSION['userName'] = $newName;
			header("Location: ../Home.php");

		}else{
			echo "Error al actualizar su información";
		}
	}

}


?>