<?php
require 'db.php';

foreach ($studenti as $student) {
   $id_student_kushti= $student->id_klasa; 
}

$sql = 'SELECT * FROM njoftim WHERE id_klasa=:id_student_kushti';
$njoftim = $lidhja->prepare($sql);
$njoftim->execute(array(":id_student_kushti"=>$id_student_kushti));
$njoftim->execute();
$njoftim_te_dhena = $njoftim->fetchAll(PDO::FETCH_OBJ);



$sql = 'SELECT * FROM materiale WHERE id_klasa=:id_student_kushti';
$material = $lidhja->prepare($sql);
$material->execute(array(":id_student_kushti"=>$id_student_kushti));
$material->execute();
$material_te_dhena = $material->fetchAll(PDO::FETCH_OBJ);


$sql = 'SELECT * FROM njoftim WHERE id_klasa=:id_student_kushti LIMIT 7';
$njoftim2 = $lidhja->prepare($sql);
$njoftim2->execute(array(":id_student_kushti"=>$id_student_kushti));
$njoftim2->execute();
$njoftim_te_dhena2 = $njoftim2->fetchAll(PDO::FETCH_OBJ);



$sql = 'SELECT * FROM materiale WHERE id_klasa=:id_student_kushti LIMIT 7';
$material2 = $lidhja->prepare($sql);
$material2->execute(array(":id_student_kushti"=>$id_student_kushti));
$material2->execute();
$material_te_dhena2 = $material2->fetchAll(PDO::FETCH_OBJ);
?>
<section class="content">
      <!-- Small boxes (Stat box) -->
      
      <div class="callout callout-success">
      <h4>Pershendetje </h4> 
    
       <p>
        Keto jane rezultatet nga monitorimi i llogarise tuaj! </p>
     </div>


      <div class="row">
        
        
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo count($njoftim_te_dhena, COUNT_RECURSIVE); ?><sup style="font-size: 20px"></sup></h3>

              <p>Njoftimet e klases tuaj</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="lista_njoftimeve.php" class="small-box-footer">Me shume<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo count($material_te_dhena, COUNT_RECURSIVE); ?><sup style="font-size: 20px"></sup></h3>

              <p>Materiale te ngarkuara</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Me shume<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
<div class="col-md-6">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Njoftimet e fundit</h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger">lani</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->

                <div class="box-body no-padding">
                  <ul class="todo-list ui-sortable">
                     <?php foreach($njoftim_te_dhena2 as $te_dhena_njoftim2 ): ?>
                   
                <li>
                  <!-- drag handle -->
                  <span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <!-- checkbox -->
                  <input type="checkbox" value="">
                  <!-- todo text -->
                  <span class="text"><?= $te_dhena_njoftim2->titulli ?></span>
                  <!-- Emphasis label -->
                  <small class="label label-danger"><i class="fa fa-clock-o"></i><?= $te_dhena_njoftim2->data_krijimit ?></small>
                  <!-- General tools such as edit or delete-->
                  
                </li>
                <?php endforeach; ?>
                
              </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">

                  <a href="njoftime.php" class="uppercase">Shiko te gjitha njoftimet </a>
                </div>
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>

            <div class="col-md-6">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Materialet </h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger">333</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="todo-list ui-sortable">
                   <?php foreach($material_te_dhena2 as $te_dhena_material2 ): ?>
                <li>
                  <!-- drag handle -->
                  <span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <!-- checkbox -->
                  <input type="checkbox" value="">
                  <!-- todo text -->
                  <span class="text"><?= $te_dhena_material2->materiali ?></span>
                  <!-- Emphasis label -->
                  
                  <!-- General tools such as edit or delete-->
                  
                </li>
                
                 <?php endforeach; ?>
              </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">

                  <a href="materiale.php" class="uppercase">Shiko te gjitha materialet </a>
                </div>
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>






            
            
            
         
 


    </section>

    </div>