<?php
include "header.php";
foreach ($mesuesit as $mesues) {
   $id_mesues_kushti= $mesues->id_mesues; 
}

$sql = 'SELECT * FROM student WHERE id_mesues= :id_mesues_kushti ORDER BY emri';
$student = $lidhja->prepare($sql);
$student->execute(array(":id_mesues_kushti"=>$id_mesues_kushti));
$student->execute();
$nxirr_te_dhena = $student->fetchAll(PDO::FETCH_OBJ);

 
 
?>

<!--Shkruaj kod per kete sesion-->




<section class="content">
            
                        <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-info"></i> Lista e te gjithe studenteve te krijuar nga ju</h4>
                Ne kete sension mund te shikoni te gjitha te dhenat e studenteve te krijuar nga ju , gjithashtu mund ta shkarkoni tabelen ne formatin PDF ose ne formatin Excel per qellime te tjera etj..
              </div>
    <div class="col-md-12">
        <div  class="box box-primary">
            <div class="box-header">
            <h3 class="box-title">Te gjithe studentet</h3>

           <div class="btn-group pull-right">
            <button style="background: #ff00cc;  
             background: -webkit-linear-gradient(to right, #333399, #ff00cc); 
             background: linear-gradient(to right, #333399, #ff00cc);" 

             type="button" onclick="javascript: location.href = 'shto_student.php'" class="btn btn-primary hidden-xs">Krijo nje student te ri
        </button>
    </div>

<div class="btn-group pull-right">
    <select id="plan-list" class="form-control">
        <option value="#">Opsione te tjera</option>
        <option value="#">Shkarko ne PDF</option>
        <option value="#">Shkarko ne Excel</option>


            </select>
</div>
                                    </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover table-condensed">
                        <thead>
                            <tr style="background-color: yellow;">
                                
                                <th>EMRI</th>
                                <th>ATESIA</th>
                                <th>MBIEMRI</th>
                                <th>DITELINDJA</th>
                                <th>VENDLINDJA</th>
                                <th>VENDBANIMI</th>
                                <th>GJINIA</th>
                                <th>Nr.Personal</th>
                                <th>Nr.Prindit</th>
                                <th>ID Personale</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        	<?php foreach($nxirr_te_dhena as $te_dhena): ?>
                        	<thead>
                            <tr>
                                
                                <td><?= $te_dhena->emri ?></td>
                                <td><?= $te_dhena->atesia ?></td>
                                <td><?= $te_dhena->mbiemri ?></td>
                                <td><?= $te_dhena->ditelindja?></td>
                                <td><?= $te_dhena->vendlindja?></td>
                                <td><?= $te_dhena->vendbanimi?></td>
                                <td><?= $te_dhena->gjinia?></td>
                                <td><?= $te_dhena->numri?></td>
                                <td><?= $te_dhena->numri_prindit?></td>
                                <td><?= $te_dhena->id_personale?></td>
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                        	
                        <?php endforeach; ?>
                        
                                
                    </table>
                </div>
                <div class="box-footer clearfix">
                    <h4 class="pull-left"><b>Numri total i studenteve: <?php echo count($nxirr_te_dhena, COUNT_RECURSIVE); ?></b></h4>
                    

                </div>
            </div>
        </div>                  
</section>
</div>


<?php
include "footer.php"

?>