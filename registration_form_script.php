<?php

$ServerName = "localhost";
$ServerUser = "thecqvlm_stg_cosmoj_user";
$ServerPass = "pN2JTZ-#i;xV";
$ServerDB ="thecqvlm_stg_cosmoj";

$con = mysqli_connect($ServerName,$ServerUser,$ServerPass,$ServerDB);


 //print_r($_POST);die;



$submission_id = !empty($_POST['submission_id'])?$_POST['submission_id']:NULL;
$formID = !empty($_POST['formID'])?$_POST['formID']:NULL;
$ip = !empty($_POST['ip'])?$_POST['ip']:NULL;
$companysname = !empty($_POST['companysname'])?$_POST['companysname']:NULL;
$companyscorporate31 = !empty($_POST['companyscorporate31'])?$_POST['companyscorporate31']:NULL;
$companyscorporate36 = !empty($_POST['companyscorporate36'])?json_encode(array_values($_POST['companyscorporate36'])):NULL;
$companyscorporate = !empty($_POST['companyscorporate'])?json_encode(array_values($_POST['companyscorporate'])):NULL;
$employeridentification = !empty($_POST['employeridentification'])?$_POST['employeridentification']:NULL;
$currentnumber = !empty($_POST['currentnumber'])?$_POST['currentnumber']:NULL;
$selectan = !empty($_POST['selectan'])?$_POST['selectan']:NULL;
$selectthe48 = !empty($_POST['selectthe48'])?$_POST['selectthe48']:NULL;
$selectthe = !empty($_POST['selectthe'])?$_POST['selectthe']:NULL;

//Medical Provider Form

$medicalfacilitys = !empty($_POST['medicalfacilitys']) ? $_POST['medicalfacilitys'] :NULL;
$medicalfacilitys31= !empty($_POST['medicalfacilitys31']) ? $_POST['medicalfacilitys31'] :NULL;
$medicalfacilitys36= !empty($_POST['medicalfacilitys36'])?json_encode(array_values($_POST['medicalfacilitys36'])):NULL;
$medicalfacilitys39= !empty($_POST['medicalfacilitys39'])?json_encode(array_values($_POST['medicalfacilitys39'])):NULL;
$providersnpi= !empty($_POST['providersnpi'])?$_POST['providersnpi']:NULL;
$signature = !empty($_POST['signature'])?$_POST['signature']:NULL; 
$signerstitle= !empty($_POST['signerstitle'])?$_POST['signerstitle']:NULL;

    
//Indivisual Form

$name = !empty($_POST['name'])?json_encode(array_values($_POST['name'])):NULL;
$email = !empty($_POST['email']) ? $_POST['email']:NULL;
$phonenumber = !empty($_POST['phonenumber'])?json_encode(array_values($_POST['phonenumber'])):NULL;
$address = !empty($_POST['address'])?json_encode(array_values($_POST['address'])):NULL;
$dateof = !empty($_POST['dateof'])?json_encode(array_values($_POST['dateof'])):NULL;
$doyou = !empty($_POST['doyou']) ? $_POST['doyou']:NULL;
$whatinvestment =  !empty($_POST['whatinvestment']) ? $_POST['whatinvestment']:NULL;
$selectthe24 =  !empty($_POST['selectthe24']) ? $_POST['selectthe24']:NULL;
$cosmojuser28 =  !empty($_POST['cosmojuser28']) ? $_POST['cosmojuser28']:NULL;
$myproducts =  !empty($_POST['myproducts'])?json_encode(array_values($_POST['myproducts'])):NULL;


//Cosmoj Pet Form

$petname = !empty($_POST['petname'])?json_encode(array_values($_POST['petname'])):NULL;
$petspecies = !empty($_POST['petspecies']) ? $_POST['petspecies']:NULL;
$ifother = !empty($_POST['ifother']) ? $_POST['ifother']:NULL;
$petssex = !empty($_POST['petssex']) ? $_POST['petssex']:NULL;

$nameof = !empty($_POST['nameof'])?json_encode(array_values($_POST['nameof'])):NULL;
$emailof = !empty($_POST['emailof']) ? $_POST['emailof']:NULL;
$petowner = !empty($_POST['petowner'])?json_encode(array_values($_POST['petowner'])):NULL;

$petowners18 = !empty($_POST['petowners18'])?json_encode(array_values($_POST['petowners18'])):NULL;
$petowners = !empty($_POST['petowners'])?json_encode(array_values($_POST['petowners'])):NULL;



//medical Expance Form
$providerprofessionalperforming = !empty($_POST['providerprofessionalperforming']) ? $_POST['providerprofessionalperforming']:NULL;
$totalcost = !empty($_POST['totalcost']) ? $_POST['totalcost']:NULL;
$paymentplan = !empty($_POST['paymentplan']) ? $_POST['paymentplan']:NULL;
$selecta15 = !empty($_POST['selecta15']) ? $_POST['selecta15']:NULL;
$staffcode = !empty($_POST['staffcode']) ? $_POST['staffcode']:NULL;



$whatinvestment_value="";


if(!empty($_POST['formID']) && $formID=='220293270578054')
{
	$email_login=$companyscorporate31;
	$password=password_hash('123456789', PASSWORD_DEFAULT);
	
	$status='INACTIVE';
}

else if(!empty($_POST['formID']) && $formID=='221285138447155')
{
	$email_login=$medicalfacilitys31;
	$password=password_hash('123456789', PASSWORD_DEFAULT);
	$status='INACTIVE';
}
else if(!empty($_POST['formID']) && $formID=='202326521388049')
{
	$email_login=$email;
	$password=password_hash('123456789', PASSWORD_DEFAULT);
	$status='INACTIVE';
}
else if(!empty($_POST['formID']) && $formID=='220293270578054')
{
	$email_login=$companyscorporate31;
	$password=password_hash('123456789', PASSWORD_DEFAULT);
	$status='INACTIVE';
}



else if(!empty($_POST['formID']) && $formID=='220293678807061')
{
	$email_login=$email;
	$password=password_hash('123456789', PASSWORD_DEFAULT);
	$status='INACTIVE';
if($whatinvestment=="The Apprentice Investment; Cash Management Investment Based on Fixed Monthly Amount-$36 enrollment-$36/month-for 36 months Investment")
{
	$whatinvestment_value="1";


}

else if($whatinvestment=="The Lux Package; Cash Management Savings Based on individual's annual income (Individual must contribute at least 4% of income)")
{
	$whatinvestment_value="2";


}
else if($whatinvestment=="The V-I-P Share; Portfolio Investment Product(s)")
{
	$whatinvestment_value="3";


}
}

else if(!empty($_POST['formID']) && $formID=='221278115891155')
{
	$email_login=$emailof;
	$password=password_hash('123456789', PASSWORD_DEFAULT);
	$status='INACTIVE';

	if($whatinvestment=="The Standard Pet Plan; Cash Management Investment Based on Fixed Monthly Amount-$15 enrollment-$15/month-for 12 months Investment")
	{
		$whatinvestment_value="1";


	}

	else if($whatinvestment=="The Pet-Custo Plan; Cash Management Savings. Individual Elects Fixed Dollar Amount to Contribute Towards Pet(s)' savings (Individual must contribute more than $15 monthly)")
	{
		$whatinvestment_value="2";


	}

}

	$query_submission_id = "select * from leads where submission_id='".$submission_id."'";
	$Result_submission = mysqli_query($con,$query_submission_id);
	$RUser_search_id = mysqli_num_rows($Result_submission);
	
	
	
	
	if($RUser_search_id > 0)
	{   

		
		$query_update_form="UPDATE `leads` SET `submission_id`='$submission_id',
		`formID`='$formID',`ip`='$ip',`companysname`='$companysname',`companyscorporate31`='$companyscorporate31',
		`companyscorporate36`='$companyscorporate36',`companyscorporate`='$companyscorporate',`employeridentification`='$employeridentification',
		`currentnumber`='$currentnumber',`selectan`='$selectan',`selectthe48`='$selectthe48',
		`selectthe`='$selectthe', 'medicalfacilitys=$medicalfacilitys', '$medicalfacilitys31=$medicalfacilitys31', 'medicalfacilitys36=$medicalfacilitys36', 'medicalfacilitys39=$medicalfacilitys39',
		'providersnpi=$providersnpi','signature=$signature','signerstitle=$signerstitle','name=$name','email=$email','phoneNumber=$phonenumber',
		'address=$address','dateOf=$dateof','doYou=$doyou','whatInvestment =$whatinvestment_value','selectThe24=$selectthe24','cosmojuser28=$cosmojuser28'
		,'myproducts=$myproducts','petname=$petname','petspecies=$petspecies','ifother=$ifother'
		,'petssex=$petssex','nameof=$nameof','emailof=$emailof','petowner=$petowner','petowners18=$petowners18','petowners=$petowners','totalcost=$totalcost','paymentplan=$paymentplan','selecta15=$selecta15','staffcode=$staffcode','providerprofessionalperforming=$providerprofessionalperforming','login_email=$email_login','login_password=$password'
		WHERE submission_id='$submission_id'";

		// $query_user_update="UPDATE `users` SET 
		// `email`='$email_login',
		// `password`='$password',`status`='$status',`formID`='$formID' ,submission_id='$submission_id' WHERE submission_id='$submission_id'";
		// $Resultupdate_users = mysqli_query($con,$query_user_update);

		// $Resultupdate = mysqli_query($con,$query_update_form);
		
	
  
  
		
		}
			else
			{
	
	
	$querylead_auto_id = "select * from leads order by id desc limit 1";
	$Result_lead_auto_id = mysqli_query($con,$querylead_auto_id);
	$RUser_auto_id = mysqli_num_rows($Result_lead_auto_id);
	
	
	
	
	if($RUser_auto_id > 0)
	{   
		$row = $Result_lead_auto_id->fetch_assoc();
		$var_lead_code_ex =explode("-",$row["lead_id"]);
		$var_lead_id= $var_lead_code_ex[1] + 1;
		$lead_id=$var_lead_code_ex[0]."-".$var_lead_id;
		
		
		}
			else
			{
				
				$lead_id="CLIENT-1";
				
				}		




$queryInsert = "INSERT INTO `leads`(lead_id,`submission_id`, `formID`, `ip`, `companysname`, 
`companyscorporate31`, `companyscorporate36`, `companyscorporate`, `employeridentification`,
 `currentnumber`, `selectan`,selectthe48,selectthe,medicalfacilitys,medicalfacilitys31,medicalfacilitys36,medicalfacilitys39,providersnpi,signature,signerstitle,
 `name`, `email`, `address`, `phoneNumber`, `dateOf`, `doYou`, `whatInvestment`, `selectThe24`, `cosmojuser28`,myproducts,`petname`, `petspecies`, `ifother`, `petssex`, `nameof`, `emailof`, `petowner`, `petowners18`, `petowners`,`totalcost`, `paymentplan`, `selecta15`, `staffcode`,providerprofessionalperforming,login_email,login_password) 
 VALUES ('$lead_id','$submission_id','$formID','$ip','$companysname','$companyscorporate31','$companyscorporate36','$companyscorporate','$employeridentification','$currentnumber','$selectan','$selectthe48','$selectthe','$medicalfacilitys','$medicalfacilitys31','$medicalfacilitys36',
 '$medicalfacilitys39','$providersnpi','$signature','$signerstitle','$name','$email','$address','$phonenumber','$dateof','$doyou','$whatinvestment_value',
 '$selectthe24','$cosmojuser28','$myproducts','$petname', '$petspecies', '$ifother', '$petssex', '$nameof','$emailof', '$petowner', '$petowners18', '$petowners','$totalcost', '$paymentplan', '$selecta15', '$staffcode','$providerprofessionalperforming','$email_login','$password')";




// $queryInsert_user = "INSERT INTO `users`( `email`, `password`, `status`,`formID`,submission_id) VALUES ('$email_login','$password','$status','$formID','$submission_id')";


// $ResultInsert_user = mysqli_query($con,$queryInsert_user);

$ResultInsert = mysqli_query($con,$queryInsert);
				



				}				
		
		
		








// search submission ID

	
//print_r($queryInsert);
//print_r($_POST);

//die;


 
 
 include('success_page.php');




?>