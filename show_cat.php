<?php
  require 'lib/show_err.php';

 require 'lib/db_ini.php';
 require 'lib/list_of_pages.php';
 require 'lib/getQueryParams.php';
 require 'lib/getCatData.php';
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

$cat_data=getCatDataS($pdo,$stoken);
if ($cat_data===0) {echo "Wrong way"; goto a;}

# var_dump($cat_data);


$blade = new Blade('views', 'cache');


// $title
$data["title"]=$cat_data["name"];

// nav bar
$data["nav_bt"]=$blade->make('cat/nav_bt_show_cat',[ 'data' => $cat_data , 'host' => $phost , 'sw' => $sta["sw"] ]  )->render();

// nav bread
$data_nav_brcr["base"]=$cat_data["name"];
$data_nav_brcr["do"]="Список страниц";
$data["nav_brcr"]=$blade->make('common/nav_brcr',[ 'data' => $data_nav_brcr] )->render();

// list of pages
$list=getListOfPages($pdo,$cat_data["ctok"],$sta["sw"]);
// $list[0];


$data["main"]=$blade->make('cat/list_of_pages_show',[ 'data' => $list,'host' => $phost] )->render();
// $data["list_of_pages"]=$blade->make('cat/elem',[ 'data' => $data_nav_brcr] )->render();


//echo $navbar;
//$data["nav_bt_edit_cat"]="zzzzzzz";
// echo $blade->make('layouts/base', [ 'data' => $data ] )->render();
echo $blade->make('layouts/base' , [ 'data' => $data,'host'=>$phost ])->render();



//$card = renderTemplate('/cat/card_edit.php');

//$main_nav_edit = renderTemplate('/cat/main_nav_edit.php');

//$nav_bread = renderTemplate('/common/nav_br.php');

//$layout_content = renderTemplate('layout.php',
//['cards'=>$card, 'navbar'=>$main_nav_edit,'navbar_br' => $nav_bread, 'title' => 'Список страниц ссылок']);

//print($layout_content);
a:
?>
