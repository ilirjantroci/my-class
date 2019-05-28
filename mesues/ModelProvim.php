<?php
require_once('dbb.php');


class Provim
{
	private $lidhja;
	function __construct()
	{
		$database = new DB();
		$db = $database->konektimi_db();
		$this->lidhja = $db;
	}

	public function krijo_teze($id_mesues,$id_klasa,$emri,$pyetja1,$pyetja2,$pyetja3,$pyetja4,$pyetja5,$pyetja6,$pyetja7,$pyetja8,$pyetja9,$pyetja10,$pyetja11,$pyetja12,$pyetja13,$pyetja14,$pyetja15,$pyetja16,$pyetja17,$pyetja18,$pyetja19,$pyetja20,$pyetja21,$pyetja22,$pyetja23,$pyetja24,$pyetja25,$pyetja26,$pyetja27,$pyetja28,$pyetja29,$pyetja30){

		try {
			$krijo = $this->lidhja->prepare("INSERT INTO teze_provimi(id_mesues,id_klasa,emri,pyetja1,pyetja2,pyetja3,pyetja4,pyetja5,pyetja6,pyetja7,pyetja8,pyetja9,pyetja10,pyetja11,pyetja12,pyetja13,pyetja14,pyetja15,pyetja16,pyetja17,pyetja18,pyetja19,pyetja20,pyetja21,pyetja22,pyetja23,pyetja24,pyetja25,pyetja26,pyetja27,pyetja28,pyetja29,pyetja30) VALUES(:id_mesues,:id_klasa,:emri,:pyetja1,:pyetja2,:pyetja3,:pyetja4,:pyetja5,:pyetja6,:pyetja7,:pyetja8,:pyetja9,:pyetja10,:pyetja11,:pyetja12,:pyetja13,:pyetja14,:pyetja15,:pyetja16,:pyetja17,:pyetja18,:pyetja19,:pyetja20,:pyetja21,:pyetja22,:pyetja23,:pyetja24,:pyetja25,:pyetja26,:pyetja27,:pyetja28,:pyetja29,:pyetja30)");
			$krijo->bindparam(":id_mesues",$id_mesues);
			$krijo->bindparam(":id_klasa",$id_klasa);
			$krijo->bindparam(":emri",$emri);

			$krijo->bindparam(":pyetja1",$pyetja1);
			$krijo->bindparam(":pyetja2",$pyetja2);
			$krijo->bindparam(":pyetja3",$pyetja3);

			$krijo->bindparam(":pyetja4",$pyetja4);
			$krijo->bindparam(":pyetja5",$pyetja5);
			$krijo->bindparam(":pyetja6",$pyetja6);

			$krijo->bindparam(":pyetja7",$pyetja7);
			$krijo->bindparam(":pyetja8",$pyetja8);
			$krijo->bindparam(":pyetja9",$pyetja9);

			$krijo->bindparam(":pyetja10",$pyetja10);
			$krijo->bindparam(":pyetja11",$pyetja11);
			$krijo->bindparam(":pyetja12",$pyetja12);

			$krijo->bindparam(":pyetja13",$pyetja13);
			$krijo->bindparam(":pyetja14",$pyetja14);
			$krijo->bindparam(":pyetja15",$pyetja15);

			$krijo->bindparam(":pyetja16",$pyetja16);
			$krijo->bindparam(":pyetja17",$pyetja17);
			$krijo->bindparam(":pyetja18",$pyetja18);

			$krijo->bindparam(":pyetja19",$pyetja19);
			$krijo->bindparam(":pyetja20",$pyetja20);
			$krijo->bindparam(":pyetja21",$pyetja21);

			$krijo->bindparam(":pyetja22",$pyetja22);
			$krijo->bindparam(":pyetja23",$pyetja23);
			$krijo->bindparam(":pyetja24",$pyetja24);

			$krijo->bindparam(":pyetja25",$pyetja25);
			$krijo->bindparam(":pyetja26",$pyetja26);
			$krijo->bindparam(":pyetja27",$pyetja27);

			$krijo->bindparam(":pyetja28",$pyetja28);
			$krijo->bindparam(":pyetja29",$pyetja29);
			$krijo->bindparam(":pyetja30",$pyetja30);
			

			
			
			
			$krijo->execute();
			return $krijo;
			
		} catch (Exception $e) {
			echo "Krijimi i tezes nuk pati sukses" . $e->getMessage();
			return false;
		}


	}
}


?>