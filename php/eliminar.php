<?php 

require 'connection.inc.php';
session_start();

if (isset($_GET['id'])) {

	echo $idUsuario = $_GET['id'];
	$query = "DELETE FROM usuarios WHERE idUsuario = '$idUsuario'";
    $resultQuery = mysqli_query($conn, $query);

    if (!$resultQuery) {
        die("Query Failed");
    }else{
        $_SESSION['message'] = 'Usuario eliminado exitosamente';
        header("Location: ../Home.php");
    }

}else{
	header("Location: Home.php");
}


?>