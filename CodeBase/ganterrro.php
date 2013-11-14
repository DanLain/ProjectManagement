<?php
if(!isset($mysqlconnect)){
	$mysqlconnect=mysql_connect('localhost','danla_web','thisiscool');
}

mysql_select_db("danlain_live");
$project_result = mysql_query("SELECT * FROM project where project.ProjectID = '$_GET[ProjectID]'") or die(mysql_error());										
while($projectRow=mysql_fetch_array($project_result)){
	$startDate = $projectRow['TargetStartDate'];
	$endDate = $projectRow['TargetEndDate'];
}
$i = 0;
$test = true;
echo "<table border ='1' width='10000'>";
echo "<tr>";
while($test){
	echo "<th>".date('m-d-y',strtotime($startDate.'+ '.$i.' day'))."</th>";
	if (strtotime($startDate.'+ '.$i.' day') >= strtotime($endDate) ) $test = false;
	$i++;
}
echo "</tr>";
echo'</table>';
/*
$project =260;
$totalcells=$project/8;
$hours=64;
$i=$totalcells;
$x=$i;
$cells = $hours/8;
echo'<table border=""><tr bgcolor="red">';
for($totalcells;$totalcells>0;$totalcells--){
echo'<th>Header 1</th>';}
echo'</tr>';
for($x=0;$x<$i;$x++){
echo'<tr>';

for($totalcells=0;$totalcells<$i;$totalcells++){
if($totalcells==5) echo'<td><meter value="10" min="0" max="100">2 out of 10</meter><br></td>';
else
  echo'<td></td>';
if($totalcells==10) echo'<tc><meter value="10" min="0" max="100">2 out of 10</meter><br><td>';
}
echo'</tr>';
}

echo'</table>';
*/

?>
<table>
	<tr>
	  <td>100</td>
	  <td>200</td>
	  <td>300</td>
	</tr>
	<tr>
	  <td>400</td>
	  <td>500</td>
	  <td>600</td>
	</tr>
</table>