<html>
<body>
<?php

session_start();
if(!isset($mysqlconnect)){
			$mysqlconnect=mysql_connect('localhost','danla_web','thisiscool');
			
		}
		mysql_select_db("danlain_live");
		$insertQuery="Insert company
			SET ProjectID='$_REQUEST[ProjectID]', 
			Name='$_REQUEST[Name]',
			Description='$_REQUEST[Description]'";
		mysql_query($insertQuery);
		//header("Location: http://localhost/companyProperties.php");
?>

</body>
</html>
