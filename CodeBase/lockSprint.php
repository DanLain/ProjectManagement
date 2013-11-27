<?php
session_start();

if(!isset($mysqlconnect)){
	$mysqlconnect=mysql_connect('localhost','danla_web','thisiscool');
}

mysql_select_db("danlain_live");
$story_result = mysql_query("SELECT * FROM story where story.SprintID = '$_SESSION[SprintID]'") or die(mysql_error());										
$storyPoints = 0;
while($row3=mysql_fetch_array($story_result)){
	$storyPoints += $row3['StoryPoints'];
}

$raw_results = mysql_query("SELECT * FROM sprint WHERE SprintID = '$_GET[SprintID]'") or die(mysql_error());
while($row=mysql_fetch_array($raw_results)){
	if($row['Locked'] == 0){
		$update_query="UPDATE sprint  
						SET   sprint.Locked=1, sprint.InitialStoryPoints = '$storyPoints'
						WHERE sprint.SprintID = '$_GET[SprintID]'";
	}					$retval = mysql_query($update_query);
	if($row['Locked'] == 1){
		$update_query="UPDATE sprint  
						SET   sprint.Locked=0, sprint.InitialStoryPoints = 0
						WHERE sprint.SprintID = '$_GET[SprintID]'";
	}					$retval = mysql_query($update_query);
	header("Location: http://localhost/sprintAddStory.php?SprintID=".$_GET['SprintID']);
}
?>