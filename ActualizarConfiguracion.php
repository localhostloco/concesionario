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
		$query = "UPDATE configuraciones SET navegador = '".$_POST['navegador']."', AC = '".$_POST['ac']."', techoSolar = '".$_POST['techo']."', transmision = '".$_POST['transmision']."', precio = ".$_POST['precio']." WHERE idConfiguracion = ".$_POST['idConf'];
		if (mysql_query($query)) {
			echo "<h2> Actualización actualizada con éxito </h2>";
			header("refresh:1; url=Inicio.php");
		}
		else {
			echo "<h2> Ha habido un error </h2> ".mysql_error()."\n ".$query;
			header("refresh:100; url=AdmConfiguraciones.php");
		}
	?>
		<footer> Creado y diseñado por Daniel Susumu ©2014 </footer>
	</body>
</html>