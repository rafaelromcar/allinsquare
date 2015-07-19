<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 1/28/15
 * Time: 11:47 AM
 */

class groupModel {

    public function __construct() {
        $this->db = "DECLARE DB OBJECT";
    }

    public static function get_by_id($group_id){
        echo "get by id";
    }

    public static function create($title, $description, $admin_id, $regdate, $photo_path=""){
        echo "Create group";
    }

    public static function remove($group_id){
        echo "Remove ".$group_id."<br/>";
    }

    public function add_member(){
        echo "add memeber";
    }

}