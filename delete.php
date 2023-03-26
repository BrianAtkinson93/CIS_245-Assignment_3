<?php
session_start();

if (!isset($_SESSION['user_id']) || !isset($_GET['course_id'])) {
    header('Location: index.php');
    exit;
}

$host = 'localhost:8889';
$dbname = 'Assignment_3';
$usrnm = 'root';
$psswd = 'root';
$pdo = new PDO('mysql:host='.$host.';dbname='.$dbname, $usrnm, $psswd);

$stmt = $pdo->prepare('DELETE FROM Registered WHERE s_id = :user_id AND c_id = :course_id');
$stmt->execute(['user_id' => $_SESSION['user_id'], 'course_id' => $_GET['course_id']]);

header('Location: view.php');
exit;
?>
