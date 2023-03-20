<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

// Database connection
$host = 'localhost:8889';
$dbname = 'assignment_3';
$usrnm = 'root';
$psswd = 'root';
$pdo = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $usrnm, $psswd);

// Check if form is submitted
if (isset($_POST['course_code']) && isset($_POST['section'])) {
    $course_code = $_POST['course_code'];
    $section = $_POST['section'];
    $user_id = $_SESSION['user_id'];

// Check if course exists
    $stmt = $pdo->prepare('SELECT * FROM courses WHERE course_code = :course_code AND section = :section');
    $stmt->execute(['course_code' => $course_code, 'section' => $section]);
    $course = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$course) {
        // Course does not exist, display error message
        echo "Error: Course not found.";
    } else {
        // Check if course is already registered
        $stmt = $pdo->prepare('SELECT * FROM registered r JOIN courses c ON r.c_id = c.c_id WHERE r.s_id = :user_id AND BINARY c.course_code = :course_code AND c.section = :section');
        $stmt->execute(['user_id' => $user_id, 'course_code' => $course_code, 'section' => $section]);
        $registered_course = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($registered_course) {
            // Course is already registered, display error message
            echo "Error: You have already registered for this course.";
        } else {
            // Add course to registered table
            $stmt = $pdo->prepare('INSERT INTO registered (s_id, c_id) VALUES (:user_id, :course_id)');
            $stmt->execute(['user_id' => $user_id, 'course_id' => $course['c_id']]);

            // Redirect to view.php to show updated list of registered courses
            header('Location: view.php');
            exit;
        }
    }
}

// Fetch available courses from the database here
$stmt = $pdo->prepare('SELECT * FROM courses ORDER BY course_code, section');
$stmt->execute();
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
<button class="logout-button" onclick="location.href='logout.php'">Logout</button>
<button class="home-button" onclick="location.href='main.php'">Home</button>

<h2>Available courses</h2>
<ul>
    <?php
    // Loop through the fetched courses and display them
    foreach ($courses as $course) {
        echo '<li>' . ' Course Code: ' . $course['course_code'] . ' | ' . 'Section: ' . $course['section'] . '</li>';
    }
    ?>
</ul>


<h2>Register for a course</h2>
<form action="register.php" method="post">
    <label for="course_code">Course Code:</label>
    <input type="text" name="course_code" id="course_code" required>
    <br>
    <label for="section">Section:</label>
    <input type="text" name="section" id="section" required>
    <br>
    <button type="submit">Register</button>
</form>

</body>
</html>
