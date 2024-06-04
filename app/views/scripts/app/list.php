<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task List</title>
    <link href="/PHP/ProjectMVC/web/stylesheets/styles.css" rel="stylesheet">
</head>
<body>
    <h1>All Tasks</h1>
    <table border="1">
        <tr>
            <th>Task Name</th>
            <th>Description</th>
            <th>Status</th>
            <th>Date Created</th>
            <th>Date Updated</th>
            <th>User Name</th>
        </tr>
        <?php foreach ($tasks as $task): ?>
        <tr>
            <td><?php echo htmlspecialchars($task['name']); ?></td>
            <td><?php echo htmlspecialchars($task['description']); ?></td>
            <td><?php echo htmlspecialchars($task['status']); ?></td>
            <td><?php echo htmlspecialchars($task['date_creation']); ?></td>
            <td><?php echo htmlspecialchars($task['date_updated']); ?></td>
            <td><?php echo htmlspecialchars($task['user_name']); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <form action="<?php echo WEB_ROOT; ?>/application/execute" method="post">
        <input type="hidden" name="action" value="create">
        <button type="submit">Create New Task</button>
    </form>
</body>
</html>
