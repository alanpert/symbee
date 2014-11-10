<?php

  include('conect.php');

	$sql = "INSERT INTO tblIntros(
	                                  tema,
	                                  intro
	                                  ) VALUES (
	                                  'Terror', 
	                                  'Correr. Era a única coisa que João pensava naquele momento, não sabia para onde ir, mas tinha que fugir, aquilo estava lhe perseguindo novamente. Entrou na floresta, sabia que era típico o mocinho sempre acabar indo para o local errado, mas agora descobriu que o corpo e mente quase não lhe obedecem e só pararia quando entrasse naquela escuridão,pensando que poderia escapar, poderia sobreviver, mas de repente…')";
	                                          
	  $stmt = $connection->prepare($sql);
	                                                

	                                    
	  $stmt->execute();

?>