<?php

$routesArray = explode("/", $_SERVER['REQUEST_URI']);
$routesArray = array_filter($routesArray);

//print_r(count($routesArray));

//Cuando no se hace petición

if (count($routesArray) == 2) {
    $json = array(
        'status' => 404,
        'result' => 'Not found'
    );

    echo json_encode($json, http_response_code($json["status"]));

    return;
} else {

    //Peticiones GET

    if (count($routesArray) == 3 && isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "GET") {

        //Peticiones GET con filtro
        if (isset($_GET["linkTo"]) && isset($_GET["equalTo"])) {

            $response = new GetController();
            $response->getFilterData(explode("?", $routesArray[3])[0], $_GET["linkTo"], $_GET["equalTo"]);
        } else {

            //Peticiones GET sin filtro
            $response = new GetController();
            $response->getData($routesArray[3]);
        }
    }
}
