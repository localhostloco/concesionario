<?php
		include 'Cabecera.php';
		include 'bd.php';
		
		if ($_SESSION['tipo'] != 'Fabricante') {
			header("Location: Inicio.php");
		}
		
		$query = "UPDATE pedidos SET confirmado = 1 WHERE idPedido = ".$_POST['idPedido'];
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
		if ($configuraciones = mysql_query($query)) {
				echo "<h2> Pedido confirmado </h2>";
		}	
		else {
			echo "<h2> Ha habido un error </h2> ".mysql_error()." ".$query;
		}
		header("refresh:2; url=AdmPedidos.php");
	?>
	<footer> Creado y diseñado por Daniel Susumu ©2014 </footer>
</html>