<?php

//$DB_host = "localhost";
//$DB_user = "root";
//$DB_pass = "";
//$DB_name = "partner";

try
 {
$DBcon = new PDO(
    'postgresql:host='.getenv("POSTGRESQL_ADDON_HOST").';dbname='.getenv("POSTGRESQL_ADDON_DB"),
    getenv("POSTGRESQL_ADDON_USER"),
    getenv("POSTGRESQL_ADDON_PASSWORD")
 $DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 );
     //$DBcon = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
    // $DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }
 catch(PDOException $e)
 {
     echo "ERROR : ".$e->getMessage();
 }

 ?>
