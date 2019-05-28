<?php

require '../db.php';
$id = $_GET['id'];
$sql = 'DELETE FROM grafik_notash WHERE id_grafik_notash=:id';
$lidhjaaa = $lidhja->prepare($sql);
if ($lidhjaaa->execute([':id' => $id])) {
  header("Location: ../lista_studenteve.php");
}
?>