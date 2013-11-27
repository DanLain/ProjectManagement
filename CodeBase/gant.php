<?php
echo '<a href="projectOperations.php" title="Return to Project Operations"><span>Project Operations</span></a>';
if(!isset($mysqlconnect)){
	$mysqlconnect=mysql_connect('localhost','danla_web','thisiscool');
}

mysql_select_db("danlain_live");

$project_result = mysql_query("SELECT * FROM project where project.ProjectID = '$_GET[ProjectID]'") or die(mysql_error());										

while($projectRow=mysql_fetch_array($project_result)){
	$startDate = $projectRow['TargetStartDate'];
	$endDate = $projectRow['TargetEndDate'];
}

include 'GanttChart.php';     // Include the class file 
$G = new GanttChart();        // Create an instance of GanttChart 
$raw_results = mysql_query("SELECT * FROM sprint s, project p where s.ProjectID = p.ProjectID and s.projectID = '$_GET[ProjectID]' order by p.ProjectName, s.StartDate") or die(mysql_error());
while ($row=mysql_fetch_array($raw_results)){
	$story_result = mysql_query("SELECT * FROM story where story.SprintID = '$row[SprintID]'") or die(mysql_error());
	$remainingDays = 0;
	$plannedDays = 0;
	$storyPoints = 0;
	while($row3=mysql_fetch_array($story_result)){
		$storyPoints += $row3['StoryPoints'];
		$remainingDays +=$row3['RemainingDays'];
		$plannedDays +=$row3['PlannedDays'];
	}
	$i = 0;
	$test = true;

	while($test){
	if (strtotime($startDate.'+ '.$i.' day') >= strtotime($row['StartDate']) ) $test = false;
	else $i++;
	}
	$datetime1 = strtotime($row['StartDate']);
	$datetime2 = strtotime($row['EndDate']);

	$secs = $datetime2 - $datetime1;
	$days = $secs / 86400;
	$G->AddActivity($row['Name'], $i, $i+$days, ($days-$remainingDays >=0 ? ($days-$remainingDays) : 0));   
	
}
$G->Render();                              // Draw the chart 

?>

<!--
Base code for this section adapted from http://www.ncbase.com/gc/?id=tut
?php 

include 'GanttChart.php';              // Include the class file 
$G = new GanttChart(1, 16, 'Months');  // Instantiate GanttChart 
$G->AddActivity('First Activity', 1, 5);   // Describe Activity #1 
$G->AddActivity('Second Activity', 6, 15); // Describe Activity #2 
$G->AddActivity('Third Activity', 1, 3);   // Describe Activity #3 
$G->AddActivity('Fourth Activity', 4, 11); // Describe Activity #4 
$G->Render();                              // Draw the chart 

?-->