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
		<!-- End Slider -->
		<!-- Begin Main -->
		<div  id="main" class="shell">
			<!-- Begin Content -->
			<div id="content">
				<div class="post">
					<h2>Project Options</h2>
					<ul>
						<li><a href="projectCreation.php" title="New Project"><span>Add Project</span></a></li>
						<?php
								$raw_results = mysql_query("SELECT * FROM project") or die(mysql_error());
								$count = 0;
								$rows = mysql_num_rows($raw_results);
							   
								if($rows){ // if one or more rows are returned do following
																	
									if (mysql_num_rows($raw_results)>0){
											
											echo"<table border='1'> ";
											echo'<tr>';
											echo'<th>ProjectID</th>';
											echo'<th>ProjectName</th>';
											echo'<th>TargetStartDate</th>';
											echo'<th>TargetEndDate</th>';
											echo'<th>BudgetDays</th>';
											echo'<th>BudgetCurancy</th>';
											echo'<th>Manager</th>';
											
											while ($row=mysql_fetch_array($raw_results)){
												$story_results = mysql_query("SELECT * FROM project WHERE ProjectID = '$row[ProjectID]'") or die(mysql_error());
										
												
												$count += 1;
												echo"<tr><td><a href='updateProject.php?ProjectID=".$row['ProjectID']."' title='Edit ".$row['ProjectName']."'>".$row['ProjectID']."</a></td>";
												//echo"<td><a href='projectOperations.php".(!(isset($_GET['ProjectID']) && ($row['ProjectID'] == $_GET['ProjectID'])) ? "?ProjectID=".$row['ProjectID']."' title='Show Projects'>Show Projects" : "' title='Hide Projects'>Hide Projects")."</a></td>";
												//echo"<td>".$row['ProjectID']."</td>";
												echo"<td>".$row['ProjectName']."</td>";
												echo"<td>".$row['TargetStartDate']."</td>";
												echo"<td>".$row['TargetEndDate']."</td>";
												echo"<td>".$row['BudgetDays']."</td>";
												echo"<td>".$row['BudgetCurancy']."</td>";
												echo"<td>".$row['Manager']."</td>";
												
												echo'</tr>';
												
												
											}
												
										}
										echo'</table>';
								}
								else{ // if there is no matching rows do following
									echo "No results";
								}
						?>
						<li><a href="createEpic.php" title="Epic"><span>Add Epic</span></a></li>
						<?php
								$raw_results = mysql_query("SELECT * FROM epic") or die(mysql_error());
								$count = 0;
								$rows = mysql_num_rows($raw_results);
							   
								if($rows){ // if one or more rows are returned do following
																	
									if (mysql_num_rows($raw_results)>0){
											
											echo"<table border='1'> ";
											echo'<tr>';
											echo'<th>EpicID</th>';
											echo'<th>Show Stories</th>';
											echo'<th>ProjectID</th>';
											echo'<th>Name</th>';
											echo'<th>Description</th>';
											echo'<th>Days Planned</th>';
											echo'<th>Days Worked</th>';
											echo'<th>Days Remaining</th>';
											echo'<th>Story Points</th>';
											echo'<th>Add Story</th></tr>';
											while ($row=mysql_fetch_array($raw_results)){
												$story_results = mysql_query("SELECT * FROM story WHERE story.EpicID = '$row[EpicID]'") or die(mysql_error());
												$storyPoints = 0;
												$planDays = 0;
												$workDays = 0;
												$remainDays = 0;
												while($row3=mysql_fetch_array($story_results)){
													$storyPoints += $row3['StoryPoints'];
													$planDays += $row3['PlannedDays'];
													$workDays += $row3['WorkedDays'];
													$remainDays += $row3['RemainingDays'];
												}
												$count += 1;
												echo"<tr><td><a href='createEpic.php?EpicID=".$row['EpicID']."' title='Edit ".$row['Name']."'>".$row['EpicID']."</a></td>";
												echo"<td><a href='projectOperations.php".(!(isset($_GET['EpicID']) && ($row['EpicID'] == $_GET['EpicID'])) ? "?EpicID=".$row['EpicID']."' title='Show Stories'>Show Stories" : "' title='Hide Stories'>Hide Stories")."</a></td>";
												echo"<td>".$row['ProjectID']."</td>";
												echo"<td>".$row['Name']."</td>";
												echo"<td>".$row['Description']."</td>";
												echo"<td>".$planDays."</td>";
												echo"<td>".$workDays."</td>";
												echo"<td>".$remainDays."</td>";
												echo"<td>".$storyPoints."</td>";
												echo"<td><a href='createStory.php?EpicID=".$row['EpicID']."' title='Add Story to ".$row['Name']."'>Add Story</a></td>";
												echo'</tr>';
												if(isset($_GET['EpicID']) && ($row['EpicID'] == $_GET['EpicID'])){
													$detailQuery="Select * from story WHERE story.EpicID = '".$row['EpicID']."'";
													$detailResult=mysql_query($detailQuery);					
													
													if(mysql_num_rows($detailResult)>0){
														echo '</table>';
														echo ' <h2>Stories for '.$row['Name'].'</h2>';
														echo '<table border=1 style="margin-left:12px;">
														<tr>
														<th>Story ID</th>
														<th>Name</th>
														<th>Description</th>
														<th>Planned Days</th>
														<th>Worked Days</th>
														<th>Remaining Days</th>
														<th>Story Points</th>
														<th>Employee ID</th>
														</tr>';
														
														while($row2=mysql_fetch_array($detailResult)){
															echo "<tr><td><a href='createStory.php?StoryID=".$row2['StoryID']."' title='Edit ".$row2['Name']."'>".$row2['StoryID']."</a></td>";
															echo "<td>".$row2['Name']."</td>";
															echo "<td>".$row2['Description']."</td>";
															echo "<td>".$row2['PlannedDays']."</td>";
															echo "<td>".$row2['WorkedDays']."</td>";
															echo "<td>".$row2['RemainingDays']."</td>";
															echo "<td>".$row2['StoryPoints']."</td>";
															echo "<td>".$row2['EmployeeID']."</td>";
															
														}
														echo '</table>';
														if($rows > $count){
															echo"<table border='1'> ";
															echo'<tr>';
															echo'<th>EpicID</th>';
															echo'<th>Show Stories</th>';
															echo'<th>ProjectID</th>';
															echo'<th>Name</th>';
															echo'<th>Description</th>';
															echo'<th>Days Planned</th>';
															echo'<th>Days Worked</th>';
															echo'<th>Days Remaining</th>';
															echo'<th>Story Points</th>';
															echo'<th>Add Story</th></tr>';
														}
													}
													else{
														echo '<tr><td></td><td></td><td></td><td></td><td><h3>There are no Stories for '.$row['Name'].'</h3></td><td></td></tr>';
														if($rows > $count){
															echo'<tr>';
															echo'<th>EpicID</th>';
															echo'<th>Show Stories</th>';
															echo'<th>ProjectID</th>';
															echo'<th>Name</th>';
															echo'<th>Description</th>';
															echo'<th>Days Planned</th>';
															echo'<th>Days Worked</th>';
															echo'<th>Days Remaining</th>';
															echo'<th>Story Points</th>';
															echo'<th>Add Story</th></tr>';
														}
													}
												}
											}
												
										}
										echo'</table>';
								}
								else{ // if there is no matching rows do following
									echo "No results";
								}
						?>
						<li><a href="createSprint.php" title="Add Sprint"><span>Add Sprint</span></a></li>
<?php
        $raw_results = mysql_query("SELECT * FROM sprint s, project p where s.ProjectID = p.ProjectID order by p.ProjectName, s.Name") or die(mysql_error());
             
       
        if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
           									
			if (mysql_num_rows($raw_results)>0){
					$rows = mysql_num_rows($raw_results);
					$count = 0;
					echo"<table border='1'> ";
					echo'<tr>';
					echo'<th>Project</th>';
					echo'<th>Name</th>';
					echo'<th>Start Date</th>';
					echo'<th>End Date</th>';
					echo'<th>Initial Story Points</th>';
					echo'<th>Locked</th>';
					echo'<th>Current Story Points</th>';
					echo'<th>Show Stories</th>';
					echo'<th>Add Stories</th>';
					echo'</tr>';
					
					while ($row=mysql_fetch_array($raw_results)){
						$story_result = mysql_query("SELECT * FROM story where story.SprintID = '$row[SprintID]'") or die(mysql_error());
						
						$storyPoints = 0;
						while($row3=mysql_fetch_array($story_result)){
							$storyPoints += $row3['StoryPoints'];
						}
						$count += 1;
						echo'<tr>';
						echo'<td>'.$row['ProjectName'].'</td>';
						echo"<td><a href=createSprint.php?SprintID=".$row['SprintID']." title='".$row['Name']."'>".$row['Name']."</a></td>";
						echo'<td>'.$row['StartDate'].'</td>';
						echo'<td>'.$row['EndDate'].'</td>';
						echo'<td>'.$row['InitialStoryPoints'].'</td>';
						echo'<td>'.($row['Locked'] == 1 ?'Locked':'').'</td>';
						echo'<td>'.$storyPoints.'</td>';
						echo"<td><a href='projectOperations.php".(!(isset($_GET['SprintID']) && ($row['SprintID'] == $_GET['SprintID'])) ? "?SprintID=".$row['SprintID']."' title='Show Stories'>Show Stories" : "' title='Hide Stories'>Hide Stories")."</a></td>";
						echo"<td><a href='sprintAddStory.php?SprintID=".$row['SprintID']."' title='Add Story to ".$row['Name']."'>Add Story</a></td>";
						echo'</tr>';
						if(isset($_GET['SprintID']) && ($row['SprintID'] == $_GET['SprintID'])){
													$detailQuery="Select * from story WHERE story.SprintID = '".$row['SprintID']."'";
													$detailResult=mysql_query($detailQuery);					
													
													if(mysql_num_rows($detailResult)>0){
														echo '</table>';
														echo ' <h2>Stories for '.$row['Name'].'</h2>';
														echo '<table border=1 style="margin-left:12px;">
														<tr>
														<th>Story ID</th>
														<th>Name</th>
														<th>Description</th>
														<th>Planned Days</th>
														<th>Worked Days</th>
														<th>Remaining Days</th>
														<th>Story Points</th>
														<th>Employee ID</th>
														</tr>';
														
														while($row2=mysql_fetch_array($detailResult)){
															echo "<tr><td><a href='createStory.php?StoryID=".$row2['StoryID']."' title='Edit ".$row2['Name']."'>".$row2['StoryID']."</a></td>";
															echo "<td>".$row2['Name']."</td>";
															echo "<td>".$row2['Description']."</td>";
															echo "<td>".$row2['PlannedDays']."</td>";
															echo "<td>".$row2['WorkedDays']."</td>";
															echo "<td>".$row2['RemainingDays']."</td>";
															echo "<td>".$row2['StoryPoints']."</td>";
															echo "<td>".$row2['EmployeeID']."</td>";
															
														}
														echo '</table>';
														if($rows > $count){
															echo"<table border='1'> ";
															echo'<tr>';
															echo'<th>Project</th>';
															echo'<th>Name</th>';
															echo'<th>Start Date</th>';
															echo'<th>End Date</th>';
															echo'<th>Initial Story Points</th>';
															echo'<th>Locked</th>';
															echo'<th>Current Story Points</th>';
															echo'<th>Show Stories</th>';
															echo'<th>Add Stories</th>';
															echo '</tr>';
														}
													}
													else{
														echo '<tr><td></td><td></td><td></td><td></td><td><h3>There are no Stories for '.$row['Name'].'</h3></td><td></td><td></td><td></td><td></td></tr>';
														if($rows > $count){
															echo'<tr>';
															echo'<th>Project</th>';
															echo'<th>Name</th>';
															echo'<th>Start Date</th>';
															echo'<th>End Date</th>';
															echo'<th>Initial Story Points</th>';
															echo'<th>Locked</th>';
															echo'<th>Current Story Points</th>';
															echo'<th>Show Stories</th>';
															echo'<th>Add Stories</th>';
															echo '</tr>';
														}
													}
												}
						
					}
					echo'</table>';}
				
					//while($i_results = mysql_fetch_array($item_results)){
						//echo "<p>".$i_results['ItemName']."</p>";}}
                // posts results gotten from database(title and text) you can also show id ($results['id'])
				
            
             
        
        else{ // if there is no matching rows do following
            echo "No results";
        }
         }
    
    else{ // if query length is less than minimum
        //echo "Minimum length is ".$min_length;
    }
?>
					</ul>
					
					<div class="cl">&nbsp;</div>
				</div>
			</div>
			<!-- End Content -->
		
			<div class="cl">&nbsp;</div>
						<!-- Begin Projects -->
			<div id="project-slider">
				
				<?php
			
					if($_SESSION['Login'] == "True")
					{

						echo "<h2>Projects</h2>
						<ul>";

					//EmployeeID under session
					$getStorySqlQuery="Select * from story";
					$storyResult=mysql_query($getStorySqlQuery);
																

					while ($row=mysql_fetch_array($storyResult))
					{
						if($row['EmployeeID'] == $_SESSION['EmployeeID'])
						{
							$getEpicSqlQuery="Select * from epic";
							$epicResult=mysql_query($getEpicSqlQuery);

							while($row_epic=mysql_fetch_array($epicResult))
							{
								if($row['EpicID']==$row_epic['EpicID'])
								{
									$getProjectSqlQuery="Select * from project";
									$projectResult=mysql_query($getProjectSqlQuery);
									
									while($row_project=mysql_fetch_array($projectResult))
									{
										if($row_project['ProjectID'] == $row_epic['ProjectID'])
										{
											//output
											echo "<li>";
											echo "<a href='projectDetails.php?varname=".$row_project['ProjectID']."' title=";
											echo "Project Link";
											echo "><img src=";
											echo "images/";
											echo "baseball1.jpg";//BASEBALL IMAGE TEMPORARY
											echo " alt=";
											echo"Product Image/>"; 
											echo "</a>";
											echo "<div class=";
											echo "info";
											echo ">";
											echo "<h4>";
											echo $row_project['ProjectName'];
											echo "</h4>";
											echo "<span class=";
											echo "Start Date";
											echo ">";
											echo $row_project['TargetStartDate'];
											echo "</span>";
											echo "<span class=";
											echo "End Date";
											echo "><span>$</span>";
											echo $row_project['TargetEndDate'];
											echo "</span>";
											echo "<div class=";
											echo "cl";
											echo ">&nbsp;</div>";
											echo "</div>";
											echo "</li>";
										}
									}
								}
							}
						}
					}	
				}
				?>
				</ul>
				<div class="cl">&nbsp;</div>
			</div>
			<!-- End Project Slider -->
		</div>
		<!-- End Main -->

		<!-- Begin Footer -->
		<div id="footer">
			<div class="boxes">
				<!-- Begin Shell -->
				<div class="shell">
					<div class="box post-box">
						<!--<h2>About SGC</h2>-->
						<div class="box-entry">
							<h1> Better Business, We make Magic Manageable </h1>
							
							<div class="cl">&nbsp;</div>
						</div>
					</div>
				
					</div>
					<div class="box">
						<!--<h2>Information</h2>
						<ul>
							<li><a href="#" title="Special Offers">Special Offers</a></li>
							<li><a href="#" title="Privacy Policy">Privacy Policy</a></li>
							<li><a href="#" title="Terms &amp; Conditions">Terms &amp; Conditions</a></li>
							<li><a href="#" title="Contact Us">Contact Us</a></li>
							<li><a href="#" title="Log In">Log In</a></li>
							<li><a href="#" title="Account">Account</a></li>
							<li><a href="#" title="Basket">Basket</a></li>
						</ul>-->
					</div>
					<!--<div class="box last-box">
						<h2>Categories</h2>
						<ul>
							<li><a href="#" title="Mens">Mens</a></li>
							<li><a href="#" title="Ladies">Ladies</a></li>
							<li><a href="#" title="Kids">Kids</a></li>
							<li><a href="#" title="Football">Football</a></li>
							<li><a href="#" title="Accessories">Accessories</a></li>
							<li><a href="#" title="Sports">Sports</a></li>
						</ul>
					</div>-->
					<div class="cl">&nbsp;</div>
				</div>
				<!-- End Shell -->
			</div>
			<div class="copy">
				<!-- Begin Shell -->
				<div class="shell">
					<div class="carts">
						<!--<ul>
							<li><span>We accept</span></li>
							
							<li><a href="#" title="VISA"><img src="images/cart-img2.jpg" alt="VISA" /></a></li>
							<li><a href="#" title="MasterCard"><img src="images/cart-img3.jpg" alt="MasterCard" /></a></li>
						</ul>-->
					</div>
					<p>&copy; Sitename.com. Design by Gary Johns,Dan Lain,and Jose Flores <br/>Template from <a href="http://css-free-templates.com/">CSS-FREE-TEMPLATES.COM</a></p>
					<div class="cl">&nbsp;</div>
				</div>
				<!-- End Shell -->
			</div>
		</div>
		<!-- End Footer -->
	</div>
	<!-- End Wrapper -->
</body>
</html>
