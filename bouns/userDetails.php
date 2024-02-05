<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'php_day_4';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass ,$dbname);
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

// Query selector
$sql = "SELECT id, user_Name, user_email, user_gender, mail_status FROM users ";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die('Could not select columns: ' . mysqli_error($conn));
}

echo 'Selected successfully';

$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
// echo'<pre>';
// print_r($users);
// echo'</pre>';
?>

<html>
<head>
    <link rel="stylesheet" href="npm/node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid pt-4">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="d-flex justify-content-between border-bottom mb-5">
                    <div>
                        <h3>Users details</h3>
                    </div>
                    <div>
                        <a href="create.php" class="btn btn-sm btn-success">Add new user</a>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Mail status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td><?= $user['id']; ?></td>
                                <td><?= $user['user_Name']; ?></td>
                                <td><?= $user['user_email']; ?></td>
                                <td><?= $user['user_gender']; ?></td>
                                <td><?= $user['mail_status']; ?></td>
                                <td>
                                    <a href="show.php?id=<?= $user['id']; ?>" class="btn btn-sm btn-primary">Show</a>
                                    <a href="edit.php?id=<?= $user['id']; ?>" class="btn btn-sm btn-secondary">Edit</a>
                                    <a href="delete.php?id=<?= $user['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Do you really want to delete post?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

