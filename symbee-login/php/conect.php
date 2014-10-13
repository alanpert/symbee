<?php
$username = "symbe951_symdb";
$password = "designdigital";
$hostname = "localhost"; 
$dbname   = "symbe951_symbee-app";

//connection to the database
// $connection = mysql_connect($hostname, $username, $password) 
// $connection = mysqli_connect($hostname, $username, $password, $dbname)
//   or die("Unable to connect to MySQL");
// echo "Connected to MySQL<br>";


try {
    $connection = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo("<script>console.log('PHP: Conectado ao BD');</script>");
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

?>
