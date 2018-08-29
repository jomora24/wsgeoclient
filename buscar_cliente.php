<?php 
	$hostname_localhost = "localhost";
	$database_localhost = "dbgeoclient";
	$username_localhost = "root";
	$password_localhost = "";

	$json = array();

	if (isset($_GET['id_cliente'])) {
		
		$id_cliente = $_GET['id_cliente'];

		$conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);

		$buscar = "SELECT * FROM cliente WHERE id_cliente = '{$id_cliente}' AND estado = 'activo'";

		$resultado_busqueda = mysqli_query($conexion,$buscar);

		if ($busqueda = mysqli_fetch_array($resultado_busqueda)) {

			$json['cliente'][]=$busqueda;

		}			
		else {
			$resultado["id_cliente"]="No retorna";
			$resultado["ci_usuario"]="No retorna";
			$resultado["nombre"]="No retorna";
			$resultado["a_paterno"]="No retorna";
			$resultado["a_materno"]="No retorna";
			$resultado["direccion"]="No retorna";
			$resultado["latitud"]="No retorna";
			$resultado["longitud"]="No retorna";
			$resultado["celular"]="No retorna";
			$resultado["estado"]="No retorna";
			$json['cliente'][]=$resultado;
		}
		mysqli_close($conexion);
		echo json_encode($json);

	}else {		

		$resultado["success"]=0;
		$resultado["estado"]="WS No retorna";
		$json['cliente'][]=$resultado;
		echo json_encode($json);
	}


 ?>		
