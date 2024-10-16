<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="../../css/style.css">
    <?php require '../pages/register.php'; ?>
</head>
<body>
<div class="container">
    <h2>Регистрация</h2>
    <form method="post">
        <label for="name">Имя:</label>
        <input type="text" name="name" id="name" required><br>
        <label for="phone">Телефон:</label>
        <input type="text" name="phone" id="phone" required><br>
        <label for="email">Почта:</label>
        <input type="email" name="email" id="email" required><br>
        <label for="password">Пароль:</label>
        <input type="password" name="password" id="password" required><br>
        <label for="confirm_password">Повторите пароль:</label>
        <input type="password" name="confirm_password" id="confirm_password" required><br>
        <div class="buttons">
            <a href="login-form.php" class="btn btn-primary">Войти</a>
            <input type="submit" class="btn btn-secondary" value="Зарегистрироваться">
        </div>
    </form>
</div>
</body>
</html>
