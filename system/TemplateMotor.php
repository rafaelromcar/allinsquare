<?php
class TemplateMotor {
    function __construct() {

    }

    public function show($name, $vars = array())
    {
        $config = Configuration::singleton();

        $path = $config->get('viewsPath') . $name;

        if (file_exists($path) == false)
        {
            include($config->get('viewsPath').'404.php');
//            trigger_error ('Template `' . $path . '` does not exist.', E_USER_NOTICE);
//            return false;
        }

        if(is_array($vars))
        {
            foreach ($vars as $key => $value)
            {
                $key = $value;
            }
        }

        include($path);
    }
}