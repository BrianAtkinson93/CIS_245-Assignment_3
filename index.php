<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<header>
    <h1>Welcome, please login</h1>
</header>

<main>
    <form action="login.php" method="post">
        <label for="user_id">Enter user ID:</label>
        <input type="text" name="user_id" id="user_id" required>
        <br>
        <label for="password">Enter user Password:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
</main>

<!--comment-->

<footer>
    <p>&copy; <?= date("Y"); ?> My Website. All rights reserved.</p>
</footer>
</body>
</html>
