<?php

require '../db.php';
$id = $_GET['id'];
$sql = 'DELETE FROM teze_provimi WHERE id_provim=:id';
$lidhjaaa = $lidhja->prepare($sql);
if ($lidhjaaa->execute([':id' => $id])) {
  header("Location: ../teze.php");
}
?>