<?php
session_start(); 

if(!isset($mysqlconnect)){
	$mysqlconnect=mysql_connect('localhost','danla_web','thisiscool');
	
}
mysql_select_db("danlain_live");

if(strlen($_REQUEST['Name'])<1){header("Location: http://localhost/createSprint.php");}
else{
	if(isset($_REQUEST['SprintID'])){
			$update_query="UPDATE sprint SET 
					Name = '$_REQUEST[Name]',
					ProjectID = '$_REQUEST[ProjectID]',
					StartDate = '$_REQUEST[StartDate]',
					EndDate = '$_REQUEST[EndDate]'
				WHERE sprint.SprintID = '$_REQUEST[SprintID]'";
			mysql_query($update_query);
		}
	else{
		$insert_query="Insert into sprint 
			(ProjectID, Name, StartDate, EndDate)
			values('$_REQUEST[ProjectID]',
					'$_REQUEST[Name]',
					'$_REQUEST[StartDate]',
					'$_REQUEST[EndDate]')";
		mysql_query($insert_query);
	}
	header("Location: http://localhost/projectOperations.php");
}
?>
