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

        <?php if (isset($viewData['tasks']) && !empty($viewData['tasks'])): ?>
        <table>
            <tr>
                <th>Task Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>Date Created</th>
                <th>Date Updated</th>
                <th>User ID</th>
            </tr>
            <?php foreach ($viewData['tasks'] as $task): ?>
                <tr>
                    <td><?php echo htmlspecialchars($task->getName()); ?></td>
                    <td><?php echo htmlspecialchars($task->getDescription()); ?></td>
                    <td><?php echo htmlspecialchars($task->getStatus()); ?></td>
                    <td><?php echo htmlspecialchars($task->getDateCreated()); ?></td>
                    <td><?php echo htmlspecialchars($task->getDateUpdated()); ?></td>
                    <td><?php echo htmlspecialchars($task->getUserId()); ?></td>
                    <form action="<?php echo WEB_ROOT; ?>/task/update" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $task->getId(); ?>">
                            <button type="submit">Update</button>
                    </form>
                    <form action="<?php echo WEB_ROOT; ?>/task/delete" method="post" >
                            <input type="hidden" name="id" value="<?php echo $task->getId(); ?>">
                            <button type="submit">Delete</button>
                    </form>

                </tr>
            <?php endforeach; ?>
        </table>
        <?php else: ?>
        <p>No tasks found.</p>
        <?php endif; ?>

            </table>
            <br>


    <form action="<?php echo WEB_ROOT; ?>/task/execute" method="post">
        <input type="hidden" name="action" value="create">
        <button type="submit">Create New Task</button>
    </form>
</body>
</html>
