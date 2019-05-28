<?php
/**
 * 
 */
class mesues 
{
	private $db;
	public $email_error;
	public $fjal_error;
	function __construct($lidhja_db)
	{
		$this->db = $lidhja_db;
	}

	 public function regjistro($emri,$mbiemri,$numri,$profili,$email,$fjalekalimi,$image_file)
	  {
		try
		{
            //$kodo_fjalekalimin = password_hash($fjalekalimi, PASSWORD_DEFAULT);

			$shto = $this->db->prepare("INSERT INTO mesues(emri,mbiemri,numri,profili,email,fjalekalimi,foto) VALUES(:emri,:mbiemri,:numri,:profili,:email,:fjalekalimi,:fimage)");
			$shto->bindparam(":emri",$emri);
			$shto->bindparam(":mbiemri",$mbiemri);
			$shto->bindparam(":numri",$numri);
			$shto->bindparam(":profili",$profili);
			
			$shto->bindparam(":email",$email);
			$shto->bindparam(":fjalekalimi",$fjalekalimi);
			$shto->bindparam(":fimage",$image_file);
			
			$shto->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo "Regjistrimi nuk pati sukses" . $e->getMessage();	
			return false;
		}
		
	}

	public function shko_tek($url){
		header("Location: $url");

	}

	public function i_loguar()
	{
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
	}
	
	public function email_lista_zeze($email){
		if ($email="@protonmail.com" OR $email="10minutemail") {
			$this->email_error="Nuk lejohet ky lloj emaili";
		}


	}

	public function fjalekalimi_lista_zeze($fjalekalimi){
		if ($fjalekalimi="admin" OR $fjalekalimi="pass") {
			$this->fjal_error="Per shkak sigurie nuk lejohet ky lloj fjalekalimi";
		}
	}

	/*public function identifikohu($numri,$email,$fjalekalimi){

		try {

			$identifikohu = $this->db->prepare("SELECT emri,mbiemri,numri,profili,email,fjalekalimi FROM mesues WHERE numri=:numri OR email=:email ");

			$identifikohu->execute(array(':numri'=>$numri,
			                             ':email'=>$email));

			$userRow=$identifikohu->fetch(PDO::FETCH_ASSOC);


			if($identifikohu->rowCount() == 1)
			{
				if(password_verify($fjalekalimi, $userRow['fjalekalimi']))
				{
					$_SESSION['user_session'] = $userRow['id_mesues'];
					return true;
				}
				else
				{
					return false;
				}
			}
			
		} catch (Exception $e) {
			
		}



	}*/

	



	
}

?>