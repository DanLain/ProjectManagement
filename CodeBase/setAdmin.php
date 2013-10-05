<?php
session_start();

if(!$mysqlconnect){
	$mysqlconnect=mysql_connect('localhost','danla_web','thisiscool');
}

mysql_select_db("danlain_live");
$_GET['EmployeeID'];

$raw_results = mysql_query("SELECT * FROM login WHERE login.EmployeeID = '$_GET[EmployeeID]'") or die(mysql_error());
while($row=mysql_fetch_array($raw_results)){
	if($row['Admin'] == 1){
		$update_query="UPDATE login  
					SET   login.Admin=0
					WHERE login.EmployeeID = '$_GET[EmployeeID]'";
					$retval = mysql_query($update_query);
	}
	else{
		$update_query="UPDATE login  
						SET   login.Admin=1
						WHERE login.EmployeeID = '$_GET[EmployeeID]'";
						$retval = mysql_query($update_query);
		}
	header("Location: http://localhost/adminUserManagement.php");
}
?>



