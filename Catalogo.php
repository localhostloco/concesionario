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
		<div id="guia">
			<h3 align="center"> Realizar pedido</h3>
			<ol>
				<strong><u><li> Seleccionar coche </li></u></strong>
				<li> Seleccionar configuración </li>
				<li> Seleccionar accesorios </li>
				<li> Tramitar pedido </li>
			</ol>
		</div>
	<?php
		$query = "SELECT * FROM Coches WHERE cantidad > 0 ORDER BY marca DESC";
		$coches = mysql_query($query);
		if (mysql_num_rows($coches) == 0) {
			echo "<h2> No hay coches disponibles </h2>";
		}
		else {
			echo "<h2> Catalogo de coches disponibles </h2>
		<form id=\"formulario\" action=\"Coche.php\" method=\"post\">
		<table id=\"tabla\">
			<tr>
				<th>  </th>
				<th> Marca </th>
				<th> Modelo </th>
				<th> Color </th>
				<th> Unidades </th>
				<th> Precio </th>
				<th>  </th>
			</tr>";
			while ($resultados = mysql_fetch_assoc($coches)) {
				$id = $resultados['idCoche'];
				$foto = $resultados['foto'];
				$marca = $resultados['marca'];
				$modelo = $resultados['modelo'];
				$color = $resultados['color'];
				$cantidad = $resultados['cantidad'];
				$precio = $resultados['precio'];
				echo "<tr>";
				echo "<td> <img src=\"img/$foto\" </td>";
				echo "<td> $marca </td>";
				echo "<td> $modelo </td>";
				echo "<td> $color </td>";
				echo "<td> $cantidad </td>";
				echo "<td> $precio €</td>";
				echo "<td> <button name=\"modelo\" value=\"$id\"> Seleccionar </button> </td>";
				echo "</tr>";
			}
		}
	?>
		</table>
		</form>
		<footer> Creado y diseñado por Daniel Susumu ©2014 </footer>
	</body>
</html>