<?php 
	$hostname_localhost = "localhost";
	$database_localhost = "dbgeoclient";
	$username_localhost = "root";
	$password_localhost = "";

	$json = array();
	$conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
	$listar = "SELECT * FROM usuario";
	$resultado_consulta = mysqli_query($conexion,$listar);
	while ($registro=mysqli_fetch_array($resultado_consulta)) {
		$json['usuario'][]=$registro;
	}
	mysqli_close($conexion);
	echo json_encode($json);


 ?>		
