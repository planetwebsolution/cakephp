<?php

/**
 * incentives content controller.
 * PHP 5
 * @author Prakash Saini
 * 
 */
App::uses('AppController', 'Controller');

class AjaxController extends AppController {

    /**
     * Controller name
     *
     * @var string
     */
    public $name = 'Ajax';

    /**
     * beforeFilter
     *
     * @return void
     * @access public 
     */
    public function beforeFilter() {
        parent::beforeFilter();
    }

    

}
