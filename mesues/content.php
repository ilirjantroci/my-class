<?php
require 'db.php';

if(empty($_SESSION['email']))
{
 header("location:identifikohu.php");
}
$email_kushti = $_SESSION['email'];

foreach ($mesuesit as $mesues) {
   $id_mesues_kushti= $mesues->id_mesues; 
}

$sql = "SELECT * FROM mesues WHERE email ='$email_kushti'";
$lidhjaaa = $lidhja->prepare($sql);
$lidhjaaa->execute();
$mesuesit = $lidhjaaa->fetchAll(PDO::FETCH_OBJ);

$sql = 'SELECT  * FROM student  WHERE id_mesues= :id_mesues_kushti ORDER BY emri LIMIT 8';
$student = $lidhja->prepare($sql);
$student->execute(array(":id_mesues_kushti"=>$id_mesues_kushti));
$student->execute();
$nxirr_te_dhena_student = $student->fetchAll(PDO::FETCH_OBJ);


$sql = 'SELECT * FROM klasa WHERE id_mesues= :id_mesues_kushti';
$klasa = $lidhja->prepare($sql);
$klasa->execute(array(":id_mesues_kushti"=>$id_mesues_kushti));
$klasa->execute();
$nxirr_te_dhena_klasa = $klasa->fetchAll(PDO::FETCH_OBJ);

$sql = 'SELECT * FROM njoftim WHERE id_mesues=:id_mesues_kushti';
$njoftim = $lidhja->prepare($sql);
$njoftim->execute(array(":id_mesues_kushti"=>$id_mesues_kushti));
$njoftim->execute();
$njoftim_te_dhena = $njoftim->fetchAll(PDO::FETCH_OBJ);

$sql = 'SELECT * FROM njoftim WHERE id_mesues=:id_mesues_kushti LIMIT 7';
$njoftim2 = $lidhja->prepare($sql);
$njoftim2->execute(array(":id_mesues_kushti"=>$id_mesues_kushti));
$njoftim2->execute();
$njoftim_te_dhena2 = $njoftim2->fetchAll(PDO::FETCH_OBJ);

$t=time();
?>
<section class="content">
      <!-- Small boxes (Stat box) -->
      <?php foreach($mesuesit as $mesues): ?>
      <div class="callout callout-success">
      <h4>Pershendetje <?= $mesues->emri ?></h4> 
      <?php endforeach; ?>
       <p>
        Keto jane rezultatet nga monitorimi i llogarise tuaj! </p>
     </div>


      <div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo count($nxirr_te_dhena_student, COUNT_RECURSIVE); ?></h3>

              <p>Numri i studenteve</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="lista_studenteve.php" class="small-box-footer">Me shume <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo count($nxirr_te_dhena_student, COUNT_RECURSIVE); ?><sup style="font-size: 20px"></sup></h3>

              <p>Numri i Klasave</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="panel_klas.php" class="small-box-footer">Me shume<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo count($njoftim_te_dhena, COUNT_RECURSIVE); ?><sup style="font-size: 20px"></sup></h3>

              <p>Numri i njoftimeve</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="lista_njoftimeve.php" class="small-box-footer">Me shume <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


        
      </div>
<div class="col-md-6">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Studentet e fundit</h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger"><?php echo count($nxirr_te_dhena_student, COUNT_RECURSIVE);  ?> student</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->

                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    <?php foreach($nxirr_te_dhena_student as $te_dhena_student ): ?>
                    <li>
                      <img style="width: 100px !important; height: 100px !important;" src="foto_student/<?= $te_dhena_student->foto ?>" alt="User Image">
                      <a class="users-list-name" href="profili_student.php?id=<?= $te_dhena_student->id_student ?>"> <?= $te_dhena_student->emri ?></a>
                      <span class="users-list-date"><?= $te_dhena_student->data_regjistrimit ?></span>
                    </li>
                     <?php endforeach; ?>
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">

                  <a href="lista_studenteve.php" class="uppercase">Shiko te gjithe studentet </a>
                </div>
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>

            <div class="col-md-6">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Njoftimet e fundit</h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger"><?php echo(date("Y-m-d",$t)); ?></span>
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

                  <a href="lista_njoftimeve.php" class="uppercase">Shiko te gjitha njoftimet </a>
                </div>
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>



            
            
            
         
 


    </section>

    </div>