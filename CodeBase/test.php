<?php
if($_REQUEST['choice'] == "Later")
{ header("Location: http://localhost/home.php");}
else
{echo $_REQUEST['choice'];}
?>