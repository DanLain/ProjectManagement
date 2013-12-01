<?php session_start();

		if(!isset($mysqlconnect)){
			$mysqlconnect=mysql_connect('localhost','danla_web','thisiscool');
			
		}

		mysql_select_db("danlain_live");
		
		
		if(!isset($_SESSION['Login']))
		{
			$_SESSION['Login'] = "False";
			$_SESSION['User'] = "Guest";
			$_SESSION['EmployeeID'] = 0;
			$_SESSION['LoginTry']=0;
			$_SESSION['BadLogin']="";
			$_SESSION['Locked']="False";
			$_SESSION['Admin'] = 0;
			$_SESSION['Manager'] = 0;
			$_SESSION['Architect'] = 0;
			$_SESSION['Developer'] = 0;
		}
		?>
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
		<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
		<head>
			<title>
			<?php
			$mysqlquery="Select * from company";
		    $result=mysql_query($mysqlquery);
			while ($row=mysql_fetch_array($result)){
				echo $row['BusinessName'];
			}
			?>
			</title>


			<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
			<link rel="shortcut icon" href="css/images/favicon.ico" />
			<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
			
			<script src="js/jquery-1.6.2.min.js" type="text/javascript" charset="utf-8"></script>
			<!--[if IE 6]>
				<script src="js/DD_belatedPNG-min.js" type="text/javascript" charset="utf-8"></script>
			<![endif]-->
			<script src="js/cufon-yui.js" type="text/javascript"></script>
			<script src="js/Myriad_Pro_700.font.js" type="text/javascript"></script>
			<script src="js/jquery.jcarousel.min.js" type="text/javascript" charset="utf-8"></script>
			<script src="js/functions.js" type="text/javascript" charset="utf-8"></script>
		</head>
		<body >
			<!-- Begin Wrapper -->
			<div id="wrapper">
				<!-- Begin Header -->
				<div id="header">
					<!-- Begin Shell -->
					<div class="shell">
						<h2><span>
						<?php
						$mysqlquery="Select * from company";
						$result=mysql_query($mysqlquery);
						while ($row=mysql_fetch_array($result)){
							echo $row['BusinessName'];
						}
						?>
						</span></h2>
						<div id="top-nav">
							<ul>
								<li class="active"><a href="home.php" title="Home"><span>Home</span></a></li>
							</ul>
						</div>
						<div class="cl">&nbsp;</div>
						<p id="cart"><span class="profile">Welcome, 					
							<?php
							if($_SESSION['Login'] != "True")
							{
								//echo "<a href='login.php' title='Profile Link'>Login</a>";
								echo "<a href='userManagment.php' title='Profile Link'>Register</a>";
							} 
							else
							{
								
									
									echo "<a href='userManagment.php' title='Profile Link'>";
									echo $_SESSION['User'];
									echo "</a>";
									echo "<a href='logout.php' title='Logout'> Logout</a>";
							}
							?>							  
							</span>
						</p>
					</div>
					<!-- End Shell -->
				</div>
				<!-- End Header -->
				<!-- Begin Navigation -->
				<div id="navigation">
					<!-- Begin Shell -->
					<div class="shell">					
						<ul><?php
							if($_SESSION['Admin'] == 1|| $_SESSION['Manager'] == 1)
							{echo '<li class = "active"><a href="projectCreation.php" title="Profile Link">New Project</a></li>';
							}
							?>
						</ul>
					</div>
						
					<div class="cl">&nbsp;</div>
				</div>
					<!-- End Shell -->
			</div>
				<!-- End Navigation -->
		<!-- End Slider --><?php
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