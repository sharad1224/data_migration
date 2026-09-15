<?php

include 'config.php';

$sql = "SELECT * FROM employees";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Employee List</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h1>Employee Records</h1>

<table>

<tr>

<th>ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Email</th>
<th>Department</th>
<th>Salary</th>

</tr>

<?php

if($result->num_rows > 0){

    while($row = $result->fetch_assoc()){

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['first_name']; ?></td>

<td><?php echo $row['last_name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['department']; ?></td>

<td><?php echo $row['salary']; ?></td>

</tr>

<?php

    }

}

?>

</table>

</div>

</body>

</html>