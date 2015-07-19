<?php

class Database extends PDO
{
    private static $instance = null;

    public function __construct()
    {
        $config = Configuration::singleton();
        parent::__construct('mysql:host=' . $config->get('dbhost') . ';dbname=' . $config->get('dbname'),
            $config->get('dbuser'), $config->get('dbpass'));
    }

    public static function singleton()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function log_database_error($error) {

        $file = 'logs/database.error.log';
        $error =date('Y-m-d H:i:s') . " ----- " . $error . "\n";
        file_put_contents($file, $error, FILE_APPEND | LOCK_EX);
    }
}