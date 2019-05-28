<?php
include "header.php";
require_once("db.php");

foreach ($mesuesit as $mesues) {
   $id_mesues_kushti= $mesues->id_mesues; 
}
$sql = 'SELECT * FROM njoftim WHERE id_mesues=:id_mesues_kushti';
$njoftim = $lidhja->prepare($sql);
$njoftim->execute(array(":id_mesues_kushti"=>$id_mesues_kushti));
$njoftim->execute();
$njoftim_te_dhena = $njoftim->fetchAll(PDO::FETCH_OBJ);

?>


<section class="content">
<!--Shkruaj kod per kete sesion-->
    <div class="callout callout-success">
      <h4>Lista njoftimeve</h4> 
       <p>
       Lista njoftimeve</p>
    </div>
<div class="box box-primary" style="position: relative; left: 0px; top: 0px;">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">Njoftimet</h3>

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
              <?php foreach($njoftim_te_dhena as $te_dhena_njoftim ): ?>
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
                  <span class="text"><?= $te_dhena_njoftim->titulli ?></span>
                  <!-- Emphasis label -->
                  <small class="label label-danger"><i class="fa fa-clock-o"></i><?= $te_dhena_njoftim->data_krijimit ?></small>
                  <!-- General tools such as edit or delete-->
                  <div class="tools">
                    <a href="lexo_njoftim.php?id=<?= $te_dhena_njoftim->id_njoftim ?>"><i class="fa fa-eye">  Lexo njoftimin</i></a>
                   <a href="modifiko_njoftim.php?id=<?= $te_dhena_njoftim->id_njoftim ?>"> <i class="fa fa-edit">  Modifiko</i></a>
                    <a onclick="return confirm('Jeni te sigurte qe doni te fshini kete njoftim?            Pasi te fshihet nuk do te kete me kthim pas')" href="del/fshi_njoftim.php?id=<?= $te_dhena_njoftim->id_njoftim ?>"><i class="fa fa-trash-o">  Fshij</i></a>
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