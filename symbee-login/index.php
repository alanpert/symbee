<?php
	if ($_COOKIE['user'] != "") {
		include("home.php");
	} else {
		include("login.php");
	}
?>