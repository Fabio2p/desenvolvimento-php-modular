<?php 

class Home extends Controller{

	public function index(){

		// URL com quantidade de visualizações que um vídeo possui.

			//$jsonURL = file_get_contents("ttps://www.googleapis.com/youtube/v3/videos?id=9bZkp7q19f0&part=contentDetails&key=AIzaSyDZOuELWa7OQpn0swGQJ6C-A8yi6FImzuQ&part=statistics");

		// ===========================================================================================================
			
			//Título da pagina
			$dados['title'] = 'Videos do youtube';

			// url dos serviços youtube google
			$jsonURL = file_get_contents("https://www.googleapis.com/youtube/v3/videos?key=AIzaSyDZOuELWa7OQpn0swGQJ6C-A8yi6FImzuQ&part=snippet&id=90OwZCO-XBw");

			// decodificação dos dados em json php
			$json = json_decode($jsonURL);

			// extração dos objetos
			$dados['youtube'] = $json;

			// passando os dados para a views; 
			$this->view('/Index','home', $dados);

				//$vcounts = $json->{'items'}[0]->{'statistics'}->{'viewCount'};

				//echo $vcounts .' Visualizações';

			 // echo "<pre>";

				// var_dump($json);

			 // echo "</pre>";	

		// =================================================================================================

		// Lista vídeos de uma galeria	
			//End Point do web service Google youtube
			$url = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=25&playlistId=PLDFD28C3776C6D8E8&key=AIzaSyDZOuELWa7OQpn0swGQJ6C-A8yi6FImzuQ";

			// decodifica e captura os objetos
			$obj = json_decode(file_get_contents($url));


			// foreach($obj->items as $item):

			// 	echo $item->snippet->title .'<br />';

			// endforeach;	

			// echo "<pre>";
			// 	var_dump($obj);
			// echo "</pre>";

		// ===========================================================================================================


		echo "<br />";

	}

	public function build_query(array $params){

		$query = http_build_query($params);

		return $query;
	}

	public function get_curl($url){

		$client = curl_init();

		curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($client);

		curl_close($client);

		return $response;
	}

	public function consumir(){

		$url = "http://localhost/framework-mvc-modular/api/put.xml";

		$client = curl_init($url);

		curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);

		$response = curl_exec($client);

		curl_close($client);

		$xml = simplexml_load_string($response);

		foreach($xml->pessoa as $item):
			 echo $item->name;
		endforeach;


	}
	
}
?>