<!DOCTYPE html>
<html>

<head>
    <title>Register Page</title>
</head>

<body>
    <h1>Register Page</h1>
    <p>Please register.</p>
    <form method="POST" action="register_processing.php">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Register">
    </form>
</body>

</html>