<?php

class Conexion
{
    static public function conectar()
    {

        try {
            $link = new PDO("mysql:host=localhost;dbname=controlstockcom_perez", "controlstockcom_perez", "8zTmBkg5NdqShfrmUHyR");
            $link->exec("set names utf8");
            //echo "Conexion ok";
            return $link;
        } catch (PDOException $e) {
           // echo "Conexion falló";
            die("Error: " . $e->getMessage());
        }
    }
}
