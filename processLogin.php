<?php

require 'db.php';

$email    = $_POST['email']    ?? '';
$password = $_POST['password'] ?? '';

if ($email !== '' && $password !== '') {

    setcookie('remember_email', $email, time() + 60*60*24*30, "/");

    header("Location: dashboard.php");
    exit;

} else {
    echo "Login failed";
}
