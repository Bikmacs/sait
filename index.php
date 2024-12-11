<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Авторизация</h1>
        
        <?php
        if (isset($_GET['error'])) {
            echo '<p style="color:red;">Неверный логин или пароль.</p>';
        }
        ?>

        <form action="auth.php" method="post">
            <div class="form-group">
                <label for="login">Логин:</label>
                <input type="text" id="login" name="login" required>
            </div>
            <div class="form-group">
                <label for="password">Пароль:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit" class="button">Войти</button>
            </div>
        </form>
        <div class="form-group">
            <a href="2.html">Зарегистрироваться</a>
        </div>
    </div>
</body>
</html>
