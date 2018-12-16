<?php 
class Usuario extends Dbo{

	public function testes(){

		$dados = ['title'=>'O mundo dos Concurseiros','descricao'=>'Realidade da sociedade brasileira!'];

		$this->update('cds',$dados,'id', 34);
	}

	public function display(){

		//return $this->select('title','cds');

		//$dados = ['title'=>'A Guerra no Quilombo IIII - Nova rotina'];

		//$this->update('cds',$dados,'id', 34);
	}
}
?>