<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 1/26/15
 * Time: 7:31 PM
 */

class userController {
    function __construct()
    {
        //Creamos una instancia de nuestro mini motor de plantillas
        $this->view = new TemplateMotor();
    }

    public function signin(){
        require 'models/userModel.php';
        echo "singin";
        $userModel = new userModel();
        $userModel->create("rafael","romero","rafaelromcar@gmail.com","rafaelromcar","password");
        echo "singin end";
    }

    public function remove(){
        require 'models/userModel.php';
        echo "remove";
    }

    public function login(){
        $this->view->show("login.php");
    }

    public function logout(){
        require 'models/userModel.php';
        echo "logout";
    }

    public function profile(){
        require 'models/userModel.php';
        echo "profile";
    }

    public function listar()
    {
        //Incluye el modelo que corresponde
        require '../models/userModel.php';

        //Creamos una instancia de nuestro "modelo"
        $items = new userModel();

        //Le pedimos al modelo todos los items
        $listado = $items->listadoTotal();

        //Pasamos a la vista toda la información que se desea representar
        $data['listado'] = $listado;

        //Finalmente presentamos nuestra plantilla
        $this->view->show("listar.php", $data);
    }

    public function agregar()
    {
        echo 'Aquí incluiremos nuestro formulario para insertar items';
    }
}