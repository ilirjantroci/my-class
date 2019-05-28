<?php
include "header.php";
require_once("ModelStudent.php");
require_once("db.php");
$student = new Student();

$id = $_GET['id'];
$sql = "SELECT * FROM student WHERE id_student=:id";
$student_u = $lidhja->prepare($sql);
$student_u->execute(array(":id"=>$id));
$student_u->execute();
$student_te_dhena = $student_u->fetchAll(PDO::FETCH_OBJ);

if (isset($_POST['modifiko_student'])) {

  
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

    $path="mesues/upload/".$image_file;
     
  

  $sql1 = "UPDATE student SET email=:email,fjalekalimi=:fjalekalimi,emri=:emri,mbiemri=:mbiemri,numri=:numri,numri_prindit=:numri_prindit,ditelindja=:ditelindja,vendlindja=:vendlindja,vendbanimi=:vendbanimi,gjinia=:gjinia,id_personale=:id_personale,atesia=:atesia,foto=:fimage WHERE id_student='$id'";

      $edito = $lidhja->prepare($sql1);
      $edito->bindparam(":email",$email);
      $edito->bindparam(":fjalekalimi",$fjalekalimi);
      $edito->bindparam(":emri",$emri);
      $edito->bindparam(":mbiemri",$mbiemri);
      $edito->bindparam(":numri",$numri);
      $edito->bindparam(":numri_prindit",$numri_prindit);
      $edito->bindparam(":ditelindja",$ditelindja);
      $edito->bindparam(":vendlindja",$vendlindja);
      $edito->bindparam(":vendbanimi",$vendbanimi);
      $edito->bindparam(":gjinia",$gjinia);
      $edito->bindparam(":id_personale",$id_personale);
      $edito->bindparam(":atesia",$atesia);
      $edito->bindparam(":fimage",$image_file);
      $edito->execute();
      
      $u_shtua="Modifikimi u be me sukses";

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
   
    <div class="row">
  		<div class="col-sm-3"><!--left col-->
              

      <div class="text-center">
        <form  class="form" action="" method="post" id="registrationForm" enctype="multipart/form-data">
          <?php foreach($student_te_dhena as $te_dhena_student ): ?>
        <img style="width: 100px !important; height: 100px !important;" src="foto_student/<?= $te_dhena_student->foto ?>" class="avatar img-circle img-thumbnail" alt="avatar">
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
                          <?php if (isset($u_shtua)) { ?>
         <p class="alert alert-success text-center"><?php echo $u_shtua; ?></p>
                                <?php } ?>
                                 

                                
                          <div class="col-xs-6">
                              <label for="first_name"><h4>Emri</h4></label>
                              <input style="color: #B600FF;" type="text" class="form-control" value="<?= $te_dhena_student->emri ?>" name="emri" id="first_name" title="Shkruani emrin e studentit">
                          </div>
                      </div>
                      
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Mbiemri</h4></label>
                              <input style="color: #B600FF;" type="text" class="form-control" value="<?= $te_dhena_student->mbiemri ?>" name="mbiemri" id="last_name"  title="Shkruani mbiemrin e studentit">
                          </div>
                      </div>

                       <div  class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Emaili</h4></label>
                              <input  type="email" value="<?= $te_dhena_student->email ?>" class="form-control" name="email" id="email"  title="Ketu shkruani emailin e studentit. Kini parasyesh qe emaili duhet te jete aktiv dhe te mos harrohet pasi me kete email do te identifikohet studenti ne sistem">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="phone"><h4>Numri personal</h4></label>
                              <input type="text" value="<?= $te_dhena_student->numri ?>" class="form-control" name="numri_personal" id="phone"  title="Shkruani numrin e studentit">
                          </div>
                      </div>

                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Fjalekalimi</h4></label>
                              <input type="text" value="<?= $te_dhena_student->fjalekalimi ?>" class="form-control" name="fjalekalimi" id="password"  title="Shkruani fjalekalimin e studentit">
                          </div>
                      </div>

                       <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>Konfirmo fjalekalimin</h4></label>
                              <input type="text" class="form-control" name="pass_con" id="password2"  title="Perseritni fjalekalimin e studentit">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="phone"><h4>Numri i prindit</h4></label>
                              <input type="text" value="<?= $te_dhena_student->numri_prindit ?>" class="form-control" name="numri_prindit" id="phone"  title="Shkruani numrin e prindit te studentit">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Ditelindja</h4></label>
                              <input type="date" value="<?= $te_dhena_student->ditelindja ?>" class="form-control" name="ditelindja" id="email"  title="Shkruani ditelindjen e studentit">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Vendlindja</h4></label>
                              <input type="text" value="<?= $te_dhena_student->vendlindja ?>" name="vendlindja" class="form-control" id="location"  title="Shkruani vendlindjen">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Vendbanimi</h4></label>
                              <input type="text" value="<?= $te_dhena_student->vendbanimi ?>" class="form-control" name="vendbanimi" id="password"  title="Ju lutem shkruani vendbanimin e studentit">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>ID Personale</h4></label>
                              <input type="text" value="<?= $te_dhena_student->id_personale ?>" class="form-control" name="id_personale" id="password2"  title="Shkruani ID  e studentit">
                          </div>
                      </div>

                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>Certifikate Personale ose Familjare</h4></label>
                              <input type="file" class="form-control" name="password2" id="password2"  title="enter your password2.">
                          </div>
                      </div>

                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>Klasa perkatese</h4></label>
                            
                             <select name="klasa_perkatese" class="form-control">
                              <?php foreach($nxirr_te_dhena as $te_dhena): ?>
                             	<option value="<?= $te_dhena->id_klasa ?>"><?= $te_dhena->emri ?></option>
                              <?php endforeach; ?>
                             	
                             </select>
                             
                          </div>
                      </div>

                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>Atesia</h4></label>
                              <input type="text" value="<?= $te_dhena_student->atesia ?>" class="form-control" name="atesia" id="password2"  title="Shkruani emrin e prindit te studentit">
                          </div>
                      </div>

                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>Gjinia</h4></label>
                             <select name="gjinia" class="form-control">
                             	<option value="Mashkull">Mashkull</option>
                             	<option value="Femer">Femer</option>
                             </select>
                          </div>
                      </div>

                      <br><br><br><br>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit" name="modifiko_student"><i class="glyphicon glyphicon-ok-sign"></i> Ruaj</button>
                               	<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i>Perseri</button>
                            </div>
                      </div>
              	</form>
              <?php endforeach; ?>
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