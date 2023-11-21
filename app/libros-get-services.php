<?php
include "../controllers/libros-get-controller.php";

class librosGetServices
{

    function librosGet()
    {
        $objDB = new librosGetController();
        $data = array();
        include "../config/config.php";

        if (isset($_GET["id"])) {
            $data = $objDB->LibrosById($_GET["id"]);
        } else {
            $data = $objDB->listadoLibros();
        }

        //Creamos Array que entregara un Json de resultado
        $libros = array();
        $libros["data"] = array();

        if ($data) { //Valida si hay datos
            foreach ($data as $row) { //Recorrer los registros y montar cada uno en el ARRAY temporal
                $item = array(
                    "idl" => $row["id"],
                    "isb" => $row["isbn"],
                    "titul" => $row["titulo"],
                    "descripci" => $row["descripcion"],
                    "autor" => $row["autor"],
                    "edici" => $row["edicion"],
                    "ejemplar" => $row["ejemplares"],
                    "estad" => $row["estado"]
                );
                array_push($libros["data"], $item);  //  montamos el array temporal en JSON            
            }
            $libros["msg"] = "OK";
            $libros["error"] = "0";
            echo json_encode($libros); //Formateamos tods los datos a JSON OFICIAL

        } else {
            echo json_encode(array("data" => null, "error" => "4", "msg" => $errorResponse[4]));
        }
    }
}
