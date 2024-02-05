<?php
session_start();
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'php_day_4';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("location: userDetails.php");
}

$sql = "SELECT id, user_Name, user_email, user_gender, mail_status FROM users WHERE id = $id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
}
?>

<html>
    <head>
        <link rel="stylesheet" href="npm/node_modules/bootstrap/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container-fluid pt-4">
            <div class="row">
                <?php if (isset($user)) { ?>
                    <div class="col-md-6 offset-md-3">
                        <div class="d-flex justify-content-between border-bottom mb-5">
                            <div>
                                <h3>Edit user</h3>
                            </div>
                            <div>
                                <a href="userDetails.php" class="text-decoration-none">Back</a>
                            </div>
                        </div>

                        
                        <?php if (isset($_SESSION['errors'])) { ?>
                        <div class="alert alert-danger">
                            <?php foreach ($_SESSION['errors'] as $error) { ?>
                                <p><?= ($error); ?></p>
                            <?php } ?>
                        </div>
                        <?php unset($_SESSION['errors']); ?>
                    <?php } ?>

                        <form method="POST" action="update.php">
                            <input type="hidden" name="id" value="<?= $id; ?>">

                            <div class="mb-3">
                                <label for="Name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="Name" name="user_Name" value="<?= $user['user_Name']; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="Email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="Email" name="user_Email" value="<?= $user['user_email']; ?>">
                            </div>

                            <div class="mb-3">
                                <label for="Gender" class="form-label">Gender</label>
                                <input type="radio" name="user_gender" value="Male" <?= ($user['user_gender'] === 'Male') ? 'checked' : ''; ?>>Male
                                <input type="radio" name="user_gender" value="Female" <?= ($user['user_gender'] === 'Female') ? 'checked' : ''; ?>>Female
                            </div>

                            <div class="mb-3">
                                <label for="courses" class="form-label">Receive Emails from us</label>
                                <input type="checkbox" name="mail_status" <?= !empty($user['mail_status']) ? 'checked' : ''; ?>>
                            </div>

                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </form>
                    </div>
                <?php } else {
                    header("location: userDetails.php");
                } ?>
            </div>
        </div>
    </body>
</html>

