<?php  

Class GanttChart { 
  var $activities;  
  var $start;  
  var $end;  
  var $unit;  
  var $header_style;  
  var $header_style_odd;  
  var $header_style_even;  
  var $column_style_odd;  
  var $column_style_even;  
  var $activity_style;  
  function GanttChart ($start = 1, $end = 1, $unit = 'Weeks') { 
    $this->start = $start;  
    $this->end = $end;  
    $this->unit = $unit; 
    $this->activities = array(); 
    $this->header_style = 'bgcolor="#d0d0d0"';  
    $this->header_style_odd = 'bgcolor="#ffffff"';  
    $this->header_style_even = 'bgcolor="#f0f0f0"'; 
    $this->column_style_odd = 'bgcolor="#ffffff"';  
    $this->column_style_even = 'bgcolor="#f0f0f0"'; 
    $this->activity_style = 'bgcolor="#d0d0d0"'; 
  } 
  function AddActivity ($description, $start, $end, $style='') { 
    if ($style == '') { 
      $style = $this->activity_style; 
    } 
    $this->activities[] = array('start' => $start, 'end' => $end,  
      'description' => $description, 'style' => $style); 
    $this->start = min($this->start, $start); 
    $this->end = max($this->end, $end); 
  } 
  function Render ($unit_width = 50) { 
    $duration = $this->end - $this->start + 1; 
    echo "<table border=0 cellspacing=0 cellpadding=0>\r\n"; 
    echo "<tr><th colspan=$duration {$this->header_style}>",  
         $this->unit, "\r\n<tr>\r\n"; 
    for ($i = $this->start; $i <= $this->end; $i++) { 
      if ($i % 2 == 0) { 
        echo "<th width=$unit_width {$this->header_style_even}>$i"; 
      } else { 
        echo "<th width=$unit_width {$this->header_style_odd}>$i"; 
      }  
    } 
    foreach ($this->activities as $activity) { 
      $start = $activity['start']; 
      $end = $activity['end']; 
      $description = $activity['description']; 
      $style = $activity['style']; 
      $before = $start;  
      $duration = $end - $start + 1; 
      $after = $this->end - $end;  
      echo "<tr>\r\n"; 
      for ($i = $this->start; $i < $before; $i++) { 
        if ($i % 2 == 0) { 
          echo "<td {$this->column_style_even}>&nbsp;\r\n"; 
        } else { 
          echo "<td {$this->column_style_odd}>&nbsp;\r\n"; 
        }  
      } 
      if (strlen($style) == 0) { 
        echo "<td colspan=$duration>$description\r\n"; 
      } else { 
        echo "<td colspan=$duration $style>$description\r\n"; 
      } 
      for ($i = $before + $duration; $i <= $this->end; $i++) { 
        if ($i % 2 == 0) { 
          echo "<td {$this->column_style_even}>&nbsp;\r\n"; 
        } else { 
          echo "<td {$this->column_style_odd}>&nbsp;\r\n"; 
        }  
      } 
    } 
    echo "</table>\r\n"; 
  } 
} 

?>