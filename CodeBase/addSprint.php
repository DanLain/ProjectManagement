<?php
session_start(); 

if(!$mysqlconnect){
	$mysqlconnect=mysql_connect('localhost','danla_web','thisiscool');
}
mysql_select_db("danlain_live");

if(strlen($_REQUEST['Name'])<1){header("Location: http://localhost/createSprint.php");}
else{
	if(isset($_GET['SprintID'])){
			$update_query="UPDATE sprint SET 
					sprint.Name = '$_REQUEST[Name]',
					sprint.ProjectID = '$_REQUEST[ProjectID]',
					sprint.StartDate = '$_REQUEST[StartDate]',
					sprint.EndDate = '$_REQUEST[EndDate]',
				WHERE sprint.SprintID = '$_GET[SprintID]'";
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
