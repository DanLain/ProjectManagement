<html>
<body>

<?php

session_start();
if(!isset($mysqlconnect)){
			$mysqlconnect=mysql_connect('localhost','danla_web','thisiscool');
			
		}

		mysql_select_db("danlain_live");

	$adminSqlQuery="Select * from employee where EmployeeID='$_SESSION[EmployeeID]'";
	$adminResult=mysql_query($adminSqlQuery);
	$admin_row=mysql_fetch_array($adminResult);
	
		if($_SESSION['Admin']==1)
		{
								
			

			$updateQuery=" UPDATE company
			SET BusinessName='$_REQUEST[BusinessName]', Fax='$_REQUEST[Fax]',
			ContactName='$_REQUEST[ContactName]', 
			Address='$_REQUEST[Address]',
			City='$_REQUEST[City]',
			State='$_REQUEST[State]',
			Zip='$_REQUEST[Zip]',
			Phone='$_REQUEST[Phone]'
			WHERE CompanyID='$admin_row[CompanyID]'";
			mysql_query($updateQuery);
			$_SESSION['Update'] = "True";
			header("Location: http://localhost/companyProperties.php");
		}
	


?>
</body>
</html>

