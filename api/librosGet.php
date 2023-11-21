<?php
include "../app/libros-get-services.php";
include "../config/config.php";

$objAPI = new librosGetServices();

$method = $_SERVER['REQUEST_METHOD'];
header("Content-Type: Application/json");
if ($method == 'GET') {
    $objAPI->librosGet();
} else {
    echo json_encode(array("data" => null, "error" => "3", "msg" => $errorResponse[3]));
}
