<?php
require_once('dbb.php');
/**
 * 
 */
class mesues
{
	private $lidhja;
	function __construct()
	{
		$database = new DB();
		$db = $database->konektimi_db();
		$this->lidhja = $db;
		
	}

	

	public function shko_tek($url){
		header("Location: $url");

	}

	public function getID($id)
	{
		$stmt = $this->lidhja->prepare("SELECT * FROM mesues WHERE id_mesues=:id");
		$stmt->execute(array(":id"=>$id));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}

	public function update($id,$emri,$mbiemri,$numri,$profili,$email,$fjalekalimi)
	{
		try
		{
	     $edito=$this->lidhja->prepare("UPDATE mesues SET emri=:emri, 
	     mbiemri=:mbiemri,numri=:numri,profili=:profili,email=:email,fjalekalimi=:fjalekalimi WHERE id_mesues=:id ");
			
			$edito->bindparam(":emri",$emri);
			$edito->bindparam(":mbiemri",$mbiemri);
			$edito->bindparam(":numri",$numri);
			$edito->bindparam(":profili",$profili);
			$edito->bindparam(":email",$email);
			$edito->bindparam(":fjalekalimi",$fjalekalimi);
			$edito->bindparam(":id",$id);
			$edito->execute();
			
			return $edito;	
		}
		catch(PDOException $e)
		{
			echo "Modifikimi i te dhenave nuk pati sukses";	
			return false;
		}
	}
}


?>