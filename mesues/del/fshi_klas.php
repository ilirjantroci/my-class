<?php

require '../db.php';
$id = $_GET['id'];
$sql = 'DELETE FROM klasa WHERE id_klasa=:id';
$lidhjaaa = $lidhja->prepare($sql);
if ($lidhjaaa->execute([':id' => $id])) {
  header("Location: ../panel_klas.php");
}
?>