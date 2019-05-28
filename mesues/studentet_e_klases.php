<?php
include "header.php";


$id = $_GET['id'];
$sql = 'SELECT * FROM student WHERE id_klasa=:id ORDER BY emri';
$student = $lidhja->prepare($sql);
$student->execute([':id' => $id]);
$student->execute();
$nxirr_te_dhena = $student->fetchAll(PDO::FETCH_OBJ);







?>

<!--Shkruaj kod per kete sesion-->
<section class="content">

    <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-info"></i> Lista e  studenteve</h4>
                Ne kete sension mund te shikoni te gjithe studentet e krijuar nga juve, shikoni te dhenat e pergjithshme , te shikoni profilin e studenteve , gjithashtu keni opsione te tjera si opsion per te pare te gjitha te dhenat e studenteve 
              </div>

<div class="col-md-12">
        <div  class="box box-primary">
            <div class="box-header">
            <h3 class="box-title">Studentet</h3>

           <div class="btn-group pull-right">
            <button style="background: #ff00cc;  
             background: -webkit-linear-gradient(to right, #333399, #ff00cc); 
             background: linear-gradient(to right, #333399, #ff00cc);" 

             type="button" onclick="javascript: location.href = 'shto_student.php'" class="btn btn-primary hidden-xs">Krijo nje student te ri
        </button>
    </div>

<div class="btn-group pull-right">
    <select id="plan-list" class="form-control" onchange="location = this.value;">
        <option value="http://gymmanager.al/app/client/">Opsione te tjera</option>
        <option value="studentet_data.php">Te dhenat e studenteve te kesaj klase</option>
        


            </select>
</div>
                                    </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover table-condensed">
                        <thead>
                            <tr style="background-color: yellow;">
                                <th>Foto</th>
                                <th>ID</th>
                                <th>Emri</th>
                                <th>Mbiemri</th>
                                <th>Email</th>
                                <th>Data Regjistrimit</th>
                                
                                <th>Opsione tjera</th>
                                
                            </tr>
                        </thead>
                         
                        
                        <?php foreach($nxirr_te_dhena as $te_dhena ): ?>
                        <tbody>
                        	<thead>
                            <tr>
                                <td> <img src="foto_student/<?= $te_dhena->foto ?>" width="25px" height="25px"></td>
                                
                                <td><?= $te_dhena->id_student ?></td>
                                
                               
                                <td><a href="/app/client/show/2981"><?= $te_dhena->emri ?></a></td>
                               
                              
                                <td><?= $te_dhena->mbiemri ?></td>
                                
                                <td><?= $te_dhena->email ?></td>

                                <td><?= $te_dhena->data_regjistrimit ?></td>
                                
                               
                                
                                <td><a href="profili_student.php?id=<?= $te_dhena->id_student ?>" class="btn btn-xs btn-success"><i class="fa fa-eye"></i>Shiko profilin</a>

                                    <a onclick="return confirm('Jeni te sigurte qe doni te fshini kete?')" class="btn btn-xs btn-danger" href="del/fshi_student.php?id=<?= $te_dhena->id_student ?>"><i class="fa fa-times"></i>Fshij</a>
                                </td>
                                
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                        	<?php endforeach; ?>


                        
                        
                                
                    </table>
                </div>
                <div class="box-footer clearfix">
                    <h4 class="pull-left"><b>Numri total i studenteve : <?php echo count($nxirr_te_dhena, COUNT_RECURSIVE); ?></b></h4>
                    

                </div>
            </div>
        </div>
    

</section>
</div>


<?php
include "footer.php";

?>