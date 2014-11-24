<?php

	include('php/conect.php');
	include('php/teste-login.php');

	// Pegar URL e Separar Parâmetros
	$actual_link = basename($_SERVER['REQUEST_URI']);

	$parts = parse_url($actual_link);
	parse_str($parts['query'], $query);

	$titulohistoria = $query['nome'];
	$criador = $query['email'];
	$tema = $query['tema'];
	$indice = $query['indice'];
	$idnarrativa = $query['idnarrativa'];
	$numjogadores = 1;
	$nivelcomeco = 1;

	// echo ($titulohistoria);
	// echo ("<br/>");

	// echo ($criador);
	// echo ("<br/>");

	// echo ($tema);
	// echo ("<br/>");

	// echo ($indice);
	// echo ("<br/>");

	// echo ($idnarrativa);
	// echo ("<br/>");


	//CRIAR NOVA NARRATIVA

	$sql = "INSERT INTO tblNarrativas(
                                  criador,
                                  nome,
                                  tema,
                                  numPart,
                                  nivelcomeco
                                  ) VALUES (
                                  :criador, 
                                  :nome, 
                                  :tema,
                                  :numPart,
                                  :nivelcomeco)";
                                          
  $stmt = $connection->prepare($sql);
                                                
  $stmt->bindParam(':criador', $criador, PDO::PARAM_STR);       
  $stmt->bindParam(':nome', $titulohistoria, PDO::PARAM_STR); 
  $stmt->bindParam(':tema', $tema, PDO::PARAM_STR);
  $stmt->bindParam(':numPart', $numjogadores, PDO::PARAM_STR);
  $stmt->bindParam(':nivelcomeco', $nivelcomeco, PDO::PARAM_STR);
                                    
  $stmt->execute();

  $idhistorianova = $connection->lastInsertId('id');

	// ADICIONAR TRECHOS
	$contador = 1;
	try {
    $stmt = $connection->prepare('SELECT * FROM tblTrechos WHERE idnarrativa = :idnarrativa');
    $stmt->execute(array('idnarrativa' => $idnarrativa));
     
    $result = $stmt->fetchAll();

    if ( count($result) ) { 
        foreach($result as $row) {
          //print_r($row);
	         if ($contador <= $indice) {
	          $texto = $row[texto];
	          $palavrachave = $row[palavrachave];

	          $img = "";


	            $sql = "INSERT INTO tblTrechos(
                                  texto,
                                  idnarrativa,
                                  indice,
                                  img,
                                  idusuario,
                                  palavrachave
                                  ) VALUES (
                                  :texto, 
                                  :idnarrativa, 
                                  :indice,
                                  :img,
                                  :idusuario,
                                  :palavrachave)";
                                          
						  $stmt = $connection->prepare($sql);
						                                                
						  $stmt->bindParam(':texto', $texto, PDO::PARAM_STR);       
						  $stmt->bindParam(':idnarrativa', $idhistorianova, PDO::PARAM_STR); 
						  $stmt->bindParam(':indice', $contador, PDO::PARAM_STR);
						  $stmt->bindParam(':img', $img, PDO::PARAM_STR);
						  $stmt->bindParam(':idusuario', $criador, PDO::PARAM_STR);
						  $stmt->bindParam(':palavrachave', $palavrachave, PDO::PARAM_STR);
						                                    
						  $stmt->execute();



	          // echo ($palavrachave);
	          // echo ("<br/>");
        	}

          $contador = $contador + 1;
        }   
      } else {
        //echo "No rows returned.";
      }

  } catch(PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
  }


  $sql = "INSERT INTO tblHistoriaPessoa(
                                  relNarrativa,
                                  relUser
                                  ) VALUES (
                                  :relNarrativa, 
                                  :relUser)";
                                          
  $stmt = $connection->prepare($sql);
                                                
  $stmt->bindParam(':relNarrativa', $idhistorianova, PDO::PARAM_STR);       
  $stmt->bindParam(':relUser', $criador, PDO::PARAM_STR); 
                                    
  $stmt->execute();

  $urlredirect = "historia-visualizacao.php?nome=" . $titulohistoria . "&genero=" . $tema . "&criador=" . $criador . "&narrativa=" . $idhistorianova;

  echo("<script>window.location = '".$urlredirect."';</script>");


?>