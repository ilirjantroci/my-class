<?php
include "header.php";
require_once("ModelGrafikNotash.php");
require_once("db.php");
$nota = new GrafikNotash();

if (isset($_POST['krijo_grafik'])) {

  $id_mesues= $_POST['id_mesues'];
  $id_student= $_POST['studenti_perkates'];
  $emri_grafikut=$_POST['emri_grafikut'];
  $lenda_1=$_POST['lenda_1'];
  $nota_1=$_POST['nota_1'];
  $lenda_2=$_POST['lenda_2'];
  $nota_2=$_POST['nota_2'];
  $lenda_3=$_POST['lenda_3'];
  $nota_3=$_POST['nota_3'];
   $lenda_4=$_POST['lenda_4'];
  $nota_4=$_POST['nota_4'];
  $lenda_5=$_POST['lenda_5'];
  $nota_5=$_POST['nota_5'];
  $lenda_6=$_POST['lenda_6'];
  $nota_6=$_POST['nota_6'];
   $lenda_7=$_POST['lenda_7'];
  $nota_7=$_POST['nota_7'];
  $lenda_8=$_POST['lenda_8'];
  $nota_8=$_POST['nota_8'];
  $lenda_9=$_POST['lenda_9'];
  $nota_9=$_POST['nota_9'];
  $lenda_10=$_POST['lenda_10'];
  $nota_10=$_POST['nota_10'];
  $lenda_11=$_POST['lenda_11'];
  $nota_11=$_POST['nota_11'];
  $lenda_12=$_POST['lenda_12'];
  $nota_12=$_POST['nota_12'];
  $njoftim=null;
  if (empty($id_student)) {
  	$njoftim="Ju lutem zgjidhni studentin perkates per kete grafik notash";
  }
  if (empty($emri_grafikut)) {
  	$njoftim="Ju lutem zgjidhni emrin e grafikut";
  }
  if (is_null($njoftim)) {
  	if ($nota->krijo_grafik_notash($id_mesues,$id_student,$emri_grafikut,$lenda_1,$nota_1,$lenda_2,$nota_2,$lenda_3,$nota_3,$lenda_4,$nota_4,$lenda_5,$nota_5,$lenda_6,$nota_6,$lenda_7,$nota_7,$lenda_8,$nota_8,$lenda_9,$nota_9,$lenda_10,$nota_10,$lenda_11,$nota_11,$lenda_12,$nota_12)) {
  		$u_shtua="Grafiku u krijua me sukses";

  		 header("location:lista_studenteve.php");
  		//header('Refresh: 2; URL=/shiko_grafiket.php');
  	}
  	
  }

}

  



foreach ($mesuesit as $mesues) {
   $id_mesues_kushti= $mesues->id_mesues; 
}

$sql = 'SELECT * FROM student WHERE id_mesues= :id_mesues_kushti';
$grafik = $lidhja->prepare($sql);
$grafik->execute(array(":id_mesues_kushti"=>$id_mesues_kushti));
$grafik->execute();
$nxirr_te_dhena = $grafik->fetchAll(PDO::FETCH_OBJ);

?>
<section class="content">
<!--Shkruaj kod per kete sesion-->
    <div class="callout callout-success">
      <h4>Krijo Grafik Notash per nxenesin tuaj</h4> 
       <p>
        Ne kete sension mund te krijoni nje grafik notash per nxenesin tuaj, grafiku permban lendet dhe notat perkatese. Mund te krijoni disa grafike notash per te njejtin nxenes, si per shembull mund te krijoni nje grafik per 3 mujorin e pare dhe nje grafik tjeter per 3 mujorin e dyte e keshtu me rradhe <span style="color: blue;"><b>Kur te shkruani notat ju lutem ndani ato me presje</span> </p>
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
              	<label for="password2"><h4>Zgjidhni studentin per kete grafik notash</h4></label>
                 <select name="studenti_perkates" class="form-control">
                    <option>Lista e studenteve te krijuar nga ju</option>
                    <?php foreach($nxirr_te_dhena as $te_dhena): ?>
                    <option value="<?= $te_dhena->id_student ?>"><?= $te_dhena->emri ?>  <?= $te_dhena->mbiemri ?></option>
                     <?php endforeach; ?>
                  </select>

                  <label for="password2"><h4>Zgjidhni nje emer per grafikun</h4></label>
                 
                    <input style="border:1px solid #9409DE;" type="text" class="form-control" name="emri_grafikut" id="password2" placeholder="Ju lutem shenoni emrin e grafikut">

                  <?php foreach($mesuesit as $mesues): ?>
                          <input type="hidden" name="id_mesues" value="<?= $mesues->id_mesues ?>">
                      <?php endforeach; ?>
  <table style="" class="table table-bordered col-xs-5">
    <thead>
      <tr>
      	<th>Nr.</th>
        <th>Emri lendes</th>
        <th>Notat </th>
        
        
      </tr>
    </thead>
    <tbody>
      <tr>
      	<td style="color: red;font-size: 25px;">1</td>
        <td class="weekDayAppointments">
            <span style="color: #868686;">
            		 	<div class="form-group-sm">
            		 			<textarea style="border:1px solid #9409DE;font-size: 17px;height: 40px;" id="employees_description" name="lenda_1"  class="form-control">
            		 			</textarea>

                        </div>
                </span>
        </td>
       <td class="weekDayAppointments">
            <span style="color: #868686;">
            		 	<div class="form-group-sm">
            		 			<textarea style="border:1px solid blue;font-size: 17px;height: 40px;" id="employees_description" name="nota_1"  class="form-control">
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
            		 			<textarea style="border:1px solid #9409DE;font-size: 17px;height: 40px;" id="employees_description" name="lenda_2"  class="form-control">
            		 			</textarea>

                        </div>
                </span>
        </td>
       <td class="weekDayAppointments">
            <span style="color: #868686;">
            		 	<div class="form-group-sm">
            		 			<textarea style="border:1px solid blue;font-size: 17px;height: 40px;" id="employees_description" name="nota_2"  class="form-control">
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
            		 			<textarea style="border:1px solid #9409DE;font-size: 17px;height: 40px;" id="employees_description" name="lenda_3"  class="form-control">
            		 			</textarea>

                        </div>
                </span>
        </td>
       <td class="weekDayAppointments">
            <span style="color: #868686;">
            		 	<div class="form-group-sm">
            		 			<textarea style="border:1px solid blue;font-size: 17px;height: 40px;" id="employees_description" name="nota_3"  class="form-control">
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
            		 			<textarea style="border:1px solid #9409DE;font-size: 17px;height: 40px;" id="employees_description" name="lenda_4"  class="form-control">
            		 			</textarea>

                        </div>
                </span>
        </td>
       <td class="weekDayAppointments">
            <span style="color: #868686;">
            		 	<div class="form-group-sm">
            		 			<textarea style="border:1px solid blue;font-size: 17px;height: 40px;" id="employees_description" name="nota_4"  class="form-control">
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
            		 			<textarea style="border:1px solid #9409DE;font-size: 17px;height: 40px;" id="employees_description" name="lenda_5"  class="form-control">
            		 			</textarea>

                        </div>
                </span>
        </td>
       <td class="weekDayAppointments">
            <span style="color: #868686;">
            		 	<div class="form-group-sm">
            		 			<textarea style="border:1px solid blue;font-size: 17px;height: 40px;" id="employees_description" name="nota_5"  class="form-control">
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
            		 			<textarea style="border:1px solid #9409DE;font-size: 17px;height: 40px;" id="employees_description" name="lenda_6"  class="form-control">
            		 			</textarea>

                        </div>
                </span>
        </td>
       <td class="weekDayAppointments">
            <span style="color: #868686;">
            		 	<div class="form-group-sm">
            		 			<textarea style="border:1px solid blue;font-size: 17px;height: 40px;" id="employees_description" name="nota_6"  class="form-control">
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
            		 			<textarea style="border:1px solid #9409DE;font-size: 17px;height: 40px;" id="employees_description" name="lenda_7"  class="form-control">
            		 			</textarea>

                        </div>
                </span>
        </td>
       <td class="weekDayAppointments">
            <span style="color: #868686;">
            		 	<div class="form-group-sm">
            		 			<textarea style="border:1px solid blue;font-size: 17px;height: 40px;" id="employees_description" name="nota_7"  class="form-control">
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
            		 			<textarea style="border:1px solid #9409DE;font-size: 17px;height: 40px;" id="employees_description" name="lenda_8"  class="form-control">
            		 			</textarea>

                        </div>
                </span>
        </td>
       <td class="weekDayAppointments">
            <span style="color: #868686;">
            		 	<div class="form-group-sm">
            		 			<textarea style="border:1px solid blue;font-size: 17px;height: 40px;" id="employees_description" name="nota_8"  class="form-control">
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
            		 			<textarea style="border:1px solid #9409DE;font-size: 17px;height: 40px;" id="employees_description" name="lenda_9"  class="form-control">
            		 			</textarea>

                        </div>
                </span>
        </td>
       <td class="weekDayAppointments">
            <span style="color: #868686;">
            		 	<div class="form-group-sm">
            		 			<textarea style="border:1px solid blue;font-size: 17px;height: 40px;" id="employees_description" name="nota_9"  class="form-control">
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
            		 			<textarea style="border:1px solid #9409DE;font-size: 17px;height: 40px;" id="employees_description" name="lenda_10"  class="form-control">
            		 			</textarea>

                        </div>
                </span>
        </td>
       <td class="weekDayAppointments">
            <span style="color: #868686;">
            		 	<div class="form-group-sm">
            		 			<textarea style="border:1px solid blue;font-size: 17px;height: 40px;" id="employees_description" name="nota_10"  class="form-control">
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
            		 			<textarea style="border:1px solid #9409DE;font-size: 17px;height: 40px;" id="employees_description" name="lenda_11"  class="form-control">
            		 			</textarea>

                        </div>
                </span>
        </td>
       <td class="weekDayAppointments">
            <span style="color: #868686;">
            		 	<div class="form-group-sm">
            		 			<textarea style="border:1px solid blue;font-size: 17px;height: 40px;" id="employees_description" name="nota_11"  class="form-control">
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
            		 			<textarea style="border:1px solid #9409DE;font-size: 17px;height: 40px;" id="employees_description" name="lenda_12"  class="form-control">
            		 			</textarea>

                        </div>
                </span>
        </td>
       <td class="weekDayAppointments">
            <span style="color: #868686;">
            		 	<div class="form-group-sm">
            		 			<textarea style="border:1px solid blue;font-size: 17px;height: 40px;" id="employees_description" name="nota_12"  class="form-control">
            		 			</textarea>
            		 			
                        </div>
                </span>
        </td>
        
                   
                 

        
        
      </tr>

      
      
    </tbody>
  </table>
   <button type="submit" name="krijo_grafik" class="btn btn-block btn-warning btn-lg"><i class="fa fa-plus"></i>  Krijo</button>
</form>
</div>
</div>

</section>
</div>
<?php
include "footer.php"

?>