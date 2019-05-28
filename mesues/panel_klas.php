<?php
include "header.php";
require_once("ModelKlas.php");
require_once("db.php");
$klasa = new Klasa();

foreach ($mesuesit as $mesues) {
   $id_mesues_kushti= $mesues->id_mesues; 
}

$sql = 'SELECT * FROM klasa WHERE id_mesues= :id_mesues_kushti';
$klasa = $lidhja->prepare($sql);
$klasa->execute(array(":id_mesues_kushti"=>$id_mesues_kushti));
$klasa->execute();
$nxirr_te_dhena = $klasa->fetchAll(PDO::FETCH_OBJ);


$sql = 'SELECT * FROM klasa';
$lidhjaaa = $lidhja->prepare($sql);
$lidhjaaa->execute();
$klasa = $lidhjaaa->fetchAll(PDO::FETCH_OBJ);
?>

<!--Shkruaj kod per kete sesion-->




<section class="content">
            
                        <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-info"></i> Lista e klasave</h4>
                Ne kete sension mund te shikoni,krijoni,fshini,modifikoni nje klase , ose te shikoni studentet e nje klase te caktuae etj..
              </div>
    <div class="col-md-12">
        <div  class="box box-primary">
            <div class="box-header">
            <h3 class="box-title">Te gjitha klasat</h3>

           <div class="btn-group pull-right">
            <button style="background: #ff00cc;  
             background: -webkit-linear-gradient(to right, #333399, #ff00cc); 
             background: linear-gradient(to right, #333399, #ff00cc);" 

             type="button" onclick="javascript: location.href = 'krijo_klase.php'" class="btn btn-primary hidden-xs">Krijo nje klase te re
        </button>
    </div>

<div class="btn-group pull-right">
    <select id="plan-list" class="form-control">
        <option value="http://gymmanager.al/app/client/">Opsione te tjera</option>
        <option value="http://gymmanager.al/app/client/">PDF</option>
        <option value="http://gymmanager.al/app/client/">Excel</option>


            </select>
</div>
                                    </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover table-condensed">
                        <thead>
                            <tr style="background-color: yellow;">
                                
                                <th>Emri klases</th>
                                <th>Pershkrimi</th>
                                <th>Statusi</th>
                                <th>Data Regjistrimit</th>
                                
                                <th>Opsione tjera</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        	<?php foreach($nxirr_te_dhena as $te_dhena): ?>
                        	<thead>
                            <tr>
                                
                                <td><?= $te_dhena->emri ?></td>
                                <td><?= $te_dhena->pershkrimi ?></td>
                                <td><span class="badge bg-green">Aktiv</span></td>
                                <td><?= $te_dhena->data_krijimit ?></td>
                                
                                <td><a href="studentet_e_klases.php?id=<?= $te_dhena->id_klasa ?>" class="btn btn-xs btn-info"><i class="fa fa-eye"></i>Shiko studentet e klases</a>

                                    <a href="studentet_klasa_perkatese.php?id=<?= $te_dhena->id_klasa ?>" class="btn btn-xs btn-info"><i class="fa fa-eye"></i>Shiko te dhenat e studenteve te klases</a>


                                	<a onclick="return confirm('Jeni te sigurte qe doni te fshini kete?')"
                                	href="del/fshi_klas.php?id=<?= $te_dhena->id_klasa ?>" class="btn btn-xs btn-danger"><i class="fa fa-times"></i>Fshij</a>

                                	<a href="modifiko_klas.php?id=<?= $te_dhena->id_klasa ?>" class="btn btn-xs btn-success"><i class="fa fa-eye"></i>Modifiko</a>

                                	
                                </td>
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                        	
                        <?php endforeach; ?>
                        
                                
                    </table>
                </div>
                <div class="box-footer clearfix">
                    
                   <h4 class="pull-left"><b>Numri total i klasave : <?php echo count($nxirr_te_dhena, COUNT_RECURSIVE); ?></b></h4> 
                   
                    

                </div>
            </div>
        </div>                  
</section>
</div>


<?php
include "footer.php"

?>