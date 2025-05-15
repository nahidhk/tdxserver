<?php
require_once '../config/config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Input validation
    if (empty($email) || empty($password)) {
        echo "<script>alert('Please fill in both fields.');</script>";
        exit;
    }

    // Prepare SQL
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        die("SQL Error: " . mysqli_error($conn));
    }

    // Bind and execute
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Check if user found
    if ($result && mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        $dbPassword = $user['password'];

        // সরাসরি password match করা
   if ($password === $dbPassword) {
    setcookie("login", "true", time() + 31536000, "/");
    setcookie("email", $email, time() + 31536000, "/");
     header("Location:/index.php");
    exit; 
}else {
            echo "<script>
                const v = confirm('Incorrect password! Try again');
                if (v === true || v === false) {
                    window.location.href = '/#login';
                }
            </script>";
        }
    } else {
        require_once '../src/error/notAccount.html';
    }

    mysqli_stmt_close($stmt);
}
?>
