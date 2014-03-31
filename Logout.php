<?php
	include 'Cabecera.php';
	include 'bd.php';
	include 'Redirigir.php';
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
		session_destroy();
		header("refresh:0;url=Inicio.php");
		echo "<h2> Sesión finalizada, ¡hasta pronto! </h2>";
	?>
	<footer> Creado y diseñado por Daniel Susumu ©2014 </footer>
	</body>
</html>