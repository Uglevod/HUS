

<?php
 require 'lib/show_err.php';

$im = imagecreatetruecolor(120, 20);
$text_color = imagecolorallocate($im, 233, 14, 91);
imagestring($im, 1, 5, 5,  "Простая Текстовая Строка", $text_color);

// Вывод изображения
imagegd2($im);

// Освобождение памяти
imagedestroy($im);

  /* Вывод в браузер */
  #header('Content-Type: image/x-svg');
  #imagepng($im);

?>
