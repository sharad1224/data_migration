<?php

include 'config.php';

if(isset($_POST['upload'])){

    if($_FILES['csv_file']['error'] == 0){

        $tmpName = $_FILES['csv_file']['tmp_name'];

        if(($handle = fopen($tmpName, "r")) !== FALSE){

            // Skip Header Row
            fgetcsv($handle);

            //$count = 0;
            $totalRecords = 0;
            $imported = 0;
            $skipped = 0;
            $failed = 0;

            $stmt = $conn->prepare("
                INSERT INTO employees
                (id, first_name, last_name, email, department, salary)
                VALUES (?, ?, ?, ?, ?, ?)
            ");

            while(($row = fgetcsv($handle, 1000, ",")) !== FALSE){

                $totalRecords++;

                $id           = $row[0];
                $first_name   = $row[1];
                $last_name    = $row[2];
                $email        = $row[3];
                $department   = $row[4];
                $salary       = $row[5];

                //$sql = "INSERT INTO employees
                //(id, first_name, last_name, email, department, salary)

                $stmt->bind_param(
                    "issssi",
                    $id,
                    $first_name,
                    $last_name,
                    $email,
                    $department,
                    $salary
                );

                if ($stmt->execute()) {
                    $imported++;
                } else {
                    //echo "Error: " . $stmt->error . "<br>";

                    if ($stmt->errno == 1062) {

                        $skipped++;

                    } else {

                        $failed++;

                    }
                }

            }

            $stmt->close();

            fclose($handle);

            echo "<h2>Import Summary</h2>";

            echo "<table border='1' cellpadding='10' cellspacing='0'>";

            echo "<tr><td>Total CSV Records</td><td>$totalRecords</td></tr>";

            echo "<tr><td>Imported</td><td>$imported</td></tr>";

            echo "<tr><td>Skipped (Duplicate)</td><td>$skipped</td></tr>";

            echo "<tr><td>Failed</td><td>$failed</td></tr>";

            echo "</table>";

            echo "<br><br>";

            echo "<a href='view.php'>
            <button>View Employees</button>
            </a>";
            //echo "&nbsp;";
            echo "<a href='index.php'>
            <button>Upload Another CSV</button>
            </a>";

        }

    }

}

?>