<?php
		include 'Cabecera.php';
		include 'bd.php';
		
		if ($_SESSION['tipo'] != 'Fabricante') {
			header("Location: Inicio.php");
		}
		
		$query1 = "SELECT idCoche FROM coches WHERE marca = '".$_POST['marca']."' AND modelo = '".$_POST['modelo']."'";
		$aux = mysql_query($query1);
		$idcoche = mysql_fetch_assoc($aux)['idCoche'];
		$query2 = "SELECT * FROM (coches NATURAL JOIN confcoche INNER JOIN configuraciones ON idConf = idConfiguracion) WHERE idCoche = ".$idcoche;
		$aux2 = mysql_query($query2);
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
			<h3 align="center"> Modificar configuraci�n</h3>
			<ol>
				<li> Seleccionar coche </li>
				<strong><u><li> Seleccionar configuraci�n </li></u></strong>
				<li> Editar par�metros </li>
			</ol>
		</div>
		<h2> <?php echo "<h2> Configuraciones para el ".$_POST['marca']." ".$_POST['modelo']; ?> </h2>
		<form id="formulario" method="post" action="ModConfiguracion.php">
			<table id="tabla">
				<tr>
					<th> Nombre </th>
					<th> Navegador </th>
					<th> AC </th>
					<th> Techo solar </th>
					<th> Transmisi�n </th>
					<th> Precio </th>
					<th> </th>
				</tr>
					<?php
						while ($configs = mysql_fetch_assoc($aux2)) {
							echo "<tr>";
							$id = $configs['idConfiguracion'];
							echo "<td>".$configs['nombre']."</td>";
							if ($configs['navegador'] == "No"){
								echo "<td><input type=\"radio\" disabled value=\"S�\">S�</input><br><input type=\"radio\"  value=\"No\" checked>No</input></td>";
							}
							else {
								echo "<td><input type=\"radio\"  value=\"S�\" checked>S�</input><br><input type=\"radio\" disabled value=\"No\">No</input></td>";
							}
							if ($configs['AC'] == "No"){
								echo "<td><input type=\"radio\" disabled value=\"S�\">S�</input><br><input type=\"radio\"  value=\"No\" checked>No</input></td>";
							}
							else {
								echo "<td><input type=\"radio\"  value=\"S�\" checked>S�</input><br><input type=\"radio\" disabled value=\"No\">No</input></td>";
							}
							if ($configs['techoSolar'] == "No"){
								echo "<td><input type=\"radio\" disabled value=\"S�\">S�</input><br><input type=\"radio\"  value=\"No\" checked>No</input></td>";
							}
							else {
								echo "<td><input type=\"radio\"  value=\"S�\" checked>S�</input><br><input type=\"radio\" disabled value=\"No\">No</input></td>";
							}
							if ($configs['transmision'] == "Manual"){
								echo "<td><input type=\"radio\" disabled value=\"Autom�tica\">Autom�tica</input><br>
								<input type=\"radio\"  value=\"Manual\" checked>Manual</input><br>
								<input type=\"radio\" disabled value=\"Autom�tica/Manual\">Autom�tica/Manual</input></td>";
							}
							else if ($configs['transmision'] == "Autom�tica"){
								echo "<td><input type=\"radio\"  value=\"Autom�tica\"checked>Autom�tica</input><br>
								<input type=\"radio\" disabled value=\"Manual\" >Manual</input><br>
								<input type=\"radio\" disabled value=\"Autom�tica/Manual\">Autom�tica/Manual</input></td>";
							}
							else {
								echo "<td><input type=\"radio\" disabled value=\"Autom�tica\">Autom�tica</input><br>
								<input type=\"radio\" disabled value=\"Manual\" >Manual</input><br>
								<input type=\"radio\"  value=\"Autom�tica/Manual\"checked>Autom�tica/Manual</input></td>";
							}
							echo "<td>".$configs['precio']."�</td>";
							echo "<td> <button name=\"idConf\" value=\"$id\"> Seleccionar </button> </td>";
							echo "</tr>";
						}
					?>
			</table>
		</form>
		<footer> Creado y dise�ado por Daniel Susumu �2014 </footer>
	</body>
</html>