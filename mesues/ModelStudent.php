<?php
require_once('dbb.php');


class Student
{
	private $lidhja;
	function __construct()
	{
		$database = new DB();
		$db = $database->konektimi_db();
		$this->lidhja = $db;
		
	}

	

	

	public function shto_student($id_mesues,$id_klasa,$email,$fjalekalimi,$emri,$mbiemri,$numri,$numri_prindit,$ditelindja,$vendlindja,$vendbanimi,$gjinia,$id_personale,$atesia,$image_file){

		try {
			$shto = $this->lidhja->prepare("INSERT INTO student(id_mesues,id_klasa,email,fjalekalimi,emri,mbiemri,numri,numri_prindit,ditelindja,vendlindja,vendbanimi,gjinia,id_personale,atesia,foto) VALUES(:id_mesues,:id_klasa,:email,:fjalekalimi,:emri,:mbiemri,:numri,:numri_prindit,:ditelindja,:vendlindja,:vendbanimi,:gjinia,:id_personale,:atesia,:fimage)");
			$shto->bindparam(":id_mesues",$id_mesues);
			$shto->bindparam(":id_klasa",$id_klasa);
			$shto->bindparam(":email",$email);
			$shto->bindparam(":fjalekalimi",$fjalekalimi);
			$shto->bindparam(":emri",$emri);
			$shto->bindparam(":mbiemri",$mbiemri);
			$shto->bindparam(":numri",$numri);
			$shto->bindparam(":numri_prindit",$numri_prindit);
			$shto->bindparam(":ditelindja",$ditelindja);
			$shto->bindparam(":vendlindja",$vendlindja);
			$shto->bindparam(":vendbanimi",$vendbanimi);
			$shto->bindparam(":gjinia",$gjinia);
			$shto->bindparam(":id_personale",$id_personale);
			$shto->bindparam(":atesia",$atesia);
			$shto->bindparam(":fimage",$image_file);
			$shto->execute();
			return $shto;
			
		} catch (Exception $e) {
			echo "Shtimi i studentit nuk pati sukses" . $e->getMessage();
			return false;
		}


	}
}


?>