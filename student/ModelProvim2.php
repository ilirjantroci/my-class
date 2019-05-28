<?php
require_once('dbb.php');


class Provim2
{
	private $lidhja;
	function __construct()
	{
		$database = new DB();
		$db = $database->konektimi_db();
		$this->lidhja = $db;
		
	}

	

	

	public function dorezo_provimin($id_student,$id_mesues,$pyetja_1,$per_1,$pyetja_2,$per_2,$pyetja_3,$per_3,$pyetja_4,$per_4,$pyetja_5,$per_5,$pyetja_6,$per_6,$pyetja_7,$per_7,$pyetja_8,$per_8,$pyetja_9,$per_9,$pyetja_10,$per_10,$pyetja_11,$per_11,$pyetja_12,$per_12,$pyetja_13,$per_13,$pyetja_14,$per_14,$pyetja_15,$per_15,$pyetja_16,$per_16,$pyetja_17,$per_17,$pyetja_18,$per_18,$pyetja_19,$per_19,$pyetja_20,$per_20,$pyetja_21,$per_21,$pyetja_22,$per_22,$pyetja_23,$per_23,$pyetja_24,$per_24,$pyetja_25,$per_25,$pyetja_26,$per_26,$pyetja_27,$per_27,$pyetja_28,$per_28,$pyetja_29,$per_29,$pyetja_30,$per_30,$emri,$mbiemri){

		try {
			$dorezo = $this->lidhja->prepare("INSERT INTO provimi(id_student,id_mesues,pyetja_1,per_1,pyetja_2,per_2,pyetja_3,per_3,pyetja_4,per_4,pyetja_5,per_5,pyetja_6,per_6,pyetja_7,per_7,pyetja_8,per_8,pyetja_9,per_9,pyetja_10,per_10,pyetja_11,per_11,pyetja_12,per_12,pyetja_13,per_13,pyetja_14,per_14,pyetja_15,per_15,pyetja_16,per_16,pyetja_17,per_17,pyetja_18,per_18,pyetja_19,per_19,pyetja_20,per_20,pyetja_21,per_21,pyetja_22,per_22,pyetja_23,per_23,pyetja_24,per_24,pyetja_25,per_25,pyetja_26,per_26,pyetja_27,per_27,pyetja_28,per_28,pyetja_29,per_29,pyetja_30,per_30,emri,mbiemri) VALUES(:id_student,:id_mesues,:pyetja_1,:per_1,:pyetja_2,:per_2,:pyetja_3,:per_3,:pyetja_4,:per_4,:pyetja_5,:per_5,:pyetja_6,:per_6,:pyetja_7,:per_7,:pyetja_8,:per_8,:pyetja_9,:per_9,:pyetja_10,:per_10,:pyetja_11,:per_11,:pyetja_12,:per_12,:pyetja_13,:per_13,:pyetja_14,:per_14,:pyetja_15,:per_15,:pyetja_16,:per_16,:pyetja_17,:per_17,:pyetja_18,:per_18,:pyetja_19,:per_19,:pyetja_20,:per_20,:pyetja_21,:per_21,:pyetja_22,:per_22,:pyetja_23,:per_23,:pyetja_24,:per_24,:pyetja_25,:per_25,:pyetja_26,:per_26,:pyetja_27,:per_27,:pyetja_28,:per_28,:pyetja_29,:per_29,:pyetja_30,:per_30,:emri,:mbiemri)");
			
			/*$dorezo->bindValue(":id_student",$id_student);
			$dorezo->bindValue(":id_mesues",$id_mesues);
			$dorezo->bindValue(":peyetja_1",$pyetja_1);
			$dorezo->bindValue(":per_1",$per_1);
			$dorezo->bindValue(":peyetja_2",$pyetja_2);
			$dorezo->bindValue(":per_2",$per_2);
			$dorezo->bindValue(":peyetja_3",$pyetja_3);
			$dorezo->bindValue(":per_3",$per_3);
			$dorezo->bindValue(":peyetja_4",$pyetja_4);
			$dorezo->bindValue(":per_4",$per_4);
			$dorezo->bindValue(":peyetja_5",$pyetja_5);
			$dorezo->bindValue(":per_5",$per_5);
			$dorezo->bindValue(":peyetja_6",$pyetja_6);
			$dorezo->bindValue(":per_6",$per_6);
			$dorezo->bindValue(":peyetja_7",$pyetja_7);
			$dorezo->bindValue(":per_7",$per_7);
			$dorezo->bindValue(":peyetja_8",$pyetja_8);
			$dorezo->bindValue(":per_8",$per_8);
			$dorezo->bindValue(":peyetja_9",$pyetja_9);
			$dorezo->bindValue(":per_9",$per_9);
			$dorezo->bindValue(":peyetja_10",$pyetja_10);
			$dorezo->bindValue(":per_10",$per_10);
			$dorezo->bindValue(":peyetja_11",$pyetja_11);
			$dorezo->bindValue(":per_11",$per_11);
			$dorezo->bindValue(":peyetja_12",$pyetja_12);
			$dorezo->bindValue(":per_12",$per_12);
			$dorezo->bindValue(":peyetja_13",$pyetja_13);
			$dorezo->bindValue(":per_13",$per_13);
			$dorezo->bindValue(":peyetja_14",$pyetja_14);
			$dorezo->bindValue(":per_14",$per_14);
			$dorezo->bindValue(":peyetja_15",$pyetja_15);
			$dorezo->bindValue(":per_15",$per_15);
			$dorezo->bindValue(":peyetja_16",$pyetja_16);
			$dorezo->bindValue(":per_16",$per_16);
			$dorezo->bindValue(":peyetja_17",$pyetja_17);
			$dorezo->bindValue(":per_17",$per_17);
			$dorezo->bindValue(":peyetja_18",$pyetja_18);
			$dorezo->bindValue(":per_18",$per_18);
			$dorezo->bindValue(":peyetja_19",$pyetja_19);
			$dorezo->bindValue(":per_19",$per_19);
			$dorezo->bindValue(":peyetja_20",$pyetja_20);
			$dorezo->bindValue(":per_20",$per_20);
			$dorezo->bindValue(":peyetja_21",$pyetja_21);
			$dorezo->bindValue(":per_21",$per_21);
			$dorezo->bindValue(":peyetja_22",$pyetja_22);
			$dorezo->bindValue(":per_22",$per_22);
			$dorezo->bindValue(":peyetja_23",$pyetja_23);
			$dorezo->bindValue(":per_23",$per_23);
			$dorezo->bindValue(":peyetja_24",$pyetja_24);
			$dorezo->bindValue(":per_24",$per_24);
			$dorezo->bindValue(":peyetja_25",$pyetja_25);
			$dorezo->bindValue(":per_25",$per_25);
			$dorezo->bindValue(":peyetja_26",$pyetja_26);
			$dorezo->bindValue(":per_26",$per_26);
			$dorezo->bindValue(":peyetja_27",$pyetja_27);
			$dorezo->bindValue(":per_27",$per_27);
			$dorezo->bindValue(":peyetja_28",$pyetja_28);
			$dorezo->bindValue(":per_28",$per_28);
			$dorezo->bindValue(":peyetja_29",$pyetja_29);
			$dorezo->bindValue(":per_29",$per_29);
			$dorezo->bindValue(":peyetja_30",$pyetja_30);
			$dorezo->bindValue(":per_30",$per_30);

			
			$dorezo->execute();*/

			
			$dorezo->execute(array(':id_student'=> $id_student,':id_mesues'=> $id_mesues,':pyetja_1'=> $pyetja_1,':per_1'=>$per_1,':pyetja_2'=> $pyetja_2,':per_2'=>$per_2,':pyetja_3'=> $pyetja_3,':per_3'=>$per_3,':pyetja_4'=> $pyetja_4,':per_4'=>$per_4,':pyetja_5'=> $pyetja_5,':per_5'=>$per_5,':pyetja_6'=> $pyetja_6,':per_6'=>$per_6,':pyetja_7'=> $pyetja_7,':per_7'=>$per_7,':pyetja_8'=> $pyetja_8,':per_8'=>$per_8,':pyetja_9'=> $pyetja_9,':per_9'=>$per_9,':pyetja_10'=> $pyetja_10,':per_10'=>$per_10,':pyetja_11'=> $pyetja_11,':per_11'=>$per_11,':pyetja_12'=> $pyetja_12,':per_12'=>$per_12,':pyetja_13'=> $pyetja_13,':per_13'=>$per_13,':pyetja_14'=> $pyetja_14,':per_14'=>$per_14,':pyetja_15'=> $pyetja_15,':per_15'=>$per_15,':pyetja_16'=> $pyetja_16,':per_16'=>$per_16,':pyetja_17'=> $pyetja_17,':per_17'=>$per_17,':pyetja_18'=> $pyetja_18,':per_18'=>$per_18,':pyetja_19'=> $pyetja_19,':per_19'=>$per_19,':pyetja_20'=> $pyetja_20,':per_20'=>$per_20,':pyetja_21'=> $pyetja_21,':per_21'=>$per_21,':pyetja_22'=> $pyetja_22,':per_22'=>$per_22,':pyetja_23'=> $pyetja_23,':per_23'=>$per_23,':pyetja_24'=> $pyetja_24,':per_24'=>$per_24,':pyetja_25'=> $pyetja_25,':per_25'=>$per_25,':pyetja_26'=> $pyetja_26,':per_26'=>$per_26,':pyetja_27'=> $pyetja_27,':per_27'=>$per_27,':pyetja_28'=> $pyetja_28,':per_28'=>$per_28,':pyetja_29'=> $pyetja_29,':per_29'=>$per_29,':pyetja_30'=> $pyetja_30,':per_30'=>$per_30,':emri'=>$emri,':mbiemri'=>$mbiemri));
			return $dorezo;
			
		} catch (Exception $e) {
			echo "Dorezimi i provimit nuk pati sukses!!!     " . $e->getMessage();
			return false;
		}


	}
}


?>