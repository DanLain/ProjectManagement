<?php  

Class GanttChart { 
//Base code Adapted from http://www.ncbase.com/gc/?id=tut
  var $activities;  
  var $start;
  var $project_name;
  var $startDate;
  var $endDate;  
  var $end;  
  var $unit;  
  var $header_style;  
  var $header_style_odd;  
  var $header_style_even;  
  var $column_style_odd;  
  var $column_style_even;  
  var $activity_style_complete;  
  var $activity_style_open;
  function GanttChart ($start = 1, $end = 1, $unit = 'Days') {
	if(!isset($mysqlconnect)){
		$mysqlconnect=mysql_connect('localhost','danla_web','thisiscool');
	}

	mysql_select_db("danlain_live");
	$project_result = mysql_query("SELECT * FROM project where project.ProjectID = '$_GET[ProjectID]'") or die(mysql_error());										
	while($projectRow=mysql_fetch_array($project_result)){
		$this->startDate = $projectRow['TargetStartDate'];
		$this->endDate = $projectRow['TargetEndDate'];
		$this->project_name = $projectRow['ProjectName'];
	}
	$i = 0;
	$test = true;
	while($test){
	//echo "<th>".date('m-d-y',strtotime($startDate.'+ '.$i.' day'))."</th>";
	if (strtotime($this->startDate.'+ '.$i.' day') >= strtotime($this->endDate) ) $test = false;
	$i++;
	}
    $this->start = $start;  
    $this->end = $i;  
    $this->unit = $unit; 
    $this->activities = array(); 
    $this->header_style = 'bgcolor="#d0d0d0"';  
    $this->header_style_odd = 'bgcolor="#ffffff"';  
    $this->header_style_even = 'bgcolor="#f0f0f0"'; 
    $this->column_style_odd = 'bgcolor="#ffffff"';  
    $this->column_style_even = 'bgcolor="#f0f0f0"'; 
    $this->activity_style_open = 'bgcolor="#d0d0d0"';
    $this->activity_style_complete = 'bgcolor="green"';	
  } 
  function AddActivity ($description, $start, $end, $comp) { 
    $this->activities[] = array('start' => $start, 'end' => $end,  
      'description' => $description, 'comp'=>$comp); 
    $this->start = min($this->start, $start); 
    $this->end = max($this->end, $end); 
  } 
  function Render ($unit_width = 100) { 
    $duration = $this->end - $this->start + 1; 
    echo "<table border=0 cellspacing=0 cellpadding=0 width='100'>\r\n";
	echo "<tr><th colspan=$duration {$this->header_style}>",
		$this->project_name, "\r\n<tr>\r\n"; 
    echo "<tr><th colspan=$duration {$this->header_style}>",  
         $this->unit, "\r\n<tr>\r\n"; 
    for ($i = $this->start; $i <= $this->end; $i++) { 
      if ($i % 2 == 0) { 
        echo "<th width=$unit_width {$this->header_style_even}>".date('m-d',strtotime($this->startDate.'+ '.$i.' day')); 
      } else { 
        echo "<th width=$unit_width {$this->header_style_odd}>".date('m-d',strtotime($this->startDate.'+ '.$i.' day')); 
      }  
    } 
    foreach ($this->activities as $activity) { 
      $start = $activity['start']; 
      $end = $activity['end']; 
      $description = $activity['description']; 
      $before = $start;  
      //$duration = $end - $start + 1;
	  $duration_comp = $activity['comp'];
	  $duration_open = $end - $start + 1 - $activity['comp'];
      $after = $this->end - $end;  
      echo "<tr>\r\n"; 
      for ($i = $this->start; $i < $before; $i++) { 
        if ($i % 2 == 0) { 
          echo "<td {$this->column_style_even}>&nbsp;\r\n"; 
        } else { 
          echo "<td {$this->column_style_odd}>&nbsp;\r\n"; 
        }  
      } 
	  echo "<td colspan=$duration_comp {$this->activity_style_complete}>".($duration_comp > 4 ? $description:($duration_comp + $duration_open >3 ?($duration_comp > 0 ? $description: "" ): ""))."\r\n"; 
	  echo "<td colspan=$duration_open {$this->activity_style_open}>".($duration_comp <= 4 ? $description:($duration_comp + $duration_open <=3 ?($duration_comp <= 0 ? $description: "" ): ""))."\r\n";
      for ($i = $before + $duration_comp + $duration_open; $i <= $this->end; $i++) { 
        if ($i % 2 == 0) { 
          echo "<td {$this->column_style_odd}>&nbsp;\r\n"; 
        } else { 
          echo "<td {$this->column_style_even}>&nbsp;\r\n"; 
        }  
      } 
    } 
    echo "</table>\r\n"; 
  } 
} 

?>