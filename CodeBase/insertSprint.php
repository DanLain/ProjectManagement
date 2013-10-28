<html>
<body>
<?php

session_start();
if(!isset($mysqlconnect)){
			$mysqlconnect=mysql_connect('localhost','danla_web','thisiscool');
			
		}
		$_SESSION['sameNameSprint'] = "False";
		mysql_select_db("danlain_live");
		$sprintSqlQuery="Select * from sprint WHERE Name ='$_REQUEST[name]'";
		$sprintResult=mysql_query($sprintSqlQuery);
		while($sprint_row=mysql_fetch_array($sprintResult))
		{
			
				if($sprint_row['ProjectID'] == $_REQUEST['projID'])
				{
					$_SESSION['sameNameSprint'] = "True";
				}

		}
		if($_SESSION['sameNameSprint'] == "True")
		{
			header("Location: http://localhost/createSprint.php");
		}
		else
		{
			$startDate = date('Y-m-d', strtotime($_REQUEST['startDate']));
			$endDate =  date('Y-m-d', strtotime($_REQUEST['endDate']));
			mysql_select_db("danlain_live");
			$insertQuery="Insert sprint
				SET ProjectID='$_REQUEST[projID]', StartDate='$startDate',
				EndDate='$endDate', Name='$_REQUEST[name]'";
			mysql_query($insertQuery);
		
			$_SESSION['sameNameSprint'] = "False";
			header("Location: http://localhost/home.php");
		}
		
?>

</body>
</html>
