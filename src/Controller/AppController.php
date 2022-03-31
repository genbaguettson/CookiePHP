<?php

namespace Controller;

class AppController extends \Core\Controller {
    function __construct() {
        parent::__construct();
        echo "And I am ".__CLASS__." !";
    }

    function indexAction() {
        echo "And I am ".__FUNCTION__." !";
    }
}