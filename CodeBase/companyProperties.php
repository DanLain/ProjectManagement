<?php session_start();

		if(!isset($mysqlconnect)){
			$mysqlconnect=mysql_connect('localhost','danla_web','thisiscool');
			
		}

		mysql_select_db("danlain_live");
		if(!isset($_SESSION['Update']))
		{
			$_SESSION['Update'] = "False";
		}
		
		if(!isset($_SESSION['Login']))
		{
			
			$_SESSION['Login'] = "False";
			$_SESSION['User'] = "Guest";
			$_SESSION['EmployeeID'] = 0;
			$_SESSION['LoginTry']=0;
			$_SESSION['BadLogin']="";
			$_SESSION['Locked']="False";
			
		}
		?>
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
		<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
		<head>
			<title>
			Better Software</title>


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
						<!--<?php
									//$mysqlquery="Select * from company";
								    //$result=mysql_query($mysqlquery);
									//while ($row=mysql_fetch_array($result)){
										//echo $row['BusinessName'];
									//}
						?>-->
						Better Software
						</span></h2>
						<div id="top-nav">
							<ul>
								<li class="active"><a href="flOhome.php" title="Home"><span>Home</span></a></li>
								<li><!--a href="#" title="Promotions &amp; News"><span>Promotions &amp; Sales</span></a>--></li>
								<!--<li><a href="#" title="Contact"><span>Contact</span></a></li>-->
								
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
					<!--<span class="shopping">Shopping Cart <a href="cart.php" title="Shopping Cart">$<?php echo $_SESSION['OrderTotal'];?>
					</a></span>--></p>
					</div>
					<!-- End Shell -->
				</div>
				<!-- End Header -->
				<!-- Begin Navigation -->
				<div id="navigation">
					<!-- Begin Shell -->
					<div class="shell">
						
							<?php

											/*$mysqlquery="Select * from type";
											$result=mysql_query($mysqlquery);

											

											while ($row=mysql_fetch_array($result)){
												echo"<ul>";
												echo "<li class=";
												echo "active";
												echo"><a href=";
												echo"merchandise.php?varname=".$row['TypeName'];
												echo " title=";
												echo $row['TypeName'];
												echo ">";
												echo $row['TypeName'];
												echo"</a>";
													echo"<div class=";
													echo "dd";
													echo ">";
														echo "<ul>";
															$mysqlquery2="Select * from category";
															$result2=mysql_query($mysqlquery2);
															while ($row2=mysql_fetch_array($result2))
																{
																	if ($row['TypeID']== $row2['TypeID'])
																		{
																			echo"<li><A href=";
																			//echo"images/soc1.jpg";
																			echo "merchandise.php?varname=".$row2['CategoryID'];
																			echo" title=";
																			echo $row2['CatName'];
																			echo">";
																			echo $row2['CatName'];
																			echo"</A></li>";	
																		}
																}
																echo "</ul>";
														echo "</ul>";
											}			
*/
										?>
							
							
										</li>
										<!--<li><a href="#" title="Drop down menu 4">Drop down menu 4</a></li>
										<li><a href="#" title="Drop down menu 5">Drop down menu 5</a></li> -->
									</ul>
								</div>
							</li>
							
					<!--		<li><a href="#" title="Sports">Sports</a></li>
							<li><a href="#" title="Brands">Brands</a></li>
							<li><a href="#" title="Promos">Promos</a></li>
							<li><a href="#" title="Clinic">Clinic</a></li>   
							<li>
							
							  class="sale-item" <form action="first3.php" method="post">
								-<form action="search.php" method="GET">
								<input type="text" name="query" />
								<input type="submit" value="Search" />
								</form>

							</li>-->
							></a>.
						</ul>
						<div class="cl">&nbsp;</div>
					</div>
					<!-- End Shell -->
				</div>
				<!-- End Navigation -->
		
		</div>
		<!-- End Slider -->
		<!-- Begin Main -->
		<div  id="main" class="shell">
			<!-- Begin Content -->
			<div id="content">
				<div class="post">
                                <div class="welcome">
				
				<?php 
					
					if($_SESSION['Login']=="True")
					{
						  
						if($_SESSION['Update']=="True")
						{
							echo "<font color='red'>Updates Saved</font><br>";
						}
						$adminSqlQuery="Select * from employee";
						$adminResult=mysql_query($adminSqlQuery);
						while($admin_row=mysql_fetch_array($adminResult))
						{
							if(($_SESSION['EmployeeID'] == $admin_row['EmployeeID']) && ($admin_row['Admin'] == 1))
							{
								
								//need to get row from company from admin_row.companyID
								$companySqlQuery="Select * from company WHERE CompanyID='$admin_row[CompanyID]'";
								$companyResult=mysql_query($companySqlQuery);
								$row=mysql_fetch_array($companyResult);

								$_SESSION['BusinessName'] = $row['BusinessName'];
								$_SESSION['Fax'] = $row['Fax'];
								$_SESSION['ContactName'] = $row['ContactName'];
								$_SESSION['Address']= $row['Address'];
								$_SESSION['City'] = $row['City'];
								$_SESSION['State'] = $row['State'];
								$_SESSION['Zip'] = $row['Zip'];
								$_SESSION['PhoneNumber'] = $row['Phone'];
								
								//$_SESSION['Email'] = $row['Email'];
								//$_SESSION['UpdateCustomer']="True";
								echo "<form action='updateCompanyProperties.php' method='post'>";

								echo "First Name: <input type='text' name='ContactName' value=".$_SESSION['ContactName']." ><br><br>";
								
								echo "Business Name: <input type='text' name='BusinessName' value=".$_SESSION['BusinessName']."><br><br>";
								echo "Phone Number: <input type='text' name='Phone' value=".$_SESSION['PhoneNumber']."><br /><br />";
								
								
								
								echo "Address: <input type='text' name='Address' value=".$_SESSION['Address']."><br /><br />";
								echo "City: <input type='text' name='City' value=".$_SESSION['City']."><br /><br />";
								echo "State: <input type='text' name='State' value=".$_SESSION['State']."><br /><br />";
								echo "Zip Code: <input type='text' name='Zip' value=".$_SESSION['Zip']."><br /><br />";
								echo "Fax: <input type='text' name='Fax' value=".$_SESSION['Fax']."><br /><br /><br />";
								
								echo "<input type='submit'>";	
								echo "<br><br><a href='flOhome.php' title='home'> Home </a>";						
							}
						}
						
					}
					else
					{
						echo "You shouldn't be here";
					}
				?>	
								
				</div>
				</div>
			</div>
			<!-- End Content -->
		
			<div class="cl">&nbsp;</div>
			<!-- Begin Promotions -->
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
