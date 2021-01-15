<?php

require "connection.inc.php";

$name = $_POST["nombreUsuario"];
$email = $_POST["email"];
$password = $_POST["pass"];
$password2 = $_POST["pass2"];
$dateTime = date('Y-m-d H:i:s');

$getUser = "SELECT * FROM usuarios WHERE Name = '$name'";
$verQuery = mysqli_query($conn, $getUser);
if (mysqli_num_rows($verQuery) > 0) {
	
	echo "
			<script type='text/javascript'>
				alert('Usuario ya existente');
				window.location.href = '../signIn.php';
			</script>
		";

}else if ($password != $password2) {
	
	echo "
			<script type='text/javascript'>
				alert('Las contraseñas no coinciden');
				window.location.href = '../signIn.php';
			</script>
		";

}else{
	$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

	$setUser = "INSERT INTO usuarios (Name, Email, Password, RegisterDate) VALUES ('$name', '$email', '$hashedPassword', '$dateTime')";

	$query = mysqli_query($conn, $setUser);

	if ($query) {
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