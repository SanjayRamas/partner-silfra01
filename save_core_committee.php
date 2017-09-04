<?php

require_once 'db_config.php';

$training_excellence=$_POST['training_excellence'];
$partner_head=$_POST['partner_head'];
$delivery_head=$_POST['delivery_head'];
 
$stmt7 = $DBcon->query("SELECT count(email) FROM core_committee");


	
$stmt = $bdd->prepare("INSERT INTO core_committee (email) VALUES('$partner_head')"); 

$stmt2 = $bdd->prepare("INSERT INTO core_committee (email) VALUES('$training_excellence')");
$stmt3 = $bdd->prepare("INSERT INTO core_committee (email) VALUES('$delivery_head')");
$stmt4 = $bdd->query("UPDATE core_committee SET email = '$partner_head' WHERE id = '1' ");
$stmt5 = $bdd->query("UPDATE core_committee SET email = '$training_excellence' WHERE id = '2' ");
$stmt6 = $bdd->query("UPDATE core_committee SET email = '$delivery_head' WHERE id = '3' ");


$row = $stmt7->rowCount();
var_dump($stmt7);
echo $row . "<br>";
var_dump($row);


var_dump($stmt);
$stmt->execute();
$stmt4->execute();
$stmt2->execute();
$stmt5->execute();
$stmt3->execute();
$stmt6->execute();

//$stmt2->execute();
//$stmt3->execute();

/*
else {
	var_dump($stmt4);
  $stmt4->execute();
$stmt5->execute();
$stmt6->execute();
}*/




?>
