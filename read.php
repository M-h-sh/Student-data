<?php
// Read data from the text file and insert it into the database
$file = fopen("student_data.txt", "r");
if ($file) {
    while (($line = fgets($file)) !== false) {
        $data = explode(" ", trim($line));
        $name = $data[0];
        $test1 = $data[1];
        $test2 = $data[2];
        $test3 = $data[3];
        $test4 = $data[4];

        $check_sql = "SELECT * FROM tests WHERE name = '$name'";
        $result = $conn->query($check_sql);

        if ($result->num_rows == 0) {
            // Insert data into the database
            $sql = "INSERT INTO tests (name, Test_1, Test_2, Test_3, Test_4) VALUES ('$name', '$test1', '$test2', '$test3', '$test4')";
            if ($conn->query($sql) === false) {
                echo "Error inserting data: " . $conn->error;
            }
        } else {
        }
    }
    fclose($file); // Close the file after the while loop
} else {
    echo "Error opening the file.";
}

// Close the database connection




// Cleaner Version...

$data = array_map(fn ($row) => explode(" ", trim($row)), explode("\n", file_get_contents("student_data.txt")));

$result = $conn->query("SELECT * FROM tests WHERE name = '{$data[0]}'");

if ($conn->query("INSERT INTO tests (name, Test_1, Test_2, Test_3, Test_4) VALUES (" . implode(", ", $data) . ")") === false) {
    echo "Error inserting data: " . $conn->error;
}

?>
