<?php
session_start(); 

if(!$mysqlconnect){
	$mysqlconnect=mysql_connect('localhost','danla_web','thisiscool');
}
mysql_select_db("danlain_live");

if(strlen($_REQUEST['Name'])<1){header("Location: http://localhost/createstory.php");}
else{
	if(isset($_GET['StoryID'])){
			$update_query="UPDATE story SET 
					story.Name = '$_REQUEST[Name]',
					story.Description = '$_REQUEST[Description]',
					story.EmployeeID = '$_REQUEST[EmployeeID]',
					story.PlannedDays = '$_REQUEST[PlannedDays]',
					story.WorkedDays = '$_REQUEST[WorkedDays]',
					story.RemainingDays = '$_REQUEST[RemainingDays]',
					story.StoryPoints = '$_REQUEST[StoryPoints]'
				WHERE story.storyID = '$_GET[StoryID]'";
			mysql_query($update_query);
		}
	else{
		$insert_query="Insert into story 
			(EpicID, EmployeeID, Name, Description, PlannedDays, WorkedDays, RemainingDays, StoryPoints)
			values('$_SESSION[EpicID]',
					'$_REQUEST[EmployeeID]',
					'$_REQUEST[Name]',
					'$_REQUEST[Description]',
					'$_REQUEST[PlannedDays]',
					'$_REQUEST[WorkedDays]',
					'$_REQUEST[RemainingDays]',
					'$_REQUEST[StoryPoints]')";
		mysql_query($insert_query);
	}
	header("Location: http://localhost/projectOperations.php?EpicID=".$_SESSION['EpicID']);
}
?>
