<?php
include "header.php";
require 'db.php';

foreach ($studenti as $student) {
   $id_student_kushti= $student->id_student; 
}

$sql = 'SELECT * FROM student WHERE id_student= :id_student_kushti';
$student = $lidhja->prepare($sql);
$student->execute(array(":id_student_kushti"=>$id_student_kushti));
$student->execute();
$nxirr_te_dhena = $student->fetchAll(PDO::FETCH_OBJ);



?>

<!--Shkruaj kod per kete sesion-->
<section class="content">
  <div class="callout callout-success">
    <h4>Profili i studentit</h4> 
     <p>Ne kete sesion mund te shikoni te gjitha te dhenat e studentit tuaj, mund te shikoni te dhenat dhe shume te tjera..
     </p>
  </div>
 <div class="row">
    <div class="col-md-3">
            <!-- Profile Image -->
            <?php foreach($nxirr_te_dhena as $te_dhena ): ?>
     <div class="box box-primary">
       <div class="box-body box-profile text-center">
         <img class="profile-user-img img-responsive img-circle" src="../mesues/foto_student/<?= $te_dhena->foto ?>"  style="width: 100px !important; height: 100px !important;">
         <h3 class="profile-username"><?= $te_dhena->emri?>  <?= $te_dhena->mbiemri?></h3>
           <ul class="list-group list-group-unbordered text-left">
             <li class="list-group-item">
               <b>Ditelindja</b>
                 <a class="pull-right"><?= $te_dhena->ditelindja?></a>
             </li>
             <li class="list-group-item">
                <b>Gjinia</b>
                <a class="pull-right"><?= $te_dhena->gjinia?></a>
             </li>
             <li class="list-group-item">
                <b>ID</b>
                <a class="pull-right"><?= $te_dhena->id_student?></a>
             </li>
             <li class="list-group-item">
                <b>Rregjistruar</b>
                <a class="pull-right"><?= $te_dhena->data_regjistrimit?></a>
             </li><br><br>
             
             
            
        <div class="modal fade" id="disableClient" tabindex="-1" role="dialog" aria-labelledby="disableClient">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                 <div class="modal-header text-center">
                    <h4 class="modal-title">
                      Jeni duke c'aktivizuar <br> <b>Ilirijan Troci'n</b>!
                    </h4>
                  </div>
           <div class="modal-body text-center">
                <p>A jeni te sigurt?</p>
                  <a class="btn btn-sm btn-success btn-lg" data-toggle="modal" data-dismiss="modal">
                      <b>Jo</b>
                  </a>
                    <a href="/app/client/2981/disable" class="btn btn-sm btn-danger btn-lg">
                       <b>Po</b>
                    </a>
           </div>
         </div><!-- /.modal-content -->
            </div>
             </div>
           <div class="modal fade" id="deleteClient" tabindex="-1" role="dialog" aria-labelledby="deleteClient">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <h4 class="modal-title">
                                        Jeni duke fshire perfundimisht
                                        <br>
                                        <b><?= $te_dhena->emri?>  <?= $te_dhena->mbiemri?></b>!
                                        <br>
                                        Ky veprim eshte perfundimtar
                                    </h4>
                                </div>
                                <div class="modal-body text-center">
                                    <p>A jeni te sigurt?</p>
                                    <a href="" class="btn btn-sm btn-success btn-lg" data-toggle="modal" data-dismiss="modal">
                                        <b>Jo</b>
                                    </a>
                                    <a href="/app/client/2981/delete" class="btn btn-sm btn-danger btn-lg">
                                        <b>Po</b>
                                    </a>
                                </div>
                            </div><!-- /.modal-content -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- About Me Box -->
            <div class="box box-primary">
                <div class="box-body">
                    <strong>
                        <i class="fa fa-book margin-r-5"></i>
                        Opsione te tjera
                    </strong><br><br>
                    <button type="button" class="btn btn-info" data-toggle="modal" ><a href="shiko_grafikun_notave.php">
                      Shiko grafikun e notave</a>
                    </button>
                    
                    <hr>
                </div>
            </div>
        </div>

        <div class="col-md-9">
           <div class="nav-tabs-custom">
           <ul class="nav nav-tabs">
                 <li class="active"><a href="#data" data-toggle="tab">Te dhenat llogarise</a></li>
             
           </ul>
                

        <div class="box box-primary" id="viewClient">
                            <!-- form start -->
            <div class="box-body">
                <table class="table table-hover table-striped">
                 <tbody>
                 	<tr>
                                        <th>
                                            Emri
                                        </th>
                                        <td>
                                            <?= $te_dhena->emri?>
                                        </td>
                                        <th>
                                            Mbiemri
                                        </th>
                                        <td>
                                            <?= $te_dhena->mbiemri?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Ditelindja
                                        </th>
                                        <td>
                                            <?= $te_dhena->ditelindja?>
                                        </td>
                                        <th>
                                            Gjinia
                                        </th>
                                        <td>
                                            <?= $te_dhena->gjinia?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Atesia
                                        </th>
                                        <td>
                                            <?= $te_dhena->atesia?>
                                        </td>
                                        <th>
                                            Email
                                        </th>
                                        <td>
                                            <?= $te_dhena->email?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Numri personal
                                        </th>
                                        <td>
                                            <?= $te_dhena->numri?>
                                        </td>
                                        <th>
                                            Numri i prindit
                                        </th>
                                        <td>
                                            <?= $te_dhena->numri_prindit?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            Vendlidja
                                        </th>
                                        <td>
                                            <?= $te_dhena->vendlindja?>
                                        </td>
                                        <th>
                                            Vendbanimi
                                        </th>
                                        <td>
                                            <?= $te_dhena->vendbanimi?>
                                        </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th>
                                           <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">
                                      Gjenero fjalekalimin
                                          </button> 
                                          <div class="modal modal-info fade" id="modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Gjenerimi i fjalekalimit te <?= $te_dhena->emri?></h4>
              </div>
              <div class="modal-body">
                <label>Emaili:</label><p><?= $te_dhena->email?></p>
                <label>Fjalekalimi:</label><p style="color: red;"><?= $te_dhena->fjalekalimi?></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Mbyll dritaren</button>
                
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
                                        </th>
                                        <td>
                                        	<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-warning">
                                           Gjenero ID personale
                                          </button>
                                        </td>
                                        <div class="modal modal-warning fade" id="modal-warning" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Gjenerimi i ID personale te <?= $te_dhena->emri?> </h4>
              </div>
              <div class="modal-body">
                <p><?= $te_dhena->id_personale ?></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Mbyll dritaren</button>
                
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

                                        <th>
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-success">
                                              Gjenero certifikaten
                                            </button> 
                                        </th>
                                        <div class="modal modal-success fade" id="modal-success" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Gjenerimi i certefikates te <?= $te_dhena->emri?></h4>
              </div>
              <div class="modal-body">
                <p>Certifikata... Se shpejti</p>
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Mbyll dritaren</button>
                
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
                                        <td>
                                        	<!--Certifikata-->
                                        </td>
                                    </tr>
                                    
                                </tbody></table>
                            </div>
             <div class="box-footer">
              <?php endforeach; ?>
               
             </div>
    </div>
</div>
                    


</section>
</div>



<?php
include "footer.php"

?>