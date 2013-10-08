<?php
session_start();
$_SESSION['BadEmail'] = "False";
$_SESSION['BadPassword'] = "False";
$_SESSION['PasswordInvalid']="False";
$_SESSION['EmailInvalid'] = "False";


if(!isset($mysqlconnect)){$mysqlconnect=mysql_connect('localhost','danla_web','thisiscool');
//echo "Connected to MySQL";
}

mysql_select_db("danlain_live");
if ($_SESSION['Login']=="True"){
	$_SESSION['GoodReg']="False";
	}
else { 
	$_SESSION['GoodReg']="True";
	}


	$check_email="Select * from employee";
	$check_result=mysql_query($check_email);
	while($row=mysql_fetch_array($check_result)){
		if($row['Email'] == $_REQUEST['Email']){
			if ($row['EmployeeID'] != $_SESSION['EmployeeID']){
				$_SESSION['BadEmail'] = "True";
			}
		}
	}


	

if ($_SESSION['GoodReg']=="True"){
		$insert_query="Insert into Project 
			(ProjectName, TargetStartDate, TargetEndDate, BudgetDays, BudgetCurancy, Manager)
			values('$_REQUEST[ProjectName]',
				   '$_REQUEST[TargetStartDate]',
				   '$_REQUEST[TargetEndDate]',
				   '$_REQUEST[BudgetDays]',
				   '$_REQUEST[BudgetCurancy]',
				   '$_REQUEST[EmployeeID]')";
		$retval =mysql_query($insert_query);
		
	}
else if ($_SESSION['Login']=="True" ){
		$update_query="UPDATE employee  
			SET 	employee.Phone ='$_REQUEST[Phone]', 
					employee.Fax='$_REQUEST[Fax]', 
					employee.FirstName='$_REQUEST[FirstName]', 
					employee.LastName='$_REQUEST[LastName]', 
					employee.Address='$_REQUEST[Address]',
					employee.City='$_REQUEST[City]',
					employee.State='$_REQUEST[State]',
					employee.Zip='$_REQUEST[Zip]',
					employee.CompanyID='$_REQUEST[CompanyID]'
			WHERE employee.employeeID = '$_SESSION[employeeID]'";
		$retval = mysql_query($update_query);
		
		if(! $retval ){
			  die('Could not update data: ' . mysql_error());
			}
		
		}
		
		header("Location: http://localhost/flOhome.php");
	
?>