<?php
require ('db_config.php');

date_default_timezone_set('Asia/Kolkata');//get current date time 
$sent_datetime=date('d-m-Y H:i');


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////               SUBMIT CONTACT FROM            //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function submitContact($name,$email,$phone,$skype,$reqfor,$message)
{
	$query="INSERT INTO `tbl_Contact`(`name`, `email`, `phone`, `skype`, `reqfor`, `message`) VALUES ('".mysql_real_escape_string($name)."','".mysql_real_escape_string($email)."','".mysql_real_escape_string($phone)."','".mysql_real_escape_string($skype)."','".mysql_real_escape_string($reqfor)."','".mysql_real_escape_string($message)."')";
	$result=mysql_query($query);
	if($result==true)
	{
		echo "<div class='alert alert-success'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			  		<span aria-hidden='true'>&times;</span>
				</button>
			    <strong>Success!</strong> Message Send successfully!
			  </div>";
	}
	else
	{
		echo "<div class='alert alert-danger'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		  	<span aria-hidden='true'>&times;</span>
			</button>
		    <strong>Error!</strong> Something wrong! Message Not Send, Our developer team work on it.
		  </div>";
	}
}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////               SUBMIT CAREER FROM            //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function SubmitCareerForm($name,$Email,$Phone,$For,$Exp,$Qualification,$Institute,$PassingYear,$Percentage,$PreviousCompany,$JobRole,$AdditionalMassage,$CVLink,$realname)
{
	move_uploaded_file($CVLink,"CV_Request/".$realname) or die("Error To upload file");

	$query="INSERT INTO `tbl_career`(`Name`, `Email`, `Phone`, `Application For`, `Exp`, `Qulification`, `Institute`, `PassingYear`, `Percentage`, `PreviousCompany`, `JobRole`, `AdditionalMassage`, `cvlink`) VALUES ('".mysql_real_escape_string($name)."','".mysql_real_escape_string($Email)."','".mysql_real_escape_string($Phone)."','".mysql_real_escape_string($For)."','".mysql_real_escape_string($Exp)."','".mysql_real_escape_string($Qualification)."','".mysql_real_escape_string($Institute)."','".mysql_real_escape_string($PassingYear)."','".mysql_real_escape_string($Percentage)."','".mysql_real_escape_string($PreviousCompany)."','".mysql_real_escape_string($JobRole)."','".mysql_real_escape_string($AdditionalMassage)."','".mysql_real_escape_string($realname)."')";
	$result=mysql_query($query);
	if($result==true)
	{
		echo "<div class='alert alert-success'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			  		<span aria-hidden='true'>&times;</span>
				</button>
			    <strong>Success!</strong> Request Send successfully!
			  </div>";
	}
	else{
		echo "<div class='alert alert-danger'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		  	<span aria-hidden='true'>&times;</span>
			</button>
		    <strong>Error!</strong> Something wrong! Request Not Send, Our developer team work on it.
		  </div>";
	}
}






?>