<?php
include 'Cabecera.php';

include 'bd.php';

$user = $_POST['user'];
$pass = $_POST['pass'];
$query = "SELECT * FROM usuarios WHERE nombre = '$user' AND password = '$pass'";
$usuario = mysql_query($query);
$resultado = mysql_fetch_assoc($usuario);
$_SESSION['logueado'] = true;
$_SESSION['user'] = $user;
$_SESSION['tipo'] = $resultado['tipo'];
$_SESSION['idUsuario'] = $resultado['idUsuario'];
?>
<html>
	<link rel="stylesheet" href="css/layout.css">
	<meta http-equiv="Content-Type" charset="ISO-8859-1">
	<meta name="viewport" content="width=device-width">
	<head>
		<title>Concesionario WebAlava</title>
	</head>
	<body>
	<?php

if (mysql_num_rows($usuario) == 0) {
	echo "<h2> Hubo un error en el login </h2>";
	session_destroy();
}
else {
	echo "<h2> Login efectuado con éxito </h2>";
}

header("refresh:0;url=Inicio.php");
?>
	<footer> Creado y diseñado por Daniel Susumu ©2014 </footer>
	</body>
</html>