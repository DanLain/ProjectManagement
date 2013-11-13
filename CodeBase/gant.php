<?php
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
echo'<td bgcolor="green">row 1, cell 1</td>';
}
echo'</tr>';
}

echo'</table>';
?>

<meter value="10" min="0" max="100">2 out of 10</meter><br>
      "    "    <meter value="0.6">60%</meter>
	  <meter value="0.3" high="0.9" low="0.1" optimum="0.5"></meter>