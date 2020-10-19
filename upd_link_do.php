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
$ptoken= htmlspecialchars($_POST["ptoken"]);
$page_data=getPageData($pdo,$ptoken);
if ($page_data===0) {echo "Wrong way"; goto a;}

# var_dump($_POST);
#echo 'Привет ' . htmlspecialchars($_POST["name"]) . '!';
$surl=htmlspecialchars($_POST["surl"]);
$x=0;
do {


  $surlf=md5(htmlspecialchars($_POST["name"])." hus ".rand(1000, 2000));
  $surls=mb_strimwidth($surlf, 0+$x, 5+$x); # j,htp обрез + вставка ... четвертым параметром


  $surlq=$surl.mb_strimwidth($surlf, 0, 0+$x);
  $query = "SELECT * FROM `surl` WHERE surl = :surl ";

 $params = [  ':surl' => $surlq ];

 $stmt = $pdo->prepare($query);
 $stmt->execute($params);
 $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
 $x=$x+1;
} while ( count($data)>0 );





if (htmlspecialchars($_POST["work"])=="on") {$work=1;} else  {$work=0;}

$query = "UPDATE   `surl` SET `name` = :name , `furl` = :furl , `surl` = :surl, `work` = :work  WHERE id = :id ";
$params = [
    ':id' =>   (int)htmlspecialchars($_POST["id"]),
    ':name' => htmlspecialchars($_POST["name"]),
    ':furl' => urldecode($_POST["furl"]),
    ':surl' => $surlq,
    ':work' => $work
  ];

$stmt = $pdo->prepare($query);
$stmt->execute($params);

  header('HTTP/1.1 200 OK');
  header('Location: '.$phost."/edit/page/".$ptoken);



a:
