<?php 
defined("_EXEC") or die("Restricted Access!");

class Usergroups extends Dbo{

    public function levelUser($id_user){

        $dados = ['id_user'=>$id_user];

        return $this->select('level','my_system_usergroups', $dados);


    }

}
?>