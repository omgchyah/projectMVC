<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Task</title>
    <link href="/PHP/ProjectMVC/web/stylesheets/styles.css" rel="stylesheet">
</head>
<body>
    <h1>Update Task</h1>
    <form action="<?php echo WEB_ROOT; ?>/task/saveUpdate" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($task->getId()); ?>">
        
        <label for="task_name">Task Name:</label>
        <input type="text" id="task_name" name="task_name" value="<?php echo htmlspecialchars($task->getName()); ?>" required><br><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required><?php echo htmlspecialchars($task->getDescription()); ?></textarea><br><br>

        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="Pending" <?php echo $task->getStatus() == 'Pending' ? 'selected' : ''; ?>>Pending</option>
            <option value="In Progress" <?php echo $task->getStatus() == 'In Progress' ? 'selected' : ''; ?>>In Progress</option>
            <option value="Completed" <?php echo $task->getStatus() == 'Completed' ? 'selected' : ''; ?>>Completed</option>
        </select><br><br>

        <label for="user_id">User ID:</label>
        <input type="number" id="user_id" name="user_id" value="<?php echo htmlspecialchars($task->getUserId()); ?>" required><br><br>

        <button type="submit">Guardar</button>
    </form>
</body>
</html>