<?php
include "header.php";
require_once("NjoftimModel.php");
require_once("db.php");
$njoftim = new njoftim();

$id = $_GET['id'];
$sql = "SELECT * FROM njoftim WHERE id_njoftim=:id";
$njoftim = $lidhja->prepare($sql);
$njoftim->execute(array(":id"=>$id));
$njoftim->execute();
$njoftim_te_dhena = $njoftim->fetchAll(PDO::FETCH_OBJ);


if (isset($_POST['modifiko_njoftim'])) {

  $id_klasa= $_POST['klasa_perkatese'];
  $titulli=$_POST['titulli'];
  $pershkrimi=$_POST['pershkrimi'];
if (empty($id_klasa)) {
  $error="Ju lutem shenoni klasen perkatese";
}

 $sql1 = "UPDATE njoftim SET titulli=:titulli,pershkrimi=:pershkrimi,id_klasa=:id_klasa WHERE id_njoftim='$id'";

      $edito = $lidhja->prepare($sql1);
      $edito->bindparam(":titulli",$titulli);
      $edito->bindparam(":pershkrimi",$pershkrimi);
      $edito->bindparam(":id_klasa",$id_klasa);
      $edito->execute();
      
      $u_shtua="Modifikimi u be me sukses";

  
    
    }
//Kodi me posht nxjerr klasat e krijuara nga mesuesi qe eshte i loguar ne sistem
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
    <div class="callout callout-success">
      <h4>Krijo njoftim</h4> 
       <p>
       Krijo njoftim</p>
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
                  <label>Titulli</label>
                  <?php foreach($njoftim_te_dhena as $te_dhena_njoftim ): ?>
                  <input type="text" value="<?= $te_dhena_njoftim->titulli ?>" name="titulli" class="form-control" >
                  
                  
                </div>
                <div class="form-group">
                  <label>Pershkrimi</label>
                
                  <input type="text" size="15" value="<?= $te_dhena_njoftim->pershkrimi ?>" name="pershkrimi" class="form-control" >
                  
                  
                </div>
                

                <!-- textarea -->
                
                
                
               <?php endforeach; ?>

                <select name="klasa_perkatese" style="border:1px solid #9409DE;">
                    <option>Zgjidhni klasen</option>
                    <?php foreach($nxirr_te_dhena as $te_dhena): ?>
                    <option value="<?= $te_dhena->id_klasa ?>"><?= $te_dhena->emri ?></option>
                              <?php endforeach; ?>

                      
                    
                  </select><br><br><br>
                  <button style="width: 100px;" type="submit" name="modifiko_njoftim" class="btn btn-block btn-warning"><i class="fa fa-plus"></i>  Ruaj </button>

                  <button style="width: 130px;float: right;"   class="btn btn-block btn-warning"><i class="fa fa-eye"></i><a href="lista_njoftimeve.php">  Shiko njoftimet </a></button>


                
                

                <!-- input states -->
                

              </form>
            </div>

</section>
</div>



<?php
include "footer.php"

?>