<?php

class Connection
{
    static public function connect()

    {
        try {
            $link = new PDO("mysql:host=localhost;dbname=controlstockcom_perez", "controlstockcom_perez", "8zTmBkg5NdqShfrmUHyR");
            $link->exec("set names utf8");
            //echo "Conexion ok";
            return $link;
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
}
