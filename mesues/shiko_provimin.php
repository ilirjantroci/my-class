<?php
include "header.php";
require 'db.php';

foreach ($mesuesit as $mesues) {
   $id_mesues_kushti= $mesues->id_mesues; 
}



$id = $_GET['id'];
$sql = 'SELECT * FROM provimi WHERE id_provim=:id';
$lidhjaaa = $lidhja->prepare($sql);
$lidhjaaa->execute([':id' => $id]);
$lidhjaaa->execute();
$lexo_provim=$lidhjaaa->fetchAll(PDO::FETCH_OBJ);



?>

<!--Shkruaj kod per kete sesion-->
<section class="content">

    <div class="callout callout-success">
      <h4>Pergjigjet e provimit</h4> 
       <p>
       Keto jane pergjigjet qe ka dhene studenti per provimin qe ka realizuar</p>
    </div>

<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">PERGJIGJET</h3>

              <div class="box-tools pull-right">
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Previous"><i class="fa fa-chevron-left"></i></a>
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Next"><i class="fa fa-chevron-right"></i></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
              	<?php foreach($lexo_provim as $provim_te_dhena ): ?>
                <h3 style="color: red;"><b><?= $provim_te_dhena->pyetja_1?></b></h3>
              </div>
              <!-- /.mailbox-read-info -->
             <hr style="  border-top: 1px dashed red;">
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p style="font-size: 25px;"><?= $provim_te_dhena->per_1?></p>
                  <?php endforeach; ?>
              </div>
              
            </div>



            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <?php foreach($lexo_provim as $provim_te_dhena ): ?>
                <h3 style="color: red;"><b><?= $provim_te_dhena->pyetja_2?></b></h3>
              </div>
              <!-- /.mailbox-read-info -->
             <hr style="  border-top: 1px dashed red;">
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p style="font-size: 25px;"><?= $provim_te_dhena->per_2?></p>
                  <?php endforeach; ?>
              </div>
              
            </div>

            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <?php foreach($lexo_provim as $provim_te_dhena ): ?>
                <h3 style="color: red;"><b><?= $provim_te_dhena->pyetja_3?></b></h3>
              </div>
              <!-- /.mailbox-read-info -->
             <hr style="  border-top: 1px dashed red;">
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p style="font-size: 25px;"><?= $provim_te_dhena->per_3?></p>
                  <?php endforeach; ?>
              </div>
              
            </div>


            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <?php foreach($lexo_provim as $provim_te_dhena ): ?>
                <h3 style="color: red;"><b><?= $provim_te_dhena->pyetja_4?></b></h3>
              </div>
              <!-- /.mailbox-read-info -->
             <hr style="  border-top: 1px dashed red;">
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p style="font-size: 25px;"><?= $provim_te_dhena->per_4?></p>
                  <?php endforeach; ?>
              </div>
              
            </div>

            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <?php foreach($lexo_provim as $provim_te_dhena ): ?>
                <h3 style="color: red;"><b><?= $provim_te_dhena->pyetja_5?></b></h3>
              </div>
              <!-- /.mailbox-read-info -->
             <hr style="  border-top: 1px dashed red;">
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p style="font-size: 25px;"><?= $provim_te_dhena->per_5?></p>
                  <?php endforeach; ?>
              </div>
              
            </div>


            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <?php foreach($lexo_provim as $provim_te_dhena ): ?>
                <h3 style="color: red;"><b><?= $provim_te_dhena->pyetja_6?></b></h3>
              </div>
              <!-- /.mailbox-read-info -->
             <hr style="  border-top: 1px dashed red;">
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p style="font-size: 25px;"><?= $provim_te_dhena->per_6?></p>
                  <?php endforeach; ?>
              </div>
              
            </div>


            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <?php foreach($lexo_provim as $provim_te_dhena ): ?>
                <h3 style="color: red;"><b><?= $provim_te_dhena->pyetja_7?></b></h3>
              </div>
              <!-- /.mailbox-read-info -->
             <hr style="  border-top: 1px dashed red;">
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p style="font-size: 25px;"><?= $provim_te_dhena->per_7?></p>
                  <?php endforeach; ?>
              </div>
              
            </div>


            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <?php foreach($lexo_provim as $provim_te_dhena ): ?>
                <h3 style="color: red;"><b><?= $provim_te_dhena->pyetja_8?></b></h3>
              </div>
              <!-- /.mailbox-read-info -->
             <hr style="  border-top: 1px dashed red;">
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p style="font-size: 25px;"><?= $provim_te_dhena->per_8?></p>
                  <?php endforeach; ?>
              </div>
              
            </div>


            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <?php foreach($lexo_provim as $provim_te_dhena ): ?>
                <h3 style="color: red;"><b><?= $provim_te_dhena->pyetja_9?></b></h3>
              </div>
              <!-- /.mailbox-read-info -->
             <hr style="  border-top: 1px dashed red;">
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p style="font-size: 25px;"><?= $provim_te_dhena->per_9?></p>
                  <?php endforeach; ?>
              </div>
              
            </div>


            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <?php foreach($lexo_provim as $provim_te_dhena ): ?>
                <h3 style="color: red;"><b><?= $provim_te_dhena->pyetja_10?></b></h3>
              </div>
              <!-- /.mailbox-read-info -->
             <hr style="  border-top: 1px dashed red;">
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p style="font-size: 25px;"><?= $provim_te_dhena->per_10?></p>
                  <?php endforeach; ?>
              </div>
              
            </div>


            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <?php foreach($lexo_provim as $provim_te_dhena ): ?>
                <h3 style="color: red;"><b><?= $provim_te_dhena->pyetja_11?></b></h3>
              </div>
              <!-- /.mailbox-read-info -->
             <hr style="  border-top: 1px dashed red;">
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p style="font-size: 25px;"><?= $provim_te_dhena->per_11?></p>
                  <?php endforeach; ?>
              </div>
              
            </div>


            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <?php foreach($lexo_provim as $provim_te_dhena ): ?>
                <h3 style="color: red;"><b><?= $provim_te_dhena->pyetja_12?></b></h3>
              </div>
              <!-- /.mailbox-read-info -->
             <hr style="  border-top: 1px dashed red;">
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p style="font-size: 25px;"><?= $provim_te_dhena->per_12?></p>
                  <?php endforeach; ?>
              </div>
              
            </div>


            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <?php foreach($lexo_provim as $provim_te_dhena ): ?>
                <h3 style="color: red;"><b><?= $provim_te_dhena->pyetja_13?></b></h3>
              </div>
              <!-- /.mailbox-read-info -->
             <hr style="  border-top: 1px dashed red;">
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p style="font-size: 25px;"><?= $provim_te_dhena->per_13?></p>
                  <?php endforeach; ?>
              </div>
              
            </div>


            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <?php foreach($lexo_provim as $provim_te_dhena ): ?>
                <h3 style="color: red;"><b><?= $provim_te_dhena->pyetja_14?></b></h3>
              </div>
              <!-- /.mailbox-read-info -->
             <hr style="  border-top: 1px dashed red;">
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p style="font-size: 25px;"><?= $provim_te_dhena->per_14?></p>
                  <?php endforeach; ?>
              </div>
              
            </div>


            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <?php foreach($lexo_provim as $provim_te_dhena ): ?>
                <h3 style="color: red;"><b><?= $provim_te_dhena->pyetja_15?></b></h3>
              </div>
              <!-- /.mailbox-read-info -->
             <hr style="  border-top: 1px dashed red;">
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p style="font-size: 25px;"><?= $provim_te_dhena->per_15?></p>
                  <?php endforeach; ?>
              </div>
              
            </div>


            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <?php foreach($lexo_provim as $provim_te_dhena ): ?>
                <h3 style="color: red;"><b><?= $provim_te_dhena->pyetja_16?></b></h3>
              </div>
              <!-- /.mailbox-read-info -->
             <hr style="  border-top: 1px dashed red;">
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p style="font-size: 25px;"><?= $provim_te_dhena->per_16?></p>
                  <?php endforeach; ?>
              </div>
              
            </div>


            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <?php foreach($lexo_provim as $provim_te_dhena ): ?>
                <h3 style="color: red;"><b><?= $provim_te_dhena->pyetja_17?></b></h3>
              </div>
              <!-- /.mailbox-read-info -->
             <hr style="  border-top: 1px dashed red;">
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p style="font-size: 25px;"><?= $provim_te_dhena->per_17?></p>
                  <?php endforeach; ?>
              </div>
              
            </div>


            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <?php foreach($lexo_provim as $provim_te_dhena ): ?>
                <h3 style="color: red;"><b><?= $provim_te_dhena->pyetja_18?></b></h3>
              </div>
              <!-- /.mailbox-read-info -->
             <hr style="  border-top: 1px dashed red;">
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p style="font-size: 25px;"><?= $provim_te_dhena->per_18?></p>
                  <?php endforeach; ?>
              </div>
              
            </div>


            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <?php foreach($lexo_provim as $provim_te_dhena ): ?>
                <h3 style="color: red;"><b><?= $provim_te_dhena->pyetja_19?></b></h3>
              </div>
              <!-- /.mailbox-read-info -->
             <hr style="  border-top: 1px dashed red;">
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p style="font-size: 25px;"><?= $provim_te_dhena->per_19?></p>
                  <?php endforeach; ?>
              </div>
              
            </div>


            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <?php foreach($lexo_provim as $provim_te_dhena ): ?>
                <h3 style="color: red;"><b><?= $provim_te_dhena->pyetja_20?></b></h3>
              </div>
              <!-- /.mailbox-read-info -->
             <hr style="  border-top: 1px dashed red;">
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p style="font-size: 25px;"><?= $provim_te_dhena->per_20?></p>
                  <?php endforeach; ?>
              </div>
              
            </div>


            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <?php foreach($lexo_provim as $provim_te_dhena ): ?>
                <h3 style="color: red;"><b><?= $provim_te_dhena->pyetja_21?></b></h3>
              </div>
              <!-- /.mailbox-read-info -->
             <hr style="  border-top: 1px dashed red;">
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p style="font-size: 25px;"><?= $provim_te_dhena->per_21?></p>
                  <?php endforeach; ?>
              </div>
              
            </div>


            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <?php foreach($lexo_provim as $provim_te_dhena ): ?>
                <h3 style="color: red;"><b><?= $provim_te_dhena->pyetja_22?></b></h3>
              </div>
              <!-- /.mailbox-read-info -->
             <hr style="  border-top: 1px dashed red;">
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p style="font-size: 25px;"><?= $provim_te_dhena->per_22?></p>
                  <?php endforeach; ?>
              </div>
              
            </div>


            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <?php foreach($lexo_provim as $provim_te_dhena ): ?>
                <h3 style="color: red;"><b><?= $provim_te_dhena->pyetja_23?></b></h3>
              </div>
              <!-- /.mailbox-read-info -->
             <hr style="  border-top: 1px dashed red;">
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p style="font-size: 25px;"><?= $provim_te_dhena->per_23?></p>
                  <?php endforeach; ?>
              </div>
              
            </div>


            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <?php foreach($lexo_provim as $provim_te_dhena ): ?>
                <h3 style="color: red;"><b><?= $provim_te_dhena->pyetja_24?></b></h3>
              </div>
              <!-- /.mailbox-read-info -->
             <hr style="  border-top: 1px dashed red;">
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p style="font-size: 25px;"><?= $provim_te_dhena->per_24?></p>
                  <?php endforeach; ?>
              </div>
              
            </div>


            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <?php foreach($lexo_provim as $provim_te_dhena ): ?>
                <h3 style="color: red;"><b><?= $provim_te_dhena->pyetja_25?></b></h3>
              </div>
              <!-- /.mailbox-read-info -->
             <hr style="  border-top: 1px dashed red;">
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p style="font-size: 25px;"><?= $provim_te_dhena->per_25?></p>
                  <?php endforeach; ?>
              </div>
              
            </div>


            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <?php foreach($lexo_provim as $provim_te_dhena ): ?>
                <h3 style="color: red;"><b><?= $provim_te_dhena->pyetja_26?></b></h3>
              </div>
              <!-- /.mailbox-read-info -->
             <hr style="  border-top: 1px dashed red;">
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p style="font-size: 25px;"><?= $provim_te_dhena->per_26?></p>
                  <?php endforeach; ?>
              </div>
              
            </div>


            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <?php foreach($lexo_provim as $provim_te_dhena ): ?>
                <h3 style="color: red;"><b><?= $provim_te_dhena->pyetja_27?></b></h3>
              </div>
              <!-- /.mailbox-read-info -->
             <hr style="  border-top: 1px dashed red;">
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p style="font-size: 25px;"><?= $provim_te_dhena->per_27?></p>
                  <?php endforeach; ?>
              </div>
              
            </div>


            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <?php foreach($lexo_provim as $provim_te_dhena ): ?>
                <h3 style="color: red;"><b><?= $provim_te_dhena->pyetja_28?></b></h3>
              </div>
              <!-- /.mailbox-read-info -->
             <hr style="  border-top: 1px dashed red;">
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p style="font-size: 25px;"><?= $provim_te_dhena->per_28?></p>
                  <?php endforeach; ?>
              </div>
              
            </div>


            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <?php foreach($lexo_provim as $provim_te_dhena ): ?>
                <h3 style="color: red;"><b><?= $provim_te_dhena->pyetja_29?></b></h3>
              </div>
              <!-- /.mailbox-read-info -->
             <hr style="  border-top: 1px dashed red;">
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p style="font-size: 25px;"><?= $provim_te_dhena->per_29?></p>
                  <?php endforeach; ?>
              </div>
              
            </div>


            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <?php foreach($lexo_provim as $provim_te_dhena ): ?>
                <h3 style="color: red;"><b><?= $provim_te_dhena->pyetja_30?></b></h3>
              </div>
              <!-- /.mailbox-read-info -->
             <hr style="  border-top: 1px dashed red;">
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p style="font-size: 25px;"><?= $provim_te_dhena->per_30?></p>
                  <?php endforeach; ?>
              </div>
              
            </div>







            
          </div>
</section>
</div>


<?php
include "footer.php"

?>