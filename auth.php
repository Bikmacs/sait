<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE login = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $login, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        header('Location: 3.html');
        exit();
    } else {
        echo "Неверный логин или пароль.";
        header('Location: index.php');

    }
}
?>
