<?php

 require 'lib/show_err.php';
 require 'lib/getQueryParams.php';
 require 'lib/db_ini.php';

 $host=$_SERVER['HTTP_HOST'];
  //if ($_SERVER['SERVER_PROTOCOL']=="HTTP/1.1") {$prot="http://";}
 if   ((strripos ($_SERVER['SERVER_PROTOCOL'] , "HTTP"  ))===0) {$prot="http://";}
 if   ((strripos ($_SERVER['SERVER_PROTOCOL'] , "HTTPS" ))===0) {$prot="https://";}
 $phost=$prot.$host;

 $sta=getParamsArr($_SERVER['QUERY_STRING']);
 $surl=$sta["q"];

 $query = "SELECT * FROM `surl` WHERE surl = :surl ";

 $params = [  ':surl' => $surl ];

 $stmt = $pdo->prepare($query);
 $stmt->execute($params);
 $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

 if (count($data)<1) {
   header('HTTP/1.1 200 OK');
   header( "Location: http://" . $_SERVER['HTTP_HOST']);
  }
 else if ($data[0]["work"]==1 )
 {
   $cl=$data[0]['count']+1;

   $qv='UPDATE surl SET count = '.$cl.' WHERE id = '.$data[0]['id'];
   $stmt = $pdo->query($qv);

  header('HTTP/1.1 200 OK');
  header('Location: '.$data[0]['furl']);


}
