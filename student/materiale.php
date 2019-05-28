<?php
include "header.php";
require_once("db.php");

foreach ($studenti as $student) {
   $id_student_kushti= $student->id_klasa; 
}



$sql = 'SELECT * FROM materiale WHERE id_klasa=:id_student_kushti';
$mat = $lidhja->prepare($sql);
$mat->execute(array(":id_student_kushti"=>$id_student_kushti));
$mat->execute();
$materiale_te_dhena = $mat->fetchAll(PDO::FETCH_OBJ);
?>


<section class="content">
<!--Shkruaj kod per kete sesion-->
    <div class="callout callout-success">
      <h4>Materiale</h4> 
       <p>
       Lista materialeve per klasen tuaj</p>
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
                    <a href="../mesues/materiale/<?= $te_dhena_material->materiali ?>"><i class="fa fa-eye"> Shiko materialin</i></a>

                   <a href="../mesues/materiale/<?= $te_dhena_material->materiali ?>" download="materiale/<?= $te_dhena_material->materiali ?>"><i class="fa fa-download"> Shkarko</i></a>

                    
                  </div>
                </li>
                <?php endforeach; ?>
                
              </ul>
            </div>
            <!-- /.box-body -->
            

          </div>

</section>
</div>


<?php
include "footer.php"

?>