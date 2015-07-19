<?php

class FrontController {

    static function main() {

        require 'system/Config.php'; //de configuracion
        require 'system/Database.php'; //PDO con singleton
        require 'system/TemplateMotor.php'; //Mini motor de plantillas

        require 'system/config.php'; //Archivo con configuraciones.

        $config = Configuration::singleton();

        $request = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

        if (isset($request[0]) && !empty($request[0]))
            $controllerName = $request[0] . 'Controller';
        else
            $controllerName = "IndexController";

        if (isset($request[1]) && !empty($request[1]))
            $actionName = $request[1];
        else
            $actionName = "index";

        $controllerPath = $config->get('controllersPath') . $controllerName . '.php';

        //Incluimos el fichero que contiene nuestra clase controladora solicitada
        if (is_file($controllerPath))
            require $controllerPath;
        else {
            include($config->get('viewsPath').'404.php');
            return false;
        }
//            die('El controlador no existe - 404 not found');

        //Si no existe la clase que buscamos y su acción, mostramos un error 404
        if (is_callable(array($controllerName, $actionName)) == false) {
            trigger_error($controllerName . '->' . $actionName . '` no existe', E_USER_NOTICE);
            return false;
        }

        $controller = new $controllerName();
        $controller->$actionName();
    }
}