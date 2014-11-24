<?php

	$emailconvidado = $_POST["email-convidado"];
	$idhistoriaconvidar = $_POST["idhistoriaconvidar"];

	$sql = "INSERT INTO tblHistoriaPessoa(
                                  relNarrativa,
                                  relUser
                                  ) VALUES (
                                  :relNarrativa, 
                                  :relUser)";
                                          
  $stmt = $connection->prepare($sql);
                                                
  $stmt->bindParam(':relNarrativa', $idhistoriaconvidar, PDO::PARAM_STR);       
  $stmt->bindParam(':relUser', $emailconvidado, PDO::PARAM_STR); 
                                    
  $stmt->execute();

?>