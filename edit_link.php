<?php
  require 'lib/show_err.php';

 require 'lib/db_ini.php';
 require 'lib/list_of_pages.php'; 
 require 'lib/getQueryParams.php';
 require 'lib/getCatData.php';

 require 'lib/getPageData.php';
 require 'lib/list_of_links.php';
 require 'vendor/autoload.php';


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
 $ptoken=$sta["ptoken"];
 $page_data=getPageData($pdo,$ptoken);
 if ($page_data===0) {echo "Wrong way "; goto a;}

 $link_data=getLinkData($pdo,$ptoken,$sta["id"]);
 if ($link_data===0) {echo "Wrong way "; goto a;}

 $blade = new Blade('views', 'cache');

 // $title
 $data["title"]=$page_data["name"];

 // nav bar
 $data["nav_bt"]="";

 // nav bread
 $data_nav_brcr["base"]=$page_data["name"];
 $data_nav_brcr["do"]="Редактирование ссылки";
 $data["nav_brcr"]=$blade->make('common/nav_brcr',[ 'data' => $data_nav_brcr] )->render();


  $data["main"]=$blade->make('page/edit_link',[ 'data' => $link_data,'host' => $phost] )->render();

  echo $blade->make('layouts/base' , [ 'data' => $data,'host'=>$phost ])->render();

  a:
  ?>
