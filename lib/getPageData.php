<?php

function getPageData($pdo,$ptok) {

  $query = "SELECT * FROM `page_tok` WHERE ptok = :ptok ";

  $params = [  ':ptok' => $ptok ];

  $stmt = $pdo->prepare($query);
  $stmt->execute($params);
  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

  if (count($data)<1) {$data[0]=0; }

  return $data[0];
}

function getPageDataS($pdo,$stok) {

  $query = "SELECT * FROM `page_tok` WHERE stok = :stok ";

  $params = [  ':stok' => $stok ];

  $stmt = $pdo->prepare($query);
  $stmt->execute($params);
  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

  if (count($data)<1) {$data[0]=0; }

  return $data[0];
}

function getLinkData($pdo,$ptok,$id) {

  $query = "SELECT * FROM `surl` WHERE ptok = :ptok AND id = :id";

  $params = [  ':ptok' => $ptok , ':id' => $id ];

  $stmt = $pdo->prepare($query);
  $stmt->execute($params);
  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

  if (count($data)<1) {$data[0]=0; }

  return $data[0];




}
