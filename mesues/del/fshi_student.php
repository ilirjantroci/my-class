<?php

require '../db.php';
$id = $_GET['id'];
$sql = 'DELETE FROM student WHERE id_student=:id';
$lidhjaaa = $lidhja->prepare($sql);
if ($lidhjaaa->execute([':id' => $id])) {
  header("Location: ../lista_studenteve.php");
}
?>