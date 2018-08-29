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
		$insert = "INSERT INTO usuario(ci_usuario,nombre,a_paterno,a_materno,foto,celular,email,password,tipo_usuario,estado) VALUES ('{$ci_usuario}','{$nombre}','{$a_paterno}','{$a_materno}','{$foto}','{$celular}','{$email}','{$password}','{$tipo_usuario}','{$estado}')";
		$resuldato_insert = mysqli_query($conexion,$insert);

		if ($resuldato_insert) {
			$consulta = "SELECT * FROM usuario WHERE ci_usuario = '{$ci_usuario}'";
			$resultado_consulta = mysqli_query($conexion,$consulta);
			if ($Registro = mysqli_fetch_array($resultado_consulta)) {
				$json['usuario'][]=$Registro;
			}
			mysqli_close($conexion);
			echo json_encode($json);
		}
		else {
			$resultado["ci_usuario"]="No registrado";
			$resultado["nombre"]="No registrado";
			$resultado["a_paterno"]="No registrado";
			$resultado["a_materno"]="No registrado";
			$resultado["foto"]="No registrado";
			$resultado["celular"]="No registrado";
			$resultado["email"]="No registrado";
			$resultado["password"]="No registrado";
			$resultado["tipo_usuario"]="No registrado";
			$resultado["estado"]="No registrado";
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
