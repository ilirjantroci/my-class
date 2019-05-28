<?php
include "header.php";
require_once("db.php");

foreach ($studenti as $student) {
   $id_student_kushti= $student->id_klasa; 
}

$sql = 'SELECT * FROM orari_mesimor WHERE id_klasa= :id_student_kushti';
$orari = $lidhja->prepare($sql);
$orari->execute(array(":id_student_kushti"=>$id_student_kushti));
$orari->execute();
$orari_te_dhena = $orari->fetchAll(PDO::FETCH_OBJ);

?>

<!--Shkruaj kod per kete sesion-->
<section class="content">


    <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-info"></i>Orari i klases tuaj</h4>
                Pershendetje! Ky eshte orari i klases 
              </div>
<div class="col-md-12">
        <div  class="box box-primary">
            <div class="box-header">
            <h3 class="box-title">Orari i klases tuaj</h3>

           

<div class="btn-group pull-right">
    
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