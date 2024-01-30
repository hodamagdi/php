<html>
    <body>
        <h1>Users details</h1>
        <form action="part1.php" method="Request">
        <input type="submit" value="Add new user">
    </form>
    </body>
</html>
       
<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'php_day_4';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

// Select the database
mysqli_select_db($conn, $dbname);

// Query selector
$sql = "SELECT user_id, user_Name, user_email, user_gender, mail_status FROM users";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die('Could not select columns: ' . mysqli_error($conn));
}

echo 'Selected successfully';

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>";
    echo "<tr>
        <th>Name</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Mail status</th>
    </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["user_Name"] . "</td>";
        echo "<td>" . $row["user_email"] . "</td>";
        echo "<td>" . $row["user_gender"] . "</td>";
        echo "<td>" . $row["mail_status"]. "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "0 results";
}

echo "Fetched data successfully\n";

mysqli_close($conn);
?>
