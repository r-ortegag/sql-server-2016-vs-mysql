<?php
require("../conexion/conexion.php");//incluimos los datos de conexion para la base de datos.
include("seguridad.php");//incluimos el fichero de seguridad de que puedan acceder los usuarios que han iniciado sesion
$params = array();
$options = array( "Scrollable" => 'static');
if (isset($_POST["modificar"])) {
	$cuales=$_POST["modifica"];
	$id_empleado=$cuales[0];
	$sql="SELECT id_empleado, usuario, nombre, apellidos, dni, email, telefono FROM empleados WHERE id_empleado='$id_empleado'";
	$resultado = sqlsrv_query($conn, $sql, $params, $options);
	if (sqlsrv_num_rows($resultado) > 0) {
		$fila = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC);
		$id_empleado=$fila["id_empleado"];
		$usuario=$fila["usuario"];
		$nombre=$fila["nombre"];
		$apellidos=$fila["apellidos"];
		$dni=$fila["dni"];
		$email=$fila["email"];
		$telefono=$fila["telefono"];
		echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="shortcut icon" href="../favicon.ico" type="image/ico" />
		<title>Modificar empleado seleccionado - Inmobilaria Azteca</title>
		<link rel="stylesheet" type="text/css" href="../css/azteca.css"></link>
	</head>
	<body>
		<div class="logo">
			<a href="espacio_admin.php"><img src="../favicon.png" alt="Inmo.Azteca"></img></a>
		</div>
		<div class="menu">
			<nav>
				<ul class="nav">
					<li><a href="espacio_admin.php">Inicio</a></li>
					<li><a href="empleados.php">Empleados</a>
						<ul>
							<li><a href="crear_empleado.php">Crear empleados</a></li>
							<li><a href="modificar_empleados.php">Modificar empleados</a></li>
							<li><a href="borrar_empleado.php">Borrar empleados</a></li>
							<li><a href="cambiar_contra_empleado.php">Cambiar contraseñas</a></li>
						</ul>
					</li>
					<li><a href="clientes.php">Clientes</a>
						<ul>
							<li><a href="crear_cliente.php">Crear clientes</a></li>
							<li><a href="modificar_clientes.php">Modificar clientes</a></li>
							<li><a href="borrar_cliente.php">Borrar clientes</a></li>
							<li><a href="cambiar_contra_cliente.php">Cambiar contraseñas</a></li>
						</ul>
					</li>
					<li><a href="cerrar_sesion.php">Cerrar sesión</a></li>
				</ul>
			</nav>
		</div>
		<br />
		<div class="cuerpo">
		<h3>Modificar empleado</h3>
			<form method="post" enctype="multipart/form-data" action="mod_empleado.php" onsubmit="return modificar_empleado();">
			Id Empleado:<br />
				<input type="text" name="id_empleado" id="id_empleado" value="' .$id_empleado. '" readonly><br />
				<span></span><br />
			Usuario:<br />
				<input type="text" name="usuario" id="usuario" value="' .$usuario. '"><br />
				<span id="error_usuario" class="error"></span><br />
			Nombre:<br />
				<input type="text" name="nombre" id="nombre" value="' .$nombre. '"><br />
				<span id="error_nombre" class="error"></span><br />
			Apellidos:<br />
				<input type="text" name="apellidos" id="apellidos" value="' .$apellidos. '"><br />
				<span id="error_apellidos" class="error"></span><br />
			DNI:<br />
				<input type="text" name="dni" id="dni" value="' .$dni. '"><br />
				<span id="error_dni" class="error"></span><br />
			Email:<br />
				<input type="text" name="email" id="email" value="' .$email. '"><br />
				<span id="error_email" class="error"></span><br />
			Telefono:<br />
				<input type="text" name="telefono" id="telefono" value="' .$telefono. '"><br />
				<span id="error_telefono" class="error"></span><br />
			<input type="submit" value="Modificar" name="enviar" id="enviar" class="boton">
			<input type="reset" value="Borrar datos" name="borrar" id="borrar" class="boton">
			</form>
		</div>
		<div class="validacion">
			<a href="http://validator.w3.org/check?uri=referer">
				<img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" />
			</a>
		</div>
	</body>
</html>
		';
	}
} else {
	$sql = "SELECT id_empleado, usuario, nombre, apellidos, dni, email, telefono FROM empleados";
	$resultado = sqlsrv_query($conn, $sql, $params, $options);
	$num_fila=0;
echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="shortcut icon" href="../favicon.ico" type="image/ico" />
		<title>Modificar empleados - Inmobilaria Azteca</title>
		<link rel="stylesheet" type="text/css" href="../css/azteca.css"></link>
	</head>
	<body>
		<div class="logo">
			<a href="espacio_admin.php"><img src="../favicon.png" alt="Inmo.Azteca"></img></a>
		</div>
		<div class="menu">
			<nav>
				<ul class="nav">
					<li><a href="espacio_admin.php">Inicio</a></li>
					<li><a href="empleados.php">Empleados</a>
						<ul>
							<li><a href="crear_empleado.php">Crear empleados</a></li>
							<li><a href="modificar_empleados.php">Modificar empleados</a></li>
							<li><a href="borrar_empleado.php">Borrar empleados</a></li>
							<li><a href="cambiar_contra_empleado.php">Cambiar contraseñas</a></li>
						</ul>
					</li>
					<li><a href="clientes.php">Clientes</a>
						<ul>
							<li><a href="crear_cliente.php">Crear clientes</a></li>
							<li><a href="modificar_clientes.php">Modificar clientes</a></li>
							<li><a href="borrar_cliente.php">Borrar clientes</a></li>
							<li><a href="cambiar_contra_cliente.php">Cambiar contraseñas</a></li>
						</ul>
					</li>
					<li><a href="cerrar_sesion.php">Cerrar sesión</a></li>
				</ul>
			</nav>
		</div>
		<br />
		<br />
		<br />
		<div class="cuerpo">
';
if (sqlsrv_num_rows($resultado) > 0){
	echo "<form method='post' enctype='multipart/form-data' action='modificar_empleados.php'>";
	echo '<table border="1">';
	$fila = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC);
	echo '<tr class="cabecera"><th>Id Empleado</th><th>Usuario</th><th>Nombre</th><th>Apellidos</th><th>DNI</th><th>Email</th><th>Telefono</th><th><input type="submit" value="Modificar" id="modificar" name="modificar" class="botontabla"></input></th></tr>';
	do {
		echo '<tr ';
		if ($num_fila%2==0) {
			echo 'class="blanco"';
		} else {
			echo 'class="gris"';
		}
		echo '>';
		$id_empleado=$fila['id_empleado'];
		echo "<td>" .$fila['id_empleado']. "</td>";
		$usuario=$fila['usuario'];
		echo "<td>".$fila['usuario']."</td>";
		$nombre=$fila['nombre'];
		echo "<td>".$fila['nombre']."</td>";
		$apellidos=$fila['apellidos'];
		echo "<td>".$fila['apellidos']."</td>";
		$dni=$fila['dni'];
		echo "<td>".$fila['dni']."</td>";
		$email=$fila['email'];
		echo "<td>".$fila['email']."</td>";
		$telefono=$fila['telefono'];
		echo "<td>".$fila['telefono']."</td>";
		echo "<td><input type='radio' name='modifica[]' value='$id_empleado'</input></td>";
		echo '</tr>';
		$num_fila++;
	} while ($fila = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC));
	echo '</table>';
	echo '</form>';
} else {
	echo '<p>No hay empleados</p>';
}
		echo '
		</div>
		<div class="validacion">
			<a href="http://validator.w3.org/check?uri=referer">
				<img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" />
			</a>
		</div>
	</body>
</html>
';
}
?>