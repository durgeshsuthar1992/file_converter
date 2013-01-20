<?php
ini_set('display_errors',1); 
error_reporting(E_ALL);
$path=$_POST['url'];

function cut_str($str, $left, $right) 
{
	$str = substr ( stristr ( $str, $left ), strlen ( $left ) );
	$leftLen = strlen ( stristr ( $str, $right ) );
	$leftLen = $leftLen ? - ($leftLen) : strlen ( $str );
	$str = substr ( $str, 0, $leftLen );
	return $str;
}
$str=file_get_contents($path);
$left="<li>Click here to <a href=";
$right=">download the converted image file again</a> or in case the download did not start automatically.</li>";
$link=cut_str($str,$left,$right);
echo $link;



?>
