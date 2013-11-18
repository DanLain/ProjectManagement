	<?php
						session_start();

						echo "Welcome ";
							
							
	
						echo $_SESSION['User'];
						echo "<br />";
						
						if($_SESSION['Admin'] == 1)
						{								
							echo "<a href='companyProperties.php' title='Company Properties'>Company Properties</a><br>";
						}
						if($_SESSION['Manager'] == 1 || $_SESSION['Admin'] == 1)
						{
							
							echo "<br /><a href='adminUserManagement.php' title='Manage Users'>Manage Users</a></h1>";
						}
						if($_SESSION['Manager'] == 1 || $_SESSION['Architect'] == 1)
						{
							echo "<br /><a href='ProjectOperations.php' title='Manage Project'>Manage Project</a></h1>";
						}
		
						echo "<br><a href='workRecording.php' title='Manage Hours'>Manage Hours</a><br>";
							
?>
