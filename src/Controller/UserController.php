<?php

namespace Controller;

class UserController extends \Core\Controller {
    private $userModel;

    function __construct() {
        parent::__construct();

        $this->userModel = new \Model\UserModel();
    }

    function indexAction() {
        echo "And I am ".__FUNCTION__." !";
    }

    function signinAction() {
        $this->render('register');
    }

    function registerAction() {
        print_r($_POST);

        $newEmail = $_POST['email'];
        $newPassword = $_POST['password'];

        // Update model and save
        $this->userModel->setEmail($newEmail);
        $this->userModel->setPassword($newPassword);

        $this->userModel->save();
    }
}