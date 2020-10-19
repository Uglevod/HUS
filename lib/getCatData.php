<?php

function getCatData($pdo,$ctok) {

  $query = "SELECT * FROM `cat_tok` WHERE ctok = :ctok ";

  $params = [  ':ctok' => $ctok ];

  $stmt = $pdo->prepare($query);
  $stmt->execute($params);
  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

  if (count($data)<1) {$data[0]=0; }

  return $data[0];
}

function getCatDataS($pdo,$stok) {

  $query = "SELECT * FROM `cat_tok` WHERE stok = :stok ";

  $params = [  ':stok' => $stok ];

  $stmt = $pdo->prepare($query);
  $stmt->execute($params);
  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);



  if (count($data)<1) {$data[0]=0; }

  return $data[0];
}


function getCatDataP($pdo,$ptok) {

  $query = "SELECT * FROM `page_tok` WHERE ptok = :ptok ";

  $params = [  ':ptok' => $ptok ];

  $stmt = $pdo->prepare($query);
  $stmt->execute($params);
  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);



  if (count($data)<1) {$data[0]=0; }

  return $data[0];
}
 ?>
