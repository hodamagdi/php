<!DOCTYPE html>
<html lang="en">
  <head>
  </head>
  <body>
    <form action="<?php $_PHP_SELF ?>" method="post">
      <h1>Login</h1>
      <p>Please fill out your credentials to login.</p>
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
          <td><button name="login">Login</button></td>
        </tr>
    
      </table>
      <span class="signup">Don't have an account?
        <a href="">Sign Up Now</a>
      </span>
    </form>
  </body>
</html>

<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'php_day_5';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (isset($_POST['login'])) {
    $NAME = $_POST['Name'];
    $PASS = $_POST['Pass'];

    if (empty($NAME)) {
        echo "Please enter your name";
    }

    if (empty($PASS)) {
        echo "Please enter your password";
    }

    $sql = "SELECT * FROM users WHERE user_Name = '$NAME'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hash = $row['user_Pass'];

        if (password_verify($PASS, $hash)) {

            session_start();
            $_SESSION['userName'] = $_POST['Name'];
            $_SESSION['userPass'] = $_POST['Pass'];

            // echo "username= {$_SESSION['userName']}<br>";
            // echo "userpass= {$_SESSION['userPass']}<br>";

            header("Location: successLogin.php");
            exit(); 
        }else{
            echo "Wrong password";
        }

    } else {
        echo "User not found";
    }
}


?>
