<?php
require_once('dbb.php');


class njoftim
{
	private $lidhja;
	function __construct()
	{
		$database = new DB();
		$db = $database->konektimi_db();
		$this->lidhja = $db;
	}

	public function krijo_njoftim($id_klasa,$id_mesues,$titulli,$pershkrimi){

		try {
			$krijo = $this->lidhja->prepare("INSERT INTO njoftim(id_klasa,id_mesues,titulli,pershkrimi) VALUES(:id_klasa,:id_mesues,:titulli,:pershkrimi)");
			$krijo->bindparam(":id_klasa",$id_klasa);
			$krijo->bindparam(":id_mesues",$id_mesues);
			$krijo->bindparam(":titulli",$titulli);
			$krijo->bindparam(":pershkrimi",$pershkrimi);
			
			$krijo->execute();
			return $krijo;
			
		} catch (Exception $e) {
			echo "Krijimi i njoftimit nuk pati sukses" . $e->getMessage();
			return false;
		}


	}
}


?>