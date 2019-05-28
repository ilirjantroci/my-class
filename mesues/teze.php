<?php
include "header.php";
require_once("db.php");

foreach ($mesuesit as $mesues) {
   $id_mesues_kushti= $mesues->id_mesues; 
}
$sql = 'SELECT * FROM teze_provimi WHERE id_mesues=:id_mesues_kushti';
$teze = $lidhja->prepare($sql);
$teze->execute(array(":id_mesues_kushti"=>$id_mesues_kushti));
$teze->execute();
$teze_te_dhena = $teze->fetchAll(PDO::FETCH_OBJ);

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

              <h3 class="box-title">Lista</h3>

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
              <?php foreach($teze_te_dhena as $te_dhena_teze ): ?>
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
                  <span style="font-size: 24px;" class="text"><?= $te_dhena_teze->emri ?></span>
                  <!-- Emphasis label -->
                  
                  <!-- General tools such as edit or delete-->
                  <div class="tools">
                    <a href="shiko_pyetjet.php?id=<?= $te_dhena_teze->id_provim ?>"><i class="fa fa-eye">  Shiko pyetjet</i></a>
                   <a href="modifiko_teze.php?id=<?= $te_dhena_teze->id_provim ?>"> <i class="fa fa-edit">  Modifiko tezen</i></a>
                    <a onclick="return confirm('Jeni te sigurte qe doni te fshini kete teze provimi? Pasi te fshihet ne menyre automatike do heqet edhe nga studentet ')" href="del/fshije_teze.php?id=<?= $te_dhena_teze->id_provim ?>"><i class="fa fa-trash-o">  Fshij tezen</i></a>
                  </div>
                </li>
                <?php endforeach; ?>
                
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix no-border">
              <button type="button" onclick="javascript: location.href = 'krijo_njoftim.php'" class="btn btn-default pull-right"><i class="fa fa-plus"></i>  Krijo nje teze provimi</button>
            </div>

          </div>

</section>
</div>


<?php
include "footer.php"

?>