<?php
require_once('dbb.php');


class GrafikNotash
{
	private $lidhja;
	function __construct()
	{
		$database = new DB();
		$db = $database->konektimi_db();
		$this->lidhja = $db;
		
	}

	

	

	public function krijo_grafik_notash($id_mesues,$id_student,$emri_grafikut,$lenda_1,$nota_1,$lenda_2,$nota_2,$lenda_3,$nota_3,$lenda_4,$nota_4,$lenda_5,$nota_5,$lenda_6,$nota_6,$lenda_7,$nota_7,$lenda_8,$nota_8,$lenda_9,$nota_9,$lenda_10,$nota_10,$lenda_11,$nota_11,$lenda_12,$nota_12){

		try {
			$krijo = $this->lidhja->prepare("INSERT INTO grafik_notash(id_mesues,id_student,lenda_1,nota_1,lenda_2,nota_2,lenda_3,nota_3,lenda_4,nota_4,lenda_5,nota_5,lenda_6,nota_6,lenda_7,nota_7,lenda_8,nota_8,lenda_9,nota_9,lenda_10,nota_10,lenda_11,nota_11,lenda_12,nota_12,emri_grafikut)
			 VALUES (:id_mesues,:id_student,:lenda_1,:nota_1,:lenda_2,:nota_2,:lenda_3,:nota_3,:lenda_4,:nota_4,:lenda_5,:nota_5,:lenda_6,:nota_6,:lenda_7,:nota_7,:lenda_8,:nota_8,:lenda_9,:nota_9,:lenda_10,:nota_10,:lenda_11,:nota_11,:lenda_12,:nota_12,:emri_grafikut)");
			$krijo->bindparam(":id_mesues",$id_mesues);
			$krijo->bindparam(":id_student",$id_student);
			$krijo->bindparam(":lenda_1",$lenda_1);
			$krijo->bindparam(":nota_1",$nota_1);
			$krijo->bindparam(":lenda_2",$lenda_2);
			$krijo->bindparam(":nota_2",$nota_2);
			$krijo->bindparam(":lenda_3",$lenda_3);
			$krijo->bindparam(":nota_3",$nota_3);
			$krijo->bindparam(":lenda_4",$lenda_4);
			$krijo->bindparam(":nota_4",$nota_4);
			$krijo->bindparam(":lenda_5",$lenda_5);
			$krijo->bindparam(":nota_5",$nota_5);
			$krijo->bindparam(":lenda_6",$lenda_6);
			$krijo->bindparam(":nota_6",$nota_6);
			$krijo->bindparam(":lenda_7",$lenda_7);
			$krijo->bindparam(":nota_7",$nota_7);
			$krijo->bindparam(":lenda_8",$lenda_8);
			$krijo->bindparam(":nota_8",$nota_8);
			$krijo->bindparam(":lenda_9",$lenda_9);
			$krijo->bindparam(":nota_9",$nota_9);
			$krijo->bindparam(":lenda_10",$lenda_10);
			$krijo->bindparam(":nota_10",$nota_10);
			$krijo->bindparam(":lenda_11",$lenda_11);
			$krijo->bindparam(":nota_11",$nota_11);
			$krijo->bindparam(":lenda_12",$lenda_12);
			$krijo->bindparam(":nota_12",$nota_12);
			$krijo->bindparam(":emri_grafikut",$emri_grafikut);
			
			$krijo->execute();
			return $krijo;
			
		} catch (Exception $e) {
			echo "Krijimi i grafikut nuk pati sukses" . $e->getMessage();
			return false;
		}


	}

	public function shko_tek_grafiket($url){
		header("Location: $url");

	}
}


?>