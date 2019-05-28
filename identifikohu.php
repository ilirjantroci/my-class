<?php
require 'db2.php';
session_start();
//identifikimi i mesuesit
if (isset($_POST['dergo'])) {

$email = $_POST['email'];
$fjalekalimi = $_POST['fjalekalimi'];
$fjalekalimi_security = hash('sha256', $fjalekalimi);
$tipi =$_POST['tipi'];
$lani = $lidhja->prepare("SELECT * FROM mesues WHERE email='$email' and fjalekalimi='$fjalekalimi_security' and tipi='$tipi'");
 $lani->setFetchMode(PDO::FETCH_ASSOC);
 $lani->execute();
 $data=$lani->fetch();
 if($data['email']!=$email and $data['fjalekalimi']!=$fjalekalimi_security and $data['tipi']!=$tipi)
 {
  
  $njoftim = "Te dhenat qe futet jane gabim! <br> Emaili ose fjalekalimi nuk eshte i sakte!";
 
 }
 elseif($data['email']==$email and $data['fjalekalimi']==$fjalekalimi_security and $data['tipi']==$tipi)
 {
    

        $_SESSION['email']=$data['email'];
        $_SESSION['tipi']=$data['tipi'];
        header("location:mesues/"); 
 
 }
 


}

if (isset($_POST['log_student'])) {
    $email_student=$_POST['email_student'];
    $fjalekalimi_student=$_POST['fjalekalimi_student'];
    $fjalekalimi_sec = hash('sha256', $fjalekalimi_student);
    $tipi_student=$_POST['tipi_student'];

    $lani2 = $lidhja->prepare("SELECT * FROM student WHERE email='$email_student' and fjalekalimi='$fjalekalimi_sec' and tipi='$tipi_student'");
 $lani2->setFetchMode(PDO::FETCH_ASSOC);
 $lani2->execute();
 $data2=$lani2->fetch();
 if($data2['email']!=$email_student and $data2['fjalekalimi']!=$fjalekalimi_sec and $data2['tipi']!=$tipi_student)
 {
  
  $njoftim = "Te dhenat qe futet jane gabim! <br> Emaili ose fjalekalimi nuk eshte i sakte!";
 
 }
 elseif($data2['email']==$email_student and $data2['fjalekalimi']==$fjalekalimi_sec and $data2['tipi']==$tipi_student)
 {
    

        $_SESSION['email_student']=$data2['email'];
        $_SESSION['tipi_student']=$data2['tipi'];
        header("location:student/"); 
 
 }
}

?>



<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" type="text/javascript"></script>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <title></title>
        <style>
        body {
            background: #360033;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #0b8793, #360033);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #0b8793, #360033); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        }
         .btnContactSubmit {
    width: 45%;
    border-radius: 1rem;
    padding: 1.5%;
    color: #fff;
    background-color: #0062cc;
    border: none;
    cursor: pointer;
    margin-right: 4%;
    background-color: white;
    color: blue;
    margin-top: 4%;

}
.register .nav-tabs .nav-link:hover{
    border: none;
}
.text-align{
    margin-top: -3%;
    margin-bottom: -9%;

    padding: 10%;
    margin-left: 30%;
}
.form-new{
    margin-right: 22%;
    margin-left: 20%;
}
.register-heading{
    margin-left: 21%;
    margin-bottom: 10%;
    color: #e9ecef;
}
.register-heading h1{
    margin-left: 21%;
    margin-bottom: 10%;
    color: #e9ecef;
}
.btnLoginSubmit{
    border: none;
    padding: 2%;
    width: 25%;
    cursor: pointer;
    background: #29abe2;
    color: #fff;
}
.btnForgetPwd{
    cursor: pointer;
    margin-right: 5%;
    color: #f8f9fa;



}


.register{
    margin-top: 10%;
    padding: 3%;
    border-radius: 2.5rem;

}
.nav-tabs .nav-link{
    border: 1px solid transparent;
    border-top-left-radius: .25rem;
    border-top-right-radius: .25rem;
    color: white;
}


            
        </style>
    </head>
    <body>
        
        <div class="container register">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">MESUES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">STUDENT</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active text-align form-new" id="home" role="tabpanel" aria-labelledby="home-tab">
                           
                            <h3 class="register-heading">Identifikohu ne sistem si mesues</h3>
                            <div class="row register-form">
                                <div class="col-md-12">
                                    <form method="post">
                                        <div class="form-group">
                                            <p><span class="fa fa-user"></span><input type="text" name="email" class="form-control" placeholder="Emaili juaj" value="" required=""/></p>
                                        </div>
                                        <input type="hidden" name="tipi" value="1">
                                        <div class="form-group">
                                            <input type="password" name="fjalekalimi" class="form-control" placeholder="Fjalekalimi juaj" value="" required=""/>
                                        </div>
                                        <div class="form-group" id="helloform1">
                                            <input type="submit" name="dergo" class="btnContactSubmit" value="Identifikohu" />
                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade show text-align form-new" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <h3  class="register-heading">Identifikohu ne sistem si nxenes</h3>
                            <div class="row register-form">
                                <div class="col-md-12">
                                    <form method="post">
                                        <div class="form-group">
                                            <input type="text" name="email_student" class="form-control" placeholder="Emaili juaj" value="" required="" />
                                        </div>
                                        <input type="hidden" name="tipi_student" value="2">
                                        <div class="form-group">
                                            <input type="password" name="fjalekalimi_student" class="form-control" placeholder="Fjalekalimi juaj" value="" required=""/>
                                        </div>
                                        <div class="form-group" id="helloform1">
                                            <input type="submit" name="log_student" class="btnContactSubmit" value="Identifikohu" />
                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>