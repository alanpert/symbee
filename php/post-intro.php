<?php

	include('conect.php');
	include('teste-login.php');

	$addintro = $_POST["addintro"];
	$idhistoria = $_POST["idhistoria"];
	$histindice = 1;
	$histimage = "";

	$nomehistoria = $_POST["nomehistoria"];
	$generohistoria = $_POST["generohistoria"];

	// echo ("Texto Intro: ");
	// echo ($addintro);
	// echo ("<br/>");

	// echo ("Id Narrativa: ");
	// echo ($idhistoria);
	// echo ("<br/>");

	// echo ("Criador: ");
	// echo ($varemail);
	// echo ("<br/>");

	$redirecturl = "../single-historia.php?nome=" . $nomehistoria . "&genero=" . $generohistoria . "&criador=" . $varemail . "&narrativa=" . $idhistoria;
	//echo ($redirecturl);


	$sql = "INSERT INTO tblTrechos(
	                                  texto,
	                                  idnarrativa,
	                                  indice,
	                                  img,
	                                  idusuario
	                                  ) VALUES (
	                                  :texto, 
	                                  :idnarrativa, 
	                                  :indice,
	                                  :img,
	                                  :idusuario)";
	                                          
	  $stmt = $connection->prepare($sql);
	                                                
	  $stmt->bindParam(':texto', $addintro, PDO::PARAM_STR);       
	  $stmt->bindParam(':idnarrativa', $idhistoria, PDO::PARAM_STR); 
	  $stmt->bindParam(':indice', $histindice, PDO::PARAM_STR);
	  $stmt->bindParam(':img', $histimage, PDO::PARAM_STR);
	  $stmt->bindParam(':idusuario', $varemail, PDO::PARAM_STR);
	                                    
	  $stmt->execute();

	  //header("Location: " . $redirecturl);
	  echo("<script>window.location = '".$redirecturl."';</script>");

?>