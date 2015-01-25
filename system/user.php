<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 1/25/15
 * Time: 12:53 PM
 */
function check_login () {
    if(isset($_SESSION['login']) && $_SESSION['login'] != '') {
        return true;
    } else {
        false;
    }
}