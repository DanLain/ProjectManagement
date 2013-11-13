<?php 

include 'GanttChart.php';     // Include the class file 
$G = new GanttChart();        // Create an instance of GanttChart 
$G->AddActivity('First Activity', 1, 5);   // Describe Activity #1 
$G->AddActivity('Second Activity', 6, 15); // Describe Activity #2 
$G->AddActivity('Third Activity', 1, 3);   // Describe Activity #3 
$G->AddActivity('Fourth Activity', 4, 11); // Describe Activity #4 
$G->Render();                              // Draw the chart 

?>

<!--?php 

include 'GanttChart.php';              // Include the class file 
$G = new GanttChart(1, 16, 'Months');  // Instantiate GanttChart 
$G->AddActivity('First Activity', 1, 5);   // Describe Activity #1 
$G->AddActivity('Second Activity', 6, 15); // Describe Activity #2 
$G->AddActivity('Third Activity', 1, 3);   // Describe Activity #3 
$G->AddActivity('Fourth Activity', 4, 11); // Describe Activity #4 
$G->Render();                              // Draw the chart 

?-->