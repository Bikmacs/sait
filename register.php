<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $surname = $_POST['surname'];
    $name = $_POST['name'];
    $date_birth = $_POST['date_birth'];
    $email = $_POST['email'];
    $login = $_POST['login'];
    $password = $_POST['password'];

    if(strlen($surname) == 0 || strlen($password) <= 8) {
        echo "Пароль должен содержать минимум 8 символов.";
        echo "Логин должен содержать минимум 1 символ.";
        exit;
    }

    $query = "INSERT INTO users (surname, name, date_brith, email, login, password) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    if ($stmt === false) {
        die('Ошибка подготовки запроса: ' . $conn->error);
    }

    $stmt->bind_param("ssssss", $surname, $name, $date_birth, $email, $login, $password);

    // запрос
    if ($stmt->execute()) {
        echo "Регистрация прошла успешно!";
        header('Location: index.php');
    } else {
        echo "Ошибка регистрации: " . $stmt->error;
        header('Location: 2.html');
    }

    $stmt->close(); 
}
?>
