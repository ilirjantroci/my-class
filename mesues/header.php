<?php
require 'db.php';
ob_start();
session_start();
if(empty($_SESSION['email']) and empty($_SESSION['tipi']))
{
 header("location:identifikohu.php");
}
$tipi_kushti= $_SESSION['tipi'];
$email_kushti = $_SESSION['email'];





$sql = "SELECT * FROM mesues WHERE email ='$email_kushti'";
$lidhjaaa = $lidhja->prepare($sql);
$lidhjaaa->execute();
$mesuesit = $lidhjaaa->fetchAll(PDO::FETCH_OBJ);

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
            <?php foreach($mesuesit as $mesues): ?>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="upload/<?= $mesues->foto ?>" class="user-image" alt="User Image">
               
              <span class="hidden-xs"><?= $mesues->emri ?></span>
            
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="upload/<?= $mesues->foto ?>" class="img-circle" >

                
                
                  <p>
                    <?= $mesues->emri ?>
                    <?= $mesues->mbiemri ?>

                  <small>Regjistruar me : <?= $mesues->data_regjistrimit ?></small>
                </p>
                
                
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Klasat</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Studentet</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Njoftimet</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="llogaria_mesues.php" class="btn btn-default btn-flat"><i class="fa fa-user"></i>Profili</a>
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
          <img src="upload/<?= $mesues->foto ?>"  class="img-circle" >
        </div>
        <div class="pull-left info">
          <p><?= $mesues->emri ?>       <?= $mesues->mbiemri ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Aktiv</a>
        </div><br><br>
      </div>
      <?php endforeach; ?>
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
            
            <li><a href="llogaria_mesues.php"><i class="fa fa-cog"></i>Llogaria</a></li>
            <li><a href="#seshpejti"><i class="fa fa-sign-out"></i>Shkycu</a></li>
          </ul>
        </li>
        
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Klasa</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="lista_klasave.php"><i class="fa fa-list"></i> Klasat</a></li>
            <li><a href="krijo_klase.php"><i class="fa fa-plus"></i> Krijo Klase</a></li>
            
            <li><a href="panel_klas.php"><i class="fa fa-cog"></i> Panel Klase</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-graduation-cap"></i>
            <span>Student</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="lista_studenteve.php"><i class="fa fa-list"></i> Studentet</a></li>
            <li><a href="shto_student.php"><i class="fa fa-plus"></i> Shto student</a></li>
            <li><a href="studentet_data.php"><i class="fa fa-cog"></i>Panel Student</a></li>
            
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
            <li><a href="krijo_grafik_notash.php"><i class="fa fa-plus-circle"></i> Shto nje grafik</a></li>
            
            
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Orari Mesimor</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="krijo_orar_mesimor.php"><i class="fa fa-plus"></i> Krijo Orarin </a></li>
            <li><a href="shiko_orarin.php"><i class="fa fa-eye"></i>Menaxho oraret</a></li>
            
          </ul>
        </li>
        
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-bell-o"></i> <span>Njoftime</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="krijo_njoftim.php"><i class="fa fa-plus"></i>Krijo Njoftim</a></li>
            <li><a href="lista_njoftimeve.php"><i class="fa fa-list"></i>Menaxho njoftimet</a></li>
            
            
          </ul>
        </li>

        <li class="treeview">
          <a href="">
            <i class="fa fa-file"></i> <span>Materiale</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="ngarko_materiale.php"><i class="fa fa-plus"></i>Ngarko materiale</a></li>
            <li><a href="materiale.php"><i class="fa fa-list"></i>Menaxho materialet</a></li>
            
            
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Provime teorike</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="krijo_teze.php"><i class="fa fa-plus"></i>Krijo nje teze</a></li>
            <li><a href="teze.php"><i class="fa fa-list"></i>Menaxho tezat</a></li>

            <li><a href="tezat_e_dorezuara.php"><i class="fa fa-list"></i>Tezat e dorezuara</a></li>
            
            
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