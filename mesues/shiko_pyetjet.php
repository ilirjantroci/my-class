<?php
include "header.php";
require_once("db.php");

foreach ($mesuesit as $mesues) {
   $id_mesues_kushti= $mesues->id_mesues; 
}
$id = $_GET['id'];
$sql = 'SELECT * FROM teze_provimi WHERE id_provim=:id';
$lidhjaaa = $lidhja->prepare($sql);
$lidhjaaa->execute([':id' => $id]);
$lidhjaaa->execute();
$teze=$lidhjaaa->fetchAll(PDO::FETCH_OBJ);

?>


<section class="content">
<!--Shkruaj kod per kete sesion-->
    <div class="callout callout-success">
      <h4>Teza provimi </h4> 
       <p>
       Lista tezave te provimit te krijuara nga ju</p>
    </div>
<?php foreach($teze as $te_dhena_teze ): ?>
    <div class="col-md-6">
        <div  class="box box-primary">
            <div class="box-header">
            <h3 class="box-title"><?= $te_dhena_teze->emri?></h3>

          


        </div>
              <div class="box-body table-responsive no-padding">
                    <table class="table table-hover table-condensed">
                        <thead>
                            <tr style="background-color: yellow;">
                                
                                <th>Pyetjet</th>
                                
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                          
                        <thead style="font-size: 25px;">
                            <tr>
                              <td><?= $te_dhena_teze->pyetja1?></td>
                            </tr>
                            <tr>
                              <td><?= $te_dhena_teze->pyetja2?></td>
                            </tr>
                            <tr>
                              <td><?= $te_dhena_teze->pyetja3?></td>
                            </tr>
                            <tr>
                              <td><?= $te_dhena_teze->pyetja4?></td>
                            </tr>
                            <tr>
                              <td><?= $te_dhena_teze->pyetja5?></td>
                            </tr>
                            <tr>
                              <td><?= $te_dhena_teze->pyetja6?></td>
                            </tr>
                            <tr>
                              <td><?= $te_dhena_teze->pyetja7?></td>
                            </tr>
                            <tr>
                              <td><?= $te_dhena_teze->pyetja8?></td>
                            </tr>
                            <tr>
                              <td><?= $te_dhena_teze->pyetja9?></td>
                            </tr>
                            <tr>
                              <td><?= $te_dhena_teze->pyetja10?></td>
                            </tr>
                            <tr>
                              <td><?= $te_dhena_teze->pyetja11?></td>
                            </tr>
                            <tr>
                              <td><?= $te_dhena_teze->pyetja12?></td>
                            </tr>
                            <tr>
                              <td><?= $te_dhena_teze->pyetja13?></td>
                            </tr>
                            <tr>
                              <td><?= $te_dhena_teze->pyetja14?></td>
                            </tr>
                            <tr>
                              <td><?= $te_dhena_teze->pyetja15?></td>
                            </tr>
                            <tr>
                              <td><?= $te_dhena_teze->pyetja16?></td>
                            </tr>
                            <tr>
                              <td><?= $te_dhena_teze->pyetja17?></td>
                            </tr>
                            <tr>
                              <td><?= $te_dhena_teze->pyetja18?></td>
                            </tr>
                            <tr>
                              <td><?= $te_dhena_teze->pyetja19?></td>
                            </tr>
                            <tr>
                              <td><?= $te_dhena_teze->pyetja20?></td>
                            </tr>
                            <tr>
                              <td><?= $te_dhena_teze->pyetja21?></td>
                            </tr>
                            <tr>
                              <td><?= $te_dhena_teze->pyetja22?></td>
                            </tr>
                            <tr>
                              <td><?= $te_dhena_teze->pyetja23?></td>
                            </tr>
                            <tr>
                              <td><?= $te_dhena_teze->pyetja24?></td>
                            </tr>
                            <tr>
                              <td><?= $te_dhena_teze->pyetja25?></td>
                            </tr>
                            <tr>
                              <td><?= $te_dhena_teze->pyetja26?></td>
                            </tr>
                            <tr>
                              <td><?= $te_dhena_teze->pyetja27?></td>
                            </tr>
                            <tr>
                              <td><?= $te_dhena_teze->pyetja28?></td>
                            </tr>
                            <tr>
                              <td><?= $te_dhena_teze->pyetja29?></td>
                            </tr>
                            <tr>
                              <td><?= $te_dhena_teze->pyetja30?></td>
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