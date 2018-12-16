<?php 
defined("_EXEC") or die("Restricted Access!");

 class User extends Dbo{

 
 	// Metodo para validacao de usuario
 	public function userValidate($name){

 		$datas = ["name_user"=>$name];
		
		
		return $this->select('name_user,blocked, id_user, pass_user', 'my_system_users', $datas);

 	} // fim do metodo userValidate

 }
?>