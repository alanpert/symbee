<?php
	if ($_COOKIE['user'] != "") {
		include("homepage-logado.php");
	} else {
		include("login.php");
	}
?>