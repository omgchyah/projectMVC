<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
</head>
<body>
    <h1>Welcome to the Home Page</h1>
    <p>Introduzca su ID de usuario</p>
    <form action="/task/index" method="POST">
        <label for="task_user_id">User ID:</label>
        <input type="text" id="user_id" name="user_id" required>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
