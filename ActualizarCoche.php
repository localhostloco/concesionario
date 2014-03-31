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
	<meta name="viewport" content="width=device-width">
	<head>
		<title>Concesionario WebAlava</title>
	</head>
	<body>
	<?php
		$query = "UPDATE coches SET precio = ".$_POST['precio'].", color = '".$_POST['color']."', cantidad = ".$_POST['cantidad']." WHERE marca = '".$_POST['marca']."' AND modelo = '".$_POST['modelo']."'";
		if (mysql_query($query)) {
			echo "<h2> Coche actualizado con éxito </h2>";
			header("refresh:1; url=Inicio.php");
		}
		else {
			echo "<h2> Ha habido un error </h2>".mysql_error();
			header("refresh:1; url=AdmCoches.php");
		}
	?>
		<footer> Creado y diseñado por Daniel Susumu ©2014 </footer>
	</body>
</html>