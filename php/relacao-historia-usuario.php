<?php 

  // ADICIONA RELAÇÃO DE USUÁRIO COM A NARRATIVA NA TABELA "tblHistoriaPessoa"
  // OBS: APENAS PARA QUANDO SE ACABA DE CRIAR HISTÓRIA - EMAIL = EMAIL GUARDADO NO COOKIE
  $sql = "INSERT INTO tblHistoriaPessoa(
                                  relNarrativa,
                                  relUser
                                  ) VALUES (
                                  :relNarrativa, 
                                  :relUser)";
                                          
  $stmt = $connection->prepare($sql);
                                                
  $stmt->bindParam(':relNarrativa', $idhistoria, PDO::PARAM_STR);       
  $stmt->bindParam(':relUser', $cookieemail, PDO::PARAM_STR); 
                                    
  $stmt->execute();

?>