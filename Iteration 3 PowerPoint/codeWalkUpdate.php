<html>
<body>
<?php

session_start();
if(!isset($mysqlconnect)){
			$mysqlconnect=mysql_connect('localhost','danla_web','thisiscool');
			
		}

		mysql_select_db("danlain_live");

	$sprintSqlQuery="Select * from sprint where Name = '$_SESSION[sprintName]'";
	$sprintResult=mysql_query($sprintSqlQuery);
	while($sprint_row=mysql_fetch_array($sprintResult))
	{
		
			$updateQuery=" UPDATE sprint
			SET StartDate='$_REQUEST[StartDate]',
			EndDate='$_REQUEST[EndDate]'
			WHERE Name='$sprint_row[Name]'";
			mysql_query($updateQuery);
			$_SESSION['UpdateSprint'] = "True";

			echo $_REQUEST['StartDate'];
		
			header("Location: http://localhost/manageSprints.php");
		
	}


?>

</body>
</html>
