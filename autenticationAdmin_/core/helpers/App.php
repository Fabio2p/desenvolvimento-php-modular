<?php 
class App{

	// metodo para validar uma sessao
	public static function session(){

		if(session_status() !== PHP_SESSION_ACTIVE):

			session_start();
			
		endif;	
	} // fim do metodo session


	// metod para destruir uma sessao remetendo para a tela de login
	public static function session_destroy(){

		session_destroy();

		session_unset();

		unset($_SESSION['logado']);

		header("Location: ?module=Users");

	} // fim do metodo session_destroy 

	// metodo para validar um token vindo do formulario
	public static function token(){

		if(session_status() !== PHP_SESSION_ACTIVE):

			session_start();

			 $_SESSION['token'] = 	base64_encode(session_id());

			return $_SESSION['token'];

		endif;

	} // fim do metodo token

	// metodo para recuperar um id de sessao
	public static function getId(){

		if(session_status() !== PHP_SESSION_ACTIVE):

			session_start();

			$id = filter_input(INPUT_GET, 'id_user');

			return $id;
			
		endif;

	} // fim do metodo getId/

	// Metodo para verificar o campo token, caso o ip  da maquina do usuario eh diferente da tabela sessao
	public static function getVerify(){

		if(isset($_POST["verify"])):

			return htmlspecialchars($_POST["verify"]);
			
		endif;	

	} // fim do metodo getVerify


	// Metodo para recupera o IP da maquina do usuario
	public static function getIp(){

		return filter_var($_SERVER["REMOTE_ADDR"]);
	}

}
?>