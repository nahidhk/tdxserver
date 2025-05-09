<?php
require_once '../config/config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_POST['email']) || empty($_POST['email'])) {
        die("Email is required.");
    }

    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $code = $_POST['code'];
    $phone = preg_replace('/^0/', '', $_POST['phone']);
    $full_phone = $code . $phone;
    $password = $_POST['password'] ?? $_POST['password1'];

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // 🔍 Check if email or phone already exists
    $check_sql = "SELECT id FROM users WHERE email = ? OR phone = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("ss", $email, $full_phone);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        echo "❌ Email or phone number already exists.";
    } else {
        // ✅ Insert if not exists
        $insert_sql = "INSERT INTO users (email, phone, password) VALUES (?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("sss", $email, $full_phone, $hashed_password);

        if ($insert_stmt->execute()) {
            echo "✅ Account created successfully!";
        } else {
            echo "❌ Error: " . $insert_stmt->error;
        }

        $insert_stmt->close();
    }

    $check_stmt->close();
    $conn->close();
}
?>
