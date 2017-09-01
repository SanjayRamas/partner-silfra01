<?php

require_once 'db_config.php';

$training_excellence=$_POST['training_excellence'];
$partner_head=$_POST['partner_head'];
$delivery_head=$_POST['delivery_head'];
 

$stmt = $DBcon->prepare("INSERT INTO core_committee (email) VALUES('$partner_head')");
$stmt2 = $DBcon->prepare("INSERT INTO core_committee (email) VALUES('$training_excellence')");
$stmt3 = $DBcon->prepare("INSERT INTO core_committee (email) VALUES('$delivery_head')");

$stmt4 =  $DBcon->prepare("UPDATE core_committee SET email = '$partner_head' WHERE id = '1' ");
$stmt5 =  $DBcon->prepare("UPDATE core_committee SET email = '$training_excellence' WHERE id = '2' ");
$stmt6 =  $DBcon->prepare("UPDATE core_committee SET email = '$delivery_head' WHERE id = '3' ");

$row = $stmt->rowCount();
if ($row = 0){
$stmt->execute();
$stmt2->execute();
$stmt3->execute();
} else{
  $stmt4->execute();
$stmt5->execute();
$stmt6->execute();
}




?>
