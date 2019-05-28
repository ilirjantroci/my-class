<?php

require '../db.php';
$id = $_GET['id'];
$sql = 'DELETE FROM njoftim WHERE id_njoftim=:id';
$lidhjaaa = $lidhja->prepare($sql);
if ($lidhjaaa->execute([':id' => $id])) {
  header("Location: ../lista_njoftimeve.php");
}
?>