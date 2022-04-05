<?php

namespace Controller;

class UserController extends \Core\Controller {
    function __construct() {
        parent::__construct();
    }

    function addAction() {
        $this->render('register');
    }
}