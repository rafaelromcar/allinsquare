<?php

class userModel
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::singleton();
    }

    public function create($name, $surname, $email, $username, $password, $photo = "profile/user_std.jpg")
    {

        try {
            $request_sql = $this->db->prepare("INSERT INTO users(name, surname, email, username, password, photo)
    VALUES(:name, :surname, :email, :username, :password, :photo)");

            $request_sql->execute(
                array(
                    "name" => $name,
                    "surname" => $surname,
                    "email" => $email,
                    "username" => $username,
                    "password" => $password,
                    "photo" => $photo
                ));

            return true;
        } catch (PDOException $e) {
            $this->db->log_database_error($e->getMessage());
            return false;
        }

    }

    public function delete($user_id)
    {
        try {
            $request_sql = $this->db->prepare("DELETE FROM users WHERE id_user=:user_id");

            $request_sql->execute(
                array(
                    "user_id" => $user_id,
                ));
            return true;
        } catch (PDOException $e) {
            $this->db->log_database_error($e->getMessage());
            return false;
        }
    }

    public function update($user_id, $name, $surname, $email, $username, $password, $photo)
    {
        try {
            $sql_sentence = "UPDATE users SET name=:name, surname=:surname, email=:email,
username=:username, password=:password, photo=:photo WHERE id_user=:user_id";
            $request_sql = $this->db->prepare($sql_sentence);

            $request_sql->execute(
                array(
                    "user_id" => $user_id,
                    "name" => $name,
                    "surname" => $surname,
                    "email" => $email,
                    "username" => $username,
                    "password" => $password,
                    "photo" => $photo
                ));
            return true;
        } catch (PDOException $e) {
            $this->db->log_database_error($e->getMessage());
            return false;
        }
    }

    public function get_by_id($id)
    {
        try {
            $sql_sentence = "SELECT * FROM users WHERE id_user=:user_id";
            $request_sql = $this->db->prepare($sql_sentence);

            $request_sql->execute(
                array(
                    "user_id" => $id
                ));
            return $request_sql->fetch();
        } catch (PDOException $e) {
            $this->db->log_database_error($e->getMessage());
            return false;
        }
    }

    public function get_by_username($username)
    {
        try {
            $sql_sentence = "SELECT * FROM users WHERE username=:username";
            $request_sql = $this->db->prepare($sql_sentence);

            $request_sql->execute(
                array(
                    "username" => $username
                ));
            return $request_sql->fetch();
        } catch (PDOException $e) {
            $this->db->log_database_error($e->getMessage());
            return false;
        }
    }

    public function check_login($username, $password)
    {
        try {
            $sql_sentence = "SELECT * FROM users WHERE username=:username AND password=:password";
            $request_sql = $this->db->prepare($sql_sentence);

            $request_sql->execute(
                array(
                    "username" => $username,
                    "password" => $password
                ));
            if ($request_sql->fetchColumn() == 1)
                return true;
            else
                return false;
        } catch (PDOException $e) {
            $this->db->log_database_error($e->getMessage());
            return false;
        }
    }
}