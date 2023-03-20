<?php
session_start();

if (!isset($_SESSION['user_id']) || !isset($_POST['course_id']) || !isset($_POST['new_section']) || !isset($_POST['change_btn'])) {
header('Location: index.php');
exit;
}

$course_id = $_POST['course_id'];
$new_section = $_POST['new_section'];
$change_btn = $_POST['change_btn'];

$key = array_search($change_btn[0], $course_id);

//echo '<pre>';
//print_r($_POST);
//echo '</pre>';
//
//echo $change_btn[0];

$host = 'localhost:8889';
$dbname = 'assignment_3';
$usrnm = 'root';
$psswd = 'root';
$pdo = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $usrnm, $psswd);

$stmt = $pdo->prepare('UPDATE registered SET c_id = (SELECT c_id FROM courses WHERE course_code = (SELECT course_code FROM courses WHERE c_id = :course_id) AND section = :new_section) WHERE s_id = :user_id AND c_id = :course_id');
$result = $stmt->execute(['user_id' => $_SESSION['user_id'], 'course_id' => $course_id[$key], 'new_section' => $new_section[0]]);

if ($result) {
header('Location: view.php');
} else {
echo "Error updating course section.";
}
exit;
