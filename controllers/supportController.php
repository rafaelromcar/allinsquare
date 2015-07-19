<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 1/27/15
 * Time: 4:54 PM
 */

class supportController {

    function __construct()
    {
        $this->view = new TemplateMotor();
    }

    function index() {
        echo "Support controller";
    }

    function contact() {
        echo "Contact form";
    }

    function terms() {
        echo "Terms and conditions";
    }

}