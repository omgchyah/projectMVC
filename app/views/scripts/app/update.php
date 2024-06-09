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
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($viewData['task']['id']); ?>">
        <label for="name">Task Name:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($viewData['task']['name']); ?>" required>
        <br>
        <label for="description">Description:</label>
        <textarea id="description" name="description" required><?php echo htmlspecialchars($viewData['task']['description']); ?></textarea>
        <br>
        <label for="status">Status:</label>
        <input type="text" id="status" name="status" value="<?php echo htmlspecialchars($viewData['task']['status']); ?>" required>
        <br>
        <button type="submit">Save</button>
    </form>
</body>
</html>