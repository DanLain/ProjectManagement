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
					<h2>Project Options</h2>
					<ul>
						<li><a href="addVendor.php" title="Vendor"><span>Add Vendor</span></a></li>
<?php
        $raw_results = mysql_query("SELECT * FROM vendor") or die(mysql_error());
             
       
        if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
           									
			if (mysql_num_rows($raw_results)>0){
					
					echo"<table border='1'> ";
					echo'<tr>';
					echo'<th>VendorID</th>';
					echo'<th>';
					echo'VendorName';
					echo'</th>';
					echo'<th>';
					echo'Address';
					echo'</th>';
					echo'<th>';
					echo'City';
					echo'</th>';
					echo'<th>';
					echo'State';
					echo'</th>';
					echo'<th>';
					echo'Zip';
					echo'</th>';
					echo'<th>';
					echo'ContactName';
					echo'</th>';
					echo'<th>';
					echo'Phone';
					echo'</th>';
					echo'<th>';
					echo'Fax';
					echo'</th>';
					echo'<th>';
					echo'MerchID';
					echo'</th>';
					echo'</tr>';
					$count =0;
					

					while ($row=mysql_fetch_array($raw_results)){
					$count =$count+1;
					

					
					echo"<tr><td><a href='addVendor.php?VendorID=".$row['VendorID']."' title=".$row['VendorID'].">".$row['VendorID']."</a></td>";
					echo"<td>".$row['VendorName']."</td>";
					echo"<td>".$row['Address']."</td>";
					echo"<td>".$row['City']."</td>";
					echo'<td>';
					echo $row['State'];
					echo'</td>';
					echo'<td>';
					echo $row['Zip'];
					echo'</td>';
					echo'<td>';
					echo $row['ContactName'];
					echo'</td>';
					echo'<td>';
					echo $row['Phone'];
					echo'</td>';
					echo'<td>';
					echo $row['Fax'];
					echo'</td>';
					echo'<td>';
					echo $row['MerchID'];
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
       // echo "Minimum length is ".$min_length;
    }
?>
						<li><a href="addCompany.php" title="Company"><span>Add Company</span></a></li>
<?php
        $raw_results = mysql_query("SELECT * FROM company") or die(mysql_error());
             
       
        if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
           									
			if (mysql_num_rows($raw_results)>0){
					
					echo"<table border='1'> ";
					echo'<tr>';
					echo'<th>CompanyID</th>';
					echo'<th>';
					echo'BusinessName';
					echo'</th>';
					echo'<th>';
					echo'Address';
					echo'</th>';
					echo'<th>';
					echo'City';
					echo'</th>';
					echo'<th>';
					echo'State';
					echo'</th>';
					echo'<th>';
					echo'Zip';
					echo'</th>';				
					echo'<th>';
					echo'Phone';
					echo'</th>';
					echo'<th>';
					echo'Fax';
					echo'</th>';
					echo'<th>';
					echo'ContactName';
					echo'</th>';
					echo'</tr>';
					$count1=0;
					

					while ($row=mysql_fetch_array($raw_results)){
					$count1=$count1+1;
					
					echo'<tr>';
					echo"<td><a href=addCompany.php?CompanyID=".$row['CompanyID']." title=";
					echo $row['CompanyID'];
					echo '">';
					echo $row['CompanyID'];
					echo '</a></td>';
					echo'<td>';
					echo $row['BusinessName'];
					echo '</td>';
					echo'<td>';
					echo $row['Address'];
					echo '</td>';
					echo'<td>';
					echo $row['City'];
					echo'</td>';
					echo'<td>';
					echo $row['State'];
					echo'</td>';
					echo'<td>';
					echo $row['Zip'];
					echo'</td>';
					echo'<td>';
					echo $row['Phone'];
					echo'</td>';
					echo'<td>';
					echo $row['Fax'];
					echo'</td>';
					echo'<td>';
					echo $row['ContactName'];
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
						<li><a href="addMerch.php" title="Item"><span>Add Item</span></a></li>
<?php

        $raw_results = mysql_query("SELECT * FROM merchandise") or die(mysql_error());
             
       
        if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
           									
			if (mysql_num_rows($raw_results)>0){
					
					echo"<table border='1'> ";
					echo'<tr>';
					echo'<th>MerchID</th>';
					echo'<th>';
					echo'Name';
					echo'</th>';
					echo'<th>';
					echo'Description';
					echo'</th>';
					echo'<th>';
					echo'Picture';
					echo'</th>';
					echo'<th>';
					echo'CategoryID';
					echo'</th>';
					echo'<th>';
					echo'TypeID';
					echo'</th>';
					echo'<th>';
					echo'BasePrice';
					echo'</th>';
					echo'</tr>';
					$count2=0;
					

					while ($row=mysql_fetch_array($raw_results)){
					$count2=$count2+1;
					
					echo'<tr>';
					echo"<td><a href=addMerch.php?MerchID=".$row['MerchID']." title=";
					echo $row['MerchID'];
					echo '">';
					echo $row['MerchID'];
					echo '</a></td>';
					echo'<td>';
					echo $row['Name'];
					echo '</td>';
					echo'<td>';
					echo $row['Description'];
					echo '</td>';
					echo'<td>';
					echo $row['Picture'];
					echo'</td>';
					echo'<td>';
					echo $row['CategoryID'];
					echo'</td>';
					echo'<td>';
					echo $row['TypeID'];
					echo'</td>';
					echo'<td>$';
					echo $row['BasePrice'];
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
        echo "Minimum length is ".$min_length;
    }
?>
						<li>Account Management</span></li>
<?php
   
        $raw_results = mysql_query("SELECT * FROM login") or die(mysql_error());
             
       
        if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
           									
			if (mysql_num_rows($raw_results)>0){
					
					echo"<table border='1'> ";
					echo'<tr>';
					echo'<th>Unlock Account</th>';
					echo'<th>Set as Employee</th>';
					echo'<th>';
					echo'UserName';
					echo'</th>';
					echo'<th>';
					echo'Locked';
					echo'</th>';
					echo'<th>';
					echo'Employee';
					echo'</th>';
					
					echo'</tr>';
					$count2=0;
					

					while ($row=mysql_fetch_array($raw_results)){
					$count1=$count2+1;
					
					echo'<tr>';
					echo"<td><a href=clearlock.php?CustomerID=".$row['CustomerID']." title=";
					echo $row['CustomerID'];
					echo '">';
					echo $row['CustomerID'];
					echo '</a></td>';
					echo"<td><a href=setEmp.php?CustomerID=".$row['CustomerID']." title=";
					echo $row['CustomerID'];
					echo '">';
					echo $row['CustomerID'];
					echo '</a></td>';
					echo'<td>';
					echo $row['UserName'];
					echo '</td>';
					echo'<td>';
					echo ($row['Locked']==0 ? "":"Locked");
					echo '</td>';
					echo'<td>';
					echo ($row['Emp']==0 ? "":"Employee");
					echo '</td>';
					
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
        echo "Minimum length is ".$min_length;
    }
?>
<li> <span>Managment Reports</span></li>
						<?php
        $raw_results = mysql_query("SELECT * FROM inventory") or die(mysql_error());
             
       
        if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
           									
			if (mysql_num_rows($raw_results)>0){
					
					echo"<table border='1'> ";
					echo'<tr>';
					echo'<th>Location</th>';
					
					
					echo'</tr>';
					$count3=0;
					$local=0;

					while ($row=mysql_fetch_array($raw_results)){
					
					$count1=$count3+1;
					if($row['LocationID']!=$local){
					  $local=$row['LocationID'];
					echo'<tr>';
					echo"<td><a href=reports.php?varname=".$row['LocationID']." title=";
					echo $row['LocationID'];
					echo '">';
					echo $row['LocationID'];
					echo '</a></td>';
					
					
					echo'</tr>';}
					else{
					continue;
					}
					
					}
					echo'</table>';}
			
        else{ // if there is no matching rows do following
            echo "No results";
        }
         }
    
    //else{ // if query length is less than minimum
        //echo "Minimum length is ".$min_length;
    //}
?>
						<!--<li> <span>Merchandise Managment </span></li>-->
						<li><a href="orderMerch.php" tilte="order">Order Product</a></li>
						
<?php
						
		$raw_results = mysql_query("SELECT * FROM purchaseorders") or die(mysql_error());
             
       
        if(mysql_num_rows($raw_results) > 0){
					echo"<table border='1'> ";
					echo'<tr>';
					echo'<th>PONumber</th>';
					echo'<th>';
					echo'Merch ID';
					echo'</th>';
					echo'<th>';
					echo'Vendor ID';
					echo'</th>';
					echo'<th>';
					echo'Quantity';
					echo'</th>';
					echo'<th>';
					echo'Received Quantity';
					echo'</th>';
					echo'<th>';
					echo'Unit Price';
					echo'</th>';
					echo'</tr>';
					
					while ($row=mysql_fetch_array($raw_results)){
						echo'<tr>';
						echo "<td><a href='orderMerch.php?PONumber= ".$row['PONumber']." title=".$row['PONumber'].">".$row['PONumber']."</a></td>";
						echo"<td>".$row['MerchID']."</td>";
						echo"<td>".$row['VendorID']."</td>";
						echo'<td>';
						echo $row['Quantity'];
						echo'</td>';
						echo'<td>';
						echo $row['RecievedQuantity'];
						echo'</td>';
						echo'<td>';
						echo $row['Price'];
						echo'</td>';
						echo'</tr>';
						}
				echo'</table>';
				}
				
?>
					<li><span><a href="createPromo.php" tilte="order">Create Promotions</a></span></li>
						
						<?php
						
        $raw_results = mysql_query("SELECT * FROM promotions") or die(mysql_error());
             
       
        if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
           									
			if (mysql_num_rows($raw_results)>0){
					
					echo"<table border='1'> ";
					echo'<tr>';
					echo'<th>PromotionID</th>';
					echo'<th>';
					echo'Merchandise ID';
					echo'</th>';
					echo'<th>';
					echo'Location ID';
					echo'</th>';
					echo'<th>';
					echo'Description';
					echo'</th>';
					echo'<th>';
					echo'Sale Price';
					echo'</th>';
					echo'<th>';
					echo'Start Date';
					echo'</th>';
					echo'<th>';
					echo'End Date';
					echo'</th>';
					echo'</tr>';
					$count2=0;
					

					while ($row=mysql_fetch_array($raw_results)){
					$count2=$count2+1;
					
					echo'<tr>';
					echo'<td><a href="createPromo.php" title="';
					echo $count2;
					echo '">';
					echo $row['PromotionID'];
					echo '</a></td>';
					echo'<td>';
					echo $row['MerchID'];
					echo '</td>';
					echo'<td>';
					echo $row['LocationID'];
					echo '</td>';
					echo'<td>';
					echo $row['Description'];
					echo'</td>';
					echo'<td>';
					echo $row['SalePrice'];
					echo'</td>';
					echo'<td>';
					echo $row['StartDate'];
					echo'</td>';
					echo'<td>';
					echo $row['EndDate'];
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
    
    //else{ // if query length is less than minimum
        //echo "Minimum length is ".$min_length;
    //}
?>					<br ><br />
						<div>Cash On Hand</div>
<?php

   $inventorytotal=0;
   $raw_results = mysql_query("SELECT * FROM merchandise") or die(mysql_error());
             
       
        if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
           									
			if (mysql_num_rows($raw_results)>0){
					while ($row=mysql_fetch_array($raw_results)){
					$inventorytotal=$inventorytotal+$row['BasePrice'];
					}
            }
        
        else{ // if there is no matching rows do following
            echo "No results";
        }
         }
   $raw_results = mysql_query("SELECT * FROM purchaseorders") or die(mysql_error());
             
	$POtotal=0;
	$received=0;
	if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
		if (mysql_num_rows($raw_results)>0){
				while ($row=mysql_fetch_array($raw_results)){
				$POtotal=$POtotal+$row['Price'];
				$received=$received+($row['Price']*$row['RecievedQuantity']);
				}
			
			$POtotal=$POtotal-$received;
        }
        else{ // if there is no matching rows do following
            echo "No results";
        }
		}
   
        $raw_results = mysql_query("SELECT * FROM ordertable") or die(mysql_error());
        
        if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
           									
			if (mysql_num_rows($raw_results)>0){
					$CODtotal=0;     
					$Credittotal=0; 
					$Total=0;
					echo"<table border='1'> ";
					echo'<tr>';
					echo'<th>Cash Total</th>';
					echo'<th>';
					echo'Credit Total';
					echo'</th>';
					echo'<th>';
					echo'PO Total';
					echo'</th>';
					echo'<th>';
					echo'Inventory on Hand';
					echo'</th>';
					echo'<th>';
					echo'Total Cash on Hand';
					echo'</th>';
					echo'<th>';
					echo'Total Assets';
					echo'</th>';
					echo'</tr>';
					$count2=0;
					

					while ($row=mysql_fetch_array($raw_results)){
					$count2=$count2+1;
					if($row['PaymentType']=='COD'){
					$CODtotal=$CODtotal+$row['OrderTotal'];}
					if($row['PaymentType']=='Credit'){
					$Credittotal=$Credittotal+$row['OrderTotal'];}
					
					}
				echo'<tr>';
					echo'<td>';
					echo $CODtotal;
					echo '</td>';
					echo'<td>';
					echo $Credittotal;
					echo '</td>';
					echo'<td>';
					echo $POtotal;
					echo '</td>';
					echo'<td>';
					echo $inventorytotal;
					echo '</td>';
					echo'<td>';
					echo ($CODtotal+$Credittotal);
					echo'</td>';
					echo'<td>';
					echo ($CODtotal+$Credittotal+$inventorytotal);
					echo'</td>';
					echo'</tr>';	
				echo'</table>';}

        else{ // if there is no matching rows do following
            echo "No results";
        }
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
