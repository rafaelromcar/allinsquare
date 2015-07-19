<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 1/27/15
 * Time: 4:54 PM
 */

class projectController {

    function __construct()
    {
        $this->view = new TemplateMotor();
    }

    function index() {
        echo "Project controller";
    }

    function database() {
        echo "Database diagrams";
    }

    function uml() {
        echo "UML diagrams";
    }

    function author() {
        echo "Author";
    }

}