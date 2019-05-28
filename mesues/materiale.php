<?php
include "header.php";
require_once("db.php");

foreach ($mesuesit as $mesues) {
   $id_mesues_kushti= $mesues->id_mesues; 
}
$sql = 'SELECT * FROM student WHERE id_mesues=:id_mesues_kushti';
$std = $lidhja->prepare($sql);
$std->execute(array(":id_mesues_kushti"=>$id_mesues_kushti));
$std->execute();
$std_te_dhena = $std->fetchAll(PDO::FETCH_OBJ);


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
<div class="box box-primary" style="position: relative; left: 0px; top: 0px;">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">Materialet</h3>

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
                  <span style="font-size: 20px;" class="text"><?= $te_dhena_material->materiali ?></span>
                  <!-- Emphasis label -->
                  
                  <!-- General tools such as edit or delete-->
                  <div class="tools">
                    <a href="materiale/<?= $te_dhena_material->materiali ?>"><i class="fa fa-eye"> Shiko materialin</i></a>

                   <a href="materiale/<?= $te_dhena_material->materiali ?>" download="materiale/<?= $te_dhena_material->materiali ?>"><i class="fa fa-download"> Shkarko</i></a>

                    <a onclick="return confirm('Jeni te sigurte qe doni te fshini kete material?            Pasi te fshihet nuk do te kete me kthim pas')" href="del/fshij_material.php?id=<?= $te_dhena_material->id_materiale ?>"><i class="fa fa-trash-o">  Fshij</i></a>
                  </div>
                </li>
                <?php endforeach; ?>
                
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix no-border">
              <button type="button" onclick="javascript: location.href = 'ngarko_materiale.php'" class="btn btn-default pull-right"><i class="fa fa-plus"></i>Ngarko materiale te tjera</button>
            </div>

          </div>

</section>
</div>


<?php
include "footer.php"

?>