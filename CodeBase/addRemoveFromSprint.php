<?php
session_start(); 

if(!isset($mysqlconnect)){
	$mysqlconnect=mysql_connect('localhost','danla_web','thisiscool');
	
}
mysql_select_db("danlain_live");
$select_query = "select * from story where StoryID = '$_REQUEST[StoryID]'";
$raw_results = mysql_query($select_query);
$row=mysql_fetch_array($raw_results);
if($row['SprintID'] ==0){
	$update_query="UPDATE story SET 
		SprintID = '$_SESSION[SprintIDForAddRemove]'
		WHERE story.StoryID = '$_REQUEST[StoryID]'";
}
else{
	$update_query="UPDATE story SET 
		SprintID = 0
		WHERE story.StoryID = '$_REQUEST[StoryID]'";
}
mysql_query($update_query);
header("Location: http://localhost/sprintAddStory.php?SprintID=".$_SESSION['SprintIDForAddRemove']);
?>
