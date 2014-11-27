<?php

	include('php/conect.php');  
	include('php/teste-login.php');

	// try {
 //      $stmt = $connection->prepare('SELECT * FROM tblNarrativas');
 //      // $stmt->execute(array('email' => $cookieemail));
 //      $stmt->execute();
     
 //      $result = $stmt->fetchAll();
     
 //      if ( count($result) ) { 
 //        foreach($result as $row) {
 //        	print_r($row);
 //        }   
 //      } else {
 //        echo "No rows returned.";
 //      }


 //    } catch(PDOException $e) {
 //        echo 'ERROR: ' . $e->getMessage();
 //    }


   try {
    $stmt = $connection->prepare('SELECT * FROM tblNarrativas');
    $stmt->execute();

    $result = $stmt->fetchAll();
    $totalnarrativas = count($result);
    $narrativarandom = rand(1,$totalnarrativas);
    $contador = 1;

    if ( count($result) ) { 
        foreach($result as $row) {
        	if ($contador == $narrativarandom) {
        		//print_r($row);
        		$nomeler = $row[nome];
        		$generoler = $row[tema];
        		$criadorler = $row[criador];
        		$idler = $row[id];
        	}
          $contador = $contador +1;
        }   
      } else {
        //echo "No rows returned.";
      }

  } catch(PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
  }

 	$urller = "single-historia.php?nome=" . $nomeler . "&genero=" . $generoler . "&criador=" . $criadorler . "&narrativa=" . $idler;
 	//echo ($urller);

 echo("<script>window.location = '".$urller."';</script>");


?>