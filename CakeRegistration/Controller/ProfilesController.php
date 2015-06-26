<?php
App::uses('AppModel', 'Model');
App::uses('CakeEmail', 'Network/Email');
class ProfilesController extends AppController {

    public $helpers = array('Html', 'Form');

    public function index() {

        //checking session
        $uid = $this->Session->read('Auth.User.id');
        if (isset($uid)) {
            return $this->redirect(array('controller' => 'profiles', 'action' => 'edit'));
        }

        $this->layout = 'main';
        $title = 'User Registration';
        $this->set(compact('title'));

        //check from submit or not
        if ($this->request->is('post')) {

            //uploading image file 
            $new_file_name = rand(1000, rand(100000, rand(1000000, 10000000))) . "_" . md5(time()) . "_" . time() . $this->data['Profile']['image']['name'];
            move_uploaded_file($this->data['Profile']['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/registration/app/webroot/img/image/' . $new_file_name);
            $this->request->data['Profile']['image'] = '/registration/app/webroot/img/image/' . $new_file_name;
            //----------------------
            //save data
            if ($this->Profile->save($this->request->data)) {


		$Email = new CakeEmail();
		$Email->from(array('me@example.com' => 'Cake registration demo'));
		$Email->to($this->data['Profile']['email']);
		$Email->subject('Registration process completed successfully');
		$Email->send('Welcome to cake registration demo .Your registration process completed successfully');

                $this->Session->setFlash(
                        'User details has been saved.', 'default', array('class' => 'alert alert-success')
                );
                return $this->redirect(array('action' => 'login'));
            }
            //------------
            //on failure
            $this->Session->setFlash(
                    'Unable to add User details.', 'default', array('class' => 'alert alert-danger')
            );
        }
    }

    public function edit() {


        $this->layout = 'main';
        $title = 'User Profile';
        $this->set(compact('title'));

        //Get login user id
        $this->Profile->id = $this->Session->read('Auth.User.id');
        $id = $this->Session->read('Auth.User.id');
        //------
        if (!$this->Profile->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {

            if (isset($this->data['Profile']['image']['name'])) {
                //Uploading image file
                $new_file_name = rand(1000, rand(100000, rand(1000000, 10000000))) . "_" . md5(time()) . "_" . time() . $this->data['Profile']['image']['name'];
                move_uploaded_file($this->data['Profile']['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/abhishek/registration/app/webroot/img/image/' . $new_file_name);
                $this->request->data['Profile']['image'] = '/abhishek/registration/app/webroot/img/image/' . $new_file_name;
                //--------------------
            }

            if ($this->Profile->save($this->request->data)) {
                $this->Session->setFlash(
                        'User details has been saved.', 'default', array('class' => 'alert alert-success')
                );
                return $this->redirect(array('action' => 'edit'));
            } else {
                $this->Session->setFlash(
                        'Unable to add user details.', 'default', array('class' => 'alert alert-danger')
                );
            }
        } else {
            $this->request->data = $this->Profile->read(null, $id);
            unset($this->request->data['Profile']['password']);
        }
    }

    public function login() {
        $this->layout = 'main';
        $title = 'User Login';
        $this->set(compact('title'));

        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirectUrl());
            }

            $this->Session->setFlash(
                    'Invalid email or password, try again', 'default', array('class' => 'alert alert-danger')
            );
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout()
        );
    }

}
