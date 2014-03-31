<?php

if (isset($_SESSION['logueado'])) {
	if ($_SESSION['logueado'] != true) header("Location: Login.php");
}

?>