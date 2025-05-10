

<!DOCTYPE html>
<html>
<head>
    <title>User Info</title>
</head>
<body>
    <h1>UserID: </h1>
    <h2>Name: <?php echo htmlspecialchars($user['name']); ?></h2>
    <h2>Email: <?php echo htmlspecialchars($user['email']); ?></h2>
</body>
</html>
