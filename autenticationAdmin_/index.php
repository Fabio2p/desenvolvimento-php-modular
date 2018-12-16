<?php 
define("_EXEC", 1);

require_once('core/inicialize.class.php');

require_once('webApp/config/loader.config.php');

$obj = new Inicialize();

$obj->run();

?>