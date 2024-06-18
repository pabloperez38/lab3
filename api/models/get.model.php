<?php

require_once 'connection.php';

class getModel
{

    //Peticiones GET sin filtro

    static public function getData($table)

    {
        try {
            $stmt = Connection::connect()->prepare("SELECT * FROM $table ");
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);
        } catch (PDOException $e) {
            //echo "Error de : " . $e->getMessage();
        }
    }

    //Peticiones GET con filtro

    static public function getFilterData($table, $linkTo, $equalTo)

    {

        try {
            $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $linkTo = :$linkTo");
            $stmt->bindParam(":" . $linkTo, $equalTo, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);
        } catch (PDOException $e) {
            //echo "Error de : " . $e->getMessage();
        }
    }
}
