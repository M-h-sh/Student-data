<?php
// Data from the table
$data = [["Bongani", 70, 88, 90, 10],["Hannes", 55, 65, 66, 84],["Vusi", 40, 10, 90, 97],["Lucky", 87, 77, 82, 57]
];

// Open the text file for writing
$file = fopen("student_data.txt", "w");

foreach ($data as $student) {
    fwrite($file, implode(" ", $student) . "\n");
}

// Close the file
fclose($file);
?>
