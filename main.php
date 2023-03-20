<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <style>
        /* Add any custom styling here */
        .image-links {
            display: flex;
            justify-content: left;
            margin-top: 5px;
        }
        .logout-button {
            position: absolute;
            top: 10px;
            right: 10px;
        }
    </style>
</head>
<body>
<button class="logout-button" onclick="location.href='logout.php'">Logout</button>
<button class="home-button" onclick="location.href='main.php'">Home</button>
<h1>Welcome, <?php echo $_SESSION['name']; ?></h1>
<h2>Please select from below:</h2>
<div class="image-links">
    <a href="view.php"><img src="view.png" alt="View" width="350" height="350"></a>
    <a href="register.php"><img src="register.png" alt="Register" width="350", height="350"></a>
</div>
</body>
</html>
