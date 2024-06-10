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
        <table>
            <tr>
                <th>Task Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>Date Created</th>
                <th>Date Updated</th>
                <th>User ID</th>
            </tr>

            <?php 
            
            if(isset($_SESSION['tasks']))
            {
                $tasks=$_SESSION['tasks'];
            }
            foreach ($tasks as $task): ?>
            <tr>
            <td><?php echo $task['task_name']; ?></td>
            <td><?php echo $task['description']; ?></td>
            <td><?php echo $task["status"] ?></td>
            <td><?php echo $task['dateCreated']; ?></td>
            <td><?php echo $task['dateUpdated']; ?></td>
            <td><?php echo $task['userId']; ?></td>
            <td>
                <form action="<?php echo WEB_ROOT; ?>/task/delete" method="post" style="display:inline;">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($task['id']); ?>">
                    <input type="submit" value="Delete" onclick="return confirm('¿Quieres borrar esta tarea?');">
                </form>
            </td>
            </tr>

            <?php endforeach; ?>
        </table>

            </table>
            <br>


    <form action="<?php echo WEB_ROOT; ?>/task/execute" method="post">
        <input type="hidden" name="action" value="create">
        <button type="submit">Create New Task</button>
    </form>
</body>
</html>
