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
class librosUpdateController extends DBOperations
{

	function updateLibro($data)
	{
		//$hash = password_hash($contra, PASSWORD_DEFAULT);
		$ejecucion = $this->dbOperaciones("
				UPDATE libros 
                SET isbn='" . $data["isb"] . "', 
				titulo='" . $data["titul"] . "', 
				descripcion='" . $data["descripci"] . "',
				autor='" . $data["autor"] . "',
				edicion='" . $data["edici"] . "',
				ejemplares='" . $data["ejemplar"] . "',
				estado='" . $data["estad"] . "'
                WHERE id=" . $data["idl"] . "
                ");
		return $ejecucion;
	}
} //fin CLASE
