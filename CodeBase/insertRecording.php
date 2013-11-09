<html>
<body>
<?php

	session_start();
	if(!isset($mysqlconnect))
	{
			$mysqlconnect=mysql_connect('localhost','danla_web','thisiscool');
			
	}

	$hours = (int)$_REQUEST['hours'];
	$storyID = (int)$_REQUEST['storyID'];
	mysql_select_db("danlain_live");
	
	$storySqlQuery="Select * from story WHERE StoryID ='$storyID'";
	$storyResult=mysql_query($storySqlQuery);
	$story_row=mysql_fetch_array($storyResult);
	
	$sprintID = $story_row['SprintID'];

	if($_REQUEST['update'] == '0')
	{
		
		$insertQuery="Insert work
				SET StoryID='$storyID', SprintID='$sprintID',
				EmployeeID='$_SESSION[EmployeeID]', HoursWorks='$hours'";
			mysql_query($insertQuery);
		
		
		header("Location: http://localhost/workRecording.php");
	}
	else
	{
		$updateQuery=" UPDATE work
			SET HoursWorks='$hours'
			WHERE StoryID='$storyID' AND EmployeeID='$_SESSION[EmployeeID]'";
			mysql_query($updateQuery);
		header("Location: http://localhost/workRecording.php");
	}
	
	
	
	

?>


