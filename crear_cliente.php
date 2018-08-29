<?php 
	$hostname_localhost = "localhost";
	$database_localhost = "dbgeoclient";
	$username_localhost = "root";
	$password_localhost = "";

	$json = array();

	if (isset($_GET['id_cliente'],$_GET['ci_usuario'],$_GET['nombre'],$_GET['a_paterno'],$_GET['a_materno'],$_GET['direccion'],$_GET['latitud'],$_GET['longitud'],$_GET['celular'],$_GET['estado'])) {

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
		$insert = "INSERT INTO cliente(id_cliente,ci_usuario,nombre,a_paterno,a_materno,direccion,latitud,longitud,celular,estado) VALUES ('{$id_cliente}','{$ci_usuario}','{$nombre}','{$a_paterno}','{$a_materno}','{$direccion}','{$latitud}','{$longitud}','{$celular}','{$estado}')";
		$resuldato_insert = mysqli_query($conexion,$insert);

		if ($resuldato_insert) {
			$consulta = "SELECT * FROM cliente WHERE id_cliente = '{$id_cliente}'";
			$resultado_consulta = mysqli_query($conexion,$consulta);
			if ($Registro = mysqli_fetch_array($resultado_consulta)) {
				$json['cliente'][]=$Registro;
			}
			mysqli_close($conexion);
			echo json_encode($json);
		}
		else {
			$resultado["id_cliente"]="No registrado";
			$resultado["ci_usuario"]="No registrado";
			$resultado["nombre"]="No registrado";
			$resultado["a_paterno"]="No registrado";
			$resultado["a_materno"]="No registrado";
			$resultado["direccion"]="No registrado";
			$resultado["latitud"]="No registrado";
			$resultado["longitud"]="No registrado";
			$resultado["celular"]="No registrado";
			$resultado["estado"]="No registrado";
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
