<?php
defined("_EXEC") or die("Restricted Access!");

/*Classe Login:
*A classe Login, tem dois metodo.
*
*1 - Index: eh nesse metodo que o controle de acesso esta implementado.
*
* 2 - logout: esse metod permite encerrar a sessao rementendo para a tela de login.
*
 */
class Login extends Controller{

	// metodo Index: esse metodo é obrigatorio, pois é atravez desse metodo que o 
	// Framework inicializa.
	public function Index(){

		if(isset($_POST['token']) && $_POST['token'] == App::token()):

			//echo password_hash($_POST['pass'], PASSWORD_DEFAULT);

			// Chamada e instancia a classe User
			$usuario = $this->model('/Users','user');
			
			/*Recebe dados de formulários*/
			
			/*-----------------------------------------------*/

			$credenciais = $usuario->userValidate($_POST['user']);

			// Valida se o usuario eh igual ao cadastrado
			if($credenciais):

				// cria um array de objetos da variavel $credenciais
				$checar['user'] = $credenciais;

				// extrai a variavel $checar['user'] 
				extract($checar);

					// Captura o dado do campo password do formulario login
					if(password_verify($_POST['pass'], $user[0]->pass_user)):

						// Checa se o usuario nao esta bloqueado
						if($user[0]->blocked == 0):

							// armazena o id do usuario para recuperar em uma sessao
							$session['id'] = $user[0]->id_user;

							// Armazena o nome do usuario para recuperar em uma sessao
							$session['nome'] = $user[0]->name_user;

							// Atribui o vetor session em uma $_SESSION
							$_SESSION['logado'] = $session;

							
							
							// =====================================================

							/*Cria uma instancia da classe session para recuperar 
							* o ip da maquina
							*/
							$session_ip = $this->model('/Users','Session');

							// recupera o id do usuario por sessao
							$id_user_session = $_SESSION['logado']['id'];
		
							// Atribui os dados para a variavel
							$check_ip['ip_session'] = $session_ip->session_getIp($id_user_session);

							// extrai os dados 
							extract($check_ip);

							// condicao ternaria para verificar se um IP existe.
							$ip = (!empty($ip_session[0]->ip_address) ? $ip_session[0]->ip_address : NULL);
								
							// ====================================================

							// Filtra e valida o IP do usuario
							if(App::getIp() == $ip):

						
								// Envia para a administracao do site
								echo "<script>
										window.location.href='?module=Articles';
								  	</script>";
								
									  
							else: // se o IP for diferente gera um token.

								// Habilita o campo token de hidden para texto
								echo "
									<script>
									 	jQuery(function(){

										jQuery('#verify').attr('type','text');

										
										}); 
									</script>
									";
								
								// gera um token para comparar e envia por E-mail									
								$token = base64_encode(session_id());
								
								echo $token;

								/*Nesse bloco ira ter uma rotina que envia o token para o
								* E-mail do administrador do site
								* 
								*/
								
								// =======================================================

								// verifica se nao e vazio o post verify	
								if(!empty(App::getVerify())):
	
									// captura o id do usuario
									$id = $_SESSION['logado']['id'];

									// captura o ip da maquina do usuario
									$ip = App::getIp();
									
									// captura a data da maquina do usuario
									$data = date('Y-m-d H:i:s');

									$user_agent = $_SERVER['HTTP_USER_AGENT'];

									// =====================================================

									/*Cria uma instancia da classe session
									 */
									$session_user = $this->model('/Users','Session');

									// ====================================================

									// Insere os dados na tabela sessao
									$session_user->insertToken($id,$ip,$token,$user_agent, $data);
									
									// armazena os dados no array
									$check['teste'] = $session_user->getToken($token);

									// extrai os dados do array
									extract($check);

									// compara o token do campo formulario com o da tabela
									if(App::getVerify() == $teste[0]->token):

										// Envia para a administracao do site
										echo "<script>
												window.location.href='?module=Articles';
								  			  </script>";
										
									endif;	// fim da verificacao do token

								endif; // verifica se o post verify existe e se existe.
								
							endif; // fim da validacao por ip	
							
						else:
	
							echo "<div class='alert alert-warning'>Usuário Bloqueado!</div>";

						endif; // fim da verificação de usuario bloqueado!
	
					else:

						echo "<div class='alert alert-warning'>Senha invalidas!</div>";

					endif; // verificação de senhas		
				
			else:

				echo "<div class='alert alert-warning'>Usuario invalido!</div>";

			endif; // fim de verificação das credenciais


		else:

			echo "session not compatible with form";

			// classe auxiliadora /core/App.php;
			App::session();

			session_destroy();

			session_unset();

			header("Location: ?module=users");

		endif;	// fim de verificação de sessão

	}

	public function logout(){

		if(App::getId() == base64_encode(session_id())):

			if(isset($_SESSION['logado'])):

				session_destroy();

				session_unset();

				unset($_SESSION['logado']);

				header("Location: ?module=Users");

			endif;

		else:	

			echo 'Session id não iguais <br />';

		endif;			
	}
}
?>