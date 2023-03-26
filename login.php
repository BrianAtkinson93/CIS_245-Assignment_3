<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (isset($_POST['user_id']) && isset($_POST['password'])) {
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];

    // Replace this with your database connection and query
    $host = 'localhost:8889';
    $dbname = 'Assignment_3';
    $usrnm = 'root';
    $psswd = 'root';
    $pdo = new PDO('mysql:host='.$host.';dbname='.$dbname, $usrnm, $psswd);
    $stmt = $pdo->prepare('SELECT * FROM Students WHERE s_id = :user_id AND password = :password');
    $stmt->execute(['user_id' => $user_id, 'password' => $password]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION['user_id'] = $user['s_id'];
        $_SESSION['name'] = $user['name'];
        header('Location: main.php');
    } else {
        header('Location: index.php?error=invalid_credentials');
    }
} else {
    header('Location: index.php');
}
exit;
