<?php
session_start(); 

if(!$mysqlconnect){
	$mysqlconnect=mysql_connect('localhost','danla_web','thisiscool');
}
mysql_select_db("danlain_live");

if(strlen($_REQUEST['Name'])<1){header("Location: http://localhost/createEpic.php");}
else{
	if(isset($_GET['EpicID'])){
			$update_query="UPDATE epic SET 
										epic.ProjectID = $_REQUEST[ProjectID],
										epic.Name = '$_REQUEST[Name]',
										epic.Description = '$_REQUEST[Description]'
									WHERE epic.EpicID = '$_REQUEST[EpicID]'";
			mysql_query($update_query);
		}
	else{
		$insert_query="Insert into epic 
			(ProjectID, Name, Description)
			values('$_REQUEST[ProjectID]',
				   '$_REQUEST[Name]',
				   '$_REQUEST[Description]')";
		mysql_query($insert_query);
	}
	header("Location: http://localhost/projectOperations.php");
}
?>
