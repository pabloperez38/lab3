<?php

class GetController
{

    //Peticiones GET sin filtro

    static public function getData($table)

    {
        $response = GetModel::getData($table);

        $return = new GetController();
        $return->fncResponse($response, "getData");
    }

    //Peticiones GET con filtro

    static public function getFilterData($table, $linkTo, $equalTo)

    {

        $response = GetModel::getFilterData($table, $linkTo, $equalTo);

        $return = new GetController();
        $return->fncResponse($response, "getFilterData");
    }

    //Respuestas del controlador

    private function fncResponse($response, $method)
    {

        if (!empty($response)) {
            $json = array(
                'status' => 200,
                'total' => count($response),
                'results' => $response
            );
        } else {
            $json = array(
                'status' => 404,
                'result' => "Not found",
                'method' => $method
            );
        }

        echo json_encode($json, http_response_code($json["status"]));

        return;
    }
}
