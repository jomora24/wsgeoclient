<?php 
	$hostname_localhost = "localhost";
	$database_localhost = "dbgeoclient";
	$username_localhost = "root";
	$password_localhost = "";

	$json = array();

	if (isset($_GET['ci_usuario'],$_GET['nombre'],$_GET['a_paterno'],$_GET['a_materno'],$_GET['foto'],$_GET['celular'],$_GET['email'],$_GET['password'],$_GET['tipo_usuario']),$_GET['estado'])) {

		$ci_usuario = $_GET['ci_usuario'];
		$nombre = $_GET['nombre'];
		$a_paterno = $_GET['a_paterno'];
		$a_materno = $_GET['a_materno'];
		$foto = $_GET['foto'];
		$celular = $_GET['celular'];
		$email = $_GET['email'];
		$password = $_GET['password'];
		$tipo_usuario = $_GET['tipo_usuario'];
		$estado = $_GET['estado'];


		$conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);

		$update = "UPDATE usuario SET  nombre = '{$nombre}', a_paterno = '{$a_paterno}', a_materno = '{$a_materno}' , foto = '{$foto}' , celular = '{$celular}' , email = '{$email}' , password = '{$password}' , tipo_usuario = '{$tipo_usuario}', estado = '{$estado}') WHERE  ci_usuario = '{$ci_usuario}'";
		$resuldato_insert = mysqli_query($conexion,$update);

		if ($resuldato_insert) {
			$consulta = "SELECT * FROM cliente WHERE ci_usuario = '{$ci_usuario}'";
			$resultado_consulta = mysqli_query($conexion,$consulta);
			if ($Registro = mysqli_fetch_array($resultado_consulta)) {
				$json['cliente'][]=$Registro;
			}
			mysqli_close($conexion);
			echo json_encode($json);
		}
		else {
			$resultado["ci_usuario"]="No modificado";
			$resultado["nombre"]="No modificado";
			$resultado["a_paterno"]="No modificado";
			$resultado["a_materno"]="No modificado";
			$resultado["foto"]="No modificado";
			$resultado["celular"]="No modificado";
			$resultado["email"]="No modificado";
			$resultado["password"]="No modificado";
			$resultado["tipo_usuario"]="No modificado";
			$resultado["estado"]="No modificado";
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
