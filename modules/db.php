<?php

require_once __DIR__ . '/config.php';

class DB
{
    static private $link = null;

    static private function connect()
    {
        self::$link = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if(self::$link->connect_error)
            echo self::$link->connect_error;
    }

    static public function getAll($str)
    {
        self::connect();

        $response = [];

        $res_sql = self::$link->query($str);

        if($res_sql->num_rows > 0)
        {
            while($row = $res_sql->fetch_assoc())
            {
                $response[] = $row;
            }
        }

        return $response;
    }

    static public function getRow($str)
    {
        self::connect();

        $res_sql = self::$link->query($str);

        if($res_sql->num_rows > 0)
        {
            return $res_sql->fetch_assoc();
        }

        return null;
    }

    static public function setData($str)
    {
        self::connect();

        return self::$link->query($str);
    }

}







?>