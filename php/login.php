<?php

require "connection.inc.php";
session_start();

$email = $_POST["nombreUsuario"];
$password = $_POST["pass"];

$getUser = "SELECT * FROM usuarios WHERE Email = '".$email."'or Name = '".$email."'";

$query = mysqli_query($conn, $getUser) or die("Problemas");
//$nr = mysqli_num_rows($query);  CANTIDAD DE FILAS DEL QUERY
$row = mysqli_fetch_array($query);

$hashedPassword = $row["Password"];

if (password_verify($password, $hashedPassword)) {
	//header ("Location: pagina.html")
	$_SESSION['userName'] = $row['Name'];
	header("Location:../Home.php");
}else{
	echo "
			<script type='text/javascript'>
				alert('Correo o contraseña incorrectas');
				window.location.href = '../index.php';
			</script>
		";
}

$conn -> close();

?>