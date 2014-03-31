<?php
		include 'Cabecera.php';
		include 'bd.php';
		
		if ($_SESSION['tipo'] != 'Vendedor') {
			header("Location: Login.php");
		}
		
		$idcoche = $_POST['idcoche'];
		$idconf = $_POST['idconf'];
		$aux1 = "SELECT idConfCoche FROM confcoche WHERE idCoche = '$idcoche' AND idConf = '$idconf'";
		$aux12 = mysql_query($aux1);
		$aux13 = mysql_fetch_assoc($aux12);
		$idconfcoche = $aux13['idConfCoche'];
		
		$user = $_SESSION['user'];
		$aux = "SELECT idUsuario FROM usuarios WHERE nombre = '$user'";
		$aux2 = mysql_query($aux);
		$aux3 = mysql_fetch_assoc($aux2);
		$iduser = $aux3['idUsuario'];
		
		$fecha = date('y-m-d H:i:s');
		$query = "INSERT INTO pedidos(idUsr, idConfCoche, fecha) VALUES ($iduser, $idconfcoche, '$fecha')";
?>
<html>
	<link rel="stylesheet" href="css/layout.css">
	<meta http-equiv="Content-Type" charset="ISO-8859-1">
	<meta name="viewport" content="width=device-width">
	<head>
		<title>Concesionario WebAlava</title>
	</head>
	<body>
		<?php
			if ($configuraciones = mysql_query($query)) {
				echo "<h2> Pedido realizado con fecha: $fecha </h2>";
				$sql = "SELECT cantidad FROM coches WHERE idCoche = $idcoche";
				$resultado = mysql_query($sql);
				$fetch = mysql_fetch_assoc($resultado);
				$cantidad = $fetch['cantidad'] - 1;
				$sql2 = "UPDATE coches SET cantidad = $cantidad WHERE idCoche = $idcoche";
				mysql_query($sql2);
			}	
			else {
				echo "<h2> Ha habido un error </h2>";
				die(mysql_error());
			}
			$aux666 = "SELECT max(idPedido) AS idPedido FROM pedidos";
			$aux667 = mysql_query($aux666);
			$idpedido = mysql_fetch_assoc($aux667)['idPedido'];
			if (isset($_POST['idaccesorio'])) {
				$variable = unserialize($_POST['idaccesorio']);
				if (!empty($variable)) {
					foreach($variable as $idAccesorio) {
						$aux = "INSERT INTO pedidoaccesorio VALUES ($idpedido, $idAccesorio)";
						$vamos = mysql_query($aux);
					}
				}
			}
		?>
		
		<footer> Creado y diseñado por Daniel Susumu ©2014 </footer>
	</body>
</html>