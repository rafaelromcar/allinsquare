<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 1/27/15
 * Time: 12:45 PM
 */

class IndexController {

    function __construct()
    {
        $this->view = new TemplateMotor();
    }

    function index() {
        $this->view->show("home.php");
    }

}