<?php 
	$hostname_localhost = "localhost";
	$database_localhost = "dbgeoclient";
	$username_localhost = "root";
	$password_localhost = "";

	$json = array();

	if (isset($_GET['id_cliente'])) {
		
		$id_cliente = $_GET['id_cliente'];

		$conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);

		$delete = "UPDATE cliente SET  estado = 'inactivo') WHERE  id_cliente = '{$id_cliente}'";
		$resuldato_delete = mysqli_query($conexion,$delete);

		if ($resuldato_delete) {
			$consulta = "SELECT * FROM cliente WHERE id_cliente = '{$id_cliente}'";
			$resultado_consulta = mysqli_query($conexion,$consulta);
			if ($del = mysqli_fetch_array($resultado_consulta)) {
				$json['cliente'][]=$del;
			}
			mysqli_close($conexion);
			echo json_encode($json);
		}
		else {
			$resultado["id_cliente"]="No eliminado";
			$resultado["ci_usuario"]="No eliminado";
			$resultado["nombre"]="No eliminado";
			$resultado["a_paterno"]="No eliminado";
			$resultado["a_materno"]="No eliminado";
			$resultado["direccion"]="No eliminado";
			$resultado["latitud"]="No eliminado";
			$resultado["longitud"]="No eliminado";
			$resultado["celular"]="No eliminado";
			$resultado["estado"]="No eliminado";
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