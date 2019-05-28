<?php
include "header.php";
require 'db.php';

foreach ($mesuesit as $mesues) {
   $id_mesues_kushti= $mesues->id_mesues; 
}



$id = $_GET['id'];
$sql = 'SELECT * FROM njoftim WHERE id_njoftim=:id';
$lidhjaaa = $lidhja->prepare($sql);
$lidhjaaa->execute([':id' => $id]);
$lidhjaaa->execute();
$njoftim_lexo=$lidhjaaa->fetchAll(PDO::FETCH_OBJ);

foreach ($njoftim_lexo as $lexo_njoftim) {
	$id_kushti=$lexo_njoftim->id_mesues;
}

$sql1="SELECT * FROM mesues WHERE id_mesues=:id_kushti";
$mesues_s = $lidhja->prepare($sql1);
$mesues_s->execute(array(":id_kushti"=>$id_kushti));
$mesues_s->execute();
$mesues_te_dhena = $mesues_s->fetchAll(PDO::FETCH_OBJ);

?>

<!--Shkruaj kod per kete sesion-->
<section class="content">

    <div class="callout callout-success">
      <h4>Njoftime</h4> 
       <p>
       Lexo njoftim</p>
    </div>

<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Njoftimi eshte i hapur</h3>

              <div class="box-tools pull-right">
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Previous"><i class="fa fa-chevron-left"></i></a>
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Next"><i class="fa fa-chevron-right"></i></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
              	<?php foreach($njoftim_lexo as $lexo_njoftim ): ?>
                <h3><b><?= $lexo_njoftim->titulli?></b></h3>
                <?php endforeach; ?>
                <?php foreach($mesues_te_dhena as $te_dhena_mesues ): ?>
                <h5 >Postuar nga: <?= $te_dhena_mesues->emri?>  <?= $te_dhena_mesues->mbiemri?></h5>
                <?php endforeach; ?>
                <?php foreach($njoftim_lexo as $lexo_njoftim ): ?>
                  <span class="mailbox-read-time pull-right">Postuar me   :  <?= $lexo_njoftim->data_krijimit?></span></h5>
                   
              </div>
              <!-- /.mailbox-read-info -->
             <hr style="  border-top: 1px dashed red;">
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                

                <p style="font-size: 25px;"><?= $lexo_njoftim->pershkrimi?></p>

                
                
                <?php endforeach; ?>
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.box-body -->
            
            <!-- /.box-footer -->
            <div class="box-footer">
              <?php foreach($njoftim_lexo as $lexo_njoftim ): ?>
              <button type="button" class="btn btn-default"><a onclick="return confirm('Jeni te sigurte qe doni te fshini kete njoftim?            Pasi te fshihet nuk do te kete me kthim pas')" href="del/fshi_njoftim.php?id=<?= $lexo_njoftim->id_njoftim ?>"><i class="fa fa-trash-o"></i> Fshij njoftimin</a></button>
              <button type="button" class="btn btn-default"><a href="lista_njoftimeve.php"><i class="fa fa-reply"></i>  Kthehu pas</a> </button>
            </div>
            <?php endforeach; ?>
            <!-- /.box-footer -->
          </div>
</section>
</div>


<?php
include "footer.php"

?>