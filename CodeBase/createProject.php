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
			$_SESSION['Admin'] = 0;
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
								<li class="active"><a href="home.php" title="Home"><span>Home</span></a></li>
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
										<!--<li><a href="#" title="Drop down menu 4">Drop down menu 4</a></li>
										<li><a href="#" title="Drop down menu 5">Drop down menu 5</a></li> -->
									</ul>
								</div>
							</li>
							
					<!--		<li><a href="#" title="Sports">Sports</a></li>
							<li><a href="#" title="Brands">Brands</a></li>
							<li><a href="#" title="Promos">Promos</a></li>
							<li><a href="#" title="Clinic">Clinic</a></li>   --> 
							<li 
							
							 class="sale-item" <form action="first3.php" method="post">
								<form action="search.php" method="GET">
								<input type="text" name="query" />
								<input type="submit" value="Search" />
								</form>

							</li>
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
					
<!--gary-->
						<!--<li><a href="#" title="Contact"><span>Contact</span></a></li>-->
	<!--<li><a href="#" title="Contact"><span>Contact</span></a></li>-->
						
					</ul>
					<h2>Project Options</h2>
					<ul>
					<div class="cl">&nbsp;</div>
				</div>
			</div>
			<!-- End Content -->
		
			<div class="cl">&nbsp;</div>
			<div id="content">
			<div class="post">
			
				<li><a href="addProject.php" title="Project"><span>Create New Project</span></a></li>
<?php
       $raw_results = mysql_query("SELECT * FROM project") or die(mysql_error());
             
       
        if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
           									
			if (mysql_num_rows($raw_results)>0){
					
					echo"<table border='1'> ";
					echo'<tr>';
					echo'<th>ProjectID</th>';
					echo'<th>';
					echo'ProjectName';
					echo'</th>';
					echo'<th>';
					echo'TargetStartDate';
					echo'</th>';
					echo'<th>';
					echo'TargetEndDate';
					echo'</th>';
					echo'<th>';
					echo'BudgetDays';
					echo'</th>';
					echo'<th>';
					echo'BudgetCurrancy';
					echo'</th>';				
					echo'<th>';
					echo'Manager';
					echo'</th>';
					echo'</tr>';
					$count1=0;
					

					while ($row=mysql_fetch_array($raw_results)){
					$count1=$count1+1;
					
					echo'<tr>';
					echo"<td><a href=addProject.php?ProjectID=".$row['ProjectID']." title=";
					echo $row['ProjectID'];
					echo '">';
					echo $row['ProjectID'];
					echo '</a></td>';
					echo'<td>';
					echo $row['ProjectName'];
					echo '</td>';
					echo'<td>';
					echo $row['TargetStartDate'];
					echo '</td>';
					echo'<td>';
					echo $row['TargetEndDate'];
					echo'</td>';
					echo'<td>';
					echo $row['BudgetDays'];
					echo'</td>';
					echo'<td>';
					echo $row['BudgetCurrancy'];
					echo'</td>';
					echo'<td>';
					echo $row['Manager'];
					echo'</td>';
					echo'</tr>';
					
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
				</div>
			
			</div>
			<div class="cl">&nbsp;</div>
				<a href="home.php" title="Main Menu">Return to Main Menu</a>
				</ul>
				<!-- End Shell -->
			</div>
			<div class="copy">
				<!-- Begin Shell -->
				<div class="shell">
					<div class="carts">
						
					</div>
					<p>&copy; Sitename.com. Design by Gary Johns,Richard Sherrill,Dan Lain,and Jose Flores <br/>Template from <a href="http://css-free-templates.com/">CSS-FREE-TEMPLATES.COM</a></p>
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
