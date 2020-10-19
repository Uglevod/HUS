<?php


 function getListOfLinks($pdo,$ptok,$sw) {

   $query = "SELECT * FROM `surl` WHERE ptok = :ptok AND work = :work ORDER BY id ";

   $params = [  ':ptok' => $ptok , ':work' => $sw ];

   $stmt = $pdo->prepare($query);
   $stmt->execute($params);
   $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

   foreach ($data as $line ) {
      //var_dump($line);
    //  echo "<br>"."-------"."<br>";

    }


    return $data;
  }

  function getListOfLinksS($pdo,$stok,$sw) {

    $query = "SELECT * FROM `surl` WHERE stok = :stok AND work = :work ";

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
