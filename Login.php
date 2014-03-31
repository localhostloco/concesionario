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
		<h2> Login </h2>
		<form id="formulario" method="post" action="Loguearse.php">
			<table id="tabla">
				<tr>
					<td> Usuario: </td>
					<td> <input type="text" name="user"> </td>
				</tr>
				<tr>
					<td> Contraseña: </td>
					<td> <input type="password" name="pass"> </td>
				</tr>
			</table>
			<input type="submit" id="enviar">
		</form>
		<footer> Creado y diseñado por Daniel Susumu ©2014 </footer>
	</body>
</html>