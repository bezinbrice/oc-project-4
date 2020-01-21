<?php

namespace OpenClassrooms\oc_project_4\Model;

class Manager
{
   protected function dbConnect()
		{
			$servername = "mysql:dbname=oc4;host=localhost:3308";
			$username = "root";
			$password = "root";
			$options = array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',);

			$db = new \PDO($servername, $username, $password, $options);
			return $db;
		}
}