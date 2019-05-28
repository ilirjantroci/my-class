<?php
include "header.php";
require_once("ModelStudent.php");
require_once("db.php");
$student = new Student();

if (isset($_POST['shto'])) {

  $id_mesues= $_POST['id_mesues'];
  $id_klasa= $_POST['klasa_perkatese'];
  $email= $_POST['email'];
  $fjalekalimi= $_POST['fjalekalimi'];
  $fjal_con=$_POST['pass_con'];
  $emri= $_POST['emri'];
  $mbiemri= $_POST['mbiemri'];
  $numri= $_POST['numri_personal'];
  $numri_prindit= $_POST['numri_prindit'];
  $ditelindja= $_POST['ditelindja'];
  $vendlindja= $_POST['vendlindja'];
  $vendbanimi= $_POST['vendbanimi'];
  $gjinia= $_POST['gjinia'];
  $id_personale= $_POST['id_personale'];
  $atesia= $_POST['atesia'];

  $image_file = $_FILES["txt_file"]["name"];
    $type  = $_FILES["txt_file"]["type"]; //file name "txt_file" 
    $size  = $_FILES["txt_file"]["size"];
    $temp  = $_FILES["txt_file"]["tmp_name"];

    $path="foto_student/".$image_file;

$njoftim=null;

if($type=="image/jpg" || $type=='image/jpeg' || $type=='image/png' || $type=='image/gif') //formatet e lejuara
  { 
   if(!file_exists($path)) //kontroll nese fotoja ekziston ne folderin mesues/upload
   {
    if($size < 5000000) //madhesia e lejuar 5MB
    {
     move_uploaded_file($temp, "foto_student/" .$image_file); //move foton e uploduar e zhvendosim ne folderin "upload"
    }
    else
    {
     $njoftim="Madhesia e imazhit eshte elarte. Lejohet deri ne 5MB";
    }
   }
   else
   { 
    $njoftim="Kjo foto ekziston, ju lutem ndryshoni emrin e fotos tuj dhe provoni perseri"; 
   }
  }
  else
  {
   $njoftim="Nuk lejohet ky lloj formati, ju lutem zgjidhni formatin e duhur ( JPG , JPEG , PNG , GIF )"; 
  }

if (empty($emri)) {
  $njoftim="Ju lutem shenoni emrin";
}
if (empty($mbiemri)) {
  $njoftim="Ju lutem shenoni mbiemrin";
}
if (empty($email)) {
  $njoftim="Ju lutem shenoni emailin";
}
if (empty($fjalekalimi)) {
  $njoftim="Ju lutem shenoni fjalekalimin";
}
if ($fjalekalimi != $fjal_con) {
  $njoftim="Ju lutem konfirmoni fjalekalimin";
}
$fjalekalimi_security = hash('sha256', $fjalekalimi);
if (is_null($njoftim)) {
  if($student->shto_student($id_mesues,$id_klasa,$email,$fjalekalimi_security,$emri,$mbiemri,$numri,$numri_prindit,$ditelindja,$vendlindja,$vendbanimi,$gjinia,$id_personale,$atesia,$image_file)){
        $u_shtua="Studenti u shtu me sukses ne sistem";
        }
        else
        {
            $njoftim="Studenti nuk u shtua ne sistem, ju lutem provoni perseri";
        }
}
}

  //Nxjerrja e te dhenave nga tabela klasa dhe nga tabela mesues

foreach ($mesuesit as $mesues) {
   $id_mesues_kushti= $mesues->id_mesues; 
}

$sql = 'SELECT * FROM klasa WHERE id_mesues= :id_mesues_kushti';
$klasa = $lidhja->prepare($sql);
$klasa->execute(array(":id_mesues_kushti"=>$id_mesues_kushti));
$klasa->execute();
$nxirr_te_dhena = $klasa->fetchAll(PDO::FETCH_OBJ);


?>

<section class="content">
<!--Shkruaj kod per kete sesion-->
    <div class="callout callout-success">
      <h4>Shtoni nje student te ri</h4> 
       <p>
       Ne kete sesion keni mundesine te shtoni nje student te ri </p>
    </div>

<div class="container bootstrap snippet">
   
    <div style="background-color: #D2D2D2;" class="row">
  		<div class="col-sm-3"><!--left col-->
              

      <div class="text-center">
        <form  class="form" action="" method="post" id="registrationForm" enctype="multipart/form-data">
        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
        <h6>Ngarko foton e profilit <br> .. Nuk eshte e detyrueshme</h6>
        <input type="file" name="txt_file" class="text-center center-block file-upload">
      </div></hr><br>

               
          
          
          
          
               
       
          
        </div><!--/col-3-->
    	<div class="col-sm-8">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home"><b>Krijo te dhenat e nje studenti</b></a></li>
                
              </ul>

              
          <div class="tab-content">
            <div  class="tab-pane active" id="home">
                <hr>
                  
                      <div class="form-group">
                          <?php if (isset($u_krijua)) { ?>
         <p class="alert alert-success text-center"><?php echo $u_shtua; ?></p>
                                <?php } ?>
                                 <?php if (isset($njoftim)) { ?>
         <p class="alert alert-danger text-center"><?php echo $njoftim; ?></p>
                                <?php } ?>
                          <div class="col-xs-6">
                              <label for="first_name"><h4>Emri</h4></label>
                              <b><input style="color: #B600FF;border:1px solid blue;" style="color: #B600FF;" type="text" class="form-control" name="emri" id="first_name" placeholder="emri studentit" title="Shkruani emrin e studentit"></b>
                          </div>
                      </div>
                      <?php foreach($mesuesit as $mesues): ?>
                          <input type="hidden" name="id_mesues" value="<?= $mesues->id_mesues ?>">
                      <?php endforeach; ?>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Mbiemri</h4></label>
                              <b><input  style="color: #B600FF;border:1px solid blue;" type="text" class="form-control" name="mbiemri" id="last_name" placeholder="mbiemri i studentit" title="Shkruani mbiemrin e studentit"></b>
                          </div>
                      </div>

                       <div  class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Emaili</h4></label>
                              <input style="color: #B600FF;border:1px solid blue;" style="color: #B600FF;border:1px solid blue;"  type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="Ketu shkruani emailin e studentit. Kini parasyesh qe emaili duhet te jete aktiv dhe te mos harrohet pasi me kete email do te identifikohet studenti ne sistem">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="phone"><h4>Numri personal</h4></label>
                              <input style="color: #B600FF;border:1px solid blue;" type="text" class="form-control" name="numri_personal" id="phone" placeholder="numri i studentit" title="Shkruani numrin e studentit">
                          </div>
                      </div>

                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Fjalekalimi</h4></label>
                              <input style="color: #B600FF;border:1px solid blue;" type="password" class="form-control" name="fjalekalimi" id="password" placeholder="fjalekalimi i studentit" title="Shkruani fjalekalimin e studentit">
                          </div>
                      </div>

                       <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>Konfirmo fjalekalimin</h4></label>
                              <input style="color: #B600FF;border:1px solid blue;" type="password" class="form-control" name="pass_con" id="password2" placeholder="perserit fjalekalimin" title="Perseritni fjalekalimin e studentit">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="phone"><h4>Numri i prindit</h4></label>
                              <input style="color: #B600FF;border:1px solid blue;" type="text" class="form-control" name="numri_prindit" id="phone" placeholder="Numri i prindit" title="Shkruani numrin e prindit te studentit">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Ditelindja</h4></label>
                              <input style="color: #B600FF;border:1px solid blue;" type="date" class="form-control" name="ditelindja" id="email" placeholder="Shkruani ditelindjen e studentit" title="Shkruani ditelindjen e studentit">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Vendlindja</h4></label>
                              <input style="color: #B600FF;border:1px solid blue;" type="text" name="vendlindja" class="form-control" id="location" placeholder="Vendlindja" title="Shkruani vendlindjen">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Vendbanimi</h4></label>
                              <input style="color: #B600FF;border:1px solid blue;" type="text" class="form-control" name="vendbanimi" id="password" placeholder="Vendbanimi" title="Ju lutem shkruani vendbanimin e studentit">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>ID Personale</h4></label>
                              <input style="color: #B600FF;border:1px solid blue;" type="text" class="form-control" name="id_personale" id="password2" placeholder="ID_PERSONALE" title="Shkruani ID  e studentit">
                          </div>
                      </div>

                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>Certifikate Personale ose Familjare</h4></label>
                              <input style="color: #B600FF;border:1px solid blue;" type="file" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                          </div>
                      </div>

                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>Klasa perkatese</h4></label>
                            
                             <select style="color: #B600FF;border:1px solid blue;" name="klasa_perkatese" class="form-control">
                              <?php foreach($nxirr_te_dhena as $te_dhena): ?>
                             	<option value="<?= $te_dhena->id_klasa ?>"><?= $te_dhena->emri ?></option>
                              <?php endforeach; ?>
                             	
                             </select>
                             
                          </div>
                      </div>

                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>Atesia</h4></label>
                              <input style="color: #B600FF;border:1px solid blue;" type="text" class="form-control" name="atesia" id="password2" placeholder="Emri i babait" title="Shkruani emrin e prindit te studentit">
                          </div>
                      </div>

                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>Gjinia</h4></label>
                             <select style="color: #B600FF;border:1px solid blue;" name="gjinia" class="form-control">
                             	<option value="Mashkull">Mashkull</option>
                             	<option value="Femer">Femer</option>
                             </select>
                          </div>
                      </div>

                      <br><br><br><br>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit" name="shto"><i class="glyphicon glyphicon-ok-sign"></i> Ruaj</button>
                               	<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i>Perseri</button>
                            </div>
                      </div>
              	</form>
              
              <hr>
              
             </div><!--/tab-pane-->
             
             
               
              
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->

    <script type="text/javascript">
    	$(document).ready(function() {

    
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.avatar').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $(".file-upload").on('change', function(){
        readURL(this);
    });
});
    </script>


</section>
</div>


<?php
include "footer.php"

?>