<?php
include "header.php";
require_once("ModelKlas.php");
require_once("db.php");
$klasa = new Klasa();

$id = $_GET['id'];
$sql = "SELECT * FROM klasa WHERE id_klasa=:id";
$klasa = $lidhja->prepare($sql);
$klasa->execute(array(":id"=>$id));
$klasa->execute();
$klasa_te_dhena = $klasa->fetchAll(PDO::FETCH_OBJ);

if (isset($_POST['modifiko_klas'])) {

  $emri_klases= $_POST['emri_klases'];
  $pershkrimi=$_POST['pershkrimi'];
 foreach ($mesuesit as $mesues) {
   $id_mesues_kushti= $mesues->id_mesues; 
}

 $sql1 = "UPDATE klasa SET emri=:emri,pershkrimi=:pershkrimi WHERE id_klasa='$id' and WHERE id_mesues='$id_mesues_kushti'";

      $edito = $lidhja->prepare($sql1);
      $edito->bindparam(":emri",$emri_klases);
      $edito->bindparam(":pershkrimi",$pershkrimi);
     
      $edito->execute();
      
      $u_shtua="Modifikimi u be me sukses";

  
    
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
    <div class="callout callout-success">
      <h4>Krijo nje klas te re</h4> 
       <p>
       Shikoni klasat ekzistuese</p>
    </div>

     <div class="col-md-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box box-primary" id="quick_create_form">
                        <div class="box-header">
                            <h3 class="box-title">
                               Modifikoni klasen
                            </h3>
                        </div>
                        <form name="employees" method="post" action="" enctype="multipart/form-data">
                            <div class="box-body">
                                <?php if (isset($u_shtua)) { ?>
         <p class="alert alert-success text-center"><?php echo $u_shtua; ?></p>
                                <?php } ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group-sm">
                                            <?php foreach($klasa_te_dhena as $te_dhena_klasa ): ?>
                                            <label for="fullName">Emri i klases</label>
                                            <input style="margin-top: 2px solid red;" type="text" id="employees_fullName" value="<?= $te_dhena_klasa->emri ?>" name="emri_klases" required="required" class="form-control">
                                            
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group-sm">
                                            <label for="description">Pershkrim</label>
                                            
                                            <input type="text" size="15" value="<?= $te_dhena_klasa->pershkrimi ?>" name="pershkrimi" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                <br>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <button style="background: #7F00FF; 
background: -webkit-linear-gradient(to right, #E100FF, #7F00FF);  
background: linear-gradient(to right, #E100FF, #7F00FF);" type="submit" name="modifiko_klas" class="btn btn-sm btn-block btn-primary"><i class="fa fa-save"></i> RUAJ</button>
                                    </div>
                                </div>
                            </div>
                        <input type="hidden" id="employees__token" name="employees[_token]" value="-KhCWwlW91bgxm_xRQahRS2muSzzGtNlg963YIu3mgU"></form>
                    </div>
                </div>
            </div>
        </div>

       
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab_1" data-toggle="tab">Lista e klasave</a>
                            </li>
                           
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active table-responsive" id="tab_1">
                                <table class="table table-striped table-condensed">
                                    <thead>
                                        <tr style="background-color: yellow;">
                                            <th>Data krijimit</th>
                                            <th>Emri</th>
                                            <th>Status</th>
                                            <th>Pershkrimi</th>
                                            
                                            <th>Opsion</th>
                                        </tr>
                                    </thead>
                                    <?php foreach($nxirr_te_dhena as $te_dhena): ?>
                            <tbody>
                                <tr style="background-color: #C5C5C5;">
                                   <td><?= $te_dhena->data_krijimit ?></td>
                                   <td><?= $te_dhena->emri ?></td>
                                   <td><span class="badge bg-green">Aktiv</span></td>
                                    <td><?= $te_dhena->pershkrimi ?><br></td>
                                    
                                    <td><a style="background: #7F00FF; 
background: -webkit-linear-gradient(to right, #E100FF, #7F00FF);  
background: linear-gradient(to right, #E100FF, #7F00FF);" class="btn btn-xs btn-success" href="panel_klas.php"><i class="fa fa-eye"></i>  Shiko klasen</a>
<a onclick="return confirm('Jeni te sigurte qe doni te fshini kete? Nese po , nuk do te kete kthim mbrapa')" class="btn btn-xs btn-success"  href="del/fshi_klas.php?id=<?= $te_dhena->id_klasa ?>"><i class="fa fa-times"></i>Fshij</a>

</td>
                                </tr>


                            </tbody>
                           
<?php endforeach; ?>
                            


                                    </table>
                            </div><!-- /.tab-pane -->
                            
                        </div>
                    </div>
                </div>
                <div class="box-footer clearfix"></div>
            </div>
        


</section>
</div>



<?php

include "footer.php"

?>