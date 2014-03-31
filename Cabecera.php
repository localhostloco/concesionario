<?php
	session_start();
	echo "<header>
		<img src=\"img/logo.png\" id=\"logo\"> Concesionario WebAlava
		<div id=\"logos\">
			<a href='http://hyundai.es'><img src=\"img/hyundai.png\"></a>
			<a href='http://fiat.es'><img src=\"img/fiat.png\"></a>
			<a href='http://audi.es'><img src=\"img/audi.png\"></a>
			<a href='http://renault.es'><img src=\"img/renault.png\"></a>
			<a href='http://opel.es'><img src=\"img/opel.png\"></a>
		</div>";
	echo "</header><nav><ul><li><a href=\"Inicio.php\" >Inicio</a></li>";
	if (!isset($_SESSION['logueado'])) {
		echo "<li><a href=\"Catalogo.php\" >Ver catálogo</a></li><li>
			<a href=\"Login.php\" >Login</a></li><li>
			<a href=\"Registro.php\" >Registrarse</a></li>";
	}
	else {
		echo "<li><a href=\"Logout.php\" >Logout</a></li><li>";
		if ($_SESSION['tipo'] == 'Fabricante') include 'CabeceraFabrica.php';
		else include 'CabeceraVendedor.php';
		echo "Hola, ".$_SESSION['user']."</div></li>";
	}
	echo "</ul></nav>";
?>
