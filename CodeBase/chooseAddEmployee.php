<?php session_start();

		if(!isset($mysqlconnect)){
			$mysqlconnect=mysql_connect('localhost','danla_web','thisiscool');
			
		}

		mysql_select_db("danlain_live");
		if(!isset($_SESSION['Login']))
		{
			$_SESSION['Login'] = "false";
			$_SESSION['User'] = "Guest";
			$_SESSION['EmployeeLogin'] = "False";
			$_SESSION['LoginTry']=0;
			$_SESSION['BadLogin']="";
			$_SESSION['Locked']="False";
		}
		?>
		
		<html>
		<head>
			<title>
			<?php
			$mysqlquery="Select * from company";
		    $result=mysql_query($mysqlquery);
			while ($row=mysql_fetch_array($result)){
				echo $row['BusinessName'];
			}
			?></title>
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
						  


					</span></p>
					</div>
					<!-- End Shell -->
				</div>
				<!-- End Header -->
				<!-- Begin Navigation -->
				<div id="navigation">
					<!-- Begin Shell -->
					<div class="shell">
						
							<?php

											$mysqlquery="Select * from type";
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

										?>
							
							
										</li>
										
									</ul>
								</div>
							</li>
							
					  
							</a>.
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
					<h2>
					 <?php
						if($_SESSION['Login']=="True"){
							echo "Update Project Information";
						}
						else {
							echo "Add Employee to Project";
						}
						
					 ?>
					</h2>
					<form name="input" action="addToProject.php" method="get">
					<?php
					
					echo '<input type="radio" name="choice" value="Now">Add Employee Now<br>';
					echo '<input type="radio" name="choice" value="Later">Add Employee Later<br>';
					?>
					<input type="submit" value="Submit">
					</form>
					

					<div class="cl">&nbsp;</div>
				</div>
			</div>
			<!-- End Content -->
			<div class="cl">&nbsp;</div>
		<!-- Begin Promotions -->
			<div id="product-slider">
				<h2>Promotions</h2>
				<ul>
				
				</ul>
				<div class="cl">&nbsp;</div>
			</div>
			<!-- End Promotions Slider -->
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
						
					</div>
					
					<div class="cl">&nbsp;</div>
				</div>
				<!-- End Shell -->
			</div>
			<div class="copy">
				
			</div>
		</div>
		<!-- End Footer -->
	</div>
	<!-- End Wrapper -->
</body>
</html>
