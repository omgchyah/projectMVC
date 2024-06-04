<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task Page</title>
    <link href="/PHP/ProjectMVC/web/stylesheets/styles.css" rel="stylesheet">
</head>
<body>
    <h1>Welcome to the Task Page</h1>
    <p>This is where you can manage your tasks.</p>

    <!-- Form to submit and navigate to create page -->
    <form action="<?php echo WEB_ROOT; ?>/application/execute" method="post">
        <input type="hidden" name="action" value="create">
        <button type="submit">Create New Task</button>
    </form>
</body>
</html>
