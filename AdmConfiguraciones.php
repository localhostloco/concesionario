<?php
		include 'Cabecera.php';
		include 'bd.php';
		
		if ($_SESSION['tipo'] != 'Fabricante') {
			header("Location: Inicio.php");
		}
?>	
<html>
	<link rel="stylesheet" href="css/layout.css">
	<meta http-equiv="Content-Type" charset="ISO-8859-1">
	<script type="text/javascript" src="JS/SelecCoches.js"></script>
	<meta name="viewport" content="width=device-width">
	<head>
		<title>Concesionario WebAlava</title>
	</head>
	<body>
	<div id="guia">
			<h3 align="center"> Modificar configuración</h3>
			<ol>
				<strong><u><li> Seleccionar coche </li></u></strong>
				<li> Seleccionar configuración </li>
				<li> Editar parámetros </li>
			</ol>
		</div>
		<h2> Seleccione el coche cuya configuración se quiere modificar</h2>
		<form id="formulario" method="post" action="CambiarConfiguracion.php">
			<table id="tabla">
				<tr>
					<th> Marca </th>
					<th> Modelo </th>
				</tr>
				<tr>
					<td>
						<select name="marca" id="marca">
							<option value="Hyundai" selected="selected">Hyundai</option>
							<option value="Opel">Opel</option>
							<option value="Renault">Renault</option>
							<option value="Audi">Audi</option>
							<option value="Fiat">Fiat</option>
						</select>
					</td>
					<td>
						<select name="modelo" id="modelo">
							<option value="i30" selected="selected">i30</option>
							<option value="ix35">ix35</option>
						</select>
					</td>
				</tr>
			</table>
			<input type="submit"> Enviar </input>
		</form>
		<?php
		?>
		<footer> Creado y diseñado por Daniel Susumu ©2014 </footer>
	</body>
</html>