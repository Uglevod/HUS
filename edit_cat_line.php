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

# получение параметров а имеено ptokena
$sta=getParamsArr($_SERVER['QUERY_STRING']);

 // var_dump($sta);
#   проверка на нахождение ptokena в базе
 $ptoken=$sta["ptoken"];
 $cat_data=getCatDataP($pdo,$ptoken);
 if ($cat_data===0) {echo "Wrong way"; goto a;}
# если он в базе тогда в кат_дата у на и стокен и название и сшоу токен


 $blade = new Blade('views', 'cache');

 // $title
 $data["title"]=$cat_data["name"];

 // nav bar
 $data["nav_bt"]="";

 // nav bread

 $data_nav_brcr["base"]=$cat_data["name"];
 $data_nav_brcr["do"]="Редактирование";
 $data["nav_brcr"]=$blade->make('common/nav_brcr',[ 'data' => $data_nav_brcr] )->render();

 // нам нужно передать в шаблон путь на файил оторый будет удалять страницу
 // по пути del/page/([0-9a-zA-Z]*)$ del_cat_page.php?ptoken=$1
 // + оно будет удалять все ссылки с этой страницы
 //
 $data["main"]=$blade->make('cat/edit',[ 'data' => $cat_data,'host' => $phost] )->render();

 echo $blade->make('layouts/base' , [ 'data' => $data,'host'=>$phost ])->render();

a:
 ?>
