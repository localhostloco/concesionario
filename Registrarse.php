<?php
include 'Cabecera.php';

include 'bd.php';

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
$pass = $_POST['pass'];
$pass1 = $_POST['pass1'];

if ($pass !== $pass1) header("Location: Registro.php");
else {
	$nombre = $_POST['user'];
	$tipo = $_POST['tipo'];
	$query = "INSERT INTO usuarios (nombre, password, tipo) VALUES ('$nombre', '$pass', '$tipo')";
	if ($resultado = mysql_query($query)) {
		echo "<h2> Registro efectuado con éxito </h2>";
		header("refresh:1; url=Login.php");
	}
	else {
		echo "<h2> Hubo un error </h2>" . mysql_error();
		header("refresh:3; url=Registro.php");
	}
}

?>
	<footer> Creado y diseñado por Daniel Susumu ©2014 </footer>
	</body>
</html>