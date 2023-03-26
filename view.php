<?php
/**
 * @return PDO|void
 */
function getPdo()
{
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header('Location: index.php');
        exit;
    }

// Database connection and query
    $host = 'localhost:8889';
    $dbname = 'Assignment_3';
    $usrnm = 'root';
    $psswd = 'root';
    $pdo = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $usrnm, $psswd);
    return $pdo;
}

$pdo = getPdo();
$stmt = $pdo->prepare('SELECT c.c_id, c.course_code, c.section FROM Registered r JOIN Courses c ON r.c_id = c.c_id WHERE r.s_id = :user_id');
$stmt->execute(['user_id' => $_SESSION['user_id']]);
$registered_courses = $stmt->fetchAll(PDO::FETCH_ASSOC);


function getAvailableSections($pdo, $course_code, $current_section)
{
    $stmt = $pdo->prepare('SELECT section FROM Courses WHERE course_code = :course_code AND section != :current_section');
    $stmt->execute(['course_code' => $course_code, 'current_section' => $current_section]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Courses</title>
</head>
<body>
<button class="logout-button" onclick="location.href='logout.php'">Logout</button>
<button class="home-button" onclick="location.href='main.php'">Home</button>
<h2>Registered courses</h2>
<form action="changeSection.php" method="post">
    <table>
        <thead>
        <tr>
            <th>Course Code</th>
            <th>Section</th>
            <th>Change Section</th>
            <th>Drop</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Loop through the fetched courses and display them
        foreach ($registered_courses as $course) {
            echo '<tr>';
            echo '<td>' . $course['course_code'] . '</td>';
            echo '<td>' . $course['section'] . '</td>';
            echo '<td>';
            echo '<input type="hidden" name="course_id[]" value="' . $course['c_id'] . '">';
            echo '<select name="new_section[]">';
            $available_sections = getAvailableSections($pdo, $course['course_code'], $course['section']);
            foreach ($available_sections as $section) {
                echo '<option value="' . $section['section'] . '">' . $section['section'] . '</option>';
            }
            echo '</select>';
            echo '<button type="submit" name="change_btn[' . $course['c_id'] . ']" value="' . $course['c_id'] . '">Save</button>';
            echo '</td>';
            echo '<td><a href="delete.php?course_id=' . $course['c_id'] . '">X</a></td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
</form>
</body>
</html>

