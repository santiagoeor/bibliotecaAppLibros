<?php
include "../controllers/libros-delete-controller.php";

class librosDeleteServices
{

    function deleteLibro($datos)
    {
        include "../config/config.php";

        if (isset($datos["idl"])) { //verificar la existencia de envio de datos
            $objDB = new librosDeleteController();

            $data = array(
                "idl" => $datos["idl"]
            );

            $ejecucion = $objDB->deleteLibros($data);
            if ($ejecucion) { // Todo se ejecuto correctamente
                echo json_encode(array("data" => null, "error" => "0", "msg" => $errorResponse[0]));
            } else { // Algo paso mal
                echo json_encode(array("data" => null, "error" => "10", "msg" => $errorResponse[10]));
            }
        } else {
            echo json_encode(array("data" => null, "error" => "5", "msg" => $errorResponse[5]));
        }
    }
}
