<?php

require ('lib/controler.php');
require ('lib/view.php');
require ('lib/db_config.php');

	$url=$_GET['getvalue'];
	$email=$_GET['email'];
	$query="INSERT INTO `tbl_newsletter`(`email`, `datetime`) VALUES ('".mysql_real_escape_string($email)."','".mysql_real_escape_string(date('d-m-Y H:i'))."')";
	$result=mysql_query($query);
	$url=$url."?statusNewsletter=true";
	if($result==true)
	{
		echo "<script>window.open('".$url."','_self')</script>";

	}
	else
	{
		echo "Some Problem ";
	}

?> 	