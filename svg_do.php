<?php
require 'lib/getQueryParams.php';
require 'lib/getPageData.php';
require 'lib/list_of_links.php';

require_once __DIR__ . '/lib/phpqrcode/qrlib.php';

$host=$_SERVER['HTTP_HOST'];
 //if ($_SERVER['SERVER_PROTOCOL']=="HTTP/1.1") {$prot="http://";}
if   ((strripos ($_SERVER['SERVER_PROTOCOL'] , "HTTP"  ))===0) {$prot="http://";}
if   ((strripos ($_SERVER['SERVER_PROTOCOL'] , "HTTPS" ))===0) {$prot="https://";}
$phost=$prot.$host;


$sta=getParamsArr($_SERVER['QUERY_STRING']);
$surl=$sta["surl"];
# var_dump($sta);
$str=$phost."/".$surl;
$file=QRcode::svg($str , false, 'M', 6, 6);


 # header('Content-Description: File Transfer');
 header('Content-type: image/svg+xml');
 header("Content-Disposition: attachment; filename=$file");
 #readfile($file);
?>
