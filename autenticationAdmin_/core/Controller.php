<?php 
class Controller{

	protected function view($path, $view, $dados = null){

		$path = $_SERVER['DOCUMENT_ROOT'] ."/autenticationAdmin_/webApp/Modules{$path}/views/".$view.'.view.php';

		if(is_array($dados) && count($dados) > 0):

			extract($dados, EXTR_PREFIX_ALL, 'view');

		endif;

		if(file_exists($path)):

			require_once($path);

			return $view;

		else:
			echo 'View não encontrada!';
		endif;

	}

	protected function model($path, $model){

		$dir_model = $_SERVER['DOCUMENT_ROOT']."/autenticationAdmin_/webApp/Modules{$path}/models/".$model.'.class.php';

		if(file_exists($dir_model)):

			require_once($dir_model);

			if(class_exists($model)):

				return new $model();

			else:	
				echo "Model não encontrada!";

				exit;
			endif;

		endif;
	}

	//metodo para carregamento automatico de bibliotecas.

	protected function library($lib){

		$biblioteca = $_SERVER['DOCUMENT_ROOT']."/system/libraries/".$lib.'.class.php';

		if(file_exists($biblioteca)):

			require_once($biblioteca);

			if(class_exists($lib)):

				return new $lib();

			else:	
				echo "biblioteca não encontrada!";

				exit;
			endif;

		endif;
	}
}
?>