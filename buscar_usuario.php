<?php 
	$hostname_localhost = "localhost";
	$database_localhost = "dbgeoclient";
	$username_localhost = "root";
	$password_localhost = "";

	$json = array();

	if (isset($_GET['ci_usuario'])) {
		
		$ci_usuario = $_GET['ci_usuario'];

		$conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);

		$buscar = "SELECT * FROM usuario WHERE ci_usuario = '{$ci_usuario}'";
		$resultado_consulta = mysqli_query($conexion,$buscar);

		if ($busqueda = mysqli_fetch_array($resultado_consulta)) {
			$json['usuario'][]=$busqueda;
		}			
		else {
			$resultado["ci_usuario"]="No hay registro";
			$resultado["nombre"]="No hay registro";
			$resultado["a_paterno"]="No hay registro";
			$resultado["a_materno"]="No hay registro";
			$resultado["foto"]="No hay registro";
			$resultado["celular"]="No hay registro";
			$resultado["email"]="No hay registro";
			$resultado["password"]="No hay registro";
			$resultado["tipo_usuario"]="No hay registro";
			$resultado["estado"]="No hay registro";
			$json['usuario'][]=$resultado;
		}
		mysqli_close($conexion);
		echo json_encode($json);

	}else {
		
		$resultado["success"]=0;
		$resultado["estado"]="WS No retorna";
		$json['usuario'][]=$resultado;
		echo json_encode($json);
	}


 ?>		
