<?php
include "header.php";
require_once("db.php");

foreach ($mesuesit as $mesues) {
   $id_mesues_kushti= $mesues->id_mesues; 
}
$sql = 'SELECT * FROM provimi WHERE id_mesues=:id_mesues_kushti';
$provim = $lidhja->prepare($sql);
$provim->execute(array(":id_mesues_kushti"=>$id_mesues_kushti));
$provim->execute();
$teze_te_dhena = $provim->fetchAll(PDO::FETCH_OBJ);
/*$data=$provim->fetch();*/





?>


<section class="content">
<!--Shkruaj kod per kete sesion-->
    <div class="callout callout-success">
      <h4>Teza provimi </h4> 
       <p>
       Lista tezave te provimit te krijuara nga ju</p>
    </div>
<div class="box box-primary" style="position: relative; left: 0px; top: 0px;">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">PROVIMET E DOREZUARA</h3>

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
              <?php foreach($teze_te_dhena as $te_dhena ): ?>
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
                  <span class="text"><?= $te_dhena->emri ?>   <?= $te_dhena->mbiemri ?></span>
                  
                  <div class="tools">
                    <a href="shiko_provimin.php?id=<?= $te_dhena->id_provim ?>"><i class="fa fa-eye"> Shiko pergjigjet </i></a>
                   
                  </div>
                </li>
                <?php endforeach; ?>
                
              </ul>
            </div>

          </div>


</section>
</div>


<?php
include "footer.php"

?>