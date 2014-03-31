<?php
include 'Cabecera.php';

include 'bd.php';

if ($_SESSION['tipo'] != 'Fabricante') {
	header("Location: Inicio.php");
}

$idaccesorio = $_POST['idaccesorio'];
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
			<h3 align="center"> Modificar accesorio </h3>
			<ol>
				<li> Seleccionar accesorio </li>
				<strong><u><li> Editar parámetros </li></u></strong>
			</ol>
		</div>
	<h2> Introduzca la información </h2>
		<form id="formulario" action="UpdAccesorio.php" method="post">
		<table id="tabla">
			<tr>
				<th> Nombre </th>
				<th> Precio </th>
				<th> Disponible en: </th>
			</tr>
	<?php
$query = "SELECT * FROM accesorios WHERE idAccesorio = $idaccesorio";
$accesorios = mysql_query($query);

while ($resultados = mysql_fetch_assoc($accesorios)) {
	$nombre = $resultados['nombre'];
	$idaccesorio = $resultados['idAccesorio'];
	$precio = $resultados['precio'];
	$cochesString = "<ul>";
	$subquery = "SELECT coches.idCoche, modelo, marca FROM (accesorios INNER JOIN cocheaccesorio 
		ON accesorios.idAccesorio = cocheaccesorio.idAccesorio INNER JOIN coches 
		ON cocheaccesorio.idCoche = coches.idCoche) WHERE accesorios.idAccesorio = $idaccesorio";
	$coches = mysql_query($subquery);
	while ($subresultados = mysql_fetch_assoc($coches)) {
		$cochesString.= "<li>";
		$cochesString.= "<input type=\"checkbox\" name=\"idcoche[]\" value=\"" . $subresultados['idCoche']
			. "\" checked>" . $subresultados['marca'] . " " . $subresultados['modelo'] . "</input>";
		$cochesString.= "</li>";
	}

	$subquery1 = "SELECT coches.idCoche, modelo, marca FROM coches WHERE idCoche NOT IN 
		(SELECT coches.idCoche FROM (accesorios INNER JOIN cocheaccesorio 
		ON accesorios.idAccesorio = cocheaccesorio.idAccesorio INNER JOIN coches 
		ON cocheaccesorio.idCoche = coches.idCoche) WHERE accesorios.idAccesorio = $idaccesorio)";
	$coches1 = mysql_query($subquery1);
	while ($subresultados1 = mysql_fetch_assoc($coches1)) {
		$cochesString.= "<li>";
		$cochesString.= "<input type=\"checkbox\" name=\"idcoche[]\" value=\"" 
			. $subresultados1['idCoche'] . "\">" . $subresultados1['marca'] . " " 
			. $subresultados1['modelo'] . "</input>";
		$cochesString.= "</li>";
	}

	$cochesString.= "</ul>";
	echo "<tr>";
	echo "<td> $nombre </td>";
	echo "<td> $precio € </td>";
	echo "<td> $cochesString </td>";
	echo "</tr>";
}

echo "</table><button name=\"idaccesorio\" value=\"$idaccesorio\"> Seleccionar </button>";
?>
	</table>
	<footer> Creado y diseñado por Daniel Susumu ©2014 </footer>
</html>