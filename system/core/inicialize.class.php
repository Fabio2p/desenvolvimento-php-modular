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
	

	// function setServices:
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
			
			$path = $_SERVER['DOCUMENT_ROOT']."/application/Modules/{$this->services}";

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

									echo "Method not found!";	

								endif;

						else:

							echo "Class not found!";


						endif;	

					else:
						
						echo "File not found";

					endif;	
					

					else:

					echo "404 Not Found";

				endif;		

			elseif(!empty($this->services)):


			$index = $_SERVER['DOCUMENT_ROOT']."/application/Modules/{$this->services}";

			if(is_dir($index)):

				$path = $index ."/controllers/home.php";

				if(file_exists($path)):

					require $path;

						if(class_exists('Home')):

							$obj = new Home();

							if(method_exists($obj, 'Index')):

								$obj->Index();

							else:

								echo "Method not found!";

							endif;	

						else:

							echo "Class not found!";

						endif;	
				else:

					echo "File not found";

				endif;	
			
			else:

				echo "404 Not Found";

			endif;
		else:
			$index = $_SERVER['DOCUMENT_ROOT']."/application/Modules/Index";

			//echo $index;

				if(is_dir($index)):

					$path = $index ."/controllers/Home.php";

					if(file_exists($path)):

					 require $path;

					 	if(class_exists('Home')):

							$obj = new Home();

							if(method_exists($obj, 'Index')):
								
								$obj->Index();

							else:

								echo "Method not found!";

							endif;
						
						else:

							echo "Class not found!";

					 	endif;

					else:

						echo "File not found";

					endif;

				else:

					echo "404 Not Found";
			endif;

		endif;	

	}
}
?>