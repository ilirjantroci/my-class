<?php
include "header.php";
require_once("db.php");

foreach ($mesuesit as $mesues) {
   $id_mesues_kushti= $mesues->id_mesues; 
}

$sql = 'SELECT * FROM orari_mesimor WHERE id_mesues= :id_mesues_kushti';
$orari = $lidhja->prepare($sql);
$orari->execute(array(":id_mesues_kushti"=>$id_mesues_kushti));
$orari->execute();
$orari_te_dhena = $orari->fetchAll(PDO::FETCH_OBJ);
?>

<!--Shkruaj kod per kete sesion-->
<section class="content">


    <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-info"></i>Oraret e krijuara nga ju</h4>
                Ne kete sension mund te shikoni te gjitha oraret qe keni krijuar ju per klasat e juaja
              </div>
<div class="col-md-12">
        <div  class="box box-primary">
            <div class="box-header">
            <h3 class="box-title">Oraret</h3>

           <div class="btn-group pull-right">
            <button style="background: #ff00cc;  
             background: -webkit-linear-gradient(to right, #333399, #ff00cc); 
             background: linear-gradient(to right, #333399, #ff00cc);" 

             type="button" onclick="javascript: location.href = 'krijo_orar_mesimor.php'" class="btn btn-primary hidden-xs">Krijo nje orar te ri
        </button>
    </div>

<div class="btn-group pull-right">
    <select id="plan-list" class="form-control" onchange="location = this.value;">
        <option value="http://gymmanager.al/app/client/">Opsione te tjera</option>
        <option value="#seshpejti">Shkarko ne PDF</option>
        


            </select>
</div>
                                    </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover table-condensed">
                        <thead>
                            <tr style="background-color: yellow;">
                                <th >Emri orarit</th>
                                <th>E hene</th>
                                <th>E marte</th>
                                <th>E merkure</th>
                                <th>E enjte</th>
                                <th>E premte</th>
                                <th>Opsion</th>
                                
                                
                            </tr>
                        </thead>
                         
                        
                        <?php foreach($orari_te_dhena as $te_dhena_orari ): ?>
                        <tbody>
                        	<thead>
                            <tr>
                                
                                
                                <td style="color: red;" ><?= $te_dhena_orari->emri_orarit ?></td>
                                
                               
                                <td ><b><?= $te_dhena_orari->e_hene ?></td>
                               
                              
                                <td><b><?= $te_dhena_orari->e_marte ?></td>
                                
                                <td ><b><?= $te_dhena_orari->e_merkure ?></td>

                                <td ><b><?= $te_dhena_orari->e_enjte ?></td>
                                
                                <td ><b><?= $te_dhena_orari->e_premte ?></td>
                                
                                <td ><a href="profili_student.php?id=<?= $te_dhena->id_student ?>" class="btn btn-xs btn-success"><i class="fa fa-eye"></i>Modifiko orarin</a>

                                    <a onclick="return confirm('Jeni te sigurte qe doni te fshini kete?')" class="btn btn-xs btn-danger" href="del/fshi_orar.php?id=<?= $te_dhena_orari->id_orari ?>"><i class="fa fa-times"></i>Fshij</a>
                                </td>
                                
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                        	<?php endforeach; ?>
                        	


                        
                        
                                
                    </table>
                </div>
                <div class="box-footer clearfix">
                    
                    

                </div>
            </div>
        </div>

</section>
</div>


<?php
include "footer.php"

?>