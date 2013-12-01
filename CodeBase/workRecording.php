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
                                <div class="welcome">
				
				
					
				<?php 
					if(!isset($_REQUEST['storyID']))
					{
						echo "<h2>Select Story</h2>";
						echo "<form action='workRecording.php' method='post'>";

						echo "Story: ";
						echo "<select id='storyID' name='storyID'>";
						$employeeSqlQuery="Select * from story WHERE EmployeeID ='$_SESSION[EmployeeID]'";
						$employeeResult=mysql_query($employeeSqlQuery);
					
						while($employee_row=mysql_fetch_array($employeeResult))
						{
						
						
							echo "<option name='storyID' value='$employee_row[StoryID]'>";
							$sprintSqlQuery="Select * from sprint WHERE SprintID ='$employee_row[SprintID]'";
							$sprintResult=mysql_query($sprintSqlQuery);
							$sprint_row=mysql_fetch_array($sprintResult);
							echo $sprint_row['Name'];
							echo ".      ";
							echo $employee_row['Name'];
							
							
						
							echo "</option>";
						
						
						}
						echo "</select><br><br>";
						echo "<input type='submit' value='Record Hours'>";	
					
					
					}		
					else
					{
						$storySqlQuery="Select * from story WHERE StoryID ='$_REQUEST[storyID]'";
						$storyResult=mysql_query($storySqlQuery);
						$story_row=mysql_fetch_array($storyResult);
						
						

						
						$workSqlQuery="Select * from work WHERE StoryID ='$_REQUEST[storyID]' AND EmployeeID='$_SESSION[EmployeeID]'";
						$workResult=mysql_query($workSqlQuery);
						$test = ($workResult ? mysql_num_rows($workResult) : $workResult);
						if($test) 
						{
							$work_row=mysql_fetch_array($workResult);
							echo "<h2>Manage Hours</h2>";
							echo "<br>Story Name: <font color='red'><a href='workRecording.php' title='Select Story'> ";
							echo $story_row['Name'];
							echo "</a></font><br><br>";

							echo "<form action='insertHours.php' method='post'>";
							echo "<input type='hidden' name='storyID' value='".$_REQUEST['storyID']."'>";
							echo "<input type='hidden' name='update' value='1'>";
							echo "Hours Worked: <input type='text' name='hours'  value='".$work_row['HoursWorks']."'><br><br>";
							echo "<input type='submit' value='Record Hours'>";
							
						}
						else
						{
							echo "<h2>Record Hours</h2>";
							echo "<br>Story Name: <font color='red'><a href='workRecording.php' title='Select Story'> ";
							echo $story_row['Name'];
							echo "</a></font><br><br>";

							echo "<form action='insertHours.php' method='post'>";
							echo "<input type='hidden' name='storyID' value='".$_REQUEST['storyID']."'>";
							echo "<input type='hidden' name='update' value='0'>";
							echo "Hours Worked: <input type='text' name='hours'  ><br><br>";
							echo "<input type='submit' value='Record Hours'>";
						}
						echo "<br><br><a href='workRecording.php' title='home'> Select Story </a>";
						
					}
					echo "<br><a href='home.php' title='home'> Home </a>";
					?>
					<!--Hours: <input type="text" name="hours"  ><br><br>
					<!--Start Date: <input type="text" name="startDate" id="calendar" />    
					End Date: <input type="text" name="endDate" id="nextcalendar" >-->
						
					
				
								
				</div>
				</div>
			</div>
			<!-- End Content -->
		
			<div class="cl">&nbsp;</div>
			<!-- Begin Project -->
			
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
							<h1> Better Software, We make Magic Manageable </h1>
							
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
