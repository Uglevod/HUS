<?php
 require 'lib/show_err.php';

require 'lib/db_ini.php';
require 'lib/list_of_pages.php';
require 'lib/getQueryParams.php';
require 'lib/getPageData.php';

$host=$_SERVER['HTTP_HOST'];
 //if ($_SERVER['SERVER_PROTOCOL']=="HTTP/1.1") {$prot="http://";}
if   ((strripos ($_SERVER['SERVER_PROTOCOL'] , "HTTP"  ))===0) {$prot="http://";}
if   ((strripos ($_SERVER['SERVER_PROTOCOL'] , "HTTPS" ))===0) {$prot="https://";}
$phost=$prot.$host;


$sta=getParamsArr($_SERVER['QUERY_STRING']);
# var_dump($sta);
$ptoken=$sta["ptoken"];
$page_data=getPageData($pdo,$ptoken);
if ($page_data===0) {echo "Wrong way"; goto a;}

$x=0;
do {


  $surlf=md5($sta["name"]." hus ".rand(1000, 2000));
  $surl=mb_strimwidth($surlf, 0+$x, 5+$x); # j,htp обрез + вставка ... четвертым параметром


  $query = "SELECT * FROM `surl` WHERE surl = :surl ";

 $params = [  ':surl' => $surl ];

 $stmt = $pdo->prepare($query);
 $stmt->execute($params);
 $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
 $x=$x+1;
} while ( count($data)>0 );

 #$surlf=md5($sta["name"]." hus ".rand(1000, 2000));
 #$surl=mb_strimwidth($surlf, 0, 5); # j,htp обрез + вставка ... четвертым параметром

$name=  str_replace("+", " ", urldecode($sta["name"])  );


      $query = "INSERT INTO `surl` (`name`,`furl`,`surl`,`ptok`,`ctok`,`stok`) VALUES ( :name, :furl, :surl , :ptok, :ctok , :stok )";
      $params = [
          ':name' => $name,
          ':furl' => urldecode($sta["furl"]),
          ':surl' => $surl,
          ':ctok' => $page_data["ctok"],
          ':ptok' => $page_data["ptok"],
          ':stok' => $page_data["stok"]
        ];

$stmt = $pdo->prepare($query);
$stmt->execute($params);

        header('HTTP/1.1 200 OK');
        header('Location: '.$phost."/edit/page/".$sta["ptoken"]);




a:
?>
