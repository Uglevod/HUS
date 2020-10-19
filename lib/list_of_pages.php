<?php


 function getListOfPages($pdo,$ctok,$sw) {

   $query = "SELECT * FROM `page_tok` WHERE ctok = :ctok AND work = :work ORDER BY id ";

   $params = [  ':ctok' => $ctok , ':work' => $sw ];

   $stmt = $pdo->prepare($query);
   $stmt->execute($params);
   $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

   foreach ($data as $line ) {
      //var_dump($line);
    //  echo "<br>"."-------"."<br>";

    }


    return $data;
  }

  function getListOfPagesS($pdo,$stok,$sw) {

    $query = "SELECT * FROM `page_tok` WHERE stok = :stok AND work = :work ";

    $params = [  ':stok' => $stok , ':work' => $sw ];

    $stmt = $pdo->prepare($query);
    $stmt->execute($params);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($data as $line ) {
       //var_dump($line);
     //  echo "<br>"."-------"."<br>";

     }


     return $data;
   }
?>
