<?php

namespace OpenClassrooms\oc_project_4\Model;

class Manager
{
    protected function dbConnect()
    {
        $servername = "mysql:dbname=dbs262125;host=db5000268649.hosting-data.io";
        $username = "dbu334357";
        $password = "*********";
        $options = array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',);

        $db = new \PDO($servername, $username, $password, $options);
        return $db;
    }
}
