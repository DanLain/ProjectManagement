<h2>Manage Sprints</h2>
				<?php 
					
					if($_SESSION['Login']=="True")
					{
						  
						if($_SESSION['UpdateSprint']=="True")
						{
							echo "<font color='red'>Updates Saved</font><br>";
						}

						
						
								$adminSqlQuery="Select * from employee where EmployeeId = '$_SESSION[EmployeeID]' ";
								$adminResult=mysql_query($adminSqlQuery);
								$admin_row=mysql_fetch_array($adminResult);

								$projectSqlQuery="Select * from project where ProjectID = '$admin_row[ProjectID]' ";
								$projectResult=mysql_query($projectSqlQuery);
								$project_row=mysql_fetch_array($projectResult);

								echo "<h1> Project Name: <font color='red'>";
								echo $project_row['ProjectName'];
								echo "</font></h1>";

								
								
								
								
								if(!isset($_REQUEST['sprintName'])){
									echo "<form action='manageSprints.php' method='post'>";
									echo "<br>Sprint: ";
									echo "<select id='sprintName' name='sprintName'>";
									$sprintSqlQuery="Select * from sprint WHERE ProjectID='$admin_row[ProjectID]'";
									$sprintResult=mysql_query($sprintSqlQuery);
									while($row=mysql_fetch_array($sprintResult))
									{
									
										echo "<option name='sprintName' value='$row[Name]'>";
										echo $row['Name'];
										
										echo "</option>";
									
									
									
									}
									echo "</select><br><br>";
									echo "<br>";
									echo "<input type='submit'>";	
									echo "<br><br><a href='flOhome.php' title='home'> Home </a>";
								}
								else{
									$_SESSION['UpdateSprint']="False";
									echo "<form action='updateSprints.php' method='post'>";				
									echo "<br>Sprint Name: <font color='red'>";
									echo $_REQUEST['sprintName'];
									echo "</font><br><br>";
									$sprintSqlQuery="Select * from sprint WHERE Name='$_REQUEST[sprintName]'";
									$sprintResult=mysql_query($sprintSqlQuery);
									$sprintRow=mysql_fetch_array($sprintResult);
									//after use destroy $sprintName
									$_SESSION['sprintName'] = $_REQUEST['sprintName'];
									echo "Start Date: <input type='text' name='StartDate' id='calender' value='".$sprintRow['StartDate']."' ><br><br>";
									echo "End Date: <input type='text' name='EndDate' id='nextcalendar' value='".$sprintRow['EndDate']."' >";
									echo "<br><input type='submit'>";	

									echo "<br><br><a href='manageSprints.php' title='Manage Sprints'> Select Sprint </a>";
									echo "<br><br><a href='flOhome.php' title='Home'> Home </a>";

								}
								
														
							
						
						
					}
					else
					{
						echo "You shouldn't be here";
					}
				?>	
