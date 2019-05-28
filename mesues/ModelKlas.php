<?php
require_once('dbb.php');


class Klasa
{
	private $lidhja;
	function __construct()
	{
		$database = new DB();
		$db = $database->konektimi_db();
		$this->lidhja = $db;
		
	}

	

	

	public function krijo_klase($id_mesues,$emri,$pershkrimi){

		try {
			$krijo = $this->lidhja->prepare("INSERT INTO klasa(id_mesues,emri,pershkrimi) VALUES(:id_mesues,:emri,:pershkrimi)");
			$krijo->bindparam(":id_mesues",$id_mesues);
			$krijo->bindparam(":emri",$emri);
			$krijo->bindparam(":pershkrimi",$pershkrimi);
			$krijo->execute();
			return $krijo;
			
		} catch (Exception $e) {
			echo "Krijimi i klases nuk pati sukses" . $e->getMessage();
			return false;
		}


	}
}


?>