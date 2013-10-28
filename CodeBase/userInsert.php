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

$passwordReg="/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/";
$emailReg="(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|'(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*')@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])";//http://www.regular-expressions.info/email.html
if (!($_SESSION['Login']=="True" && !strlen($_REQUEST['Password'])>0) && preg_match($passwordReg, $_REQUEST['Password']) !=1){
//if (preg_match($passwordReg, $_REQUEST['Password']) !=1){
		//Password not good enough
		$_SESSION['BadPassword'] = "True";
		$_SESSION['Phone'] = $_REQUEST['Phone'];
		$_SESSION['Fax'] = $_REQUEST['Fax'];
		$_SESSION['FirstName'] = $_REQUEST['FirstName'];
		$_SESSION['LastName'] = $_REQUEST['LastName'];
		$_SESSION['Address']= $_REQUEST['Address'];
		$_SESSION['City'] = $_REQUEST['City'];
		$_SESSION['State'] = $_REQUEST['State'];
		$_SESSION['Zip'] = $_REQUEST['Zip'];
		$_SESSION['Email'] = $_REQUEST['Email'];
		$_SESSION['CompanyID'] = $_REQUEST['CompanyID'];
		$_SESSION['PasswordInvalid']="True";
		$_SESSION['GoodReg']="False";
		header("Location: http://localhost/userManagment.php");
	}
	
if(!filter_var($_REQUEST['Email'], FILTER_VALIDATE_EMAIL)){
		// Invalid email address detected';
		$_SESSION['Phone'] = $_REQUEST['Phone'];
		$_SESSION['Fax'] = $_REQUEST['Fax'];
		$_SESSION['FirstName'] = $_REQUEST['FirstName'];
		$_SESSION['LastName'] = $_REQUEST['LastName'];
		$_SESSION['Address']= $_REQUEST['Address'];
		$_SESSION['City'] = $_REQUEST['City'];
		$_SESSION['State'] = $_REQUEST['State'];
		$_SESSION['Zip'] = $_REQUEST['Zip'];
		$_SESSION['Email'] = $_REQUEST['Email'];
		$_SESSION['CompanyID'] = $_REQUEST['CompanyID'];
		$_SESSION['GoodReg']="False";
		$_SESSION['BadEmail'] = "True";
		$_SESSION['EmailInvalid'] = "True";
		header("Location: http://localhost/userManagment.php");
	}

if($_SESSION['BadEmail'] == "True"){
		// 'duplicate email address detected';
		$_SESSION['Phone'] = $_REQUEST['Phone'];
		$_SESSION['Fax'] = $_REQUEST['Fax'];
		$_SESSION['FirstName'] = $_REQUEST['FirstName'];
		$_SESSION['LastName'] = $_REQUEST['LastName'];
		$_SESSION['Address']= $_REQUEST['Address'];
		$_SESSION['City'] = $_REQUEST['City'];
		$_SESSION['State'] = $_REQUEST['State'];
		$_SESSION['Zip'] = $_REQUEST['Zip'];
		$_SESSION['Email'] = $_REQUEST['Email'];
		$_SESSION['CompanyID'] = $_REQUEST['CompanyID'];
		$_SESSION['GoodReg']="False";
		header("Location: http://localhost/userManagment.php");
	}
	
if($_REQUEST['Password'] != $_REQUEST['ConfirmPassword']){
		// Passwords do not match
		$_SESSION['BadPassword'] = "True";
		$_SESSION['Phone'] = $_REQUEST['Phone'];
		$_SESSION['Fax'] = $_REQUEST['Fax'];
		$_SESSION['FirstName'] = $_REQUEST['FirstName'];
		$_SESSION['LastName'] = $_REQUEST['LastName'];
		$_SESSION['Address']= $_REQUEST['Address'];
		$_SESSION['City'] = $_REQUEST['City'];
		$_SESSION['State'] = $_REQUEST['State'];
		$_SESSION['Zip'] = $_REQUEST['Zip'];
		$_SESSION['Email'] = $_REQUEST['Email'];
		$_SESSION['CompanyID'] = $_REQUEST['CompanyID'];
		$_SESSION['GoodReg']="False";
		header("Location: http://localhost/userManagment.php");
	}
if ($_SESSION['GoodReg']=="True"){
		$insert_query="Insert into employee 
			(Phone, Fax, FirstName, LastName, Address, City, State, Zip, Email, CompanyID)
			values('$_REQUEST[Phone]',
				   '$_REQUEST[Fax]',
				   '$_REQUEST[FirstName]',
				   '$_REQUEST[LastName]',
				   '$_REQUEST[Address]',
				   '$_REQUEST[City]',
				   '$_REQUEST[State]',
				   '$_REQUEST[Zip]',
				   '$_REQUEST[Email]',
				   '$_REQUEST[CompanyID]')";
		$retval =mysql_query($insert_query);
		
		$new_number="Select EmployeeID from employee where Email = '$_REQUEST[Email]'";
		$number_result=mysql_query($new_number);
		$next_employee_ID = mysql_fetch_row($number_result);
		
		$insert_query="Insert into login 
			values('$next_employee_ID[0]',
				   '$_REQUEST[Email]',
				   '$_REQUEST[Password]',
				   '0',
				   '0')";
		$retval =mysql_query($insert_query);
		if(! $retval ){
			  die('Could not update data: ' . mysql_error());
			}
		$_SESSION['Login'] = "True";
		$_SESSION['employeeID'] = $next_employee_ID;
		$_SESSION['User'] = $_REQUEST['Email'];

		header("Location:http://localhost/home.php");
	}
else if ($_SESSION['Login']=="True" && ($_SESSION['BadPassword']=="False") && $_SESSION['EmailInvalid']=="False"){
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
		if (strlen($_REQUEST['Password'])>0){
			$update_query="UPDATE login  
				SET   login.Password='$_REQUEST[Password]'
				WHERE login.employeeID = '$_SESSION[employeeID]'";
				$retval = mysql_query($update_query);
				if(! $retval ){
					die('Could not update data: ' . mysql_error());
				}
		}
		
		header("Location: http://localhost/home.php");
	}
?>