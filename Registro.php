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
	<script>
	function verificar() {
	var var1 = document.getElementById("pass").value.toString();
	var var2 = document.getElementById("pass1").value.toString();
		if (var1 != "") {
			if (var1 == var2) document.getElementById("formulario").submit();
			else alert("Las contraseñas no coinciden");
		}
		else alert("La contraseña no puede ser nula");
	}
	</script>
	<body>
		<h2> Página de registro </h2>
		<form id="formulario" method="post" action="Registrarse.php">
			<table id="tabla">
				<tr>
					<td> Nombre de usuario: </td>
					<td> <input type="text" name="user"> </td>
				</tr>
				<tr>
					<td> Contraseña: </td>
					<td> <input type="password" name="pass" id="pass"> </td>
				</tr>
				<tr>
					<td> Confirmar contraseña: </td>
					<td> <input type="password" name="pass1" id="pass1"> </td>
				</tr>
				<tr>
					<td> Tipo de usuario: </td>
					<td>
						Vendedor <input type="radio" value="Vendedor" name="tipo" checked> <br />
						Fabricante <input type="radio" value="Fabricante" name="tipo">
					</td>
				</tr>
			</table>
			<input type="button" id="enviar" onClick="verificar()" value="Enviar">
		</form>
		<footer> Creado y diseñado por Daniel Susumu ©2014 </footer>
	</body>
</html>