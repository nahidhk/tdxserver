<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Created</title>
    <style>
        body {
           
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .popup {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }
        .popup h2 {
            color: #4CAF50;
            margin-bottom: 10px;
        }
        .popup p {
            margin-bottom: 20px;
            color: #555;
        }
        .popup a {
            display: inline-block;
            padding: 10px 20px;
            background: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .popup a:hover {
            background: #45a049;
        }
    </style>
</head>
<body>
    <div class="popup">
        <h2>Account Created Successfully!</h2>
        <p>Please login now to access your account.</p>
        <a href="/#login">Login</a>
    </div>
</body>
</html>