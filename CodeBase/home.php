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
								<li class="active"><a href="flOhome.php" title="Home"><span>Home</span></a></li>
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
						if($_SESSION['Login'] != "True")
						{
							echo "<h2>Login</h2>";
							
						}
						?>
						
						
						<?php
						if($_SESSION['Login'] != "True")
						{
							echo "<form  action='login.php' method='test'>

							Emai Address: <input type='text' name='Email'><br />
							<br />
							Password: <input type='password' size='20' name='Password'><br />
							";
							if ($_SESSION['Locked']=="True"){
									echo "Account ".$_SESSION['Email']." locked please contact customer service at dan@drlain.com<br /><br />";
								}
									
							elseif ($_SESSION['LoginTry']!=0){
								Echo "System will lock account after ".(6 - $_SESSION['LoginTry'])." more attempts. <br/> <br/>";
							}
							

							echo "<input  type='submit' >
							</form>";
						}	 
						else
						{
							echo "Welcome ";
							
							
							
							echo $_SESSION['User'];
							echo "<br />";
							
							if($_SESSION['Admin'] == 1)
							{
								
								echo "<a href='companyProperties.php' title='Company Properties'>Company Properties</a><br>";
							}
							if($_SESSION['Manager'] == 1 || $_SESSION['Admin'] == 1)
							{
								
								echo "<br /><a href='adminUserManagement.php' title='Manage Users'>Manage Users</a></h1>";
							}
							if($_SESSION['Manager'] == 1 || $_SESSION['Architect'] == 1)
							{
								echo "<br /><a href='ProjectOperations.php' title='Manage Project'>Manage Project</a></h1>";
							}
							echo "<a href='workRecording.php' title='Manage Hours'>Manage Hours</a><br>";
						}
						?>					
					</div>
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
											echo "<a href='createProject.php?ProjectID=".$row_project['ProjectID']."' title=";
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
