<?php
include "../controllers/libros-update-controller.php";

class LibrosUpdateServices
{

    function updateLibro($datos)
    {
        include "../config/config.php";
        if (isset($datos["idl"])) { //verificar la existencia de envio de datos
            $objDB = new librosUpdateController();

            $data = array(
                "idl" => $datos["idl"],
                "isb" => $datos["isb"],
                "titul" => $datos["titul"],
                "descripci" => $datos["descripci"],
                "autor" => $datos["autor"],
                "edici" => $datos["edici"],
                "ejemplar" => $datos["ejemplar"],
                "estad" => $datos["estad"]
            );

            $ejecucion = $objDB->updateLibro($data);
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
