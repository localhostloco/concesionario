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
	<?php
		$query = "SELECT * FROM pedidos WHERE confirmado = 0 ORDER BY fecha";
		$pedidos = mysql_query($query);
		if (mysql_num_rows($pedidos) == 0) {
			echo "<h2> Todos los pedidos han sido procesados </h2>";
		}
		else {
		echo "<h2> Pedidos por confirmar </h2>
		<form id=\"formulario\" action=\"ConfirmarPedido.php\" method=\"post\">
		<table id=\"tabla\">
			<tr>
				<th> Fecha </th>
				<th> Coche </th>
				<th> Configuracion </th>
				<th> Vendedor </th>
				<th> Confirmar </th>
			</tr>";
			while ($resultados = mysql_fetch_assoc($pedidos)) {
				$fecha = $resultados['fecha'];
				$idpedido = $resultados['idPedido'];
				
				$idconfcoche = $resultados['idConfCoche'];
				$subquery = "SELECT * FROM confcoche WHERE idConfCoche = $idconfcoche";
				$res = mysql_query($subquery);
				$subResultado = mysql_fetch_assoc($res);
				$idcoche = $subResultado['idCoche'];
					$subquery2 = "SELECT * FROM coches WHERE idCoche = $idcoche";
					$res2 = mysql_query($subquery2);
					$subResultado2 = mysql_fetch_assoc($res2);
					$coche = $subResultado2['marca']." ".$subResultado2['modelo'];
					
				$idconfiguracion = $subResultado['idConf'];
					$subquery3 = "SELECT * FROM configuraciones WHERE idConfiguracion = $idconfiguracion";
					$res3 = mysql_query($subquery3);
					$subResultado3 = mysql_fetch_assoc($res3);
					$configuracion = $subResultado3['nombre'];
					
				$iduser = $resultados['idUsr'];
					$subquery4 = "SELECT nombre FROM usuarios WHERE idUsuario = $iduser";
					$res4 = mysql_query($subquery4);
					$subResultado4 = mysql_fetch_assoc($res4);
					$nombreUsuario = $subResultado4['nombre'];
					
				$confirmado = $resultados['confirmado'];
				echo "<tr>";
				echo "<td> $fecha </td>";
				echo "<td> $coche </td>";
				echo "<td> $configuracion </td>";
				echo "<td> $nombreUsuario </td>";
				echo "<td><button name=\"idPedido\" value=\"$idpedido\"> Confirmar </button> </td>";
				echo "</tr>";
			}
		}
	?>
	</table>
	<footer> Creado y diseñado por Daniel Susumu ©2014 </footer>
</html>