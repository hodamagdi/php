<?php
session_start();
echo "<h1>HI, {$_SESSION['userName']} WELCOME TO OUR SITE</h1>";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  </head>
  <body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <table>
        <img src="./img.jpg" alt="img"/>
        <tr>
          <td><button class="btn-login" name="signout">Sign out of your account</button></td>
        </tr>
      </table>
    </form>
  </body>
</html>

<?php
if (isset($_POST['signout'])) {
    // Destroy the session data
    session_unset();
    session_regenerate_id(true);
    session_destroy();

    setcookie("PHPSESSID", "", time() - 1);

    header("Location: logIn.php");
    exit();
}
?>



