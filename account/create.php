<?php
// ডেটাবেজ কানেকশন (আপনার অনুযায়ী পরিবর্তন করুন)

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

    $sql = "INSERT INTO users (email, phone, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $email, $full_phone, $hashed_password);

    if ($stmt->execute()) {
        echo "Account created successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}


?>
