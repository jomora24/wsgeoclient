<?php 

	$hostname_localhost = "localhost";
	$database_localhost = "dbgeoclient";
	$username_localhost = "root";
	$password_localhost = "";

	
	$email = filter_input(INPUT_POST,"email");
	$pass = filter_input(INPUT_POST,"pass");

	$conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);	
	$login = "SELECT ci_usuario,nombre,a_paterno,email,celular,foto,tipo_usuario FROM usuario WHERE email='$email' AND password = '$pass'";
		
	$resuldato_login = mysqli_query($conexion,$login);

	if ($Registro = mysqli_fetch_array($resuldato_login)) {
		$json['usuario'][]=$Registro;
		mysqli_close($conexion);
		echo json_encode($json);			
	}
		
	else{
		echo json_encode("0");
	}

	

	
	
	

 ?>