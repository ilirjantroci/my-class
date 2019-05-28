<?php
include "header.php";
require_once("ModelProvim.php");
require_once("db.php");
$teze = new Provim();


$id = $_GET['id'];
$sql = "SELECT * FROM teze_provimi WHERE id_provim=:id";
$teze = $lidhja->prepare($sql);
$teze->execute(array(":id"=>$id));
$teze->execute();
$teze_te_dhena = $teze->fetchAll(PDO::FETCH_OBJ);

foreach ($mesuesit as $mesues) {
   $id_mesues_kushti= $mesues->id_mesues; 
}

if (isset($_POST['modifiko_teze'])) {

  $id_mesues= $_POST['id_mesues'];
  $id_klasa= $_POST['klasa_perkatese'];
  $emri=$_POST['emri'];
  $pyetja1=$_POST['pyetja1'];
  $pyetja2=$_POST['pyetja2'];
  $pyetja3=$_POST['pyetja3'];
  $pyetja4=$_POST['pyetja4'];
  $pyetja6=$_POST['pyetja6'];
  $pyetja7=$_POST['pyetja7'];
  $pyetja8=$_POST['pyetja8'];
  $pyetja9=$_POST['pyetja9'];
  $pyetja10=$_POST['pyetja10'];
  $pyetja11=$_POST['pyetja11'];
  $pyetja12=$_POST['pyetja12'];
  $pyetja13=$_POST['pyetja13'];
  $pyetja14=$_POST['pyetja14'];
  $pyetja15=$_POST['pyetja15'];
  $pyetja16=$_POST['pyetja16'];
  $pyetja17=$_POST['pyetja17'];
  $pyetja18=$_POST['pyetja18'];
  $pyetja19=$_POST['pyetja19'];
  $pyetja20=$_POST['pyetja20'];
  $pyetja21=$_POST['pyetja21'];
  $pyetja22=$_POST['pyetja22'];
  $pyetja23=$_POST['pyetja23'];
  $pyetja24=$_POST['pyetja24'];
  $pyetja25=$_POST['pyetja25'];
  $pyetja26=$_POST['pyetja26'];
  $pyetja27=$_POST['pyetja27'];
  $pyetja28=$_POST['pyetja28'];
  $pyetja29=$_POST['pyetja29'];
  $pyetja30=$_POST['pyetja30'];
  
  $sql1 = "UPDATE teze_provimi SET id_klasa=:id_klasa, pyetja1=:pyetja1,pyetja2=:pyetja2,pyetja3=:pyetja3,pyetja4=:pyetja4,pyetja5=:pyetja5,pyetja6=:pyetja6,pyetja7=:pyetja7,pyetja8=:pyetja8,pyetja9=:pyetja9,pyetja10=:pyetja10,pyetja11=:pyetja11,pyetja12=:pyetja12,pyetja13=:pyetja13,pyetja14=:pyetja14,pyetja15=:pyetja15,pyetja16=:pyetja16,pyetja17=:pyetja17,pyetja18=:pyetja18,pyetja19=:pyetja19,pyetja20=:pyetja20,pyetja21=:pyetja21,pyetja22=:pyetja22,pyetja23=:pyetja23,pyetja24=:pyetja24,pyetja25=:pyetja25,pyetja26=:pyetja26,pyetja27=:pyetja27,pyetja28=:pyetja28,pyetja29=:pyetja29,pyetja30=:pyetja30 WHERE id_provim='$id' and WHERE id_mesues='$id_mesues_kushti'";

      $edito = $lidhja->prepare($sql1);
      $edito->bindparam(":id_klasa",$id_klasa);
      $edito->bindparam(":pyetja1",$pyetja1);
      $edito->bindparam(":pyetja2",$pyetja2);
      $edito->bindparam(":pyetja3",$pyetja3);
      $edito->bindparam(":pyetja4",$pyetja4);
      $edito->bindparam(":pyetja5",$pyetja5);
      $edito->bindparam(":pyetja6",$pyetja6);
      $edito->bindparam(":pyetja7",$pyetja7);
      $edito->bindparam(":pyetja8",$pyetja8);
      $edito->bindparam(":pyetja9",$pyetja9);
      $edito->bindparam(":pyetja10",$pyetja10);
      $edito->bindparam(":pyetja11",$pyetja11);
      $edito->bindparam(":pyetja12",$pyetja12);
      $edito->bindparam(":pyetja13",$pyetja13);
      $edito->bindparam(":pyetja14",$pyetja14);
      $edito->bindparam(":pyetja15",$pyetja15);
      $edito->bindparam(":pyetja16",$pyetja16);
      $edito->bindparam(":pyetja17",$pyetja17);
      $edito->bindparam(":pyetja18",$pyetja18);
      $edito->bindparam(":pyetja19",$pyetja19);
      $edito->bindparam(":pyetja20",$pyetja20);
      $edito->bindparam(":pyetja21",$pyetja21);
      $edito->bindparam(":pyetja22",$pyetja22);
      $edito->bindparam(":pyetja23",$pyetja23);
      $edito->bindparam(":pyetja24",$pyetja24);
      $edito->bindparam(":pyetja25",$pyetja25);
      $edito->bindparam(":pyetja26",$pyetja26);
      $edito->bindparam(":pyetja27",$pyetja27);
      $edito->bindparam(":pyetja28",$pyetja28);
      $edito->bindparam(":pyetja29",$pyetja29);
      $edito->bindparam(":pyetja30",$pyetja30);
      $edito->execute();
      $u_shtua="Modifikimi u be me sukses";
      header("Location:teze.php");


  }




foreach ($mesuesit as $mesues) {
   $id_mesues_kushti= $mesues->id_mesues; 
}

$sql = 'SELECT * FROM klasa WHERE id_mesues= :id_mesues_kushti';
$klasa = $lidhja->prepare($sql);
$klasa->execute(array(":id_mesues_kushti"=>$id_mesues_kushti));
$klasa->execute();
$nxirr_te_dhena = $klasa->fetchAll(PDO::FETCH_OBJ);

?>
<section class="content">
<!--Shkruaj kod per kete sesion-->
    <div class="callout callout-success">
      <h4>Modifikoni tezen e provimit ose caktivizojeni ate</h4> 
       <p>
        Ne kete sension mund te modifikoni tezen e provimit ose ta caktiviozoni ate.Nese e caktivizoni tezen ,ajo nuk do vlej per asnje klase deri sa ta aktivizoni serish ose mund te zgjidhni nje klase tjeter per kete teze provimi</p>
    </div>
<div class="container">
              <div class="col-md-8">
              	
              	<form method="post" action="">
                  
              	<label for="password2"><h4>Zgjidhni klasen perkatese per kete teze provimi</h4></label>
                 <select name="klasa_perkatese" class="form-control">
                    <?php foreach($nxirr_te_dhena as $te_dhena): ?>
                      <option>Zgjidhni klasen ose caktivizoni tezen</option>
                      <option value="0">Caktivizo!</option>
                  <option value="<?= $te_dhena->id_klasa ?>"><?= $te_dhena->emri ?></option>
                     <?php endforeach; ?>
                  </select>
                  <?php foreach($teze_te_dhena as $te_dhena_teze ): ?>

                  <label for="password2"><h4>Emri i tezes</h4></label>
                 
                    <input style="border:1px solid #9409DE;" type="text" class="form-control" name="emri" value="<?= $te_dhena_teze->emri ?>" id="password2">
                    <?php endforeach; ?>

                  <?php foreach($mesuesit as $mesues): ?>
                          <input type="hidden" name="id_mesues" value="<?= $mesues->id_mesues ?>">
                      <?php endforeach; ?>
  <table style="" class="table table-bordered col-xs-5">
    
    <thead>
      <tr>
      	<th>Nr.</th>
        <th>Pyetjet</th>
        
        
        
      </tr>

    </thead>
    <?php foreach($teze_te_dhena as $te_dhena_teze ): ?>
    <tbody>
      <tr>
      	<td style="color: red;font-size: 25px;">1</td>
        <td class="weekDayAppointments">
            <span style="color: #868686;">
            		 	<div class="form-group-sm">
            		 			<input style="border:1px solid #9409DE;" type="text" class="form-control" name="pyetja1" value="<?= $te_dhena_teze->pyetja1 ?>"  id="password2">

                        </div>
                </span>
        </td>
     </tr>
    </tbody>

    <tbody>
      <tr>
        <td style="color: red;font-size: 25px;">2</td>
        <td class="weekDayAppointments">
            <span style="color: #868686;">
                  <div class="form-group-sm">
                      <input style="border:1px solid #9409DE;" type="text" class="form-control" name="pyetja1" value="<?= $te_dhena_teze->pyetja2 ?>"  id="password2">

                        </div>
                </span>
        </td>
     </tr>
    </tbody>

    <tbody>
      <tr>
        <td style="color: red;font-size: 25px;">3</td>
        <td class="weekDayAppointments">
            <span style="color: #868686;">
                  <div class="form-group-sm">
                      <input style="border:1px solid #9409DE;" type="text" class="form-control" name="pyetja1" value="<?= $te_dhena_teze->pyetja3 ?>"  id="password2">

                        </div>
                </span>
        </td>
     </tr>
    </tbody>

    <tbody>
      <tr>
        <td style="color: red;font-size: 25px;">4</td>
        <td class="weekDayAppointments">
            <span style="color: #868686;">
                  <div class="form-group-sm">
                      <input style="border:1px solid #9409DE;" type="text" class="form-control" name="pyetja1" value="<?= $te_dhena_teze->pyetja4 ?>"  id="password2">

                        </div>
                </span>
        </td>
     </tr>
    </tbody>

    <tbody>
      <tr>
        <td style="color: red;font-size: 25px;">5</td>
        <td class="weekDayAppointments">
            <span style="color: #868686;">
                  <div class="form-group-sm">
                      <input style="border:1px solid #9409DE;" type="text" class="form-control" name="pyetja1" value="<?= $te_dhena_teze->pyetja5 ?>"  id="password2">

                        </div>
                </span>
        </td>
     </tr>
    </tbody>

    <tbody>
      <tr>
        <td style="color: red;font-size: 25px;">6</td>
        <td class="weekDayAppointments">
            <span style="color: #868686;">
                  <div class="form-group-sm">
                      <input style="border:1px solid #9409DE;" type="text" class="form-control" name="pyetja1" value="<?= $te_dhena_teze->pyetja6 ?>"  id="password2">

                        </div>
                </span>
        </td>
     </tr>
    </tbody>

    <tbody>
      <tr>
        <td style="color: red;font-size: 25px;">7</td>
        <td class="weekDayAppointments">
            <span style="color: #868686;">
                  <div class="form-group-sm">
                     <input style="border:1px solid #9409DE;" type="text" class="form-control" name="pyetja1" value="<?= $te_dhena_teze->pyetja7 ?>"  id="password2">

                        </div>
                </span>
        </td>
     </tr>
    </tbody>

    <tbody>
      <tr>
        <td style="color: red;font-size: 25px;">8</td>
        <td class="weekDayAppointments">
            <span style="color: #868686;">
                  <div class="form-group-sm">
                      <input style="border:1px solid #9409DE;" type="text" class="form-control" name="pyetja1" value="<?= $te_dhena_teze->pyetja8 ?>"  id="password2">

                        </div>
                </span>
        </td>
     </tr>
    </tbody>

    <tbody>
      <tr>
        <td style="color: red;font-size: 25px;">9</td>
        <td class="weekDayAppointments">
            <span style="color: #868686;">
                  <div class="form-group-sm">
                      <input style="border:1px solid #9409DE;" type="text" class="form-control" name="pyetja1" value="<?= $te_dhena_teze->pyetja9 ?>"  id="password2">

                        </div>
                </span>
        </td>
     </tr>
    </tbody>

    <tbody>
      <tr>
        <td style="color: red;font-size: 25px;">10</td>
        <td class="weekDayAppointments">
            <span style="color: #868686;">
                  <div class="form-group-sm">
                      <input style="border:1px solid #9409DE;" type="text" class="form-control" name="pyetja1" value="<?= $te_dhena_teze->pyetja10 ?>"  id="password2">

                        </div>
                </span>
        </td>
     </tr>
    </tbody>

    <tbody>
      <tr>
        <td style="color: red;font-size: 25px;">11</td>
        <td class="weekDayAppointments">
            <span style="color: #868686;">
                  <div class="form-group-sm">
                      <input style="border:1px solid #9409DE;" type="text" class="form-control" name="pyetja1" value="<?= $te_dhena_teze->pyetja11 ?>"  id="password2">

                        </div>
                </span>
        </td>
     </tr>
    </tbody>

    <tbody>
      <tr>
        <td style="color: red;font-size: 25px;">12</td>
        <td class="weekDayAppointments">
            <span style="color: #868686;">
                  <div class="form-group-sm">
                      <input style="border:1px solid #9409DE;" type="text" class="form-control" name="pyetja1" value="<?= $te_dhena_teze->pyetja12 ?>"  id="password2">

                        </div>
                </span>
        </td>
     </tr>
    </tbody>

    <tbody>
      <tr>
        <td style="color: red;font-size: 25px;">13</td>
        <td class="weekDayAppointments">
            <span style="color: #868686;">
                  <div class="form-group-sm">
                      <input style="border:1px solid #9409DE;" type="text" class="form-control" name="pyetja1" value="<?= $te_dhena_teze->pyetja13 ?>"  id="password2">

                        </div>
                </span>
        </td>
     </tr>
    </tbody>

    <tbody>
      <tr>
        <td style="color: red;font-size: 25px;">14</td>
        <td class="weekDayAppointments">
            <span style="color: #868686;">
                  <div class="form-group-sm">
                      <input style="border:1px solid #9409DE;" type="text" class="form-control" name="pyetja1" value="<?= $te_dhena_teze->pyetja14 ?>"  id="password2">

                        </div>
                </span>
        </td>
     </tr>
    </tbody>

    <tbody>
      <tr>
        <td style="color: red;font-size: 25px;">15</td>
        <td class="weekDayAppointments">
            <span style="color: #868686;">
                  <div class="form-group-sm">
                      <input style="border:1px solid #9409DE;" type="text" class="form-control" name="pyetja1" value="<?= $te_dhena_teze->pyetja15 ?>"  id="password2">

                        </div>
                </span>
        </td>
     </tr>
    </tbody>

    <tbody>
      <tr>
        <td style="color: red;font-size: 25px;">16</td>
        <td class="weekDayAppointments">
            <span style="color: #868686;">
                  <div class="form-group-sm">
                      <input style="border:1px solid #9409DE;" type="text" class="form-control" name="pyetja1" value="<?= $te_dhena_teze->pyetja16 ?>"  id="password2">

                        </div>
                </span>
        </td>
     </tr>
    </tbody>

    <tbody>
      <tr>
        <td style="color: red;font-size: 25px;">17</td>
        <td class="weekDayAppointments">
            <span style="color: #868686;">
                  <div class="form-group-sm">
                      <input style="border:1px solid #9409DE;" type="text" class="form-control" name="pyetja1" value="<?= $te_dhena_teze->pyetja17 ?>"  id="password2">

                        </div>
                </span>
        </td>
     </tr>
    </tbody>
    <tbody>
      <tr>
        <td style="color: red;font-size: 25px;">18</td>
        <td class="weekDayAppointments">
            <span style="color: #868686;">
                  <div class="form-group-sm">
                      <input style="border:1px solid #9409DE;" type="text" class="form-control" name="pyetja1" value="<?= $te_dhena_teze->pyetja18 ?>"  id="password2">

                        </div>
                </span>
        </td>
     </tr>
    </tbody>

    <tbody>
      <tr>
        <td style="color: red;font-size: 25px;">19</td>
        <td class="weekDayAppointments">
            <span style="color: #868686;">
                  <div class="form-group-sm">
                      <input style="border:1px solid #9409DE;" type="text" class="form-control" name="pyetja1" value="<?= $te_dhena_teze->pyetja19 ?>"  id="password2">

                        </div>
                </span>
        </td>
     </tr>
    </tbody>

    <tbody>
      <tr>
        <td style="color: red;font-size: 25px;">20</td>
        <td class="weekDayAppointments">
            <span style="color: #868686;">
                  <div class="form-group-sm">
                      <input style="border:1px solid #9409DE;" type="text" class="form-control" name="pyetja1" value="<?= $te_dhena_teze->pyetja20 ?>"  id="password2">

                        </div>
                </span>
        </td>
     </tr>
    </tbody>

    <tbody>
      <tr>
        <td style="color: red;font-size: 25px;">21</td>
        <td class="weekDayAppointments">
            <span style="color: #868686;">
                  <div class="form-group-sm">
                     <input style="border:1px solid #9409DE;" type="text" class="form-control" name="pyetja1" value="<?= $te_dhena_teze->pyetja21 ?>"  id="password2">

                        </div>
                </span>
        </td>
     </tr>
    </tbody>

    <tbody>
      <tr>
        <td style="color: red;font-size: 25px;">22</td>
        <td class="weekDayAppointments">
            <span style="color: #868686;">
                  <div class="form-group-sm">
                      <input style="border:1px solid #9409DE;" type="text" class="form-control" name="pyetja1" value="<?= $te_dhena_teze->pyetja22 ?>"  id="password2">

                        </div>
                </span>
        </td>
     </tr>
    </tbody>

    <tbody>
      <tr>
        <td style="color: red;font-size: 25px;">23</td>
        <td class="weekDayAppointments">
            <span style="color: #868686;">
                  <div class="form-group-sm">
                      <input style="border:1px solid #9409DE;" type="text" class="form-control" name="pyetja1" value="<?= $te_dhena_teze->pyetja23 ?>"  id="password2">

                        </div>
                </span>
        </td>
     </tr>
    </tbody>

    <tbody>
      <tr>
        <td style="color: red;font-size: 25px;">24</td>
        <td class="weekDayAppointments">
            <span style="color: #868686;">
                  <div class="form-group-sm">
                      <input style="border:1px solid #9409DE;" type="text" class="form-control" name="pyetja1" value="<?= $te_dhena_teze->pyetja24 ?>"  id="password2">

                        </div>
                </span>
        </td>
     </tr>
    </tbody>

    <tbody>
      <tr>
        <td style="color: red;font-size: 25px;">25</td>
        <td class="weekDayAppointments">
            <span style="color: #868686;">
                  <div class="form-group-sm">
                      <input style="border:1px solid #9409DE;" type="text" class="form-control" name="pyetja1" value="<?= $te_dhena_teze->pyetja25 ?>"  id="password2">

                        </div>
                </span>
        </td>
     </tr>
    </tbody>

    <tbody>
      <tr>
        <td style="color: red;font-size: 25px;">26</td>
        <td class="weekDayAppointments">
            <span style="color: #868686;">
                  <div class="form-group-sm">
                      <input style="border:1px solid #9409DE;" type="text" class="form-control" name="pyetja1" value="<?= $te_dhena_teze->pyetja26 ?>"  id="password2">

                        </div>
                </span>
        </td>
     </tr>
    </tbody>

    <tbody>
      <tr>
        <td style="color: red;font-size: 25px;">27</td>
        <td class="weekDayAppointments">
            <span style="color: #868686;">
                  <div class="form-group-sm">
                      <input style="border:1px solid #9409DE;" type="text" class="form-control" name="pyetja1" value="<?= $te_dhena_teze->pyetja27 ?>"  id="password2">

                        </div>
                </span>
        </td>
     </tr>
    </tbody>

    <tbody>
      <tr>
        <td style="color: red;font-size: 25px;">28</td>
        <td class="weekDayAppointments">
            <span style="color: #868686;">
                  <div class="form-group-sm">
                     <input style="border:1px solid #9409DE;" type="text" class="form-control" name="pyetja1" value="<?= $te_dhena_teze->pyetja28 ?>"  id="password2">

                        </div>
                </span>
        </td>
     </tr>
    </tbody>

    <tbody>
      <tr>
        <td style="color: red;font-size: 25px;">29</td>
        <td class="weekDayAppointments">
            <span style="color: #868686;">
                  <div class="form-group-sm">
                      <input style="border:1px solid #9409DE;" type="text" class="form-control" name="pyetja1" value="<?= $te_dhena_teze->pyetja29 ?>"  id="password2">

                        </div>
                </span>
        </td>
     </tr>
    </tbody>

    <tbody>
      <tr>
        <td style="color: red;font-size: 25px;">30</td>
        <td class="weekDayAppointments">
            <span style="color: #868686;">
                  <div class="form-group-sm">
                      <input style="border:1px solid #9409DE;" type="text" class="form-control" name="pyetja1" value="<?= $te_dhena_teze->pyetja30 ?>"  id="password2">

                        </div>
                </span>
        </td>
     </tr>
    </tbody>
    <?php endforeach; ?>

    



    
  </table>
   <button type="submit" name="modifiko_teze" class="btn btn-block btn-warning btn-lg"><i class="fa fa-plus"></i>  RUAJ</button>
</form>
</div>
</div>

</section>
</div>
<?php
include "footer.php"

?>