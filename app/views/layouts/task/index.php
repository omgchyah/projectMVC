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

    <?php if (isset($userId)): ?>
        <p>User ID: <?php echo htmlspecialchars($userId, ENT_QUOTES, 'UTF-8'); ?></p>
    <?php else: ?>
        <p>No user ID provided.</p>
    <?php endif; ?>
</body>
</html>
