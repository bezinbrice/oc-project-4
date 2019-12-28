<?php

namespace OpenClassrooms\oc_project_4\Model;

class Manager
{
    private $servername = "localhost:3308";
    private $dbname = "oc4";
    private $username = "root";
    private $password = "root";

    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost:3308;dbname=oc4;charset=utf8', 'root', 'root');
        return $db;
    }
}