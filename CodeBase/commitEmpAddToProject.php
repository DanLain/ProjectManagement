<?php
session_start();



if(!isset($mysqlconnect)){$mysqlconnect=mysql_connect('localhost','danla_web','thisiscool');
//echo "Connected to MySQL";
}

mysql_select_db("danlain_live");

$insert_query="UPDATE employee SET ProjectID = '$_SESSION[ProjectID]' WHERE employee.EmployeeID = '$_REQUEST[EmployeeID]'";
		$retval =mysql_query($insert_query);
		if(! $retval ){
			  die('Could not update data: ' . mysql_error());
			}
		header("Location: http://localhost/chooseAddEmployee.php");
	
?>