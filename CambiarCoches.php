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
	<div id="guia">
		<h3 align="center"> Modificar coche</h3>
		<ol>
			<li> Seleccionar coche </li>
			<strong><u><li> Editar parámetros </li></u></strong>
		</ol>
	</div>
		<h2> <?php echo "<h2>".$_POST['marca']." ".$_POST['modelo']; ?> </h2>
		<form id="formulario" method="post" action="ActualizarCoche.php">
			<table id="tabla">
				<tr>
					<th> </th>
					<th> Precio </th>
					<th> Color </th>
					<th> Cantidad </th>
				</tr>
				<tr>
					<?php
						$query = "SELECT * FROM coches WHERE marca = '".$_POST['marca']."' AND modelo = '".$_POST['modelo']."'";
						$coche = mysql_query($query);
						$resultado = mysql_fetch_assoc($coche);
						echo "<td><img src=\"img/".$resultado['foto']."\"></td>";
						echo "<td><input type=\"number\" name=\"precio\" value=\"".$resultado['precio']."\">";
						echo "<td><input type=\"text\" name=\"color\" value=\"".$resultado['color']."\">";
						echo "<td><input type=\"number\" name=\"cantidad\" value=\"".$resultado['cantidad']."\">";
					?>
				</tr>
			</table>
			<input type="submit"> Enviar </input>
			<input type="hidden" value="<?php echo $_POST['marca'] ?>" name="marca">
			<input type="hidden" value="<?php echo $_POST['modelo'] ?>" name="modelo">
		</form>
		<footer> Creado y diseñado por Daniel Susumu ©2014 </footer>
	</body>
</html>