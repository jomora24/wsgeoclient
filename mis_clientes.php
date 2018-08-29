<?php 
	$hostname_localhost = "localhost";
	$database_localhost = "dbgeoclient";
	$username_localhost = "root";
	$password_localhost = "";

	$json = array();
	
	if (isset($_GET['ci_usuario'])) {

		$ci_usuario = $_GET['ci_usuario'];

		$conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);

		$listar = "SELECT * FROM cliente WHERE  ci_usuario = '{$ci_usuario}' AND estado = 'activo'";
		$resultado_consulta = mysqli_query($conexion,$listar);
		
		if ($resultado_consulta) {
			while ($registro=mysqli_fetch_array($resultado_consulta)) {
			$json['cliente'][]=$registro;
		}
		mysqli_close($conexion);
		echo json_encode($json);
		}
		else {
			$resultado["id_cliente"]="No se encontraron datos";
			$resultado["ci_usuario"]="No se encontraron datos";
			$resultado["nombre"]="No se encontraron datos";
			$resultado["a_paterno"]="No se encontraron datos";
			$resultado["a_materno"]="No se encontraron datos";
			$resultado["direccion"]="No se encontraron datos";
			$resultado["latitud"]="No se encontraron datos";
			$resultado["longitud"]="No se encontraron datos";
			$resultado["celular"]="No se encontraron datos";
			$resultado["estado"]="No se encontraron datos";
			$json['cliente'][]=$resultado;
			echo json_encode($json);
		}
	}else {
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
		echo json_encode($json);
	}


 ?>		
