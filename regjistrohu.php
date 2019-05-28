<?php 

include_once 'db.php';

if (isset($_POST['regjistrohu']))
{

	$emri = $_POST['emri'];
	$mbiemri = $_POST['mbiemri'];
	$numri = $_POST['numri'];
	$profili = $_POST['profili'];
	$email = $_POST['email'];
    $fjalekalimi = $_POST['fjalekalimi'];
	$pass_con=$_POST['pass_con'];

	  $image_file = $_FILES["txt_file"]["name"];
	  $type  = $_FILES["txt_file"]["type"]; //file name "txt_file" 
	  $size  = $_FILES["txt_file"]["size"];
	  $temp  = $_FILES["txt_file"]["tmp_name"];

	  $path="mesues/upload/".$image_file;



$njoftim=null;

if(file_exists($path)){ //kontroll nese fotoja ekziston ne folderin mesues/upload
$njoftim="Kjo foto ekziston";
 }
if($size < 5000000) //madhesia e lejuar 5MB
  {
     move_uploaded_file($temp, "mesues/upload/" .$image_file); //move foton e uploduar e zhvendosim ne folderin "upload"
  }

  
  

	if (empty($emri)) {
		$njoftim="Ju lutem shenoni emrin";
	}
	if (strlen($emri) < 3) {
		$njoftim="Emri duhet te permbaje te pakten 3 karaktere";
	}
	if (empty($mbiemri)) {
		$njoftim="Ju lutem shenoni mbiemrin";
	}
	if (empty($numri)) {
		$njoftim="Ju lutem shenoni numrin";
	}
	if (empty($profili)) {
		$njoftim="Ju lutem shenoni profilin";
	}
	if (empty($email)) {
		$njoftim="Ju lutem shenoni emailin";
	}
	if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$njoftim="Ju lutem shkruani adresen email te vleshme";
	}
	
	if (empty($fjalekalimi)) {
		$njoftim="Ju lutem shenoni fjalekalimin";
	}
	if ($fjalekalimi != $pass_con) {
		$njoftim="Ju lutem konfirmoni fjalekalimin";
	}
	if (strlen($fjalekalimi) < 6) {
		$njoftim="Fjalekalimi duhet te jete te pakten  mbi 6 karaktere";
	}
	if ($mesues->fjalekalimi_lista_zeze($fjalekalimi)) {
		$mesues->fjal_error=$njoftim;
	}
	if ($mesues->email_lista_zeze($email)) {
		$njoftim = $mesues->email_error;
	}
	$fjalekalimi_security = hash('sha256', $fjalekalimi);
	
	if (is_null($njoftim)) {
		if($mesues->regjistro($emri,$mbiemri,$numri,$profili,$email,$fjalekalimi_security,$image_file)){
		$mesues->shko_tek("sukses.php");
	    }
		else
		{
			$mesues->shko_tek("regjistrohu.php");
		}
		
	}
    

		
		
}
	


	

?>

<!DOCTYPE html>
<html>
<head>
	<title>MyClass</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">


	<style type="text/css">

  


	body {
            background: #360033;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #0b8793, #360033);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #0b8793, #360033); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        }





        .mre {
        	
        	justify-content: center;
        	

        }
		


		


.login-box {
	margin-top: 10px;
    margin-bottom: 10px;
}

  .login-box label {

    display: block;
    text-align: center;
    margin-left: -55px;
  
  }


  .login-box input {
    border-radius: 75px;
    width: 300px;
   height: 50px;
  border: 1px solid #646464;
  background: #ffffff;
  color: #000000;
  font-family: "Javanese Text";
  margin-right: 50px;
  }


.centerse {
	
    width: 100%;
    margin: 0 auto;
    overflow: hidden;
    padding: 10px 0;
    align-items: center;
    justify-content: space-around;
    display: flex;
    float: none;
    
}

.form-group-lg {
	    margin-left: 40px;
}





@media only screen and (min-width: 850px) and (max-width: 1920px) {
  .centerse {
    margin-top: 13%;
  }

  .login-box {
	margin-top: 10px;
    margin-bottom: 10px;
}

.regjister {
	margin-left: 152px;
	margin-top: 40px;
}


}






@media only screen and (max-width: 320px) {


.login-box input {
    border-radius: 75px;
    width: 250px;
   height: 50px;
  border: 1px solid #646464;
  background: #ffffff;
  color: #000000;
  font-family: "Javanese Text";
  margin-right: 50px;


  }

.form-group-lg {
	    margin-left: 70px;
}



.regjister {
	margin-left: -15px;
    
}




}



	</style>
</head>
<body>


<div class="centerse">
<div class="form-group-lg">
	<form class="form-group" method="post" action="" enctype="multipart/form-data">
		<?php if (isset($njoftim)) { ?>
         <p class="alert alert-danger text-center"><?php echo $njoftim; ?></p>
    <?php } ?>
<div class="row">
	<div class="login-box">
		<label style="color: red;font-size: 23px;">Emri</label>
		<input style="text-align: center;" type="text" name="emri" placeholder="Fusni Emrin Tuaj">
	</div>


	<div class="login-box">
		<label style="color: red;font-size: 23px;">Mbiemri</label>
		<input style="text-align: center;" type="text" name="mbiemri" placeholder="Fusni Mbiemrin Tuaj">
	</div>
	
</div>


<div class="row">
	<div class="login-box">
		<label style="color: red;font-size: 23px;">Email</label>
		<input style="text-align: center;" type="text" name="email" placeholder="Emaili juaj">
	</div>


	<div class="login-box">
		<label style="color: red;font-size: 23px;">Profili</label>
		<input style="text-align: center;" type="text" name="profili" placeholder="Mesues IT, Mesues Letersie etj ">
	</div>
	
</div>


<div class="row">
	<div class="login-box">
		<label style="color: red;font-size: 23px;">Fjalekalimi</label>
		<input style="text-align: center;" type="password" name="fjalekalimi" placeholder="">
	</div>


	<div class="login-box">
		<label style="color: red;font-size: 23px;">Konfirmo fjalekalimin</label>
		<input style="text-align: center;" type="password" name="pass_con" placeholder="">
	

    </div>



</div>

<div class="row">
	<div class="login-box">
		<label style="color: red;font-size: 23px;">Numri</label>
		<input style="text-align: center;" type="number" name="numri" placeholder="Numri juaj">
	</div>


	<div class="login-box">
		<label style="color: red;font-size: 23px;">Foto profili</label>
		<input style="text-align: center;" type="file" name="txt_file" placeholder="">
	

    </div>



</div>
    
	



    <div class="login-box regjister">
	<input type="submit" name="regjistrohu" class="" value="Regjistrohu">
	</div>




</form>


</div>

</div>






<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>