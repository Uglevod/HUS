<?php

function getParamsArr($ServerString){

  $query  = explode('&', $ServerString);

    
  if (strlen($ServerString)>0)
{
  foreach($query as $param)
  {
      list($name, $value) = explode('=', $param, 20);
      #  echo "name ".$name."<br>";
      #  echo "val ".$value."<br>";

       $sta[$name]=$value ;
      //if ($name=="token")
  }
} else { $sta["key"]="val"; }

 return $sta;
}


 ?>
