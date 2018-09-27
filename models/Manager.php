<?php

namespace Laetitia_Bernardi\projet5\Model;
use \PDO;


class Manager
{
   
    private $_db;

   
    public function getDb()
    {
        return $this->_db;
    }

    protected function dbConnect() {
        $host = 'localhost';
        $db = 'cine_cinema';
        $user = 'root';
        $pass = 'azerty33';
        $charset = 'utf8';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
     
        ];
        return new PDO($dsn, $user, $pass, $opt);
    }











}



