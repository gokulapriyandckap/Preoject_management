<?php

class DatabaseConnection
{
    public $db;

    public function __construct()
    {
        try {
            $this->db = new PDO
            (
                'mysql:host=127.0.0.1;dbname=project_management',
                'admin',
                'welcome'
            );
//            echo 'success';
        } catch (Exception $e) {
            die($e->getMessage()."connection error");
        }
    }
//    public function query($query)
//    {
//        $statement = $this->db->prepare($query);
//        $statement->execute($statement);
//
//        return $statement;
//    }
}



