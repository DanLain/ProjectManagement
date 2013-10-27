<?php
session_start(); 

if(!$mysqlconnect){
	$mysqlconnect=mysql_connect('localhost','danla_web','thisiscool');
}
mysql_select_db("danlain_live");

if(strlen($_REQUEST['Name'])<1){header("Location: http://localhost/createEpic.php");}
else{
	if(isset($_GET['EpicID'])){
			$update_query="UPDATE epic SET 
										epic.Name = '$_REQUEST[Name]',
										epic.Description = '$_REQUEST[Description]'
									WHERE epic.EpicID = '$_REQUEST[EpicID]'";
			mysql_query($update_query);
		}
	else{
		$project_query="SELECT ProjectID FROM employee WHERE EmployeeID = '$_SESSION[EmployeeID]'";
		$result = mysql_query($project_query);
		$array = mysql_fetch_array($result);
		$ProjectID = $array['ProjectID'];
		$insert_query="Insert into epic 
			(ProjectID, Name, Description)
			values('$_SESSION[ProjectID]',
				   '$_REQUEST[Name]',
				   '$ProjectID')";
		mysql_query($insert_query);
	}
	header("Location: http://localhost/projectOperations.php");
}
?>
