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
	<?php
if (!empty($_POST['idcoche'])) {
	$idcoches = $_POST['idcoche'];
	foreach ($idcoches as $idcoche) {
		$query = "INSERT INTO cocheaccesorio VALUES ($idcoche, $idaccesorio)";
		mysql_query($query);
	}
	echo "<h2> Accesorio actualizado con éxito </h2>";
}
else echo "<h2> Ha habido un error </h2>";
?>
	<footer> Creado y diseñado por Daniel Susumu ©2014 </footer>
</html>