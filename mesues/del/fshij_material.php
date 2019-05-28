<?php

require '../db.php';
$id = $_GET['id'];
$sql = 'DELETE FROM materiale WHERE id_materiale=:id';
$lidhjaaa = $lidhja->prepare($sql);
if ($lidhjaaa->execute([':id' => $id])) {
  header("Location: ../materiale.php");
}
?>