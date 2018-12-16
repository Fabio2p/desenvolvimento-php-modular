<?php
defined("_EXEC") or die("Restricted Access!");

/*Classe Session: responsavel por inserir registro na tabela sessao e recuperacao 
*  dos mesmo
*/
class Session extends Dbo{

    // ---------------------------------------------------------------------

    // Metodo para insercao de informacao, caso o ip da maquina eh diferente do cadastrado na tabela sessao
	public function insertToken($id_user,$ip_address,$token,$user_agent,$access_date){

		$sessao = ['id_user'=>$id_user,'ip_address'=>$ip_address,'token'=>$token,'user_agent'=>$user_agent,'access_date'=>$access_date];

		return $this->insert('my_system_sessions',$sessao);

	}  // fim do metodo insertToken


	// Metodo para recuperar um token da tabela sessao
	public function getToken($token){

		$dados = ['token'=>$token];

		return $this->select('token', 'my_system_sessions',$dados);

	} // fim do metodo getToken


	public function session_getIp($id){

		$dados = ['id_user'=>$id];

		return $this->select('ip_address','my_system_sessions', $dados);
	}

	public function updateIp($id){

		$dados = ['id_user'=>$id];

		$this->update('my_system_sessions','user_agent,access_date',$dados);
	}

}
?>