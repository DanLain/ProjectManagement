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
							echo "<a href='registration.php' title='Profile Link'>Register</a>";
						} 
						else
						{
							
								
								echo "<a href='registration.php' title='Profile Link'>";
								echo $_SESSION['User'];
								echo "</a>";
								echo "<a href='logout.php' title='Logout'> Logout</a>";
						}
						?>
						  


					</span><span class="shopping">Shopping Cart <a href="cart.php" title="Shopping Cart">$<?php echo $_SESSION['OrderTotal'];?>
					</a></span></p>
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
							
							 class="sale-item" <form action="userInsert.php" method="post">
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
					<h2>
					 <?php
						if($_SESSION['Login']=="True"){
							echo "Update Employee Information";
						}
						else {
							echo "Registration";
						}
						
					 ?>
					</h2>
					<form action="userInsert.php" method="post">
<?php
if($_SESSION['Login']=="True"){


	$mysqlquery1="Select * from Employee where EmployeeID = '$_SESSION[EmployeeID]'";
	$result1=mysql_query($mysqlquery1);
	while ($row=mysql_fetch_array($result1))
	{
			
			$_SESSION['Phone'] = $row['Phone'];
			$_SESSION['Fax'] = $row['Fax'];
			$_SESSION['FirstName'] = $row['FirstName'];
			$_SESSION['LastName'] = $row['LastName'];
			$_SESSION['Address']= $row['Address'];
			$_SESSION['City'] = $row['City'];
			$_SESSION['State'] = $row['State'];
			$_SESSION['Zip'] = $row['Zip'];
			$_SESSION['Email'] = $row['Email'];
			$_SESSION['Salary'] = $row['Salary'];
			$_SESSION['CompanyID']=$row['CompanyID'];
		
	}
}


if (isset($_SESSION['BadEmail']) || isset($_SESSION['BadPassword'])){
	if ($_SESSION['BadEmail'] == "True"){
			echo "First Name: <input type='text' name='FirstName' value=".$_SESSION['FirstName']." >";
			echo "Last Name: <input type='text' name='LastName'value=".$_SESSION['LastName']."><br /><br />";
			echo "Phone Number: <input type='text' name='Phone' value=".$_SESSION['Phone']."><br /><br />";
			echo "E-Mail: <input type='text' name='Email' value=".$_SESSION['Email'].">";
			if ($_SESSION['EmailInvalid'] =="True"){
				Echo "Email address is invalid.<br /><br />";
			}
			else{
				Echo "Email address already used please enter a different one <br /><br />";
			}
			echo "Password: <input type='password' name='Password'><br /><br />";
			echo "Confirm Password: <input type='password' name='ConfirmPassword' ><br /><br />";
			echo "Address: <input type='text' name='Address' value=".$_SESSION['Address']."><br /><br />";
			echo "City: <input type='text' name='City' value=".$_SESSION['City']."><br /><br />";
			echo "State: <input type='text' name='State' value=".$_SESSION['State']."><br /><br />";
			echo "Zip Code: <input type='text' name='Zip' value=".$_SESSION['Zip']."><br /><br />";
			echo "Fax: <input type='text' name='Fax' value=".$_SESSION['Fax']."><br /><br /><br />";
			echo "CompanyID: <input type='text' name='CompanyId' value=".$_SESSION['CompanyID']."><br /><br />";
		}
	else if ($_SESSION['BadPassword'] == "True"){
		echo "First Name: <input type='text' name='FirstName' value=".$_SESSION['FirstName']." >";
		echo "Last Name: <input type='text' name='LastName'value=".$_SESSION['LastName']."><br /><br />";
		echo "Phone Number: <input type='text' name='Phone' value=".$_SESSION['Phone']."><br /><br />";
		echo "E-Mail: <input type='text' name='Email' value=".$_SESSION['Email']."><br /><br />";
		echo "Password: <input type='password' name='Password'>";
		Echo "Passwords do not match<br /> or the password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digi<br /><br />";
		echo "Confirm Password: <input type='password' name='ConfirmPassword'>";
		Echo "Passwords do not match<br /> or the password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digi<br /><br />";
		echo "Address: <input type='text' name='Address' value=".$_SESSION['Address']."><br /><br />";
		echo "City: <input type='text' name='City' value=".$_SESSION['City']."><br /><br />";
		echo "State: <input type='text' name='State' value=".$_SESSION['State']."><br /><br />";
		echo "Zip Code: <input type='text' name='Zip' value=".$_SESSION['Zip']."><br /><br />";
		echo "Fax: <input type='text' name='Fax' value=".$_SESSION['Fax']."><br /><br /><br />";
		echo "CompanyID: <input type='text' name='CompanyID' value=".$_SESSION['CompanyID']."><br /><br />";
	}
	else if ($_SESSION['Login']=="True"){
			echo "First Name: <input type='text' name='FirstName' value=".$_SESSION['FirstName']." >";
			echo "Last Name: <input type='text' name='LastName'value=".$_SESSION['LastName']."><br /><br />";
			echo "Phone Number: <input type='text' name='Phone' value=".$_SESSION['Phone']."><br /><br />";
			echo "E-Mail: <input type='text' name='Email' value=".$_SESSION['Email'].">";
			Echo " <br /><br />";
			echo "Password: <input type='password' name='Password'><br /><br />";
			echo "Confirm Password: <input type='password' name='ConfirmPassword' ><br /><br />";
			echo "Address: <input type='text' name='Address' value=".$_SESSION['Address']."><br /><br />";
			echo "City: <input type='text' name='City' value=".$_SESSION['City']."><br /><br />";
			echo "State: <input type='text' name='State' value=".$_SESSION['State']."><br /><br />";
			echo "Zip Code: <input type='text' name='Zip' value=".$_SESSION['Zip']."><br /><br />";
			echo "Fax: <input type='text' name='Fax' value=".$_SESSION['Fax']."><br /><br /><br />";
			echo "CompanyID: <input type='text' name='CompanyID' value=".$_SESSION['CompanyID']."><br /><br />";
		}
	
	}
else
	{
		if ($_SESSION['Login']=="True"){
			echo "First Name: <input type='text' name='FirstName' value=".$_SESSION['FirstName']." >";
			echo "Last Name: <input type='text' name='LastName'value=".$_SESSION['LastName']."><br /><br />";
			echo "Phone Number: <input type='text' name='Phone' value=".$_SESSION['Phone']."><br /><br />";
			echo "E-Mail: <input type='text' name='Email' value=".$_SESSION['Email'].">";
			Echo " <br /><br />";
			echo "Password: <input type='password' name='Password'><br /><br />";
			echo "Confirm Password: <input type='password' name='ConfirmPassword' ><br /><br />";
			echo "Address: <input type='text' name='Address' value=".$_SESSION['Address']."><br /><br />";
			echo "City: <input type='text' name='City' value=".$_SESSION['City']."><br /><br />";
			echo "State: <input type='text' name='State' value=".$_SESSION['State']."><br /><br />";
			echo "Zip Code: <input type='text' name='Zip' value=".$_SESSION['Zip']."><br /><br />";
			echo "Fax: <input type='text' name='Fax' value=".$_SESSION['Fax']."><br /><br /><br />";
			echo "CompanyID: <input type='text' name='CompanyID' value=".$_SESSION['CompanyID']."><br /><br />";
		}
		else {
			echo "First Name: <input type='text' name='FirstName'>";
			echo "Last Name: <input type='text' name='LastName'><br /><br />";
			echo "Phone Number: <input type='text' name='Phone'><br /><br />";
			echo "E-Mail: <input type='text' name='Email'><br /><br />";
			echo "Password: <input type='password' name='Password' ><br /><br />";
			echo "Confirm Password: <input type='password' name='ConfirmPassword'><br /><br />";
			echo "Address: <input type='text' name='Address'><br /><br />";
			echo "City: <input type='text' name='City'><br /><br />";
			echo "State: <input type='text' name='State'><br /><br />";
			echo "Zip Code: <input type='text' name='Zip'><br /><br />";
			echo "Fax: <input type='text' name='Fax'><br /><br /><br />";
			echo "CompanyID: <input type='text' name='CompanyID'><br /><br />";
		}
	}
	?>
<input type="submit">
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
				// <?php
			
					// $mysqlquery="Select * from promotions JOIN merchandise WHERE promotions.MerchID = merchandise.MerchID";
					// $result=mysql_query($mysqlquery);
										
					// $mysqlqueryitem="Select * from merchandise";
					// //$item_result=mysql_query($mysqlqueryitem);

									

					// while ($row=mysql_fetch_array($result)){
						// $item_result=mysql_query($mysqlqueryitem);
						// while ($row_item=mysql_fetch_array($item_result)){
							// if ($row_item['MerchID'] == $row['MerchID']){
								// if(date("Y-m-d")>=$row['StartDate'] & date("Y-m-d")<=$row['EndDate']){
								// echo "<li>";
								// echo "<a href='productDetails.php?varname=".$row['MerchID']."' title=";
								// echo "Product Link";
								// echo "><img src=";
								// echo "images/";
								// echo $row_item['Picture'];
								// echo " alt=";
								// echo"Product Image"; 
								// echo "/></a>";
								// echo "<div class=";
								// echo "info";
								// echo ">";
								// echo "<h4>";
								// echo $row_item['Name'];
								// echo "</h4>";
								// echo "<span class=";
								// echo "number";
								// echo ">";
								// echo $row_item['MerchID'];
								// echo "</span>";
								// echo "<span class=";
								// echo "price";
								// echo "><span>$</span>";
								// echo $row['SalePrice'];
								// echo "</span>";
								// echo "<div class=";
								// echo "cl";
								// echo ">&nbsp;</div>";
								// echo "</div>";
								// echo "</li>";
								// }
							// }
						// }											
											
					// }
				// ?>
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
							<h1> Sporting Goods Company </h1>
							
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
						<ul>
							<li><span>We accept</span></li>
							
							<li><a href="#" title="VISA"><img src="images/cart-img2.jpg" alt="VISA" /></a></li>
							<li><a href="#" title="MasterCard"><img src="images/cart-img3.jpg" alt="MasterCard" /></a></li>
						</ul>
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
