<?php

require "connection.inc.php";
session_start();

$name = $_POST["nombreUsuario"];
$email = $_POST["email"];
$password = $_POST["pass"];
$password2 = $_POST["pass2"];
$dateTime = date('Y-m-d H:i:s');

$getUser = "SELECT * FROM usuarios WHERE Name = '$name'";
$verQuery = mysqli_query($conn, $getUser);
if (mysqli_num_rows($verQuery) > 0) {
	
	$_SESSION['alertMessage'] = 'Usuario ya existente';

	// Data array
	$data = array(
					'name' => $name,
					'email' => $email
					);

	$_SESSION['data'] = $data;

	header("Location: ../signIn.php");

}else if ($password != $password2) {
	
	// Alert message to display
	$_SESSION['alertMessage'] = 'Las contraseñas no coinciden';

	

	header("Location: ../signIn.php");

}else{
	$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

	$setUser = "INSERT INTO usuarios (Name, Email, Password, RegisterDate) VALUES ('$name', '$email', '$hashedPassword', '$dateTime')";

	$query = mysqli_query($conn, $setUser);

	if ($query) {
		$_SESSION['userName'] = $name;
		echo "
				<script type='text/javascript'>
					alert('Usuario creado exitosamente');
					window.location.href = '../index.php';
				</script>
			";
	}else{
		echo "Error al crear su cuenta";
	}
}

$conn -> close();

?>