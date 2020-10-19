<?php
 require 'lib/show_err.php';

require 'lib/db_ini.php';
require 'lib/list_of_pages.php';
require 'lib/getQueryParams.php';
require 'lib/getCatData.php';

$host=$_SERVER['HTTP_HOST'];
 //if ($_SERVER['SERVER_PROTOCOL']=="HTTP/1.1") {$prot="http://";}
if   ((strripos ($_SERVER['SERVER_PROTOCOL'] , "HTTP"  ))===0) {$prot="http://";}
if   ((strripos ($_SERVER['SERVER_PROTOCOL'] , "HTTPS" ))===0) {$prot="https://";}
$phost=$prot.$host;


$sta=getParamsArr($_SERVER['QUERY_STRING']);
 var_dump($_POST);
# $ctoken=$sta["ctoken"];
$ctoken = htmlspecialchars($_POST["ctoken"]);
$name = htmlspecialchars($_POST["name"]);

echo $ctoken;
echo $name;


$cat_data=getCatData($pdo,$ctoken);
if ($cat_data===0) {echo "Wrong way"; goto a;}


$ptok=md5($name." zorro ".rand(1000, 2000));
$stok=md5($name." white ".rand(1000, 2000));

# $name=  str_replace("+", " ", $sta["name"]  );
$name = htmlspecialchars($_POST["name"]);

      $query = "INSERT INTO `page_tok` (`name`,`ptok`,`ctok`,`stok`) VALUES ( :name , :ptok, :ctok , :stok )";
      $params = [
          ':name' => $name,
          ':ctok' => $ctoken,
          ':ptok' => $ptok,
          ':stok' => $stok ];

$stmt = $pdo->prepare($query);
$stmt->execute($params);

       header('HTTP/1.1 200 OK');
       header('Location: '.$phost."/edit/cat/".$ctoken);




a:
?>
