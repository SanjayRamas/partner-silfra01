<?php

require_once 'db_config.php';


error_log(var_dump($_POST));


$conn = mysqli_connect("localhost", "root", "");
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
$mail->Body = "Dear member,<br><br><hr> ";



$partner_type=$_POST['partner_type'];


if($partner_type='Cluster_NGO_partner'&&$partner_type!='Fully_funded_project_implementation_partner'&&$partner_type!='Corporate_implementation_partner'&&$partner_type!='Participative_partner_with_self-sustenance')
{
	//cluster_ngo_partner
$legal_name=$_POST['legal_name'];
$ngo_status=$_POST['ngo_status'];
$ho_location=$_POST['ho_location'];
$ho_address=$_POST['ho_address'];
$key_trustee_name=$_POST['key_trustee_name'];
$trustee_contact_mobile=$_POST['trustee_contact_mobile'];
$trustee_email=$_POST['trustee_email'];
$modelName=$_POST['modelName'];
//cluster_ngo_partner
$stmt = $DBcon->prepare("INSERT INTO cluster_ngo_partner(legal_name,ngo_status,ho_location,ho_address,key_trustee_name,trustee_contact_mobile,trustee_email,modelName,partner_type,valid) VALUES( '$legal_name','$ngo_status','$ho_location','$ho_address','$key_trustee_name','$trustee_contact_mobile','$trustee_email','$modelName','cluster_ngo','no')");
$stmt->execute();



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

elseif($partner_type='Corporate_implementation_partner'&&$partner_type!='Fully_funded_project_implementation_partner'&&$partner_type!='Cluster_NGO_partner'&&$partner_type!='Participative_partner_with_self-sustenance')
{
	//corporate_implementation_partner
$corporate_legal_name=$_POST['corporate_legal_name'];
$csr_director_name=$_POST['csr_director_name'];
$csr_director_mobile=$_POST['csr_director_mobile'];
$number_csr_locations=$_POST['number_csr_locations'];
$number_shareable_csr_locations=$_POST['number_shareable_csr_locations'];
$spectfic_instruction_to_HHH=$_POST['spectfic_instruction_to_HHH'];
$csr_budgets_available_this_FY_for_trainer_salaries=$_POST['csr_budgets_available_this_FY_for_trainer_salaries'];
$other_temp_staff_to_help_HHH_student_mobilization=$_POST['other_temp_staff_to_help_HHH_student_mobilization'];
$location_csr_rep_name=$_POST['location_csr_rep_name']; 
$location_csr_rep_email=$_POST['location_csr_rep_email']; 
$template_for_data_collection_from_MIC=$_POST['template_for_data_collection_from_MIC'];
$csr_director_email=$_POST['csr_director_email'];
//corporate_implementation_partner
$stmt2 = $DBcon->prepare("INSERT INTO corporate_implementation_partner (corporate_legal_name,csr_director_name,	csr_director_mobile,number_csr_locations,number_shareable_csr_locations,spectfic_instruction_to_HHH,location_csr_rep_name,location_csr_rep_email,csr_budgets_available_this_FY_for_trainer_salaries,other_temp_staff_to_help_HHH_student_mobilization,	template_for_data_collection_from_MIC,csr_director_email,partner_type,valid) VALUES('$corporate_legal_name','$csr_director_name','$csr_director_mobile','$number_csr_locations','$number_shareable_csr_locations','$spectfic_instruction_to_HHH','$location_csr_rep_name','$location_csr_rep_email','$csr_budgets_available_this_FY_for_trainer_salaries','$other_temp_staff_to_help_HHH_student_mobilization','$template_for_data_collection_from_MIC','$csr_director_email','corporate_implementation_partner','no')");
$stmt2->execute();

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

elseif($partner_type='Participative_partner_with_self-sustenance'&&$partner_type!='Fully_funded_project_implementation_partner'&&$partner_type!='Corporate_implementation_partner'&&$partner_type!='Cluster_NGO_partner')
{
	//fully_funded_project_implementation_partner
$f_legal_name=$_POST['f_legal_name'];
$f_ngo_status=$_POST['f_ngo_status'];
$f_ho_location=$_POST['f_ho_location'];
$f_ho_address=$_POST['f_ho_address'];
$f_key_trustee_name=$_POST['f_key_trustee_name'];
$f_trustee_contact_mobile=$_POST['f_trustee_contact_mobile'];
$f_trustee_email=$_POST['f_trustee_email'];
$number_center_ready_with_facilities=$_POST['number_center_ready_with_facilities'];
$discussed_approximate_cost_per_student_in_residential_format=$_POST['discussed_approximate_cost_per_student_in_residential_format'];
$accomodation_to_HHH_Trainer_at_no_cost=$_POST['accomodation_to_HHH_Trainer_at_no_cost'];
$discussed_cost_of_mobilization_for_MIC_program=$_POST['discussed_cost_of_mobilization_for_MIC_program'];
$dedicated_project_manager_for_HHH_program=$_POST['dedicated_project_manager_for_HHH_program'];
//participative_partner_with_self
$stmt4 = $DBcon->prepare("INSERT INTO participative_partner_with_self-sustenance (`p_legal_name`, `p_ngo_status`, `p_ho_location`, `p_ho_address`, `p_key_trustee_name`, `p_trustee_contact_mobile`, `p_trustee_email`, `number_center_to_start`, `number_of_staff_to_be_nominated_for_TTT_at_Tumkur`, `it_infra_readiness_for_MIC`, `domain_technical_training_to_add_to_MIC_program`, `domain_details_number_training_hours_needed`, `partner_type`, `valid`) VALUES('$p_legal_name', '$p_ngo_status', '$p_ho_location', '$p_ho_address', '$p_key_trustee_name', '$p_trustee_contact_mobile', '$p_trustee_email', '$number_center_to_start', '$number_of_staff_to_be_nominated_for_TTT_at_Tumkur','$it_infra_readiness_for_MIC', '$domain_technical_training_to_add_to_MIC_program', '$domain_details_number_training_hours_needed', 'participative_partner_with_self-sustenance', 'no')");
$stmt4->execute();

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

elseif($partner_type='Fully_funded_project_implementation_partner'&&$partner_type!='Cluster_NGO_partner'&&$partner_type!='Corporate_implementation_partner'&&$partner_type!='Participative_partner_with_self-sustenance')
{
	//participative_partner_with_self
$p_legal_name=$_POST['p_legal_name'];
$p_ngo_status=$_POST['p_ngo_status'];
$p_ho_location=$_POST['p_ho_location'];
$p_ho_address=$_POST['p_ho_address'];
$p_key_trustee_name=$_POST['p_key_trustee_name'];
$p_trustee_contact_mobile=$_POST['p_trustee_contact_mobile'];
$p_trustee_email=$_POST['p_trustee_email'];
$number_center_to_start=$_POST['number_center_to_start'];
$number_of_staff_to_be_nominated_for_TTT_at_Tumkur=$_POST['number_of_staff_to_be_nominated_for_TTT_at_Tumkur'];
$it_infra_readiness_for_MIC=$_POST['it_infra_readiness_for_MIC'];
$domain_technical_training_to_add_to_MIC_program=$_POST['domain_technical_training_to_add_to_MIC_program'];
$domain_details_number_training_hours_needed=$_POST['domain_details_number_training_hours_needed'];
//fully_funded_project_implementation_partner
$stmt3 = $DBcon->prepare("INSERT INTO fully_funded_project_implementation_partner (f_legal_name,f_ngo_status,f_ho_location,f_ho_address,f_key_trustee_name,f_trustee_contact_mobile,f_trustee_email,	number_center_ready_with_facilities,discussed_approximate_cost_per_student_in_residential_format,accomodation_to_HHH_Trainer_at_no_cost,discussed_cost_of_mobilization_for_MIC_program,dedicated_project_manager_for_HHH_program,partner_type,valid) VALUES( '$f_legal_name','$f_ngo_status','$f_ho_location','$f_ho_address','$f_key_trustee_name','$f_trustee_contact_mobile','$f_trustee_email','$number_center_ready_with_facilities','$discussed_approximate_cost_per_student_in_residential_format','$accomodation_to_HHH_Trainer_at_no_cost','$discussed_cost_of_mobilization_for_MIC_program','$dedicated_project_manager_for_HHH_program','fully_funded_project_implementation_partner','no')");
$stmt3->execute();

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
else{
	echo 'error';
}


/*$stmt->execute();*/
/*$row = $stmt->rowCount();
if ($row > 0){
    echo "correct";
} else{
    echo 'wrong';
}*/

?>
