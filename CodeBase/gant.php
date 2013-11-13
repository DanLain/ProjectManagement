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
if($totalcells==5) echo'<td><meter value="10" min="0" max="100">2 out of 10</meter><br></td>';
else
  echo'<td></td>';
if($totalcells==10) echo'<tc><meter value="10" min="0" max="100">2 out of 10</meter><br><td>';
}
echo'</tr>';
}

echo'</table>';


?>
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
<meter value="10" min="0" max="100">2 out of 10</meter><br>
      "    "    <meter value="0.6">60%</meter>
	  <p><dd> <meter value="0.3" high="0.9" low="0.1" optimum="0.5"></meter></dd></p>
	  <p>Heat the oven to <meter min="200" max="500" value="350">350 degrees</meter>.</p>
	  <dl>
  <dt>Target</dt>
  <dd><meter min="145" value="145" title="pounds">£145</meter></dd>
  <dt>Amount raised so far</dt>
  <dd><meter min="0" max="1000" low="50" high="125" value="145" optimum="145" title="pounds">£145</meter></dd>
</dl>
<div style="padding:2px;background:#CCC;">
  <div style="width:25%;background:#F00;text-align:center;">
    <span>25%</span>
  </div>
</div>