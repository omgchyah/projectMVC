<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Task</title>
    <link href="/PHP/ProjectMVC/web/stylesheets/styles.css" rel="stylesheet">
</head>
<body>
    <h1>Create a New Task</h1>
    <form action="<?php echo WEB_ROOT; ?>/task/execute" method="post">
        <input type="hidden" name="action" value="storeTask">
        <!-- Form fields for task creation -->
        <label for="task_name">Task Name:</label>
        <input type="text" id="task_name" name="task_name" required><br><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea><br><br>

        <label for="user_id">User ID:</label>
        <input type="number" id="user_id" name="user_id" required><br><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
