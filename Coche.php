<?php
	include 'Cabecera.php';
	include 'bd.php';
	$idcoche = $_POST['modelo'];
	$query = "SELECT * FROM (confcoche INNER JOIN configuraciones ON idConfiguracion = idConf) WHERE idCoche = $idcoche";
	$configuraciones = mysql_query($query);
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
				<li> Seleccionar coche </li>
				<strong><u><li> Seleccionar configuración </li></u></strong>
				<li> Seleccionar accesorios </li>
				<li> Tramitar pedido </li>
			</ol>
		</div>
	<?php
		if (mysql_num_rows($configuraciones) == 0) {
			echo "<h2> No hay configuraciones disponibles </h2>";
		}
		else {
			echo "<h2> Seleccione la configuración del coche </h2>
		<form id=\"formulario\" action=\"Accesorios.php\" method=\"post\">
			<table id=\"tabla\">
			<tr>
				<th> Nombre </th>
				<th> Motor</th>
				<th> Navegador </th>
				<th> AC </th>
				<th> Techo solar </th>
				<th> Transmisión </th>
				<th> Precio </th>
			</tr>";
			while ($resultados = mysql_fetch_assoc($configuraciones)) {
				$idconfcoche = $resultados['idConfCoche'];
				$idconf = $resultados['idConfiguracion'];
				$nombre = $resultados['nombre'];
				$motor = $resultados['motor'];
				$navegador = $resultados['navegador'];
				$ac = $resultados['AC'];
				$techo = $resultados['techoSolar'];
				$transmision = $resultados['transmision'];
				$precio = $resultados['precio'];
				echo "<tr>";
				echo "<td> $nombre </td>";
				echo "<td> $motor MPi </td>";
				echo "<td> $navegador </td>";
				echo "<td> $ac </td>";
				echo "<td> $techo </td>";
				echo "<td> $transmision </td>";
				echo "<td> $precio €</td>";
				echo "<td> <button name=\"idconf\" value=\"$idconf\"> Seleccionar </button> </td>";
				echo "</tr>";
			}
		}
		echo "<input type=\"hidden\" name=\"idcoche\" value=\"$idcoche\">";
	?>
			</table>
		</form>
		<footer> Creado y diseñado por Daniel Susumu ©2014 </footer>
	</body>
</html>