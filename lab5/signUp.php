<!DOCTYPE html>
<html lang="en">
  <head>
  </head>
  <body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
      <h1>Sign Up</h1>
      <p>Please fill this form to create an account</p>
      <table>
        <tr>
          <td>User Name</td>
          <td><input type="text" name="Name" /></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input type="password" name="Pass" /></td>
        </tr>
        <tr>
          <td><button class="btn-login" name="submit">Submit</button></td>
        </tr>
      </table>
      <span class="login">Already have an account?
        <a href="">Login here</a>
      </span>
    </form>
  </body>
</html>

<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'php_day_5';

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
$sql = 'CREATE TABLE IF NOT EXISTS users(
    user_id INT NOT NULL AUTO_INCREMENT,
    user_Name VARCHAR(20) NOT NULL,
    user_Pass VARCHAR(225) NOT NULL,
    PRIMARY KEY (user_id),
    UNIQUE KEY (user_Pass),
    UNIQUE KEY unique_user_name (user_Name)
)';

$retval = mysqli_query($conn, $sql);
if (!$retval) {
    die('Could not create table: ' . mysqli_error($conn));
}

echo 'Database and Table created successfully';

// Insert data into users table 
if(isset($_POST['submit'])){
    $NAME = $_POST['Name'];
    $PASS = $_POST['Pass'];

    if(empty($NAME)){
        echo "Please enter your name";
    }

    if(empty($PASS)){
        echo "Please enter your password";
    }

    // Check if the password is already used
    $sql = "SELECT * FROM users WHERE user_Pass = '$PASS' ";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        echo "choose another Password";
    } else {
        // Hash the password
        $hashedPassword = password_hash($PASS, PASSWORD_DEFAULT);

        // Insert the user data into the database
        $sql = "INSERT INTO users (user_Name, user_Pass) VALUES ('$NAME', '$hashedPassword')";
        
        if (mysqli_query($conn, $sql)) {
            echo 'Sign up successfully';
            header("Location: logIn.php");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
?>

