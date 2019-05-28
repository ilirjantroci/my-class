<?php
require_once('dbb.php');


class Materiale
{
	private $lidhja;
	function __construct()
	{
		$database = new DB();
		$db = $database->konektimi_db();
		$this->lidhja = $db;
	}

	public function shto_material($id_mesues,$id_klasa,$materiali){

		try {
			$krijo = $this->lidhja->prepare("INSERT INTO materiale(id_mesues,id_klasa,materiali) VALUES(:id_mesues,:id_klasa,:materiali)");
			$krijo->bindparam(":id_mesues",$id_mesues);
			
			$krijo->bindparam(":id_klasa",$id_klasa);
			$krijo->bindparam(":materiali",$materiali);
			
			$krijo->execute();
			return $krijo;
			
		} catch (Exception $e) {
			echo "Ngarkimi i materialit nuk pati sukses" . $e->getMessage();
			return false;
		}


	}
}


?>