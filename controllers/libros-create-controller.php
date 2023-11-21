<?php
session_start();
require_once("../models/models_admin.php");

class DBOperations extends DBConfig
{

	function dbOperaciones($sql)
	{
		$this->config();
		$this->conexion();

		$records = $this->Operaciones($sql);

		$this->close();
		return $records;
	}
}

/**
 * IMPLEMENTACION DE ACCESO A CONSULTAS PARA PROTEGER MAS LA VISTA
 */
class librosCreateController extends DBOperations
{

	function saveLibro($data)
	{
		//$hash = password_hash($contra, PASSWORD_DEFAULT);
		$ejecucion = $this->dbOperaciones("
				INSERT INTO libros(isbn, titulo, descripcion, autor, edicion, ejemplares, estado) 
                values('" . $data["isb"] . "', '" . $data["titul"] . "', '" . $data["descripci"] . "', '" . $data["autor"] . "', '" . $data["edici"] . "', '" . $data["ejemplar"] . "', '" . $data["estad"] . "' ) ");
		return $ejecucion;
	}
} //fin CLASE