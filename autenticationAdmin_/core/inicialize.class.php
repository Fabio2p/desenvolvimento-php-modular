<?php 
/*Class: Inicialize
* responsibility: Inicalize the Application
* date: 26-11-2018
*Author: Fabio Silveira
*AuthorEmail: fabio.s.a.proweb@gmail.com
*/
class Inicialize{

	private $services = null;
	private $option   = null;
	private $view     = null;  
	private $host     = null;

	private function setServices(){

		$this->services = filter_input(INPUT_GET, 'module');

	}

	private function setOption(){

		$this->option = filter_input(INPUT_GET, 'option');

	}

	private function setView(){

		$this->view = filter_input(INPUT_GET, 'view');

	}

	public function run(){

		$this-> setServices();
		$this->setOption();
		$this->setView();

		if(!empty($this->services) && !empty($this->option)):
			
			$path = $_SERVER['DOCUMENT_ROOT']."/autenticationAdmin_/webApp/Modules/{$this->services}";

				if(is_dir($path)):

					$controller = $path."/controllers/{$this->option}.php";

					if(file_exists($controller)):

						require $controller;

						if(class_exists($this->option)):

					
							$obj = new $this->option();

							$metodo = (empty($this->view) || $this->view == null ? 'index' : $this->view);

								if(method_exists($obj, $metodo)):

									$obj->$metodo();

								else:
									echo "Metodo não existe!";	
								endif;

						else:
							echo "Classe não existe!";

						endif;	

					else:
						
						echo 'O arquivo não existe!';

					endif;	
					

					else:

					echo "Módulo não existe";

				endif;		

			elseif(!empty($this->services)):


			$index = $_SERVER['DOCUMENT_ROOT']."/autenticationAdmin_/webApp/Modules/{$this->services}";

			if(is_dir($index)):

				$path = $index ."/controllers/Home.php";

				if(file_exists($path)):

					require $path;

						if(class_exists('Home')):

							$obj = new Home();

							if(method_exists($obj, 'Index')):

								$obj->Index();

							else:

								echo "Metodo Index não existe!";

							endif;	

						else:
							echo "Classe Home não existe!";
						endif;	
				else:

					echo "Arquivo Home não existe!";

				endif;	
			
			else:
				echo "Módulo não encontrado!";
			endif;
		else:
			$index = $_SERVER['DOCUMENT_ROOT']."/autenticationAdmin_/webApp/Modules/Users";

				if(is_dir($index)):

					$path = $index ."/controllers/Home.php";

					if(file_exists($path)):

					 require $path;

					 	if(class_exists('Home')):

							$obj = new Home();

							if(method_exists($obj, 'Index')):
								
								$obj->Index();

							else:
								echo "Metodo Index não existe";
							endif;
						
						else:
							echo "Classe não existe";
					 	endif;

					else:
						echo "Arquivo não existe";
					endif;

				else:
					echo "Módulo não encontrado";
			endif;

		endif;	

	}
}
?>