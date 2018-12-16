<?php 
require $_SERVER['DOCUMENT_ROOT'].'/application/config/config.db.php';

class Base{

  private static $conn = null;
  
  // configurações para a conexão com a base de dados
  private static function setConn(){

  	try{

  		if(self::$conn == null):

  			$db = new Config();

  			$charset = [PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES UTF8',PDO::ATTR_PERSISTENT => TRUE];

  			$dsn = "mysql:host=".$db->host.";dbname=".$db->base;

  			self::$conn = new PDO($dsn, $db->user,$db->pass,$charset);

  			self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  		
  		endif;

  		return self::$conn;

  	}catch(PDOException $e){

  		if($e->getCode() == '2002'):

  			echo "Servidor não encontrado!";

        exit();
  		endif;

  		if($e->getCode() == '1049'):

  			echo "base de dados não encontrado!";

        exit();
  		endif;
  	}

  } // finalização com a conexão

  
  protected function getConn(){

  	return self::setConn();
  }

}
?>