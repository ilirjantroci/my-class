<?php
include "header.php";
require 'db.php';


$id = $_GET['id'];
$sql = 'SELECT * FROM grafik_notash WHERE id_student=:id';
$grafik = $lidhja->prepare($sql);
$grafik->execute([':id' => $id]);
$grafik->execute();
$shiko_grafik=$grafik->fetchAll(PDO::FETCH_OBJ);


?>

<!--Shkruaj kod per kete sesion-->
<section class="content">

    <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-info"></i> Grafiku perkates</h4>
                Ne kete sension mund te shikoni grafikun e notave
              </div>

 <?php foreach($shiko_grafik as $grafik_te_dhena ): ?>
    <div class="col-md-6">
        <div  class="box box-primary">
            <div class="box-header">
            <h3 class="box-title"><?= $grafik_te_dhena->emri_grafikut?></h3>

           <div class="btn-group pull-right">
           <button type="button"  class="btn btn-primary hidden-xs"><a onclick="return confirm('Jeni te sigurte qe doni te fshini kete?')"
                href="del/fshi_grafik.php?id=<?= $grafik_te_dhena->id_grafik_notash ?>" class="btn btn-xs btn-danger"><i class="fa fa-times"></i>Fshij</a>
        </button>
            </div>


                                    </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover table-condensed">
                        <thead>
                            <tr style="background-color: yellow;">
                                
                                <th>Lenda</th>
                                <th>Nota</th>
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                        	
                        <thead>
                            <tr>
                              <td><?= $grafik_te_dhena->lenda_1?></td>
                              <td><?= $grafik_te_dhena->nota_1?></td>
                            </tr>

                            <tr>
                              <td><?= $grafik_te_dhena->lenda_2?></td>
                              <td><?= $grafik_te_dhena->nota_2?></td>
                            </tr>

                            <tr>
                              <td><?= $grafik_te_dhena->lenda_3?></td>
                              <td><?= $grafik_te_dhena->nota_3?></td>
                            </tr>

                            <tr>
                              <td><?= $grafik_te_dhena->lenda_4?></td>
                              <td><?= $grafik_te_dhena->nota_4?></td>
                            </tr>

                            <tr>
                              <td><?= $grafik_te_dhena->lenda_5?></td>
                              <td><?= $grafik_te_dhena->nota_5?></td>
                            </tr>

                            <tr>
                              <td><?= $grafik_te_dhena->lenda_6?></td>
                              <td><?= $grafik_te_dhena->nota_6?></td>
                            </tr>

                            <tr>
                              <td><?= $grafik_te_dhena->lenda_7?></td>
                              <td><?= $grafik_te_dhena->nota_7?></td>
                            </tr>

                            <tr>
                              <td><?= $grafik_te_dhena->lenda_8?></td>
                              <td><?= $grafik_te_dhena->nota_8?></td>
                            </tr>

                            <tr>
                              <td><?= $grafik_te_dhena->lenda_9?></td>
                              <td><?= $grafik_te_dhena->nota_9?></td>
                            </tr>

                            <tr>
                              <td><?= $grafik_te_dhena->lenda_10?></td>
                              <td><?= $grafik_te_dhena->nota_10?></td>
                            </tr>

                            <tr>
                              <td><?= $grafik_te_dhena->lenda_11?></td>
                              <td><?= $grafik_te_dhena->nota_11?></td>
                            </tr>

                            <tr>
                              <td><?= $grafik_te_dhena->lenda_12?></td>
                              <td><?= $grafik_te_dhena->nota_12?></td>
                            </tr>
                           
                        </thead>
                        <tbody>
                        	
                        
                        
                                
                    </table>
                </div>
                
            </div>
        </div> 

<?php endforeach; ?>



</section>
</div>


<?php
include "footer.php"

?>