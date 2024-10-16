<?php
session_start();
global $pdo;
require '../../db/db.php';
require '../check_captcha.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $token = $_POST['smart-captcha'];

    if (check_captcha($token)) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? OR phone = ?");
        $stmt->execute([$login, $login]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: ../forms/profile-form.php");
            exit();
        } else {
            echo "<p style='color: red;'>Неверный логин или пароль.</p>";
        }
    } else {
        echo "<p style='color: red;'>Непройдена проверка на робота.</p>";
    }
}