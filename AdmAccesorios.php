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
	<div id="guia">
			<h3 align="center"> Modificar accesorio </h3>
			<ol>
				<strong><u><li> Seleccionar accesorio </li></u></strong>
				<li> Editar parámetros </li>
			</ol>
		</div>
	<?php
		$query = "SELECT * FROM accesorios";
		$accesorios = mysql_query($query);
		if (mysql_num_rows($accesorios) == 0) {
			echo "<h2> No hay accesorios disponibles </h2>";
		}
		else {
		echo "<h2> Seleccione un accesorio </h2>
		<form id=\"formulario\" action=\"ModAccesorio.php\" method=\"post\">
		<table id=\"tabla\">
			<tr>
				<th> Nombre </th>
				<th> Precio </th>
				<th> </th>
			</tr>";
			while ($resultados = mysql_fetch_assoc($accesorios)) {
				$nombre = $resultados['nombre'];
				$idaccesorio = $resultados['idAccesorio'];
				$precio = $resultados['precio'];
				
				echo "<tr>";
				echo "<td> $nombre </td>";
				echo "<td> $precio € </td>";
				echo "<td><button name=\"idaccesorio\" value=\"$idaccesorio\"> Seleccionar </button> </td>";
				echo "</tr>";
			}
		}
	?>
	</table>
	<footer> Creado y diseñado por Daniel Susumu ©2014 </footer>
</html>