<?php

namespace Drupal\sortd\Form;


use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Database\Database;

class ApiCrud extends FormBase {
    
    public function getFormId() {
        return 'api_form';
    }

    public function buildForm(array $form, FormStateInterface $form_state) {

        $connection = \Drupal::database();
        $query = $connection->select('config', 'n');
        $query->condition('n.collection', 'SORTD');
        $query->condition('n.name', 'sortd_6335764bf3727391d2603d68_license_data');
        $query->fields('n', ['data']);
        $results = $query->execute()->fetchField();  

        $form['apikey'] = array(
            '#type' => 'textarea',
            '#title' => $this->t('API: '),
            '#required' => TRUE,
            '#default_value' => (isset($results)) ? $results:'',
        );
        $form['submit'] = [
            '#type' => 'submit',
            '#value' => 'save',
        ];

        return $form;
    }

    public function submitForm(array &$form, FormStateInterface $form_state) {
        $field =  $form_state -> getValues();
        $api = $field['apikey'];

        $con = Database::getConnection();
        $con -> insert('config') -> fields([
            'collection' => 'SORTD',
            'name' => 'sortd_6335764bf3727391d2603d68_license_data',
            'data' => $api,
        ]) -> execute();

    }
}
