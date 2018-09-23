<?php
$log = 'logger.html';
$ip = $_SERVER['REMOTE_ADDR'];
$page = $_SERVER['REQUEST_URI'];
$refer = $_SERVER['HTTP_REFERER'];
$date_time = date("l j F Y  g:ia", time() - date("Z")) ;
$agent = $_SERVER['HTTP_USER_AGENT'];
$fp = fopen("logger.html", "a"); // XSS vuln so you can counter-pwn skids who cant modify this code 
fputs($fp, "
<b>$date_time</b> <br> <b>IP: </b>$ip<br><b>Page: </b>$page<br><b>Refer: </b>$refer<br><b>Useragent:

</b>$agent <br><br>
");
flock($fp, 3);
fclose($fp);


$my_img = imagecreate( 200, 80 );
$background = imagecolorallocate( $my_img, 255, 0, 255 );
$text_colour = imagecolorallocate( $my_img, 200, 200, 0 );
$line_colour = imagecolorallocate( $my_img, 128, 255, 0 );
imagestring( $my_img, 4, 30, 25, "MLT was here lol",
  $text_colour );
imagesetthickness ( $my_img, 5 );
imageline( $my_img, 30, 45, 165, 45, $line_colour );

header( "Content-type: image/png" );
imagepng( $my_img );
imagecolordeallocate( $line_color );
imagecolordeallocate( $text_color );
imagecolordeallocate( $background );
imagedestroy( $my_img );

?>
