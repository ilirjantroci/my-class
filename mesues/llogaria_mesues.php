<?php
include_once 'ModelMesues.php';
include "header.php";
include "db.php";
$perditeso = new mesues();

foreach ($mesuesit as $mesues) {
   $id_mesues_kushti= $mesues->id_mesues; 
}

$sql = 'SELECT * FROM mesues WHERE id_mesues= :id_mesues_kushti';
$mes = $lidhja->prepare($sql);
$mes->execute(array(":id_mesues_kushti"=>$id_mesues_kushti));
$mes->execute();
$nxirr_te_dhena = $mes->fetchAll(PDO::FETCH_OBJ);


if (isset($_POST['perditeso'])) {

  $emri = $_POST['emri'];
  $mbiemri = $_POST['mbiemri'];
  $numri = $_POST['numri'];
  $profili = $_POST['profili'];
  $email = $_POST['email'];
  
  $sql1 = 'UPDATE mesues SET emri=:emri,mbiemri=:mbiemri,numri=:numri,profili=:profili,email=:email WHERE id_mesues=:id_mesues_kushti';
      $edito = $lidhja->prepare($sql1);
      $edito->bindparam(":emri",$emri);
      $edito->bindparam(":mbiemri",$mbiemri);
      $edito->bindparam(":numri",$numri);
      $edito->bindparam(":profili",$profili);
      $edito->bindparam(":email",$email);
      $edito->bindparam(":id_mesues_kushti",$id_mesues_kushti);
      $edito->execute();

      
    
}

$sql = 'SELECT * FROM klasa WHERE id_mesues= :id_mesues_kushti';
$klasa = $lidhja->prepare($sql);
$klasa->execute(array(":id_mesues_kushti"=>$id_mesues_kushti));
$klasa->execute();
$nxirr_te_dhena_klasa = $klasa->fetchAll(PDO::FETCH_OBJ);

$sql = 'SELECT  * FROM student   WHERE id_mesues= :id_mesues_kushti ORDER BY emri';
$student = $lidhja->prepare($sql);
$student->execute(array(":id_mesues_kushti"=>$id_mesues_kushti));
$student->execute();
$nxirr_te_dhena_student = $student->fetchAll(PDO::FETCH_OBJ);


$sql = 'SELECT * FROM njoftim WHERE id_mesues=:id_mesues_kushti';
$njoftim = $lidhja->prepare($sql);
$njoftim->execute(array(":id_mesues_kushti"=>$id_mesues_kushti));
$njoftim->execute();
$njoftim_te_dhena = $njoftim->fetchAll(PDO::FETCH_OBJ);


$sql = 'SELECT * FROM grafik_notash WHERE id_mesues=:id_mesues_kushti';
$grafik = $lidhja->prepare($sql);
$grafik->execute(array(":id_mesues_kushti"=>$id_mesues_kushti));
$grafik->execute();
$grafik_te_dhena = $grafik->fetchAll(PDO::FETCH_OBJ);
?>
<!--Shkruaj kod per kete sesion-->
<section class="content">
<!--Shkruaj kod per kete sesion-->
    <div class="callout callout-success">
      <h4>Perditeso te dhenat</h4> 
       <p>
       Ndryshoni te dhenat qe ju nevojiten</p>
    </div>

<div class="container bootstrap snippet">
   
    <div class="row">
  		<div class="col-sm-3"><!--left col-->
              <form method="post">

      <div class="text-center">
        <img src="upload/<?= $mesues->foto ?>" class="avatar img-circle img-thumbnail" >
        <h6>Ngarko nje foto tjeter ..</h6>
        <input type="file" class="text-center center-block file-upload">
      </div></hr><br>

               
          
          
          
          <ul class="list-group">
            <li class="list-group-item text-muted">Aktiviteti<i class="fa fa-dashboard fa-1x"></i></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Klasat </strong></span><?php echo count($nxirr_te_dhena_klasa, COUNT_RECURSIVE); ?></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Studentet</strong></span> <?php echo count($nxirr_te_dhena_student, COUNT_RECURSIVE); ?></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Njoftimet</strong></span> <?php echo count($njoftim_te_dhena, COUNT_RECURSIVE); ?></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Grafik notash</strong></span> <?php echo count($grafik_te_dhena, COUNT_RECURSIVE); ?></li>
          </ul> 
               
          
          
        </div><!--/col-3-->
    	<div class="col-sm-8">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Ndrysho te dhenat</a></li>
                
              </ul>

              
          <div class="tab-content">
            <div  class="tab-pane active" id="home">
                <hr>
                  <form  class="form" action="" method="post" id="registrationForm">
                      <div class="form-group">
                          <?php foreach($nxirr_te_dhena as $te_dhena): ?> 
                          <div class="col-xs-6">
                              <label for="first_name"><h4>Emri</h4></label>
                              <input style="color: #B600FF;" type="text" class="form-control" name="emri" id="first_name"  value="<?= $te_dhena->emri ?>"  title="Shkruani emrin tuaj">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Mbiemri</h4></label>
                              <input style="color: #B600FF;" type="text" class="form-control" name="mbiemri" id="last_name" value="<?= $te_dhena->mbiemri ?>"  title="Shkruani mbiemrin tuaj">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="phone"><h4>Numri</h4></label>
                              <input type="number" class="form-control" name="numri" id="phone" value="<?= $te_dhena->numri ?>"  title="Shkruani numrin tuaj">
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Profili</h4></label>
                              <input type="text" class="form-control" name="profili" id="mobile" value="<?= $te_dhena->profili ?>"  title="Shkruani profesionin tuaj">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Emaili</h4></label>
                              <input type="email" class="form-control" name="email" id="email" value="<?= $te_dhena->email ?>"  title="Shkruani emailin tuaj">
                          </div>
                      </div>
                      
                      <?php endforeach; ?>
                      
                      <br><br><br><br>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success" name="perditeso" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Ruaj</button>
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