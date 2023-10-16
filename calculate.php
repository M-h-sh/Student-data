<?php
include "connection.php";
// Calculate test averages
$sql = "SELECT AVG(Test_1) AS Test1Avg, AVG(Test_2) AS Test2Avg, AVG(Test_3) AS Test3Avg, AVG(Test_4) AS Test4Avg FROM tests";
$result = $conn->query($sql);
$testAverages = $result->fetch_assoc();

// Calculate class average
$sql = "SELECT AVG((Test_1 + Test_2 + Test_3 + Test_4) / 4) AS ClassAvg FROM tests";
$result = $conn->query($sql);
$classAverage = $result->fetch_assoc();

// Close the database connection
$conn->close();

// Display the results
echo "<div class='bg-dark'>
<td><b>Class average: </b>" . round($classAverage['ClassAvg']) . "%</td>
 <td>Test 1:"  .round($testAverages['Test1Avg'])."%</td>
 <td> Test 2:" .round($testAverages['Test2Avg'])."% </td>",
"<td>Test 3:" .round($testAverages['Test3Avg'])."% </td>",
"<td>Test 4:" .round($testAverages['Test4Avg'])."% </td>"."</div>";
?>