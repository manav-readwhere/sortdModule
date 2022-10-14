<?php 

namespace Drupal\sortd\Form;


use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Database\Database;
use Drupal\Core\Database\Driver\mysql\Schema;

class SortdHelpers  {

	public function get_request($url){
		
		
		$client = \Drupal::httpClient();
		$response = $client->request('GET', $url, [
		    'headers' => [
		        'Access-Key'=>'cd2e8ffdba67cf508850c068c77085dd',
			  	'Secret-Key'=> 'ATLZHZCirKm4wQ7COn2WFGnBP!CsF5uBtUAT'
		    ]
		]);

		try {
		
		  // Expected result.
		  $data = $response->getBody();
		}
		catch (RequestException $e) {
		  watchdog_exception('my_module', $e->getMessage());
		}

		return $data;
		

	}

	public function get_credentials(){
		$credentials = '
				{
				    "access_key": "cd2e8ffdba67cf508850c068c77085dd",
				    "secret_key": "ATLZHZCirKm4wQ7COn2WFGnBP!CsF5uBtUAT",
				    "project_name": "testsite3oct",
				    "project_id": "sample3oct-com",
				    "host": "http://sample3oct.com"
				}';



		$result = json_decode($credentials);

		return $result;
	}


	

}
