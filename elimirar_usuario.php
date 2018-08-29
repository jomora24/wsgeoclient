<?php 
	$hostname_localhost = "localhost";
	$database_localhost = "dbgeoclient";
	$username_localhost = "root";
	$password_localhost = "";

	$json = array();

	if (isset($_GET['ci_usuario'])) {
		
		$ci_usuario = $_GET['ci_usuario'];

		$conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);

		$delete = "UPDATE usuario SET  estado = 'inactivo') WHERE  ci_usuario = '{$ci_usuario}'";
		$resuldato_delete = mysqli_query($conexion,$delete);

		if ($resuldato_delete) {
			$consulta = "SELECT * FROM usuario WHERE ci_usuario = '{$ci_usuario}'";
			$resultado_consulta = mysqli_query($conexion,$consulta);
			if ($del = mysqli_fetch_array($resultado_consulta)) {
				$json['cliente'][]=$del;
			}
			mysqli_close($conexion);
			echo json_encode($json);
		}
		else {
			$resultado["ci_usuario"]="No eliminado";
			$resultado["nombre"]="No eliminado";
			$resultado["a_paterno"]="No eliminado";
			$resultado["a_materno"]="No eliminado";
			$resultado["foto"]="No eliminado";
			$resultado["celular"]="No eliminado";
			$resultado["email"]="No eliminado";
			$resultado["password"]="No eliminado";
			$resultado["tipo_usuario"]="No eliminado";
			$resultado["estado"]="No eliminado";
			$json['usuario'][]=$resultado;
			echo json_encode($json);
		}

	}else {
		$resultado["ci_usuario"]="No retorna";
		$resultado["nombre"]="No retorna";
		$resultado["a_paterno"]="No retorna";
		$resultado["a_materno"]="No retorna";
		$resultado["foto"]="No retorna";
		$resultado["celular"]="No retorna";
		$resultado["email"]="No retorna";
		$resultado["password"]="No retorna";
		$resultado["tipo_usuario"]="No retorna";
		$resultado["estado"]="No retorna";
		$json['usuario'][]=$resultado;
		echo json_encode($json);
	}

 ?>		
