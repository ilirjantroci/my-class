<?php
include "header.php";
require_once("ModelProvim.php");
require_once("db.php");
$teze = new Provim();

if (isset($_POST['krijo_teze'])) {

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
  
  
  $njoftim=null;
  if (empty($id_klasa)) {
    $njoftim="Ju lutem shenoni klasen perkatese";
  }
  if (empty($emri)) {
    $njoftim="Ju lutem shenoni emrin e tezes";
  }
  if (is_null($njoftim)) {
    if ($teze->krijo_teze($id_mesues,$id_klasa,$emri,$pyetja1,$pyetja2,$pyetja3,$pyetja4,$pyetja5,$pyetja6,$pyetja7,$pyetja8,$pyetja9,$pyetja10,$pyetja11,$pyetja12,$pyetja13,$pyetja14,$pyetja15,$pyetja16,$pyetja17,$pyetja18,$pyetja19,$pyetja20,$pyetja21,$pyetja22,$pyetja23,$pyetja24,$pyetja25,$pyetja26,$pyetja27,$pyetja28,$pyetja29,$pyetja30)) {
      $u_shtu ="Teza u krijua me sukses ";
      header("Location:krijo_teze.php");
    }
    
  }

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
      <h4>Krijo nje teze provimi per klasen tuaj</h4> 
       <p>Ne kete sension mund te krijoni nje teze provimi per nje klase te caktuar </p>
    </div>
<div class="container">
              <div class="col-md-8">
              	<?php if (isset($u_shtua)) { ?>
         <p class="alert alert-success text-center"><?php echo $u_shtua; ?></p>
                       <?php } ?>
                                 <?php if (isset($njoftim)) { ?>
         <p class="alert alert-danger text-center"><?php echo $njoftim; ?></p>
                                <?php } ?>
              	<form method="post" action="">
                  
              	<label for="password2"><h4>Zgjidhni klasen perkatese per kete teze provimi</h4></label>
                 <select name="klasa_perkatese" class="form-control">
                    <?php foreach($nxirr_te_dhena as $te_dhena): ?>
                  <option value="<?= $te_dhena->id_klasa ?>"><?= $te_dhena->emri ?></option>
                     <?php endforeach; ?>
                  </select>

                  <label for="password2"><h4>Zgjidhni emrin e tezez</h4></label>
                 
                    <input style="border:1px solid #9409DE;" type="text" class="form-control" name="emri" id="password2">

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
    <tbody>
      <tr>
      	<td style="color: red;font-size: 25px;">1</td>
        <td class="weekDayAppointments">
            <span style="color: #868686;">
            		 	<div class="form-group-sm">
            		 			<textarea style="border:1px solid red;font-size: 17px;height: 60px;" id="employees_description" name="pyetja1"  class="form-control">
            		 			</textarea>

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
                      <textarea style="border:1px solid red;font-size: 17px;height: 60px;" id="employees_description" name="pyetja2"  class="form-control">
                      </textarea>

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
                      <textarea style="border:1px solid red;font-size: 17px;height: 60px;" id="employees_description" name="pyetja3"  class="form-control">
                      </textarea>

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
                      <textarea style="border:1px solid red;font-size: 17px;height: 60px;" id="employees_description" name="pyetja4"  class="form-control">
                      </textarea>

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
                      <textarea style="border:1px solid red;font-size: 17px;height: 60px;" id="employees_description" name="pyetja5"  class="form-control">
                      </textarea>

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
                      <textarea style="border:1px solid red;font-size: 17px;height: 60px;" id="employees_description" name="pyetja6"  class="form-control">
                      </textarea>

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
                      <textarea style="border:1px solid red;font-size: 17px;height: 60px;" id="employees_description" name="pyetja7"  class="form-control">
                      </textarea>

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
                      <textarea style="border:1px solid red;font-size: 17px;height: 60px;" id="employees_description" name="pyetja8"  class="form-control">
                      </textarea>

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
                      <textarea style="border:1px solid red;font-size: 17px;height: 60px;" id="employees_description" name="pyetja9"  class="form-control">
                      </textarea>

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
                      <textarea style="border:1px solid red;font-size: 17px;height: 60px;" id="employees_description" name="pyetja10"  class="form-control">
                      </textarea>

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
                      <textarea style="border:1px solid red;font-size: 17px;height: 60px;" id="employees_description" name="pyetja11"  class="form-control">
                      </textarea>

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
                      <textarea style="border:1px solid red;font-size: 17px;height: 60px;" id="employees_description" name="pyetja12"  class="form-control">
                      </textarea>

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
                      <textarea style="border:1px solid red;font-size: 17px;height: 60px;" id="employees_description" name="pyetja13"  class="form-control">
                      </textarea>

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
                      <textarea style="border:1px solid red;font-size: 17px;height: 60px;" id="employees_description" name="pyetja14"  class="form-control">
                      </textarea>

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
                      <textarea style="border:1px solid red;font-size: 17px;height: 60px;" id="employees_description" name="pyetja15"  class="form-control">
                      </textarea>

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
                      <textarea style="border:1px solid red;font-size: 17px;height: 60px;" id="employees_description" name="pyetja16"  class="form-control">
                      </textarea>

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
                      <textarea style="border:1px solid red;font-size: 17px;height: 60px;" id="employees_description" name="pyetja17"  class="form-control">
                      </textarea>

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
                      <textarea style="border:1px solid red;font-size: 17px;height: 60px;" id="employees_description" name="pyetja18"  class="form-control">
                      </textarea>

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
                      <textarea style="border:1px solid red;font-size: 17px;height: 60px;" id="employees_description" name="pyetja19"  class="form-control">
                      </textarea>

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
                      <textarea style="border:1px solid red;font-size: 17px;height: 60px;" id="employees_description" name="pyetja20"  class="form-control">
                      </textarea>

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
                      <textarea style="border:1px solid red;font-size: 17px;height: 60px;" id="employees_description" name="pyetja21"  class="form-control">
                      </textarea>

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
                      <textarea style="border:1px solid red;font-size: 17px;height: 60px;" id="employees_description" name="pyetja22"  class="form-control">
                      </textarea>

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
                      <textarea style="border:1px solid red;font-size: 17px;height: 60px;" id="employees_description" name="pyetja23"  class="form-control">
                      </textarea>

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
                      <textarea style="border:1px solid red;font-size: 17px;height: 60px;" id="employees_description" name="pyetja24"  class="form-control">
                      </textarea>

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
                      <textarea style="border:1px solid red;font-size: 17px;height: 60px;" id="employees_description" name="pyetja25"  class="form-control">
                      </textarea>

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
                      <textarea style="border:1px solid red;font-size: 17px;height: 60px;" id="employees_description" name="pyetja26"  class="form-control">
                      </textarea>

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
                      <textarea style="border:1px solid red;font-size: 17px;height: 60px;" id="employees_description" name="pyetja27"  class="form-control">
                      </textarea>

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
                      <textarea style="border:1px solid red;font-size: 17px;height: 60px;" id="employees_description" name="pyetja28"  class="form-control">
                      </textarea>

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
                      <textarea style="border:1px solid red;font-size: 17px;height: 60px;" id="employees_description" name="pyetja29"  class="form-control">
                      </textarea>

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
                      <textarea style="border:1px solid red;font-size: 17px;height: 60px;" id="employees_description" name="pyetja30"  class="form-control">
                      </textarea>

                        </div>
                </span>
        </td>
     </tr>
    </tbody>

    



    
  </table>
   <button type="submit" name="krijo_teze" class="btn btn-block btn-warning btn-lg"><i class="fa fa-plus"></i>  Krijo</button>
</form>
</div>
</div>

</section>
</div>
<?php
include "footer.php"

?>