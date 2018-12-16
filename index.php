<?php 
define('BASEPATH', __FILE__);

require_once('system/core/inicialize.class.php');

require_once('application/config/loader.config.php');

$obj = new Inicialize();

$obj->run();

?>