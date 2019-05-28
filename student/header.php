<?php
require 'db.php';
ob_start();
session_start();
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
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>My</b>CLS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>My</b>Class</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <?php foreach($studenti as $student): ?>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../mesues/foto_student/<?= $student->foto ?>" class="user-image" >
               
              <span class="hidden-xs"><?= $student->emri ?></span>
            
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../mesues/foto_student/<?= $student->foto ?>" class="img-circle" >

                
                
                  <p>
                    <?= $student->emri ?>  <?= $student->mbiemri ?>

                  <small>Regjistruar me : <?= $student->data_regjistrimit ?></small>
                </p>
                
                
              </li>
              
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profili.php" class="btn btn-default btn-flat"><i class="fa fa-user"></i>Profili</a>
                </div>
                <div class="pull-right">
                  <a href="shkycu.php" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i>Shkycu</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../mesues/foto_student/<?= $student->foto ?>"  class="img-circle" >
        </div>
        <div class="pull-left info">
          <p><?= $student->emri ?>  <?= $student->mbiemri ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Aktiv</a>
        </div><br><br>
      </div>
      <?php endforeach;  ?>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">LEVIZ POSHTE</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Faqja Kryesore</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            
            <li><a href="profili.php"><i class="fa fa-cog"></i>Profili</a></li>
            <li><a href="shkycu.php"><i class="fa fa-sign-out"></i>Shkycu</a></li>
          </ul>
        </li>
        
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-bell"></i>
            <span>Njoftime</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="njoftime.php"><i class="fa fa-list"></i> Lexo njoftime</a></li>
            
            
            
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-th-large"></i>
            <span>Orari</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="orari_mesimor.php"><i class="fa fa-list"></i> Orari mesimor</a></li>
            
            
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-bar-chart"></i> <span>Grafik Notash</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           
            <li><a href="shiko_grafikun_notave.php"><i class="fa fa-eye"></i> Shiko grafikun e notave</a></li>
            
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-file"></i>
            <span>Materiale</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="materiale.php"><i class="fa fa-eye"></i>Shiko materiale</a></li>
           </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i>
            <span>Provim teorik</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="zhvillo_provimin.php"><i class="fa fa-laptop"></i>Jep provimin  <i class="fa fa-sign-out"></i></a></li>

            
            
            
          </ul>
        </li>


        
        
        
        
        
        <li class="header">Opsione tjera</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Manual Perdorimi</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Raporto</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Kontakt</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        My class
        <small>Paneli Administrimit</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Faqja kryesore</a></li>
        <li class="active">Platforme Multifunksionale</li>
      </ol>
    </section>

    
    <!-- /.content -->
  
  <!-- /.content-wrapper -->