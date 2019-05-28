<?php

try{
$lidhja = new PDO ("mysql:host=localhost;dbname=projekt","root","");
} 
catch(PDOException $e)
{
echo "Lidhja me serverin deshtoi , ju lutem kontrolloni te dhenat e serverit :/ :/ :/ ".$e->getMessage();
}

?>