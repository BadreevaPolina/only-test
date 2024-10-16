<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Вход</title>
    <link rel="stylesheet" href="../../css/style.css">
    <?php require '../pages/login.php'; ?>
    <script src="https://smartcaptcha.yandexcloud.net/captcha.js" defer></script>
</head>
<body>
<div class="container">
    <h2>Вход</h2>
    <form method="post">
        <label for="login">Логин (email или телефон):</label>
        <input type="text" name="login" id="login" required><br>
        <label for="password">Пароль:</label>
        <input type="password" name="password" id="password" required><br>
        <div id="captcha-container" class="smart-captcha" data-sitekey="<?= SMARTCAPTCHA_CLIENT_KEY ?>"></div>
        <input type="hidden" name="smart-captcha" id="smart-captcha" value="" required>
        <div class="buttons">
            <input type="submit" class="btn btn-primary" value="Войти">
            <a href="register-form.php" class="btn btn-secondary">Зарегистрироваться</a>
        </div>
    </form>
</div>
</body>
</html>