<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Migration System</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <h1>Data Migration System</h1>

    <p>CSV Import & Export using PHP + MySQL</p>

    <form action="upload.php" method="POST" enctype="multipart/form-data">

        <input type="file" name="csv_file" accept=".csv" required>

        <br><br>

        <button type="submit" name="upload">
            Upload CSV
        </button>

        <br><br>

        <a href="view.php">

        <button type="button">View Employees</button>
        
        </a>

    </form>

</div>

</body>
</html>