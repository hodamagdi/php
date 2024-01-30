<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
include 'students.php';

echo "<table border='1'>";
echo "<tr>
    <th>Name</th>
    <th>Email</th>
    <th>Status</th>
    </tr>";

foreach ($students as $student) {
    echo "<tr>";
        if ($student['status'] == 'PHP') {
            echo "<td style='color: red;'>". $student['name'] . "</td>";
            echo "<td style='color: red;'>".  $student['email'] ."</td>";
            echo "<td style='color: red;'>". $student['status'] . "</td>";
        } else {
            echo "<td>" . $student['name'] . "</td>";
             echo "<td>" . $student['email'] . "</td>";
            echo "<td>" . $student['status'] . "</td>";
        }
    echo "</tr>";
}
echo "</table>";
?>
</body>
</html>