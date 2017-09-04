<?php 
                require_once 'db_config.php';
				
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "partner";


                $conn = new mysqli($servername, $username, $password, $dbname);
                
				include "classes/class.phpmailer.php"; // include the class name
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "silfratech.01@gmail.com";
$mail->Password = "silfraTech_01";
$mail->SetFrom("silfratech.01@gmail.com");
$mail->Subject = "SilfraTech";
$mail->Body = "Dear member,<br><br>Validated<hr> ";
				
				
				if(gettype($_POST['legal_name'])=="array"){
foreach($_POST['legal_name'] as $val){
 $id_c=$val;
 // $sql="UPDATE cluster_ngo_partner SET valid = 'yes' WHERE legal_name='$id_c'";
   $DBcon->query("UPDATE cluster_ngo_partner SET valid = 'yes' WHERE legal_name='$id_c'");
  
  //Email
   $sth = $DBcon->prepare("SELECT email FROM core_committee WHERE id = 1");
$sth2 = $DBcon->prepare("SELECT email FROM core_committee WHERE id = 2");
$sth3 = $DBcon->prepare("SELECT email FROM core_committee WHERE id = 3");
$sth->execute();
$sth2->execute();
$sth3->execute();
$result = $sth->fetch(PDO::FETCH_ASSOC);
$result2 = $sth2->fetch(PDO::FETCH_ASSOC);
$result3 = $sth3->fetch(PDO::FETCH_ASSOC);
$row = $result;
$row2 = $result2;
$row3 = $result3;
	//error_log(var_dump($row));
  $to = $row["email"];
  $to2 = $row2["email"];
  $to3 = $row3["email"];
  $mail->AddAddress("$to");
  $mail->AddAddress("$to2");
  $mail->AddAddress("$to3");
	
 if(!$mail->Send()){
	echo "Mailer Error: " . $mail->ErrorInfo;
}
else{
	echo "Message has been sent";
} 
}
}

if(gettype($_POST['corporate_legal_name'])=="array"){
foreach($_POST['corporate_legal_name'] as $val){
 $id_c=$val;
  // $sql="UPDATE corporate_implementation_partner SET valid = 'yes' WHERE corporate_legal_name='$id_c'";
   $DBcon->query("UPDATE corporate_implementation_partner SET valid = 'yes' WHERE corporate_legal_name='$id_c'");
  
  //Email
   $sth = $DBcon->prepare("SELECT email FROM core_committee WHERE id = 1");
$sth2 = $DBcon->prepare("SELECT email FROM core_committee WHERE id = 2");
$sth3 = $DBcon->prepare("SELECT email FROM core_committee WHERE id = 3");
$sth->execute();
$sth2->execute();
$sth3->execute();
$result = $sth->fetch(PDO::FETCH_ASSOC);
$result2 = $sth2->fetch(PDO::FETCH_ASSOC);
$result3 = $sth3->fetch(PDO::FETCH_ASSOC);
$row = $result;
$row2 = $result2;
$row3 = $result3;
	//error_log(var_dump($row));
  $to = $row["email"];
  $to2 = $row2["email"];
  $to3 = $row3["email"];
  $mail->AddAddress("$to");
  $mail->AddAddress("$to2");
  $mail->AddAddress("$to3");
	
 if(!$mail->Send()){
	echo "Mailer Error: " . $mail->ErrorInfo;
}
else{
	echo "Message has been sent";
} 
}
}

if(gettype($_POST['p_legal_name'])=="array"){
foreach($_POST['p_legal_name'] as $val){
 $id_c=$val;

 // $sql="UPDATE `participative_partner_with_self-sustenance` SET `valid` = 'yes' WHERE p_legal_name = '$id_c'";
   $DBcon->query("UPDATE `participative_partner_with_self-sustenance` SET `valid` = 'yes' WHERE p_legal_name = '$id_c'");
  
  //Email
   $sth = $DBcon->prepare("SELECT email FROM core_committee WHERE id = 1");
$sth2 = $DBcon->prepare("SELECT email FROM core_committee WHERE id = 2");
$sth3 = $DBcon->prepare("SELECT email FROM core_committee WHERE id = 3");
$sth->execute();
$sth2->execute();
$sth3->execute();
$result = $sth->fetch(PDO::FETCH_ASSOC);
$result2 = $sth2->fetch(PDO::FETCH_ASSOC);
$result3 = $sth3->fetch(PDO::FETCH_ASSOC);
$row = $result;
$row2 = $result2;
$row3 = $result3;
	//error_log(var_dump($row));
  $to = $row["email"];
  $to2 = $row2["email"];
  $to3 = $row3["email"];
  $mail->AddAddress("$to");
  $mail->AddAddress("$to2");
  $mail->AddAddress("$to3");
	
 if(!$mail->Send()){
	echo "Mailer Error: " . $mail->ErrorInfo;
}
else{
	echo "Message has been sent";
} 
}
}

if(gettype($_POST['f_legal_name'])=="array"){
foreach($_POST['f_legal_name'] as $val){
 $id_c=$val;
 // $sql="UPDATE fully_funded_project_implementation_partner SET valid = 'yes' WHERE f_legal_name='$id_c'";
   $DBcon->query("UPDATE fully_funded_project_implementation_partner SET valid = 'yes' WHERE f_legal_name='$id_c'");
  
  //Email
   $sth = $DBcon->prepare("SELECT email FROM core_committee WHERE id = 1");
$sth2 = $DBcon->prepare("SELECT email FROM core_committee WHERE id = 2");
$sth3 = $DBcon->prepare("SELECT email FROM core_committee WHERE id = 3");
$sth->execute();
$sth2->execute();
$sth3->execute();
$result = $sth->fetch(PDO::FETCH_ASSOC);
$result2 = $sth2->fetch(PDO::FETCH_ASSOC);
$result3 = $sth3->fetch(PDO::FETCH_ASSOC);
$row = $result;
$row2 = $result2;
$row3 = $result3;
	//error_log(var_dump($row));
  $to = $row["email"];
  $to2 = $row2["email"];
  $to3 = $row3["email"];
  $mail->AddAddress("$to");
  $mail->AddAddress("$to2");
  $mail->AddAddress("$to3");
	
 if(!$mail->Send()){
	echo "Mailer Error: " . $mail->ErrorInfo;
}
else{
	echo "Message has been sent";
} 
}
}
                
?>
