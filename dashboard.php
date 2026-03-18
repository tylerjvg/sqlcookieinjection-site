<?php

require 'db.php';

$emailForQuery = $_COOKIE['remember_email'] ?? '';

if ($emailForQuery === '') {
    echo "<h1>No cookie found. Please <a href='login.php'>log in</a>.</h1>";
    exit;
}

$sql = "SELECT id, email FROM users WHERE email = '$emailForQuery'";

$result = $db->query($sql);
$user = $result->fetch(PDO::FETCH_ASSOC);

do {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        foreach ($row as $col => $val) {
            echo htmlspecialchars($col) . ": " . htmlspecialchars($val) . "<br>";
        }
        echo "<br>";
    }
} while ($result->nextRowset());

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
     <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: white;
            padding: 35px 40px;
            border-radius: 12px;
            box-shadow: 0px 4px 20px rgba(0,0,0,0.15);
            width: 350px;
            text-align: center;
        }

        h1 {
            margin-bottom: 25px;
            font-weight: 600;
            font-size: 26px;
            color: #333;
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 15px;
            font-weight: bold;
            color: #444;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px 12px;
            border-radius: 6px;
            border: 1px solid #ccc;
            margin-top: 6px;
            font-size: 15px;
        }

        button {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            border: none;
            background: #4a67ff;
            color: white;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.2s;
        }

        button:hover {
            background: #334dff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Dashboard</h1>
        <?php
        if ($user) {
            echo "<p>Welcome, " . htmlspecialchars($emailForQuery) . "</p>";
        } else {
            echo "<p>Login Failed</p>";
        }
        ?>
        <p><a href='logout.php'>Logout</a></p>
    </div>
    
</body>
</html>

