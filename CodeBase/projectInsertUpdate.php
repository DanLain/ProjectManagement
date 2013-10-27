<?php
session_start();



if(!isset($mysqlconnect)){$mysqlconnect=mysql_connect('localhost','danla_web','thisiscool');
//echo "Connected to MySQL";
}

mysql_select_db("danlain_live");

	
			$update_query="UPDATE project SET 
					project.ProjectName = '$_REQUEST[Name]',
					
					project.TargetStartDate = '$_REQUEST[StartDate]',
					Project.TargetEndDate = '$_REQUEST[EndDate]',
					Project.BudgetDays = '$_REQUEST[BudgetDays]',
					Project.BudgetCurancy = '$_REQUEST[BudgetCurancy]'
				WHERE project.ProjectID = '$_REQUEST[ProjectID]'";
			$retval =mysql_query($update_query);
			if(! $retval ){
			  die('Could not update data: ' . mysql_error());
			}
		
		?>