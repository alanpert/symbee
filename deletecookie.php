<?php 
	// delete cookie by setting the expiration date to one hour ago
	setcookie("user", "", time()-3600*3	);
	
	//redirect back to index page
	header("Location: index.php");
?>