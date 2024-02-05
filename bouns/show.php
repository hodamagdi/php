<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'php_day_4';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

 if(isset($_GET['id'])) {
    $id =$_GET['id'];

} else {
    header("location: userDetails.php");
}

$sql = "SELECT id, user_Name, user_email, user_gender, mail_status FROM users WHERE id = $id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    // echo '<pre>';
    // print_r($user);
    // echo '</pre>';
}

?>


<html>
<head>
    <link rel="stylesheet" href="npm/node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid pt-4">
        <div class="row">
        <?php if(isset($user)): ?>
            <div class="col-md-10 offset-md-1">
                <div class="d-flex justify-content-between border-bottom mb-5">
                    <div>
                        <h3><?=$user['user_Name'];?></h3>
                    </div>
                    <div>
                        <a href="userDetails.php" class="text-decoration-none">Back</a>
                    </div>
                </div>
                <div>
                    <p>User ID: <?= $user['id']; ?></p>
                    <p>Name: <?= $user['user_Name']; ?></p>
                    <p>Email: <?= $user['user_email']; ?></p>
                    <p>Gender: <?= $user['user_gender']; ?></p>
                    <p>Mail Status: <?= $user['mail_status']; ?></p>
                </div>
                <?php else: echo "no users found"; endif;?>
            </div>
        </div>
    </div>
</body>
</html>


