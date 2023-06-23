<?php

class database
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

        } catch (PDOException $e) {
            die("connection failed");
        }
    }
    public function query($query)
    {
        // $statement = $this->db->prepare($query);
        // $statement->excute($statement);
        // return $statement;
    }


}