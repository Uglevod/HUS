<?php
 #require 'lib/show_err.php';

 require 'lib/db_ini.php';
 require 'lib/list_of_pages.php';
 require 'lib/getQueryParams.php';
 require 'lib/getCatData.php';

 require 'lib/getPageData.php';
 require 'lib/list_of_links.php';
 require 'vendor/autoload.php';


 use Illuminate\View\Factory; 
 use Illuminate\View\View;
 use Illuminate\View\Compilers\BladeCompiler;
 use Illuminate\View\ViewFinderInterface;
 use Jenssegers\Blade\Blade;

$host=$_SERVER['HTTP_HOST'];
 //if ($_SERVER['SERVER_PROTOCOL']=="HTTP/1.1") {$prot="http://";}
if   ((strripos ($_SERVER['SERVER_PROTOCOL'] , "HTTP"  ))===0) {$prot="http://";}
if   ((strripos ($_SERVER['SERVER_PROTOCOL'] , "HTTPS" ))===0) {$prot="https://";}
$phost=$prot.$host;

$sta=getParamsArr($_SERVER['QUERY_STRING']);
$stoken=$sta["stoken"];
$page_data=getPageDataS($pdo,$stoken);
if ($page_data===0) {echo "Wrong way "; goto a;}


$blade = new Blade('views', 'cache');

// $title
$data["title"]=$page_data["name"];

// nav bar
$data["nav_bt"]=$blade->make('page/nav_bt_show_page',[ 'data' => $page_data , 'host' => $phost , 'sw' => $sta["sw"] ]  )->render();


// nav bread
$data_nav_brcr["base"]=$page_data["name"];
$data_nav_brcr["do"]="Список ссылок";
$data["nav_brcr"]=$blade->make('common/nav_brcr',[ 'data' => $data_nav_brcr] )->render();


// list of links
$list=getListOfLinks($pdo,$page_data["ptok"],$sta["sw"]);
// $list[0];

$data["main"]=$blade->make('page/sh_list_links',[ 'data' => $list,'host' => $phost] )->render();



echo $blade->make('layouts/base' , [ 'data' => $data,'host'=>$phost ])->render();

a:
?>
