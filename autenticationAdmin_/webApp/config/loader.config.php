<?php 
define('PATH_APP', $_SERVER['DOCUMENT_ROOT']);

define('BASE_SITE','http://'.$_SERVER['HTTP_HOST'].'/autenticationAdmin_');

function __autoload($class){

	$path = ['/../../core/','/../../core/helpers/','/../../../system/database/','/../../../system/libraries/'];

	foreach($path as $view):

		if(file_exists(__DIR__ ."{$view}/{$class}.php") && !is_dir(__DIR__ ."{$view}/{$class}.php")):

			include_once(__DIR__ ."{$view}/{$class}.php");

		endif;

	endforeach;

}
?>