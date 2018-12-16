<?php 

define('PATH_ROOT', $_SERVER['DOCUMENT_ROOT']);


define('PATH_SITE','http://'.$_SERVER['HTTP_HOST']);

function __autoload($class){

	$path = ["/../../system/core/",'/../../system/database/','/../../system/helpers/'];

	 
	foreach($path as $view):

		if(file_exists(__DIR__ ."{$view}/{$class}.php") && !is_dir(__DIR__ ."{$view}/{$class}.php")):

			include_once(__DIR__ ."{$view}/{$class}.php");

		endif;

	endforeach;

}
?>