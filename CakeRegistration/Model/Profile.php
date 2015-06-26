<?php

App::uses('AppModel', 'Model');

class Profile extends AppModel {

    public $validate = array(
        'name' => array(
            'rule' => 'notEmpty',
            'message' => 'This field is required'
        ),
        'email' => array(
            'rule1' => array(
                'rule' => 'isUnique',
                'message' => 'This email has already been taken.'
            ),
            'rule2' => array(
                'rule' => "notEmpty",
                'message' => 'Invaild email'
            ),
            'valid' => array(
                'rule' => "email",
                'message' => 'Invalid email address'
            ),
        ), 'password' => array(array(
                'rule' => 'notEmpty',
                'message' => 'This field is required'
            ), 'loginRule-2' => array(
                'rule' => array('minLength', 8),
                'message' => 'Minimum length of password is 8 '
            )),
        'phone' => array('rule1' => array(
                'rule' => 'notEmpty',
                'message' => 'This field is required'
            ), 'rule2' => array(
                'rule' => 'numeric',
                'message' => 'Invaild Phone no.'
            ), 'loginRule-2' => array(
                'rule' => array('minLength', 10),
                'message' => 'Minimum length of phone no is 10 '
            )),
        'address' => array(
            'rule' => 'notEmpty',
            'message' => 'This field is required'
        ), 'postal_code' => array(
            'rule1' => array(
                'rule' => 'notEmpty',
                'message' => 'This field is required'
            ), 'rule2' => array(
                'rule' => 'numeric',
                'message' => 'Invaild Postal code.'
            ), 'loginRule-2' => array(
                'rule' => array('minLength', 6),
                'message' => 'Minimum length of postal code is 6 '
            ),
        )
    );

    public function beforeSave($options = array()) {
        if (!empty($this->data['Profile']['password'])) {
            $this->data['Profile']['password'] = AuthComponent::password($this->data['Profile']['password']);
        }
        return true;
    }

}

?>
