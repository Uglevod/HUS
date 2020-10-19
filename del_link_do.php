<?php
 require 'lib/show_err.php';

require 'lib/db_ini.php';
require 'lib/list_of_pages.php';
require 'lib/getQueryParams.php';
require 'lib/getCatData.php';
require 'lib/getPageData.php';

$host=$_SERVER['HTTP_HOST'];
 //if ($_SERVER['SERVER_PROTOCOL']=="HTTP/1.1") {$prot="http://";}
if   ((strripos ($_SERVER['SERVER_PROTOCOL'] , "HTTP"  ))===0) {$prot="http://";}
if   ((strripos ($_SERVER['SERVER_PROTOCOL'] , "HTTPS" ))===0) {$prot="https://";}
$phost=$prot.$host;


$sta=getParamsArr($_SERVER['QUERY_STRING']);
# var_dump($sta);
$ptoken=$sta["ptoken"];
$cat_data=getCatDataP($pdo,$ptoken);
if ($cat_data===0) {echo "Wrong way"; goto a;}

$ctoken=$cat_data["ctok"];

# elfkztv удаляем линки
# удаляем страницу
# редирект на стокен

$query = "DELETE FROM `surl` WHERE ptok = :ptok AND id = :id  ";
$params = [
    ':ptok' => $ptoken ,':id' => $sta["id"]
  ];
$stmt = $pdo->prepare($query);
$stmt->execute($params);




header('HTTP/1.1 200 OK');
header('Location: '.$phost."/edit/page/".$ptoken);




a:
?>
