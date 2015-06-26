<?php

/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

    /**
     * This controller does not use a model
     *
     * @var array
     */
    public $uses = array();
    
     public $name = 'Pages';

    /**
     * Function to show search page
     *
     * @return void
     * @access public
     */
    public function search() {
        
    }

    /**
     * Front Incentive search page without login
     *
     * @return void
     * @access public
     */
    public function citybypostal() {

        if (!empty($this->request->query['q'])) {

            $enteredPostal = $this->request->query['q'];
            $cities = array('id' => '', 'postal' => $enteredPostal, 'city' => '', 'state' => '');
            $this->loadModel('City');
            //$this->City->virtualFields = array('name' => 'CONCAT(City.city, ", ", City.state)');

            $response = array('flage' => false);
            $cities = $this->City->find('all', array(
                'order' => 'City.postal ASC',
                'fields' => array('City.id', 'City.city', 'City.state', 'City.state_id', 'City.postal'),
                "conditions" => array("City.postal like" => substr($enteredPostal, 0, 5) . "%")));

            if ($cities) {
                $citiesList = Set::classicExtract($cities, '{n}.City');
            }
            if ($this->request->query['callback'] == 'RaiseForMe_CallBackSearch') {
                $citiesList[] = array('id' => 'custom', 'name' => 'Search for ' . $enteredPostal, 'keywords' => $enteredPostal, 'postal' => $enteredPostal, 'city' => '', 'state' => '', 'state_id' => '');
            } else {
                $citiesList[] = array('id' => 'custom', 'name' => 'Use My entry ' . $enteredPostal, 'postal' => $enteredPostal, 'city' => '', 'state' => '', 'state_id' => '');
            }
        }
        echo json_encode($citiesList, true);
        exit;
    }
    
}
