<?php
		include 'Cabecera.php';
		include 'bd.php';
		include 'Redirigir.php';
		
		if ($_SESSION['tipo'] != 'Vendedor') {
			header("Location: Login.php");
		}
		$idaccesorio;
		$valor = 0;
		$stringAccesorios = "";
		if (!empty($_POST['idAccesorio'])) {
			//$idaccesorio = serialize($_POST['idAccesorio']);
			$stringAccesorios .= "<ul>";
			foreach($_POST['idAccesorio'] as $idAccesorio) {
				$auxquery = "SELECT * FROM accesorios WHERE idAccesorio = $idAccesorio";
				$accesorio = mysql_query($auxquery);
				$resultado = mysql_fetch_assoc($accesorio);
				$stringAccesorios .= "<li>";
				$stringAccesorios .= $resultado['nombre'];
				$stringAccesorios .= "</li>";
				$valor += $resultado['precio'];
			}
			$stringAccesorios .= "</ul>";
		}
		
		$idcoche = $_POST['idcoche'];
		$idconf = $_POST['idconf'];
		$query = "SELECT * FROM coches WHERE idCoche = $idcoche";
		$query1 = "SELECT * FROM configuraciones WHERE idConfiguracion = $idconf";
		$coche = mysql_query($query);
		$configuracion = mysql_query($query1);
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
				<li> Seleccionar accesorios </li>
				<strong><u><li> Tramitar pedido </li></u></strong>
			</ol>
		</div>
		<h2> Resumen del pedido </h2>
		<form id="formulario" action="Tramitar.php" method="post">
			<table id="tabla">
			<tr>
				<th> Marca </th>
				<th> Modelo </th>
				<th> Configuración </th>
				<th> Accesorios </th>
				<th> Precio total </th>
			</tr>
			<?php
				$resultados = mysql_fetch_assoc($coche);
				$resultados1 = mysql_fetch_assoc($configuracion);
				$marca = $resultados['marca'];
				$modelo = $resultados['modelo'];
				$conf = $resultados1['nombre'];
				$precio1 = $resultados['precio'];
				$precio2 = $resultados1['precio'];
				$precio = $precio1 + $precio2 + $valor;
				echo "<tr>";
				echo "<td> $marca </td>";
				echo "<td> $modelo </td>";
				echo "<td> $conf </td>";
				if (!empty($_POST['idAccesorio'])) {
					echo "<input type=\"hidden\" name=\"idaccesorio\" value=\"".htmlentities(serialize($_POST['idAccesorio']))."\">";
					echo "<td>".$stringAccesorios."</td>";
				}
				else echo "<td> Ninguno </td>";
				echo "<td> $precio €</td>";
				echo "<td> <button> Realizar pedido </button> </td></tr>";
				echo "<input type=\"hidden\" name=\"idcoche\" value=\"$idcoche\">";
				echo "<input type=\"hidden\" name=\"idconf\" value=\"$idconf\">";
				
			?>
			</table>
		</form>
		<footer> Creado y diseñado por Daniel Susumu ©2014 </footer>
	</body>
</html>