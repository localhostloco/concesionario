<?php
		include 'Cabecera.php';
		include 'bd.php';
		
		if ($_SESSION['tipo'] != 'Fabricante') {
			header("Location: Inicio.php");
		}
		
		
		$query2 = "SELECT * FROM configuraciones WHERE idConfiguracion = ".$_POST['idConf'];
		$aux2 = mysql_query($query2);
		$configs = mysql_fetch_assoc($aux2);
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
				<li> Seleccionar configuraci�n </li>
				<strong><u><li> Editar par�metros </li></u></strong>
			</ol>
		</div>
		<h2> <?php echo "<h2> Cambios en ".$configs['nombre']; ?> </h2>
		<form id="formulario" method="post" action="ActualizarConfiguracion.php">
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
						echo "<tr>";
						$id = $configs['idConfiguracion'];
						echo "<td>".$configs['nombre']."</td>";
						if ($configs['navegador'] == "No"){
							echo "<td><input type=\"radio\" name=\"navegador\" value=\"S�\">S�</input><br><input type=\"radio\" name=\"navegador\" value=\"No\" checked>No</input></td>";
						}
						else {
							echo "<td><input type=\"radio\" name=\"navegador\" value=\"S�\" checked>S�</input><br><input type=\"radio\" name=\"navegador\" value=\"No\">No</input></td>";
						}
						if ($configs['AC'] == "No"){
							echo "<td><input type=\"radio\" name=\"ac\" value=\"S�\">S�</input><br><input type=\"radio\" name=\"ac\" value=\"No\" checked>No</input></td>";
						}
						else {
							echo "<td><input type=\"radio\" name=\"ac\" value=\"S�\" checked>S�</input><br><input type=\"radio\" name=\"ac\" value=\"No\">No</input></td>";
						}
						if ($configs['techoSolar'] == "No"){
							echo "<td><input type=\"radio\" name=\"techo\" value=\"S�\">S�</input><br><input type=\"radio\" name=\"techo\" value=\"No\" checked>No</input></td>";
						}
						else {
							echo "<td><input type=\"radio\" name=\"techo\" value=\"S�\" checked>S�</input><br><input type=\"radio\" name=\"techo\" value=\"No\">No</input></td>";
						}
						if ($configs['transmision'] == "Manual"){
							echo "<td><input type=\"radio\" name=\"transmision\" value=\"Autom�tica\">Autom�tica</input><br>
							<input type=\"radio\" name=\"transmision\" value=\"Manual\" checked>Manual</input><br>
							<input type=\"radio\" name=\"transmision\" value=\"Autom�tica/Manual\">Autom�tica/Manual</input></td>";
						}
						else if ($configs['transmision'] == "Autom�tica"){
							echo "<td><input type=\"radio\" name=\"transmision\" value=\"Autom�tica\"checked>Autom�tica</input><br>
							<input type=\"radio\" name=\"transmision\" value=\"Manual\" >Manual</input><br>
							<input type=\"radio\" name=\"transmision\" value=\"Autom�tica/Manual\">Autom�tica/Manual</input></td>";
						}
						else {
							echo "<td><input type=\"radio\" name=\"transmision\" value=\"Autom�tica\">Autom�tica</input><br>
							<input type=\"radio\" name=\"transmision\" value=\"Manual\" >Manual</input><br>
							<input type=\"radio\" name=\"transmision\" value=\"Autom�tica/Manual\"checked>Autom�tica/Manual</input></td>";
						}
						echo "<td><input type=\"number\" name=\"precio\" value=\"".$configs['precio']."\"></td>";
						echo "<input type=\"hidden\" name=\"idConf\" value=\"$id\">";
						echo "</tr>";
					?>
			</table>
			<input type="submit"> Enviar </input>
		</form>
		<footer> Creado y dise�ado por Daniel Susumu �2014 </footer>
	</body>
</html>