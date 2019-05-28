<?php
include "header.php";
require_once("db.php");
require_once("ModelMateriale.php");
$material = new Materiale();

if (isset($_POST['ngarko'])) {

  $id_klasa= $_POST['klasa_perkatese'];
  $id_mesues= $_POST['id_mesues'];

  $materiali = $_FILES["txt_file"]["name"];
  $type  = $_FILES["txt_file"]["type"]; //file name "txt_file" 
  $size  = $_FILES["txt_file"]["size"];
  $temp  = $_FILES["txt_file"]["tmp_name"];
  $path="materiale/".$materiali;
  
  $error=null;
  if(file_exists($path)){ //kontroll nese fotoja ekziston ne folderin mesues/upload
    $error="Ky material ekziston! Ju lutem ndryshoni emrin e materialit";
 }
  if($size) //madhesia e lejuar 5MB
  {
     move_uploaded_file($temp, "materiale/" .$materiali); //move foton e uploduar e zhvendosim ne folderin "upload"
  }
  if (empty($id_klasa)) {
    $error="Ju lutem zgjidhni klasen!!!";
  }
  
  if (is_null($error)) {
    if ($material->shto_material($id_mesues,$id_klasa,$materiali)) {
      $u_ngarkua ="Materiali u ngarkua me sukses";
      header("Location:materiale.php");
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

$sql = 'SELECT * FROM materiale WHERE id_mesues=:id_mesues_kushti';
$mat = $lidhja->prepare($sql);
$mat->execute(array(":id_mesues_kushti"=>$id_mesues_kushti));
$mat->execute();
$materiale_te_dhena = $mat->fetchAll(PDO::FETCH_OBJ);
?>


<section class="content">
<!--Shkruaj kod per kete sesion-->
    <div class="callout callout-success">
      <h4>Materiale</h4> 
       <p>
       Lista materialeve</p>
    </div>
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Ngarko materiale</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="" enctype="multipart/form-data">
              <div class="box-body">
                
                <div class="form-group">
                  <label for="exampleInputFile">Ngarkoni materiale te ndryshme</label>
                  <input type="file" name="txt_file" id="exampleInputFile">

                  <p class="help-block">Materialet mund te permbajne formate te ndryshme</p>
                </div>
                
              </div>
              <div class="form-group">
                  <label>Zgjidhni klasen</label>
                  <select name="klasa_perkatese" class="form-control">
                    <?php foreach($nxirr_te_dhena as $te_dhena): ?>
                    <option value="<?= $te_dhena->id_klasa ?>"><?= $te_dhena->emri ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              <!-- /.box-body -->
              <?php foreach($mesuesit as $mesues): ?>
                          <input type="hidden" name="id_mesues" value="<?= $mesues->id_mesues ?>">
                      <?php endforeach; ?>

              <div class="box-footer">
                <button type="submit" name="ngarko" class="btn btn-primary">Ngarko</button>
              </div>
            </form>
          </div>




<div class="box box-primary" style="position: relative; left: 0px; top: 0px;">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">Keto jane materialet e ngarkuara nga ju</h3>

              <div class="box-tools pull-right">
                <ul class="pagination pagination-sm inline">
                  <li><a href="#">«</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">»</a></li>
                </ul>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
              <?php foreach($materiale_te_dhena as $te_dhena_material ): ?>
              <ul class="todo-list ui-sortable">
                <li>
                  <!-- drag handle -->
                  <span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <!-- checkbox -->
                  <input type="checkbox" value="">
                  <!-- todo text -->
                  <span class="text"><?= $te_dhena_material->materiali ?></span>
                  <!-- Emphasis label -->
                  
                  <!-- General tools such as edit or delete-->
                  <div class="tools">
                    <a href="materiale/<?= $te_dhena_material->materiali ?>"><i class="fa fa-eye"> Shiko materialin</i></a>

                   <a href="materiale/<?= $te_dhena_material->materiali ?>" download="materiale/<?= $te_dhena_material->materiali ?>"><i class="fa fa-download"> Shkarko</i></a>

                    <a onclick="return confirm('Jeni te sigurte qe doni te fshini kete material?')" href="del/fshij_material.php?id=<?= $te_dhena_material->id_materiale ?>"><i class="fa fa-trash-o">  Fshij</i></a>
                  </div>
                </li>
                <?php endforeach; ?>
                
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix no-border">
              <button type="button" onclick="javascript: location.href = 'krijo_njoftim.php'" class="btn btn-default pull-right"><i class="fa fa-plus"></i>Krijo njoftim te ri</button>
            </div>

          </div>

</section>
</div>


<?php
include "footer.php"

?>