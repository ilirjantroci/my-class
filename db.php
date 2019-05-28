<?php

$host = "localhost";
$user = "root";
$fjalekalimi = "";
$emri_db = "projekt";


try
{
	$lidhja_db = new PDO("mysql:host={$host};dbname={$emri_db}",$user,$fjalekalimi);
	$lidhja_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	echo $e->getMessage();
}

include_once 'ModelMesues.php';

$mesues = new mesues($lidhja_db);

?>