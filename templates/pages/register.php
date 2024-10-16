<?php
session_start();
global $pdo;
require '../../db/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? OR phone = ?");
    $stmt->execute([$email, $phone]);
    if ($stmt->rowCount() > 0) {
        echo "<p style='color: red;'>Email или телефон уже заняты.</p>";
    } elseif ($password !== $confirm_password) {
        echo "<p style='color: red;'>Пароли не совпадают.</p>";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO users (name, phone, email, password) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $phone, $email, $hashed_password]);
        echo "<p style='color: green;'>Регистрация успешна!</p>";
    }
}