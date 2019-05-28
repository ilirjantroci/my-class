<?php
require_once('dbb.php');


class Orari
{
	private $lidhja;
	function __construct()
	{
		$database = new DB();
		$db = $database->konektimi_db();
		$this->lidhja = $db;
	}

	public function krijo_orar($id_mesues,$id_klasa,$emri_orarit,$e_hene,$e_marte,$e_merkure,$e_enjte,$e_premte){

		try {
			$krijo_orar = $this->lidhja->prepare("INSERT INTO orari_mesimor(id_mesues,id_klasa,emri_orarit,e_hene,e_marte,e_merkure,e_enjte,e_premte) VALUES(:id_mesues,:id_klasa,:emri_orarit,:e_hene,:e_marte,:e_merkure,:e_enjte,:e_premte)");
			$krijo_orar->bindparam(":id_mesues",$id_mesues);
			$krijo_orar->bindparam(":id_klasa",$id_klasa);
			$krijo_orar->bindparam(":emri_orarit",$emri_orarit);
			$krijo_orar->bindparam(":e_hene",$e_hene);
			$krijo_orar->bindparam(":e_marte",$e_marte);
			$krijo_orar->bindparam(":e_merkure",$e_merkure);
			$krijo_orar->bindparam(":e_enjte",$e_enjte);
			$krijo_orar->bindparam(":e_premte",$e_premte);
			$krijo_orar->execute();
			return $krijo_orar;
			
		} catch (Exception $e) {
			echo "Krijimi i orarit mesimor nuk pati sukses" . $e->getMessage();
			return false;
		}


	}
}


?>