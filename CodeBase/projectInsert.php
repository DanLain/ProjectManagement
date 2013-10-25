<?php
session_start();



if(!isset($mysqlconnect)){$mysqlconnect=mysql_connect('localhost','danla_web','thisiscool');
//echo "Connected to MySQL";
}

mysql_select_db("danlain_live");



	
	


	


		$insert_query="Insert into Project 
			(ProjectName, TargetStartDate, TargetEndDate, BudgetDays, BudgetCurancy, Manager)
			values('$_REQUEST[ProjectName]',
				   '$_REQUEST[TargetStartDate]',
				   '$_REQUEST[TargetEndDate]',
				   '$_REQUEST[BudgetDays]',
				   '$_REQUEST[BudgetCurancy]',
				   '$_SESSION[EmployeeID]')";
		$retval =mysql_query($insert_query);
		
	
		
		if(! $retval ){
			  die('Could not update data: ' . mysql_error());
			}
		
		
		
		header("Location: http://localhost/flOhome.php");
	
?>