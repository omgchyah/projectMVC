<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista de tareas</title>
    <link href="/PHP/ProjectMVC/web/stylesheets/styles.css" rel="stylesheet">
</head>
<body>
    <h1>Lista de Tareas</h1>
    <a href="/task/create" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700">Crear Nueva Tarea</a>
    <div class="mt-6">
        <ul class="space-y-4">
            <?php foreach ($tasks as $task): ?>
                <li class="p-4 bg-white rounded shadow">
                    <h2 class="text-xl font-semibold"><?php echo htmlspecialchars($task['name']); ?></h2>
                    <p class="text-gray-600"><?php echo htmlspecialchars($task['description']); ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>