<?php
include "header.php";
require_once("ModelKlas.php");
require_once("db.php");
$klasa = new Klasa();
if (isset($_POST['krijo']))
{

    $emri_klases = $_POST['emri_klases'];
    $pershkrimi = $_POST['pershkrimi'];
    $id_mesues = $_POST['id_mesues'];
    
    $njoftim=null;
    $u_krijua=null;
    if (empty($emri_klases)) {
        $njoftim="Ju lutem shenoni emrin e klases!!";
    }
    if (empty($pershkrimi)) {
        $njoftim="Ju lutem shenoni pershkrimin e klases!!";
    }
    if(strlen($pershkrimi) > 30){
        $njoftim="Pershkrimi duhet te jete me pak se 30 karaktere"; 
    }
    
    if (is_null($njoftim)) {
        if($klasa->krijo_klase($id_mesues,$emri_klases,$pershkrimi)){
        
        $u_krijua="Klasa u krijua me sukses";
        header("location:lista_klasave.php");
         
        }
        
        
    }
    

        
        
}//Mbarimi i kushtit qe krijon nje klase

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
                               Krijo nje klase te re
                            </h3>
                        </div>
                        <form name="employees" method="post" action="" enctype="multipart/form-data">
                            <div class="box-body">
                                <?php if (isset($u_krijua)) { ?>
         <p class="alert alert-success text-center"><?php echo $u_krijua; ?></p>
                                <?php } ?>
                                 <?php if (isset($njoftim)) { ?>
         <p class="alert alert-danger text-center"><?php echo $njoftim; ?></p>
                                <?php } ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group-sm">
                                            <label for="fullName">Emri i klases</label>
                                            <input style="margin-top: 2px solid red;" type="text" id="employees_fullName" name="emri_klases" required="required" class="form-control">
                                            <?php foreach($mesuesit as $mesues): ?>
                                            <input type="hidden" name="id_mesues" value="<?= $mesues->id_mesues ?>">
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group-sm">
                                            <label for="description">Pershkrim</label>
                                            <textarea id="employees_description" name="pershkrimi" placeholder="Maksimumi 30 karaktere" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <button style="background: #7F00FF; 
background: -webkit-linear-gradient(to right, #E100FF, #7F00FF);  
background: linear-gradient(to right, #E100FF, #7F00FF);" type="submit" name="krijo" class="btn btn-sm btn-block btn-primary"><i class="fa fa-plus"></i>
                                            Krijo
                                        </button>
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