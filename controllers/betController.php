<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 1/27/15
 * Time: 5:05 PM
 */

class betController {

    function __construct()
    {
        $this->view = new TemplateMotor();
    }

    function index() {
        echo "Lista last bets";
    }

    function createbet() {
        echo "Create a new bet";
    }

    function mybets() {
        echo "List my bets, new and old bets.";
    }

    function betitall() {
        echo "Search bets to bet.";
    }

}