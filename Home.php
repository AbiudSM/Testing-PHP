<?php 
	require "php/connection.inc.php";
	session_start();

	if (!isset($_SESSION['userName'])) {
		//header("Location: index.php");
		//die();
		$userName = "Iniciar Sesión";
	}else{
		$userName = $_SESSION['userName'];
		$getEmail = "SELECT * FROM usuarios WHERE Name = '$userName'";
		$query = mysqli_query($conn, $getEmail);
		$array = mysqli_fetch_array($query);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
	
	<!-- NAVBAR -->
	<nav class="navbar navbar-custom navbar-expand-lg py-lg-3 py-2 justify-content-between">
        <a class="navbar-brand" href="index.html">
            <img src="images/3DessinsBlanco.png" class="img-fluid" width="250">
        </a>
        <button class="navbar-toggler" type="button" 
        data-toggle="collapse" data-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse"  id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Cotizar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Diseño</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Materiales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contacto</a>
                </li>
                
                	<?php  
                		if (!isset($_SESSION['userName'])) { ?>
                			<li class="nav-item btn" style="padding: 0;">
								<a href="index.php" class="nav-link">Iniciar sesión</a>
							</li>
				<?php   } else{ ?>
							<li class="nav-item dropdown" style="padding: 0;">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?php echo $userName; ?>
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="php/singOut.php">Cerrar sesión</a>
								</div>
							</li>
				<?php	}

					?>
                	
                    
                
                <li class="nav-item">
                    <!-- <a class="nav-link" href="#">
                        <img src="images/Carrito2.png" class="img-fluid" width="30">
                    </a> -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown">
                                <img src="images/Carrito2.png" class="nav-link dropdown-toggle img-fluid" 
                                    width="60" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false"></img>
                                <div id="carrito" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarCollapse">
                                    <table id="lista-carrito" class="table" style=" font-family: bebas neue;">
                                        <thead>
                                            <tr>
                                                <th>Imagen</th>
                                                <th>Nombre</th>
                                                <th>Precio</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>

                                    <a href="#" id="vaciar-carrito" class="btn btn-primary btn-block" style=" font-family: bebas neue;">Vaciar Carrito</a>
                                    <a href="#" id="procesar-pedido" class="btn btn-danger btn-block" style=" font-family: bebas neue;">Procesar
                                        Compra</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

	<!-- INFO  -->
	<br><br>
	<?php
		if (isset($_SESSION['userName'])) {
			echo "Bienvenido: ".$userName."<br>";
			$email = $array['Email'];
			echo "Correo: ".$email;
		}
	?>


	<!-- SCRIPTS BOOTSTRAP -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script> -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script> -->

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>