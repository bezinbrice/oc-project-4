<?php

namespace OpenClassrooms\oc_project_4\Model;

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost:3308;dbname=oc4;charset=utf8', 'root', 'root');
        return $db;
    }
}