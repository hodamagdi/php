<html>
    <body>
        <form action="<?php $_PHP_SELF ?>" method="POST">
            <h1>User Registration Form</h1>
            <p>Please fill out the form and submit to add user record to the database.</p>
            <table>
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="user_Name" /></td>
                </tr>

                <tr>
                    <td>Email:</td>
                    <td><input type="text" name="user_email" /></td>
                </tr>

                <tr>
                    <td>Gender:</td>
                    <td>
                        <input type="radio" name="user_gender" value="Male"/>Male
                        <input type="radio" name="user_gender" value="Female"/>Female
                    </td>
                </tr>

                <tr>
                    <td>Receive Emails from us:</td>
                    <td><input type="checkbox" name="mail_status" value="on" /></td>
                </tr>

                <tr>
                    <td><input name="submit" type="submit" value="Submit"></td>
                    <td><input type="button" value="Cancel"></td>
                </tr>
            </table>
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

// Create the database 
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
$retval = mysqli_query($conn, $sql);
if (!$retval) {
    die('Could not create database: ' . mysqli_error($conn));
}

// Select the database
mysqli_select_db($conn, $dbname);

// Create the users table
$sql = 'CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL AUTO_INCREMENT,
    user_Name VARCHAR(255) NOT NULL,
    user_email VARCHAR(255) NOT NULL,
    user_gender ENUM("Male", "Female", "Other") NOT NULL,
    mail_status VARCHAR(3) NOT NULL CHECK (mail_status IN (1, 0)),
    PRIMARY KEY (id)
)';


$retval = mysqli_query($conn, $sql);
if (!$retval) {
    die('Could not create table: ' . mysqli_error($conn));
}

echo 'Database and Table created successfully';

if (isset($_POST['submit'])) {
    $name = $_POST['user_Name'];
    $email = $_POST['user_email'];
    $gender = $_POST['user_gender'];
    $isChecked = isset($_POST['mail_status']) && $_POST['mail_status'] == 'on';
    $isCheckedValue = $isChecked ? 'yes' : 'no';

    // Insert data into the database 
    $sql = "INSERT INTO users (user_Name, user_email ,user_gender , mail_status)
     VALUES ('$name', '$email' ,' $gender' , '$isCheckedValue')";
        
        if (mysqli_query($conn, $sql)) {
            echo 'data inserted successfully';
        } else {
            echo "Error: " . mysqli_error($conn);
        }
}
 

mysqli_close($conn);
?>

