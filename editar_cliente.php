<?php 
	$hostname_localhost = "localhost";
	$database_localhost = "dbgeoclient";
	$username_localhost = "root";
	$password_localhost = "";

	$json = array();

	if (isset($_GET['id_cliente'],$_GET['ci_usuario'],$_GET['nombre'],$_GET['a_paterno'],$_GET['a_materno'],$_GET['direccion'],$_GET['latitud'],$_GET['longitud'],$_GET['celular']),$_GET['estado'])) {

		$id_cliente = $_GET['id_cliente'];
		$ci_usuario = $_GET['ci_usuario'];
		$nombre = $_GET['nombre'];
		$a_paterno = $_GET['a_paterno'];
		$a_materno = $_GET['a_materno'];
		$direccion = $_GET['direccion'];
		$latitud = $_GET['latitud'];
		$longitud = $_GET['longitud'];
		$celular = $_GET['celular'];
		$estado = $_GET['estado'];

		$conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);

		$update = "UPDATE cliente SET  ci_usuario = '{$ci_usuario}', nombre = '{$nombre}', a_paterno = '{$a_paterno}', a_materno = '{$a_materno}' , direccion = '{$direccion}' , latitud = '{$latitud}' , longitud = '{$longitud}' , celular = '{$celular}' , estado = '{$estado}') WHERE  id_cliente = '{$id_cliente}'";
		$resuldato_update = mysqli_query($conexion,$update);

		if ($resuldato_update) {
			$consulta = "SELECT * FROM cliente WHERE id_cliente = '{$id_cliente}'";
			$resultado_consulta = mysqli_query($conexion,$consulta);
			if ($up = mysqli_fetch_array($resultado_consulta)) {
				$json['cliente'][]=$up;
			}
			mysqli_close($conexion);
			echo json_encode($json);
		}
		else {
			$resultado["id_cliente"]="No Modificado";
			$resultado["ci_usuario"]="No Modificado";
			$resultado["nombre"]="No Modificado";
			$resultado["a_paterno"]="No Modificado";
			$resultado["a_materno"]="No Modificado";
			$resultado["direccion"]="No Modificado";
			$resultado["latitud"]="No Modificado";
			$resultado["longitud"]="No Modificado";
			$resultado["celular"]="No Modificado";
			$resultado["estado"]="No Modificado";
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
