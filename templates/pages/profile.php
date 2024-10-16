<?php
session_start();
global $pdo;
require '../../db/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../forms/register-form.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();
$_SESSION['user'] = $user;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? $user['name'];
    $phone = $_POST['phone'] ?? $user['phone'];
    $email = $_POST['email'] ?? $user['email'];
    $password = $_POST['password'] ?? '';;

    if (!empty($password)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("UPDATE users SET name = ?, phone = ?, email = ?, password = ? WHERE id = ?");
        $stmt->execute([$name, $phone, $email, $hashed_password, $user_id]);
    } else {
        $stmt = $pdo->prepare("UPDATE users SET name = ?, phone = ?, email = ? WHERE id = ?");
        $stmt->execute([$name, $phone, $email, $user_id]);
    }

    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$user_id]);
    $updated_user = $stmt->fetch();;
    if ($_SESSION['user'] != $updated_user) {
        $_SESSION['user'] = $updated_user;
        echo "<p style='color: green;'>Данные обновлены!</p>";
    }
}
