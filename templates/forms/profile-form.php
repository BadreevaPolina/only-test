<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Редактирование профиля</title>
    <link rel="stylesheet" href="../../css/style.css">
    <?php require '../pages/profile.php'; ?>
</head>
<body>
<div class="container">
    <h2>Редактирование профиля</h2>
    <form method="post">
        <label for="name">Имя:</label>
        <input type="text" name="name" id="name" value="<?= htmlspecialchars($_SESSION['user']['name']) ?>"
               required><br>
        <label for="phone">Телефон:</label>
        <input type="text" name="phone" id="phone" value="<?= htmlspecialchars($_SESSION['user']['phone']) ?>" required><br>
        <label for="email">Почта:</label>
        <input type="email" name="email" id="email" value="<?= htmlspecialchars(($_SESSION['user']['email'])) ?>"
               required><br>
        <label for="password">Пароль:</label>
        <input type="password" name="password" id="password"><br>
        <input type="submit" class="btn" value="Обновить данные">
    </form>
</div>
</body>
</html>