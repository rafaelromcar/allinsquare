<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 1/26/15
 * Time: 8:38 PM
 */

$config = Configuration::singleton();

$config->set('controllersPath', 'controllers/');
$config->set('modelsPath', 'models/');
$config->set('viewsPath', 'views/');

$config->set('dbhost', 'localhost');
$config->set('dbname', 'allinsquare');
$config->set('dbuser', 'allinsquare');
$config->set('dbpass', '4ll1nSQu4r3!');
