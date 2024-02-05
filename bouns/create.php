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

?>

<html>

<head>
    <link rel="stylesheet" href="npm/node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid pt-4">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="d-flex justify-content-between border-bottom mb-5">
                    <div>
                        <h3>Create User</h3>
                    </div>
                    <div>
                        <a href="userDetails.php" class="text-decoration-none">Back</a>
                    </div>
                </div>

                <?php if (isset($_SESSION['errors'])) { ?>
                    <div class="alert alert-danger">
                        <?php foreach ($_SESSION['errors'] as $error) { ?>
                            <p><?= $error; ?></p>
                        <?php } ?>
                    </div>
                <?php }unset ($_SESSION['errors']); ?>

                <form method="POST" action="store.php">
                    <div class="mb-3">
                        <label for="Name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="Name" name="user_Name" value="">
                    </div>
                    <div class="mb-3">
                        <label for="Email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="Email" name="user_email" value="">
                    </div>
                    <div class="mb-3">
                        <label for="Gender" class="form-label">Gender</label>
                        <div>
                            <input type="radio" name="user_gender" value="Male" />Male
                        </div>
                        <div>
                            <input type="radio" name="user_gender" value="Female" />Female
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="courses" class="form-label">Receive Emails from us</label>
                        <input type="checkbox" name="mail_status" value="on" />
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
