<?php
namespace Drupal\sortd\Form;



use Drupal\Core\Database\Database;
use Drupal\Core\Database\Driver\mysql\Schema;
use Drupal\sortd\Form\SortdHelpers;

class Dashboard  {


	public function get_request(){
		$obj = new SortdHelpers();
		$url = 'https://publishapi.sortd.dev/v1/faq/get-all';
       
		$response = $obj->get_request($url);

		return $response;
		
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
