<?php
ob_start();
session_start();
require_once("ModelProvim2.php");
require_once("db.php");
$provim = new Provim2();


if(empty($_SESSION['email_student']) and empty($_SESSION['tipi_student']))
{
 header("location:identifikohu.php");
}
$tipi_kushti= $_SESSION['tipi_student'];
$email_kushti = $_SESSION['email_student'];





$sql = "SELECT * FROM student WHERE email ='$email_kushti'";
$lidhjaaa = $lidhja->prepare($sql);
$lidhjaaa->execute();
$studenti = $lidhjaaa->fetchAll(PDO::FETCH_OBJ);








if (isset($_POST['dorezo_provimin'])) {

  $id_student= $_POST['id_student'];
  $id_mesues= $_POST['id_mesues'];
  $emri= $_POST['emri'];
  $mbiemri= $_POST['mbiemri'];
  
  $pyetja_1=$_POST['pyetja_1'];
  $per_1=$_POST['per_1'];
  $pyetja_2=$_POST['pyetja_2'];
  $per_2=$_POST['per_2'];
  $pyetja_3=$_POST['pyetja_3'];
  $per_3=$_POST['per_3'];
  $pyetja_4=$_POST['pyetja_4'];
  $per_4=$_POST['per_4'];
  $pyetja_5=$_POST['pyetja_5'];
  $per_5=$_POST['per_5'];
  $pyetja_6=$_POST['pyetja_6'];
  $per_6=$_POST['per_6'];
  $pyetja_7=$_POST['pyetja_7'];
  $per_7=$_POST['per_7'];
  $pyetja_8=$_POST['pyetja_8'];
  $per_8=$_POST['per_8'];
  $pyetja_9=$_POST['pyetja_9'];
  $per_9=$_POST['per_9'];
  $pyetja_10=$_POST['pyetja_10'];
  $per_10=$_POST['per_10'];
  $pyetja_11=$_POST['pyetja_11'];
  $per_11=$_POST['per_11'];
  $pyetja_12=$_POST['pyetja_12'];
  $per_12=$_POST['per_12'];
  $pyetja_13=$_POST['pyetja_13'];
  $per_13=$_POST['per_13'];
  $pyetja_14=$_POST['pyetja_14'];
  $per_14=$_POST['per_14'];
  $pyetja_15=$_POST['pyetja_15'];
  $per_15=$_POST['per_15'];
  $pyetja_16=$_POST['pyetja_16'];
  $per_16=$_POST['per_16'];
  $pyetja_17=$_POST['pyetja_17'];
  $per_17=$_POST['per_17'];
  $pyetja_18=$_POST['pyetja_18'];
  $per_18=$_POST['per_18'];
  $pyetja_19=$_POST['pyetja_19'];
  $per_19=$_POST['per_19'];
  $pyetja_20=$_POST['pyetja_20'];
  $per_20=$_POST['per_20'];
  $pyetja_21=$_POST['pyetja_21'];
  $per_21=$_POST['per_21'];
  $pyetja_22=$_POST['pyetja_22'];
  $per_22=$_POST['per_22'];
  $pyetja_23=$_POST['pyetja_23'];
  $per_23=$_POST['per_23'];
  $pyetja_24=$_POST['pyetja_24'];
  $per_24=$_POST['per_24'];
  $pyetja_25=$_POST['pyetja_25'];
  $per_25=$_POST['per_25'];
  $pyetja_26=$_POST['pyetja_26'];
  $per_26=$_POST['per_26'];
  $pyetja_27=$_POST['pyetja_27'];
  $per_27=$_POST['per_27'];
  $pyetja_28=$_POST['pyetja_28'];
  $per_28=$_POST['per_28'];
  $pyetja_29=$_POST['pyetja_29'];
  $per_29=$_POST['per_29'];
  $pyetja_30=$_POST['pyetja_30'];
  $per_30=$_POST['per_30'];
  
  
  
  
  $njoftim=null;
  if (empty($id_student)) {
    $njoftim="Nuk pati sukses";
  }
  if (is_null($njoftim)) {
    if ($provim->dorezo_provimin($id_student,$id_mesues,$pyetja_1,$per_1,$pyetja_2,$per_2,$pyetja_3,$per_3,$pyetja_4,$per_4,$pyetja_5,$per_5,$pyetja_6,$per_6,$pyetja_7,$per_7,$pyetja_8,$per_8,$pyetja_9,$per_9,$pyetja_10,$per_10,$pyetja_11,$per_11,$pyetja_12,$per_12,$pyetja_13,$per_13,$pyetja_14,$per_14,$pyetja_15,$per_15,$pyetja_16,$per_16,$pyetja_17,$per_17,$pyetja_18,$per_18,$pyetja_19,$per_19,$pyetja_20,$per_20,$pyetja_21,$per_21,$pyetja_22,$per_22,$pyetja_23,$per_23,$pyetja_24,$per_24,$pyetja_25,$per_25,$pyetja_26,$per_26,$pyetja_27,$per_27,$pyetja_28,$per_28,$pyetja_29,$per_29,$pyetja_30,$per_30,$emri,$mbiemri)) {
      $u_shtu ="Provimi  u dorezua me sukses ";
      header("Location:profili.php");
    }
    
  }

  }



foreach ($studenti as $student) {
   $id_student_kushti= $student->id_klasa; 
}
$sql = 'SELECT * FROM teze_provimi WHERE id_klasa=:id_student_kushti';
$teza = $lidhja->prepare($sql);
$teza->execute(array(":id_student_kushti"=>$id_student_kushti));
$teza->execute();
$teza_te_dhena = $teza->fetchAll(PDO::FETCH_OBJ);

foreach ($studenti as $student) {
   $id_student_kushti= $student->id_student; 
}

$sql = 'SELECT * FROM student WHERE id_student= :id_student_kushti';
$student = $lidhja->prepare($sql);
$student->execute(array(":id_student_kushti"=>$id_student_kushti));
$student->execute();
$nxirr_te_dhena = $student->fetchAll(PDO::FETCH_OBJ);



?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Welcome in your class | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->

  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" type="text/css" href="dist/css/style.css">
  <link rel="stylesheet" type="text/css" href="mystyle/mystyle.css">
  
</head>


<body>
<form method="post" action="">


<?php foreach($nxirr_te_dhena as $te_dhena): ?>
      <input type="hidden" name="emri" value="<?= $te_dhena->emri ?>">

      <input type="hidden" name="mbiemri" value="<?= $te_dhena->mbiemri ?>">
      <?php endforeach; ?>


  <?php foreach($studenti as $student): ?>
      <input type="hidden" name="id_student" value="<?= $student->id_student ?>">
      <?php endforeach; ?>

      <?php foreach($studenti as $student): ?>
      <input type="hidden" name="id_mesues" value="<?= $student->id_mesues ?>">
      <?php endforeach; ?>


<div class="container">
  <h2 style="text-align: center;">Zhvillo provimin</h2><br><br><br><br> 
  <div id="myCarousel" class="carousel " >
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    
  <div class="carousel-inner">
    
      <div class="item active">
         <div style="margin-left: 130px;" class="col-md-8">
            <div class="box box-danger">
              <?php foreach($teza_te_dhena as $te_dhena_teza): ?>
                <div class="box-header with-border">
                   <h3 class="box-title">Pyetja 1</h3><br><br>
                   <h3 style="color: red;" class="box-title"><?= $te_dhena_teza->pyetja1 ?></h3>
                </div>
              <div  class="box-body">
                 <div class="row">
                   <div style="margin: auto;" class="col-xs-4 center-block">
                    <b><textarea name="per_1" style="border:1px solid blue;width: 700px;height: 200px;font-size: 20px;"></textarea></b>
                    <input type="hidden" name="pyetja_1" value="<?= $te_dhena_teza->pyetja1 ?>">
                  </div>
                  
              </div>
            </div>
            
          </div>
        </div>
      </div>


      



      <div class="item">
          <div style="margin-left: 130px;" class="col-md-8">
            <div class="box box-danger">
                <div class="box-header with-border">
                   <h3 class="box-title">Pyetja 2</h3><br><br>
                   <h3 style="color: red;" class="box-title"><?= $te_dhena_teza->pyetja2 ?></h3>
                </div>
              <div  class="box-body">
                 <div class="row">
                   <div style="margin: auto;" class="col-xs-4 center-block">
                    <b><textarea name="per_2" style="border:1px solid blue;width: 700px;height: 200px;font-size: 20px;"></textarea></b>
                    <input type="hidden" name="pyetja_2" value="<?= $te_dhena_teza->pyetja2 ?>">
                  </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    
     <div class="item">
          <div style="margin-left: 130px;" class="col-md-8">
            <div class="box box-danger">
                <div class="box-header with-border">
                   <h3 class="box-title">Pyetja 3</h3><br><br>
                   <h3 style="color: red;" class="box-title"><?= $te_dhena_teza->pyetja3 ?></h3>
                </div>
              <div  class="box-body">
                 <div class="row">
                   <div style="margin: auto;" class="col-xs-4 center-block">
                    <b><textarea name="per_3" style="border:1px solid blue;width: 700px;height: 200px;font-size: 20px;"></textarea></b>
                    <input type="hidden" name="pyetja_3" value="<?= $te_dhena_teza->pyetja3 ?>">
                  </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>

      <div class="item">
          <div style="margin-left: 130px;" class="col-md-8">
            <div class="box box-danger">
                <div class="box-header with-border">
                   <h3 class="box-title">Pyetja 4</h3><br><br>
                   <h3 style="color: red;" class="box-title"><?= $te_dhena_teza->pyetja4 ?></h3>
                </div>
              <div  class="box-body">
                 <div class="row">
                   <div style="margin: auto;" class="col-xs-4 center-block">
                    <b><textarea name="per_4" style="border:1px solid blue;width: 700px;height: 200px;font-size: 20px;"></textarea></b>
                    <input type="hidden" name="pyetja_4" value="<?= $te_dhena_teza->pyetja4 ?>">
                  </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
      
      <div class="item">
          <div style="margin-left: 130px;" class="col-md-8">
            <div class="box box-danger">
                <div class="box-header with-border">
                   <h3 class="box-title">Pyetja 5</h3><br><br>
                   <h3 style="color: red;" class="box-title"><?= $te_dhena_teza->pyetja5 ?></h3>
                </div>
              <div  class="box-body">
                 <div class="row">
                   <div style="margin: auto;" class="col-xs-4 center-block">
                    <b><textarea name="per_5" style="border:1px solid blue;width: 700px;height: 200px;font-size: 20px;"></textarea></b>
                    <input type="hidden" name="pyetja_5" value="<?= $te_dhena_teza->pyetja5 ?>">
                  </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>

      <div class="item">
          <div style="margin-left: 130px;" class="col-md-8">
            <div class="box box-danger">
                <div class="box-header with-border">
                   <h3 class="box-title">Pyetja 6</h3><br><br>
                   <h3 style="color: red;" class="box-title"><?= $te_dhena_teza->pyetja6 ?></h3>
                </div>
              <div  class="box-body">
                 <div class="row">
                   <div style="margin: auto;" class="col-xs-4 center-block">
                    <b><textarea name="per_6" style="border:1px solid blue;width: 700px;height: 200px;font-size: 20px;"></textarea></b>
                    <input type="hidden" name="pyetja_6" value="<?= $te_dhena_teza->pyetja6 ?>">
                  </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>

      <div class="item">
          <div style="margin-left: 130px;" class="col-md-8">
            <div class="box box-danger">
                <div class="box-header with-border">
                   <h3 class="box-title">Pyetja 7</h3><br><br>
                   <h3 style="color: red;" class="box-title"><?= $te_dhena_teza->pyetja7 ?></h3>
                </div>
              <div  class="box-body">
                 <div class="row">
                   <div style="margin: auto;" class="col-xs-4 center-block">
                    <b><textarea name="per_7" style="border:1px solid blue;width: 700px;height: 200px;font-size: 20px;"></textarea></b>
                    <input type="hidden" name="pyetja_7" value="<?= $te_dhena_teza->pyetja7 ?>">
                  </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>

      <div class="item">
          <div style="margin-left: 130px;" class="col-md-8">
            <div class="box box-danger">
                <div class="box-header with-border">
                   <h3 class="box-title">Pyetja 8</h3><br><br>
                   <h3 style="color: red;" class="box-title"><?= $te_dhena_teza->pyetja8 ?></h3>
                </div>
              <div  class="box-body">
                 <div class="row">
                   <div style="margin: auto;" class="col-xs-4 center-block">
                    <b><textarea name="per_8" style="border:1px solid blue;width: 700px;height: 200px;font-size: 20px;"></textarea></b>
                    <input type="hidden" name="pyetja_8" value="<?= $te_dhena_teza->pyetja8 ?>">
                  </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>

      <div class="item">
          <div style="margin-left: 130px;" class="col-md-8">
            <div class="box box-danger">
                <div class="box-header with-border">
                   <h3 class="box-title">Pyetja 9</h3><br><br>
                   <h3 style="color: red;" class="box-title"><?= $te_dhena_teza->pyetja9 ?></h3>
                </div>
              <div  class="box-body">
                 <div class="row">
                   <div style="margin: auto;" class="col-xs-4 center-block">
                    <b><textarea name="per_9" style="border:1px solid blue;width: 700px;height: 200px;font-size: 20px;"></textarea></b>
                    <input type="hidden" name="pyetja_9" value="<?= $te_dhena_teza->pyetja9 ?>">
                  </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>


      <div class="item">
          <div style="margin-left: 130px;" class="col-md-8">
            <div class="box box-danger">
                <div class="box-header with-border">
                   <h3 class="box-title">Pyetja 10</h3><br><br>
                   <h3 style="color: red;" class="box-title"><?= $te_dhena_teza->pyetja10 ?></h3>
                </div>
              <div  class="box-body">
                 <div class="row">
                   <div style="margin: auto;" class="col-xs-4 center-block">
                    <b><textarea name="per_10" style="border:1px solid blue;width: 700px;height: 200px;font-size: 20px;"></textarea></b>
                    <input type="hidden" name="pyetja_10" value="<?= $te_dhena_teza->pyetja10 ?>">
                  </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>


      <div class="item">
          <div style="margin-left: 130px;" class="col-md-8">
            <div class="box box-danger">
                <div class="box-header with-border">
                   <h3 class="box-title">Pyetja 11</h3><br><br>
                   <h3 style="color: red;" class="box-title"><?= $te_dhena_teza->pyetja11 ?></h3>
                </div>
              <div  class="box-body">
                 <div class="row">
                   <div style="margin: auto;" class="col-xs-4 center-block">
                    <b><textarea name="per_11" style="border:1px solid blue;width: 700px;height: 200px;font-size: 20px;"></textarea></b>
                    <input type="hidden" name="pyetja_11" value="<?= $te_dhena_teza->pyetja11 ?>">
                  </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>


      <div class="item">
          <div style="margin-left: 130px;" class="col-md-8">
            <div class="box box-danger">
                <div class="box-header with-border">
                   <h3 class="box-title">Pyetja 12</h3><br><br>
                   <h3 style="color: red;" class="box-title"><?= $te_dhena_teza->pyetja12 ?></h3>
                </div>
              <div  class="box-body">
                 <div class="row">
                   <div style="margin: auto;" class="col-xs-4 center-block">
                    <b><textarea name="per_12" style="border:1px solid blue;width: 700px;height: 200px;font-size: 20px;"></textarea></b>
                    <input type="hidden" name="pyetja_12" value="<?= $te_dhena_teza->pyetja12 ?>">
                  </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>


      <div class="item">
          <div style="margin-left: 130px;" class="col-md-8">
            <div class="box box-danger">
                <div class="box-header with-border">
                   <h3 class="box-title">Pyetja 13</h3><br><br>
                   <h3 style="color: red;" class="box-title"><?= $te_dhena_teza->pyetja13 ?></h3>
                </div>
              <div  class="box-body">
                 <div class="row">
                   <div style="margin: auto;" class="col-xs-4 center-block">
                    <b><textarea name="per_13" style="border:1px solid blue;width: 700px;height: 200px;font-size: 20px;"></textarea></b>
                    <input type="hidden" name="pyetja_13" value="<?= $te_dhena_teza->pyetja13 ?>">
                  </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>


      <div class="item">
          <div style="margin-left: 130px;" class="col-md-8">
            <div class="box box-danger">
                <div class="box-header with-border">
                   <h3 class="box-title">Pyetja 14</h3><br><br>
                   <h3 style="color: red;" class="box-title"><?= $te_dhena_teza->pyetja14 ?></h3>
                </div>
              <div  class="box-body">
                 <div class="row">
                   <div style="margin: auto;" class="col-xs-4 center-block">
                    <b><textarea name="per_14" style="border:1px solid blue;width: 700px;height: 200px;font-size: 20px;"></textarea></b>
                    <input type="hidden" name="pyetja_14" value="<?= $te_dhena_teza->pyetja14 ?>">
                  </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>


      <div class="item">
          <div style="margin-left: 130px;" class="col-md-8">
            <div class="box box-danger">
                <div class="box-header with-border">
                   <h3 class="box-title">Pyetja 15</h3><br><br>
                   <h3 style="color: red;" class="box-title"><?= $te_dhena_teza->pyetja15 ?></h3>
                </div>
              <div  class="box-body">
                 <div class="row">
                   <div style="margin: auto;" class="col-xs-4 center-block">
                    <b><textarea name="per_15" style="border:1px solid blue;width: 700px;height: 200px;font-size: 20px;"></textarea></b>
                    <input type="hidden" name="pyetja_15" value="<?= $te_dhena_teza->pyetja15 ?>">
                  </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>


      <div class="item">
          <div style="margin-left: 130px;" class="col-md-8">
            <div class="box box-danger">
                <div class="box-header with-border">
                   <h3 class="box-title">Pyetja 16</h3><br><br>
                   <h3 style="color: red;" class="box-title"><?= $te_dhena_teza->pyetja16 ?></h3>
                </div>
              <div  class="box-body">
                 <div class="row">
                   <div style="margin: auto;" class="col-xs-4 center-block">
                    <b><textarea name="per_16" style="border:1px solid blue;width: 700px;height: 200px;font-size: 20px;"></textarea></b>
                    <input type="hidden" name="pyetja_16" value="<?= $te_dhena_teza->pyetja16 ?>">
                  </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>


      <div class="item">
          <div style="margin-left: 130px;" class="col-md-8">
            <div class="box box-danger">
                <div class="box-header with-border">
                   <h3 class="box-title">Pyetja 17</h3><br><br>
                   <h3 style="color: red;" class="box-title"><?= $te_dhena_teza->pyetja17 ?></h3>
                </div>
              <div  class="box-body">
                 <div class="row">
                   <div style="margin: auto;" class="col-xs-4 center-block">
                    <b><textarea name="per_17" style="border:1px solid blue;width: 700px;height: 200px;font-size: 20px;"></textarea></b>
                    <input type="hidden" name="pyetja_17" value="<?= $te_dhena_teza->pyetja17 ?>">
                  </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>


      <div class="item">
          <div style="margin-left: 130px;" class="col-md-8">
            <div class="box box-danger">
                <div class="box-header with-border">
                   <h3 class="box-title">Pyetja 18</h3><br><br>
                   <h3 style="color: red;" class="box-title"><?= $te_dhena_teza->pyetja18 ?></h3>
                </div>
              <div  class="box-body">
                 <div class="row">
                   <div style="margin: auto;" class="col-xs-4 center-block">
                    <b><textarea name="per_18" style="border:1px solid blue;width: 700px;height: 200px;font-size: 20px;"></textarea></b>
                    <input type="hidden" name="pyetja_18" value="<?= $te_dhena_teza->pyetja18 ?>">
                  </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>


      <div class="item">
          <div style="margin-left: 130px;" class="col-md-8">
            <div class="box box-danger">
                <div class="box-header with-border">
                   <h3 class="box-title">Pyetja 19</h3><br><br>
                   <h3 style="color: red;" class="box-title"><?= $te_dhena_teza->pyetja19 ?></h3>
                </div>
              <div  class="box-body">
                 <div class="row">
                   <div style="margin: auto;" class="col-xs-4 center-block">
                    <b><textarea name="per_19" style="border:1px solid blue;width: 700px;height: 200px;font-size: 20px;"></textarea></b>
                    <input type="hidden" name="pyetja_19" <?= $te_dhena_teza->pyetja19 ?>>
                  </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>


      <div class="item">
          <div style="margin-left: 130px;" class="col-md-8">
            <div class="box box-danger">
                <div class="box-header with-border">
                   <h3 class="box-title">Pyetja 20</h3><br><br>
                   <h3 style="color: red;" class="box-title"><?= $te_dhena_teza->pyetja20 ?></h3>
                </div>
              <div  class="box-body">
                 <div class="row">
                   <div style="margin: auto;" class="col-xs-4 center-block">
                    <b><textarea name="per_20" style="border:1px solid blue;width: 700px;height: 200px;font-size: 20px;"></textarea></b>
                    <input type="hidden" name="pyetja_20" value="<?= $te_dhena_teza->pyetja20 ?>">
                  </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>


      <div class="item">
          <div style="margin-left: 130px;" class="col-md-8">
            <div class="box box-danger">
                <div class="box-header with-border">
                   <h3 class="box-title">Pyetja 21</h3><br><br>
                   <h3 style="color: red;" class="box-title"><?= $te_dhena_teza->pyetja21 ?></h3>
                </div>
              <div  class="box-body">
                 <div class="row">
                   <div style="margin: auto;" class="col-xs-4 center-block">
                    <b><textarea name="per_21" style="border:1px solid blue;width: 700px;height: 200px;font-size: 20px;"></textarea></b>
                    <input type="hidden" name="pyetja_21" value="<?= $te_dhena_teza->pyetja21 ?>">
                  </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>


      <div class="item">
          <div style="margin-left: 130px;" class="col-md-8">
            <div class="box box-danger">
                <div class="box-header with-border">
                   <h3 class="box-title">Pyetja 22</h3><br><br>
                   <h3 style="color: red;" class="box-title"><?= $te_dhena_teza->pyetja22 ?></h3>
                </div>
              <div  class="box-body">
                 <div class="row">
                   <div style="margin: auto;" class="col-xs-4 center-block">
                    <b><textarea name="per_22" style="border:1px solid blue;width: 700px;height: 200px;font-size: 20px;"></textarea></b>
                    <input type="hidden" name="pyetja_22" value="<?= $te_dhena_teza->pyetja22 ?>">
                  </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>


      <div class="item">
          <div style="margin-left: 130px;" class="col-md-8">
            <div class="box box-danger">
                <div class="box-header with-border">
                   <h3 class="box-title">Pyetja 23</h3><br><br>
                   <h3 style="color: red;" class="box-title"><?= $te_dhena_teza->pyetja23 ?></h3>
                </div>
              <div  class="box-body">
                 <div class="row">
                   <div style="margin: auto;" class="col-xs-4 center-block">
                    <b><textarea name="per_23" style="border:1px solid blue;width: 700px;height: 200px;font-size: 20px;"></textarea></b>
                    <input type="hidden" name="pyetja_23" value="<?= $te_dhena_teza->pyetja23 ?>">
                  </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>


      <div class="item">
          <div style="margin-left: 130px;" class="col-md-8">
            <div class="box box-danger">
                <div class="box-header with-border">
                   <h3 class="box-title">Pyetja 24</h3><br><br>
                   <h3 style="color: red;" class="box-title"><?= $te_dhena_teza->pyetja24 ?></h3>
                </div>
              <div  class="box-body">
                 <div class="row">
                   <div style="margin: auto;" class="col-xs-4 center-block">
                    <b><textarea name="per_24" style="border:1px solid blue;width: 700px;height: 200px;font-size: 20px;"></textarea></b>
                    <input type="hidden" name="pyetja_24" value="<?= $te_dhena_teza->pyetja24 ?>">
                  </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>


      <div class="item">
          <div style="margin-left: 130px;" class="col-md-8">
            <div class="box box-danger">
                <div class="box-header with-border">
                   <h3 class="box-title">Pyetja 25</h3><br><br>
                   <h3 style="color: red;" class="box-title"><?= $te_dhena_teza->pyetja25 ?></h3>
                </div>
              <div  class="box-body">
                 <div class="row">
                   <div style="margin: auto;" class="col-xs-4 center-block">
                    <b><textarea name="per_25" style="border:1px solid blue;width: 700px;height: 200px;font-size: 20px;"></textarea></b>
                    <input type="hidden" name="pyetja_25" value="<?= $te_dhena_teza->pyetja25 ?>">
                  </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>


      <div class="item">
          <div style="margin-left: 130px;" class="col-md-8">
            <div class="box box-danger">
                <div class="box-header with-border">
                   <h3 class="box-title">Pyetja 26</h3><br><br>
                   <h3 style="color: red;" class="box-title"><?= $te_dhena_teza->pyetja26 ?></h3>
                </div>
              <div  class="box-body">
                 <div class="row">
                   <div style="margin: auto;" class="col-xs-4 center-block">
                    <b><textarea name="per_26" style="border:1px solid blue;width: 700px;height: 200px;font-size: 20px;"></textarea></b>
                    <input type="hidden" name="pyetja_26" value="<?= $te_dhena_teza->pyetja26 ?>">
                  </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>


      <div class="item">
          <div style="margin-left: 130px;" class="col-md-8">
            <div class="box box-danger">
                <div class="box-header with-border">
                   <h3 class="box-title">Pyetja 27</h3><br><br>
                   <h3 style="color: red;" class="box-title"><?= $te_dhena_teza->pyetja27 ?></h3>
                </div>
              <div  class="box-body">
                 <div class="row">
                   <div style="margin: auto;" class="col-xs-4 center-block">
                    <b><textarea name="per_27" style="border:1px solid blue;width: 700px;height: 200px;font-size: 20px;"></textarea></b>
                    <input type="hidden" name="pyetja_27" value="<?= $te_dhena_teza->pyetja27 ?>">
                  </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>


      <div class="item">
          <div style="margin-left: 130px;" class="col-md-8">
            <div class="box box-danger">
                <div class="box-header with-border">
                   <h3 class="box-title">Pyetja 28</h3><br><br>
                   <h3 style="color: red;" class="box-title"><?= $te_dhena_teza->pyetja28 ?></h3>
                </div>
              <div  class="box-body">
                 <div class="row">
                   <div style="margin: auto;" class="col-xs-4 center-block">
                    <b><textarea name="per_28" style="border:1px solid blue;width: 700px;height: 200px;font-size: 20px;"></textarea></b>
                    <input type="hidden" name="pyetja_28" value="<?= $te_dhena_teza->pyetja28 ?>">
                  </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>


      <div class="item">
          <div style="margin-left: 130px;" class="col-md-8">
            <div class="box box-danger">
                <div class="box-header with-border">
                   <h3 class="box-title">Pyetja 29</h3><br><br>
                   <h3 style="color: red;" class="box-title"><?= $te_dhena_teza->pyetja29 ?></h3>
                </div>
              <div  class="box-body">
                 <div class="row">
                   <div style="margin: auto;" class="col-xs-4 center-block">
                    <b><textarea name="per_29" style="border:1px solid blue;width: 700px;height: 200px;font-size: 20px;"></textarea></b>
                    <input type="hidden" name="pyetja_29" value="<?= $te_dhena_teza->pyetja29 ?>">
                  </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>


      <div class="item">
          <div style="margin-left: 130px;" class="col-md-8">
            <div class="box box-danger">
                <div class="box-header with-border">
                   <h3 class="box-title">Pyetja 30</h3><br><br>
                   <h3 style="color: red;" class="box-title"><?= $te_dhena_teza->pyetja30 ?></h3>
                </div>
              <div  class="box-body">
                 <div class="row">
                   <div style="margin: auto;" class="col-xs-4 center-block">
                    <b><textarea name="per_30" style="border:1px solid blue;width: 700px;height: 200px;font-size: 20px;"></textarea></b>
                    <input type="hidden" name="pyetja_30" value="<?= $te_dhena_teza->pyetja30 ?>">
                  </div>
                  <?php endforeach; ?>

              </div>
            </div>
            <button type="submit" name="dorezo_provimin" style="float: right;">Dorezo Provimin</button>
            
          </div>
          
        </div>
      </div>
      

</form>
      



    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

    <!-- Left and right controls -->
    
  </div>
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span style="color: red;" class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Pyetja e meparshme</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span style="color: green;" class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only" title="Pyetja tjeter">Pyetja tjeter</span>
    </a>
</div>

</body>






<script type="text/javascript">
  addEventListener("click", function() {
    var
          el = document.documentElement
        , rfs =
               el.requestFullScreen
            || el.webkitRequestFullScreen
            || el.mozRequestFullScreen
    ;
    rfs.call(el);
});
</script>

<script type="text/javascript">
  $('input,textarea').bind('cut copy paste', function (e) {
    e.preventDefault(); //disable cut,copy,paste
});
</script>





  
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
