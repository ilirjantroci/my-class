<?php

require '../db.php';
$id = $_GET['id'];
$sql = 'DELETE FROM orari_mesimor WHERE id_orari=:id';
$lidhjaaa = $lidhja->prepare($sql);
if ($lidhjaaa->execute([':id' => $id])) {
  header("Location: ../shiko_orarin.php");
}
?>