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

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['user_Name'];
    $email = $_POST['user_Email'];
    $gender = $_POST['user_gender'];
    $isChecked = isset($_POST['mail_status']) && $_POST['mail_status'] == 'on';
    $isCheckedValue = $isChecked ? 'yes' : 'no';

    // Validation
    $errors = [];

       // Name validation 
       if (empty($name)) {
        $errors[] = "Name is required";
    } elseif (!is_string($name)) {
        $errors[] = "Name must be a string";
    } elseif (strlen($name) > 20) {
        $errors[] = "Name must be <= 20 length";
    }

    // Email validation 
    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    // Gender validation 
    if (empty($gender)) {
        $errors[] = "Gender is required";
    }

    // Mail_status validation 
    if (empty($isCheckedValue)) {
        $errors[] = "CheckedValue is required";
    }
    // Output errors if there are any 
    if (empty($errors)) {
        // Update data into the database
        $sql = "UPDATE users SET 
        user_Name = '$name',
        user_email = '$email',
        user_gender = '$gender',
        mail_status = '$isCheckedValue'
        WHERE id = '$id'";

        if (mysqli_query($conn, $sql)) {
            header('Location: userDetails.php');
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // Store errors in the session and redirect
        $_SESSION['errors'] = $errors;
        header("Location: edit.php?id=$id");
        exit();
    }
}

mysqli_close($conn);
?>




