<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Хешування паролю перед збереженням
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Приклад вставки даних у базу (MySQL)
    $conn = new mysqli('localhost', 'root', '', 'dnd_database');

    if ($conn->connect_error) {
        die("Помилка підключення: " . $conn->connect_error);
    }

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {
        echo "Реєстрація пройшла успішно!";
    } else {
        echo "Помилка: " . $conn->error;
    }

    $conn->close();
}
?>
