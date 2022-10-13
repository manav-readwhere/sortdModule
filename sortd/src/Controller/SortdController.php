<?php
namespace Drupal\sortd\Controller;


use Drupal\Core\Controller\ControllerBase;

 
use Drupal\sortd\Form\Dashboard;
 

/**
 * Provides route responses for the Example module.
 */
class SortdController  extends ControllerBase {

  /**
   * Returns a simple page.
   *
   * @return array
   *   A simple renderable array.
   */
  public  function sortdPlans() {

    $obj = new Dashboard();

    $response = $obj->get_request();
    $plan_api_response = json_decode($response);

   // $array = array("abc"=>"test abc","def"=>"I am doing drupal","gh"=>"learning");
    return [
      '#theme' => 'plan_details',
      '#api_response' => $plan_api_response,//$this->t('Test Value'),
    ];

  //   $renderable = [
  //   '#theme' => 'plan_details',
  //   '#test_var' => 'test variable',
  // ];
  //$rendered = \Drupal::service('renderer')->renderPlain($renderable);
   
    //$a = array("#markup" => $file);
    

   //return $rendered;
    
  }
  public function settings() {
    return [
      '#theme' => 'settings',
    ];
   }

  public function get_help() {

    $obj = new Dashboard();

    $response = $obj->get_request();
    $plan_api_response = json_decode($response, true);
    $questions = $plan_api_response['data']['61d2f1fef27db255838d2c59']['questions']['0']['question'];

   // $array = array("abc"=>"test abc","def"=>"I am doing drupal","gh"=>"learning");
    return [
      '#theme' => 'get_help',
      '#api_response' => $questions,//$this->t('Test Value')
    ];
  }

}
