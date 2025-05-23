<?php
require_once '../config/config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_POST['email']) || empty($_POST['email'])) {
        die("Email is required.");
    }
    $fullname = $_POST['name'];
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $code = $_POST['code'];
    $phone = preg_replace('/^0/', '', $_POST['phone']);
    $full_phone = $code . $phone;
    $password = $_POST['password'];
    $username = explode("@", $email);


    
    $check_sql = "SELECT id FROM users WHERE email = ? OR phone = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("ss", $email, $full_phone);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        require_once '../src//error/createError.html';
    } else {
      
        $insert_sql = "INSERT INTO users (username, fullname, email, phone, password) VALUES (?, ?, ? , ? , ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("sssss", $username[0], $fullname, $email, $full_phone, $password);
        mkdir("../data/user/" . $username[0]);

        if ($insert_stmt->execute()) {
            header("Location: index.php");
            exit();
        } else {
            echo "❌ Error: " . $insert_stmt->error;
        }

        $insert_stmt->close();
    }

    $check_stmt->close();
    $conn->close();
}
?>
