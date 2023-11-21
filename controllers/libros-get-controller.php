<?php
session_start();
require_once("../models/models_admin.php");

class ConsultasDB extends DBConfig
{

	function consulta_generales($sql)
	{
		$this->config();
		$this->conexion();

		$records = $this->Consultas($sql);

		$this->close();
		return $records;
	}
}

class librosGetController extends ConsultasDB
{
	// ****************************************************************************
	// Agregue aqui debajo el resto de Funciones - Se ha dejado  Listado y detalle
	// ****************************************************************************
	//MUESTRA LISTADO DE Libros
	function listadoLibros($start = 0, $regsCant = 0)
	{
		$sql = "SELECT * FROM libros";
		if ($regsCant > 0)
			$sql = "SELECT * from libros $start,$regsCant";
		$lista = $this->consulta_generales($sql);
		return $lista;
	}
	// DETALLE DE Libros SELECICONADA SEGUN ID
	function LibrosById($idu)
	{
		$sql = "SELECT * from libros where id=$idu ";
		$lista = $this->consulta_generales($sql);
		return $lista;
	}
} //fin CLASE
