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
		
		$insert_query1="SELECT ProjectID FROM project WHERE ProjectName = '$_REQUEST[ProjectName]'";
		$result = mysql_query($insert_query1);
		$array = mysql_fetch_array($result);
		$_SESSION['ProjectID'] = $array['ProjectID'];
		if(! $insert_query1 ){
			  die('Could not update data: ' . mysql_error());
			}
		header("Location: http://localhost/chooseAddEmployee.php");
		/*not getting variable for project id*/
	
?>