<?php
include ('db_config.php');

date_default_timezone_set('Asia/Kolkata');//get current date time 
$sent_datetime=date('d-m-Y');//get current date time 




////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////Create New Portfolio////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



function createPortfolio($type,$category,$img,$youtube)
{
	$rand=md5(rand()).".jpg";
	move_uploaded_file($img,"upload/Portfolio/".$rand) or die("Error To upload file");


	$query="INSERT INTO `tbl_portfolio`(`category`,`type`, `imgpath`, `youtubelink`, `datetime`) VALUES ('".mysql_real_escape_string($category)."','".mysql_real_escape_string($type)."','".mysql_real_escape_string($rand)."','".mysql_real_escape_string($youtube)."','".mysql_real_escape_string(date('d-m-Y H:i'))."')";
	$result=mysql_query($query);
	if($result==true)
	{
		echo "<div class='alert alert-success'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			  		<span aria-hidden='true'>&times;</span>
				</button>
			    <strong>Success!</strong> Portfolio has been added successfully!
			  </div>";
	}
	else
	{
		echo "<div class='alert alert-danger'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		  	<span aria-hidden='true'>&times;</span>
			</button>
		    <strong>Error!</strong> Something went wrong!
		  </div>";
	}
}




////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    			Delete Portfolio 				////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function DeletePortfolio($id)
{
	$query="DELETE FROM `tbl_portfolio` WHERE `id`='".base64_decode($id)."'";
	$result=mysql_query($query);
	if($result==true)
	{
		echo "<div class='alert alert-danger'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		  	<span aria-hidden='true'>&times;</span>
			</button>
		    <strong>Deleted!</strong> Portfolio Deleted
		  </div>";
	}
	else
	{
		echo "<div class='alert alert-danger'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		  	<span aria-hidden='true'>&times;</span>
			</button>
		    <strong>Error!</strong> Portfolio Deleted
		  </div>";
	}
}



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    			Delete ImageSlider 				////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function DeleteImage($id)
{
	$query="DELETE FROM `tbl_imageslider` WHERE `id`='".base64_decode($id)."'";
	$result=mysql_query($query);
	if($result==true)
	{
		echo "<div class='alert alert-danger'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		  	<span aria-hidden='true'>&times;</span>
			</button>
		    <strong>Deleted!</strong> Portfolio Deleted
		  </div>";
	}
	else
	{
		echo "<div class='alert alert-danger'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		  	<span aria-hidden='true'>&times;</span>
			</button>
		    <strong>Error!</strong> Portfolio Deleted
		  </div>";
	}
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    		Create New Services				////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function CreateServices($name,$shortDiscription,$SingleImage,$Discription)
{
	$randChar=md5(rand()).".jpg";
    move_uploaded_file($SingleImage,"upload/ServicesCoverImages/".$randChar) or die("Error To upload file");

	$query="INSERT INTO `tbl_sevices`(`Name`, `ShortDiscription`, `ImgPath`, `Discription`) VALUES ('".mysql_real_escape_string($name)."','".mysql_real_escape_string($shortDiscription)."','".$randChar."','".mysql_real_escape_string($Discription)."')";
	mysql_query($query) or die("<script>alert('Some Problem is occurd,Contact your IT team')</script>");

		echo "<div class='alert alert-success'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			  		<span aria-hidden='true'>&times;</span>
				</button>
			    <strong>Success!</strong> Services has been added successfully!
			  </div>";
			  return mysql_insert_id();
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    		Delete Services				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function DeleteServices($id)
{
	$id=base64_decode($id);

	$query1="DELETE FROM `tbl_sevices` WHERE `id`='".mysql_real_escape_string($id)."' ";
	$query2="DELETE FROM `tbl_servicesimg` WHERE `Services_id`='".mysql_real_escape_string($id)."' ";
	mysql_query($query1);
	mysql_query($query2);

	echo "<div class='alert alert-danger'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		  	<span aria-hidden='true'>&times;</span>
			</button>
		    <strong>Sucess!</strong> Services Deleted
		  </div>";
}



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    		Create New Tuorials				////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function CreateTutoral($SingleImage,$YoutubeLink)
{
	$randChar=md5(rand()).".jpg";
    move_uploaded_file($SingleImage,"upload/TutorialCover/".$randChar) or die("Error To upload file");

	$query="INSERT INTO `tbl_tutorlas`( `imgLink`, `youtube`) VALUES ('".mysql_real_escape_string($randChar)."','".mysql_real_escape_string($YoutubeLink)."')";

	mysql_query($query) or die("<script>alert('Some Problem is occurd,Contact your IT team')</script>");

		echo "<div class='alert alert-success'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			  		<span aria-hidden='true'>&times;</span>
				</button>
			    <strong>Success!</strong> Tutorial has been added successfully!
			  </div>";
			  
}



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    		Delete Tuorials				////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function DeleteTutorials($id)
{
	$id=base64_decode($id);

	$query="DELETE FROM `tbl_tutorlas` WHERE `id`='".$id."'";
	mysql_query($query);
	echo "<div class='alert alert-danger'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		  	<span aria-hidden='true'>&times;</span>
			</button>
		    <strong>Sucess!</strong> Tutorials Deleted.
		  </div>";

}



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    		Create New Blog				////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function CreateNewBlog($blogName,$blogin,$tags,$discription,$Date,$Year,$Img)
{
	$randChar=md5(rand()).".jpg";
    move_uploaded_file($Img,"upload/BlogImage/".$randChar) or die("Error To upload file");
	

	$query="INSERT INTO `tbl_blog`(`BlogName`, `BlogDate`, `BlogIn`, `Tag`, `Date`, `Year`, `Discription`,ImgPath) VALUES ('".mysql_real_escape_string($blogName)."','".mysql_real_escape_string(date('d-m-Y'))."','".mysql_real_escape_string($blogin)."','".mysql_real_escape_string($tags)."','".mysql_real_escape_string($Date)."','".mysql_real_escape_string($Year)."','".mysql_real_escape_string($discription)."','".mysql_real_escape_string($randChar)."')";

	mysql_query($query) or die('error query');
	echo "<div class='alert alert-success'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		  	<span aria-hidden='true'>&times;</span>
			</button>
		    <strong>Sucess!</strong> Blog Added .
		  </div>";

}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   		Delete Blog				////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function DeleteBlog($id)
{
	
	$id=base64_decode($id);

	$query="DELETE FROM `tbl_blog` WHERE `id`= '".$id."' ";

	mysql_query($query) or die('Error');

	echo "<div class='alert alert-danger'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		  	<span aria-hidden='true'>&times;</span>
			</button>
		    <strong>Sucess!</strong> Blog Deleted.
		  </div>";

}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   		Delete Client				////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function DeleteClient($id)
{
	$id=base64_decode($id);

	$query="DELETE FROM `tbl_clients` WHERE `id`= '".$id."' ";

	mysql_query($query) or die('Error');

	echo "<div class='alert alert-danger'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		  	<span aria-hidden='true'>&times;</span>
			</button>
		    <strong>Sucess!</strong> Blog Deleted.
		  </div>";
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// This Function For Insert Team /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function CreateTeam($txtName,$txtDesignation,$tmpName){

	$randChar=md5(rand()).".jpg";
    move_uploaded_file($tmpName,"upload/Team/".$randChar) or die("Error To upload file");

    $query="INSERT INTO `tbl_team`(`name`, `designation`, `image`) VALUES ('".mysql_real_escape_string($txtName)."','".mysql_real_escape_string($txtDesignation)."','".mysql_real_escape_string($randChar)."')";

	mysql_query($query) or die('error query');
	echo "<div class='alert alert-success'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		  	<span aria-hidden='true'>&times;</span>
			</button>
		    <strong>Sucess!</strong> Team Member Added .
		  </div>";
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// This Function For Insert Team /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function CreateTestimonial($txtName,$txtDesignation,$tmpName){

	$randChar=md5(rand()).".jpg";
    move_uploaded_file($tmpName,"upload/Testimonial/".$randChar) or die("Error To upload file");

    $query="INSERT INTO `tbl_testimonial`(`name`, `comment`, `image`) VALUES ('".mysql_real_escape_string($txtName)."','".mysql_real_escape_string($txtDesignation)."','".mysql_real_escape_string($randChar)."')";

	mysql_query($query) or die('error query');
	echo "<div class='alert alert-success'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		  	<span aria-hidden='true'>&times;</span>
			</button>
		    <strong>Sucess!</strong> Team Member Added .
		  </div>";
}


//This Function To Delete Team Member
function DeleteTeam($id)
{
	$id=base64_decode($id);

	$query="DELETE FROM `tbl_team` WHERE `id`= '".$id."' ";

	mysql_query($query) or die('Error');

	echo "<div class='alert alert-danger'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		  	<span aria-hidden='true'>&times;</span>
			</button>
		    <strong>Sucess!</strong> Blog Deleted.
		  </div>";

}

//This Function To Delete Testimonial
function DeleteTestimonial($id)
{
	$id=base64_decode($id);

	$query="DELETE FROM `tbl_testimonial` WHERE `test_id`= '".$id."' ";

	mysql_query($query) or die('Error');

	echo "<div class='alert alert-danger'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		  	<span aria-hidden='true'>&times;</span>
			</button>
		    <strong>Sucess!</strong> Testimonial Deleted.
		  </div>";

}

?>