<?php
		include 'Cabecera.php';
		include 'bd.php';
		
		$idcoche = $_POST['idcoche'];
		$query = "SELECT accesorios.idAccesorio, accesorios.nombre, accesorios.precio FROM (accesorios NATURAL JOIN cocheaccesorio INNER JOIN coches ON cocheaccesorio.idCoche = coches.idCoche) WHERE coches.idCoche = $idcoche";
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
				<li> Seleccionar configuración </li>
				<strong><u><li> Seleccionar accesorios </li></u></strong>
				<li> Tramitar pedido </li>
			</ol>
		</div>
		<form id="formulario" method="post" action="Pedido.php">
			<table id="tabla">
		<?php
			echo "<input type=\"hidden\" name=\"idconf\" value=\"".$_POST['idconf']."\">";
			echo "<input type=\"hidden\" name=\"idcoche\" value=\"".$_POST['idcoche']."\">";
			$accesorios = mysql_query($query);
			if (mysql_num_rows($accesorios) != 0) {
				echo "<h2> Accesorios disponibles </h2>
							<tr>
								<th> Nombre </th>
								<th> Precio </th>
								<th> Seleccionar </th>
							</tr>
							<tr>";
				while ($resultados = mysql_fetch_assoc($accesorios)) {
					echo "<tr><td>".$resultados['nombre']."</td>";
					echo "<td>".$resultados['precio']."€</td>";
					echo "<td><input type=\"checkbox\" name=\"idAccesorio[]\" value=\"".$resultados['idAccesorio']."\"></td><tr>";
				}
				echo "</tr></table>";
				echo "<input type=\"submit\">";
			}	
			else {
				echo "<h2> Este coche no tiene accesorios extras </h2>"." ".mysql_error()." ".$query;
				echo "<script>
						document.getElementById(\"formulario\").submit();
					</script>";
			}
		?>
		</form>
		<footer> Creado y diseñado por Daniel Susumu ©2014 </footer>
	</body>
</html>