<?php
if (isset($_COOKIE['remember_email']) && $_COOKIE['remember_email'] !== '') {
    header("Location: dashboard.php");
    exit;
}

$email = isset($_COOKIE['remember_email'])
    ? htmlspecialchars($_COOKIE['remember_email'], ENT_QUOTES, 'UTF-8')
    : '';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>

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
    <h1>Login</h1>

    <form method="post" action="processLogin.php">
        <label>Email:
            <input type="text" name="email" required value="<?php echo $email; ?>">
        </label>

        <label>Password:
            <input type="password" name="password" required>
        </label>

        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>
