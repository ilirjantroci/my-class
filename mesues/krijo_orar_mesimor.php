<?php
include "header.php";
require_once("ModelOrari.php");
require_once("db.php");
$orari = new Orari();

if (isset($_POST['krijo'])) {

  $id_mesues= $_POST['id_mesues'];
  $id_klasa= $_POST['klasa_perkatese'];
  $emri_orarit=$_POST['emri_orarit'];
  $e_hene=$_POST['e_hene'];
  $e_marte=$_POST['e_marte'];
  $e_merkure=$_POST['e_merkure'];
  $e_enjte=$_POST['e_enjte'];
  $e_premte=$_POST['e_premte'];
  $njoftim=null;
  if (empty($emri_orarit)) {
  	$njoftim="Ju lutem shenoni emrin";
  }
  if (empty($id_klasa)) {
  	$njoftim="Ju lutem zgjidhni klasen perkatese";
  }
  if (is_null($njoftim)) {
  	if ($orari->krijo_orar($id_mesues,$id_klasa,$emri_orarit,$e_hene,$e_marte,$e_merkure,$e_enjte,$e_premte)) {
  		$u_shtu ="Orari u krijua me sukses";
      header("Location:shiko_orarin.php");
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


$sql = 'SELECT * FROM orari_mesimor WHERE id_mesues= :id_mesues_kushti';
$orari = $lidhja->prepare($sql);
$orari->execute(array(":id_mesues_kushti"=>$id_mesues_kushti));
$orari->execute();
$orari_te_dhena = $orari->fetchAll(PDO::FETCH_OBJ);
?>

<!--Shkruaj kod per kete sesion-->
<section class="content">
<!--Shkruaj kod per kete sesion-->
    <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-info"></i>Krijoni nje orar mesimor per klasen tuaj</h4>
                Ne kete sension mund te krijoni nje orar mesimor per klasen tuaj, gjithashtu mund te shikoni ne kohe reale oraret qe keni krijuar juve.. <span style="color: red;"><b>Ju lutem pas cdo lende qe shkruani , ndani ato me presje nga njera-tjetra</span>
              </div>
<div class="col-sm-8 col-md-9 col-lg-10 calendarContainer">
	<div class="form-group">
                          <form method="post" action="">
                          <div class="col-xs-6">
                          	<?php if (isset($u_shtua)) { ?>
         <p class="alert alert-success text-center"><?php echo $u_shtua; ?></p>
                                <?php } ?>
                                 <?php if (isset($njoftim)) { ?>
         <p class="alert alert-danger text-center"><?php echo $njoftim; ?></p>
                                <?php } ?>
                            <label for="password2"><h4>Emri i orarit</h4></label>
                              <input style="border:1px solid #9409DE;" type="text" class="form-control" name="emri_orarit" id="password2" placeholder="Ju lutem shenoni emrin e orarit" title="Shkruani emrin e orarit qe doni te krijoni">
                          </div>
                      </div>
        <table class="table table-bordered appointments-table">
            <thead>
              <tr>
                    <th class="weekDayHeader">E hene</th>
                    <th class="weekDayHeader">E marte</th>
                    <th class="weekDayHeader">E merkure</th>
                    <th class="weekDayHeader">E Enjte</th>
                    <th class="weekDayHeader">E premte</th>
                    <th class="weekDayHeader">Klasa Perkatese</th>
                    <th class="weekDayHeader"></th>
                    
            </thead>
            <tbody>
            	<tr>
            		 <td class="weekDayAppointments">
            		 	<span style="color: #868686;">
            		 		<div class="form-group-sm">
            		 			<textarea style="border:1px solid #9409DE;" id="employees_description" name="e_hene"  class="form-control">
            		 			</textarea>
                            </div>
                        </span>
            		 </td>
            		 <td class="weekDayAppointments">
            		 	<span style="color: #868686;">
            		 		<div class="form-group-sm">
            		 			<textarea style="border:1px solid #9409DE;" id="employees_description" name="e_marte"  class="form-control">
            		 			</textarea>
                            </div>
                        </span>
            		 </td>
            		 <td class="weekDayAppointments">
            		 	<span style="color: #868686;">
            		 		<div class="form-group-sm">
            		 			<textarea style="border:1px solid #9409DE;" id="employees_description" name="e_merkure"  class="form-control">
            		 			</textarea>
                            </div>
                        </span>
            		 </td>
            		 <td class="weekDayAppointments">
            		 	<span style="color: #868686;">
            		 		<div class="form-group-sm">
            		 			<textarea style="border:1px solid #9409DE;" id="employees_description" name="e_enjte" class="form-control">
            		 			</textarea>
                            </div>
                        </span>
            		 </td>
            		 <td class="weekDayAppointments">
            		 	<span style="color: #868686;">
            		 		<div class="form-group-sm">
            		 			<textarea style="border:1px solid #9409DE;" id="employees_description" name="e_premte"  class="form-control">
            		 			</textarea>
                            </div>
                        </span>
            		 </td>

            		 <td class="weekDayAppointments">
            		 	<select name="klasa_perkatese" style="border:1px solid #9409DE;">
            		 		<option>Zgjidhni klasen</option>
            		 		<?php foreach($nxirr_te_dhena as $te_dhena): ?>
            		 		<option value="<?= $te_dhena->id_klasa ?>"><?= $te_dhena->emri ?></option>
                              <?php endforeach; ?>
            		 		
            		 	</select>

            		</td>

            		<?php foreach($mesuesit as $mesues): ?>
                          <input type="hidden" name="id_mesues" value="<?= $mesues->id_mesues ?>">
                      <?php endforeach; ?>

            		<td class="weekDayAppointments">
            		 	<button type="submit" name="krijo" class="btn btn-block btn-warning"><i class="fa fa-plus"></i>Krijo </button>

            		</td>





            		 
            		 
            		 </tbody>
                  </table>
             </form>
       </div>


<div class="col-md-12">
        <div  class="box box-primary">
            <div class="box-header">
            <h3 class="box-title">Oraret</h3>

           <div class="btn-group pull-right">
            <button style="background: #ff00cc;  
             background: -webkit-linear-gradient(to right, #333399, #ff00cc); 
             background: linear-gradient(to right, #333399, #ff00cc);" 

             type="button" onclick="javascript: location.href = 'shiko_orarin.php'" class="btn btn-primary hidden-xs">Shiko oraret
        </button>
    </div>

<div class="btn-group pull-right">
    <select id="plan-list" class="form-control" onchange="location = this.value;">
        <option value="#">Opsione te tjera</option>
        <option value="#seshpejti">Shkarko ne PDF</option>
        


            </select>
</div>
                                    </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover table-condensed">
                        <thead>
                            <tr style="background-color: yellow;">
                                <th >Emri orarit</th>
                                <th>E hene</th>
                                <th>E marte</th>
                                <th>E merkure</th>
                                <th>E enjte</th>
                                <th>E premte</th>
                                <th>Opsion</th>
                                
                                
                            </tr>
                        </thead>
                         
                        
                        <?php foreach($orari_te_dhena as $te_dhena_orari ): ?>
                        <tbody>
                        	<thead>
                            <tr>
                                
                                
                                <td style="color: red;" ><b><?= $te_dhena_orari->emri_orarit ?></b></td>
                                
                               
                                <td><b><?= $te_dhena_orari->e_hene ?></td>
                               
                              
                                <td ><b><?= $te_dhena_orari->e_marte ?></td>
                                
                                <td ><b><?= $te_dhena_orari->e_merkure ?></td>

                                <td ><b><?= $te_dhena_orari->e_enjte ?></td>
                                
                                <td ><b><?= $te_dhena_orari->e_premte ?></td>
                                
                                <td ><a href="profili_student.php?id=<?= $te_dhena->id_student ?>" class="btn btn-xs btn-success"><i class="fa fa-eye"></i>Modifiko orarin</a>

                                    <a onclick="return confirm('Jeni te sigurte qe doni te fshini kete?')" class="btn btn-xs btn-danger" href="del/fshi_orar.php?id=<?= $te_dhena_orari->id_orari ?>"><i class="fa fa-times"></i>Fshij</a>
                                </td>
                                
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                        	<?php endforeach; ?>
                        	


                        
                        
                                
                    </table>
                </div>
                <div class="box-footer clearfix">
                    
                    

                </div>
            </div>
        </div>

</section>
</div>


<?php
include "footer.php"

?>