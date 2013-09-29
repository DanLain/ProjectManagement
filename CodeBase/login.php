<?php
session_start();

$_SESSION['Locked'] = "False";

if(!$mysqlconnect){
	$mysqlconnect=mysqli_connect('localhost','danla_web','thisiscool');
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
			header("Location: http://localhost/flohome.php");		
		}	
		else{
			$_SESSION['EmployeeLogin'] = ( $check_result['Emp']==0 ? "False":"True");
			$_SESSION['Login'] = "True";
			$_SESSION['User'] = $check_result['UserName']; 
			$_SESSION['CustomerID']  = $check_result['CustomerID'];

			if(isset($_SESSION['ReadyToCheckout'])){
				if($_SESSION['ReadyToCheckout'] =="True")header("Location: http://checkout.php");
				else header("Location:http://localhost/flohome.php");
				}
			else {
				header("Location:http://localhost/flohome.php");		
				}
		}
	}
else {	
		$_SESSION['Locked'] = "True";
		$_SESSION['BadLogin'] = $_REQUEST['Email'];
		$_SESSION['Email'] = $_REQUEST['Email'];
		header("http://localhost/flohome.php");
	}
?>




