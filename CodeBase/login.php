<?php
session_start();

$_SESSION['Locked'] = "False";

if(!$mysqlconnect){
	$mysqlconnect=mysql_connect('localhost','danla_web','thisiscool');
}
mysql_select_db("danlain_live");

$check_password="Select * from login where (`UserName` LIKE '%".$_REQUEST['Email']."%')";
$check_result=mysql_fetch_array(mysql_query($check_password));
if ($check_result['Locked']==0){
		if ($_REQUEST['Password']<>$check_result['Password']){
			if($_SESSION['BadLogin']!= $_REQUEST['Email']){
				$_SESSION['LoginTry'] =0;
			}
			$_SESSION['BadLogin'] = $_REQUEST['Email'];
			$_SESSION['LoginTry'] = $_SESSION['LoginTry'] +1;
			if ($_SESSION['LoginTry']==5){
				$update_query="UPDATE login  
					SET   login.Locked=1
					WHERE login.UserName = '$_REQUEST[Email]'";
					mysql_query($update_query);
			}
			header("Location: http://localhost/home.php");		
		}	
		else{
			$_SESSION['adminLogin'] = ( $check_result['Admin']==0 ? "False":"True");
			$_SESSION['Login'] = "True";
			$_SESSION['User'] = $check_result['UserName']; 
			$_SESSION['EmployeeID']  = $check_result['EmployeeID'];
			$adminSqlQuery="Select * from login where EmployeeID = '$_SESSION[EmployeeID]'";
						$adminResult=mysql_query($adminSqlQuery);
						$admin_row=mysql_fetch_array($adminResult);
						$empSqlQuery = "Select * from employee where EmployeeID = '$_SESSION[EmployeeID]'";
						$empResult = mysql_query($empSqlQuery);
						$emp_row=mysql_fetch_array($empResult);
						if(($admin_row['Admin'] == 1))
						{
							$_SESSION['Admin'] = 1;
							echo "<a href='companyProperties.php' title='Company Properties'>Company Properties</a><br>";
							echo "<br /><a href='adminUserManagement.php' title='Manage Users'>Manage Users</a></h1>";
						}
						if($emp_row['Manager'] ==1)
						{
							$_SESSION['Manager'] = 1;
							echo "<br /><a href='adminUserManagement.php' title='Manage Users'>Manage Users</a></h1>";
						}
						
						if($emp_row['Developer'] ==1)
						{
							$_SESSION['Developer'] = 1;
							
						}
						
						if($emp_row['Architect'] ==1)
						{
							$_SESSION['Architect'] = 1;
							
						}

			if(isset($_SESSION['ReadyToCheckout'])){
				if($_SESSION['ReadyToCheckout'] =="True")header("Location: http://checkout.php");
				else header("Location:http://localhost/home.php");
				}
			else {
				header("Location:http://localhost/home.php");		
				}
		}
	}
else {	
		$_SESSION['Locked'] = "True";
		$_SESSION['BadLogin'] = $_REQUEST['Email'];
		$_SESSION['Email'] = $_REQUEST['Email'];
		header("http://localhost/home.php");
	}
?>




