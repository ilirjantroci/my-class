<?php
include "header.php";
require_once("NjoftimModel.php");
require_once("db.php");
$njoftim = new njoftim();

if (isset($_POST['krijo_njoftim'])) {

  $id_klasa= $_POST['klasa_perkatese'];
  $id_mesues= $_POST['id_mesues'];
  $titulli=$_POST['titulli'];
  $pershkrimi=$_POST['pershkrimi'];
  
  $error=null;
  if (empty($titulli)) {
    $error="Ju lutem shenoni titullin e njoftimit";
  }
  if (empty($id_klasa)) {
    $error="Ju lutem zgjidhni klasen perkatese";
  }
  if (empty($pershkrimi)) {
    $error="Ju lutem shenoni pershkrimin e njoftimit";
  }
  if (is_null($error)) {
    if ($njoftim->krijo_njoftim($id_klasa,$id_mesues,$titulli,$pershkrimi)) {
      $u_shtu ="Njoftimi u krijua me sukses";
    }
    
  }

  }

foreach ($mesuesit as $mesues) {
   $id_mesues_kushti= $mesues->id_mesues; 
}

$sql = 'SELECT * FROM klasa WHERE id_mesues= :id_mesues_kushti';
$klasa = $lidhja->prepare($sql);
$klasa->execute(array(":id_mesues_kushti"=>$id_mesues_kushti));
$klasa->execute();
$nxirr_te_dhena = $klasa->fetchAll(PDO::FETCH_OBJ);
?>

<!--Shkruaj kod per kete sesion-->
<section class="content">
<!--Shkruaj kod per kete sesion-->
    <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-info"></i> Krijoni njoftime per klasen tuaj</h4>
                Ne kete sension mund te krijoni njoftime per klasen tuaj , keto njoftime do te lexohen vetem nga studentet qe i perkasin klases..
              </div>

<div class="box-body">
              <form role="form" method="post" action="">
                <?php if (isset($u_shtua)) { ?>
         <p class="alert alert-success text-center"><?php echo $u_shtua; ?></p>
                                <?php } ?>
                                 <?php if (isset($error)) { ?>
         <p class="alert alert-danger text-center"><?php echo $error; ?></p>
                                <?php } ?>
                <!-- text input -->
                <div class="form-group">
                  <label>Tutulli</label>
                  <input type="text" name="titulli" class="form-control" placeholder="Titullin e njoftimit ...">
                </div>
                

                <!-- textarea -->
                <div class="form-group">
                  <label>Pershkrimi</label>
                  <textarea name="pershkrimi" style="height: 200px;border:1px solid #9409DE;font-size: 20px;" class="form-control" rows="3" placeholder="Shkruani njoftimin me detaje ..."></textarea>
                </div>

                <select name="klasa_perkatese" style="border:1px solid #9409DE;">
                    <option>Zgjidhni klasen</option>
                    <?php foreach($nxirr_te_dhena as $te_dhena): ?>
                    <option value="<?= $te_dhena->id_klasa ?>"><?= $te_dhena->emri ?></option>
                              <?php endforeach; ?>

                      <?php foreach($mesuesit as $mesues): ?>
                          <input type="hidden" name="id_mesues" value="<?= $mesues->id_mesues ?>">
                      <?php endforeach; ?>
                    
                  </select><br><br><br>
                  <button style="width: 100px;" type="submit" name="krijo_njoftim" class="btn btn-block btn-warning"><i class="fa fa-plus"></i>  Krijo </button>

                  <button style="width: 130px;float: right;"   class="btn btn-block btn-warning"><i class="fa fa-eye"></i><a href="lista_njoftimeve.php">  Shiko njoftimet </a></button>


                
                

                <!-- input states -->
                

              </form>
            </div>

</section>
</div>



<?php
include "footer.php"

?>