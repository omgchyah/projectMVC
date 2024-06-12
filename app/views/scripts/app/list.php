<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>

    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Include tablesorter CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/css/theme.default.min.css">
</head>
<body class="bg-gray-200">

<div class="max-w-4xl p-6 mx-auto mt-10 bg-white rounded-lg shadow-lg bg-opacity-90">
    <h1 class="mb-6 text-2xl font-bold text-center">Lista de Tareas</h1>

    <div class="p-4 mb-6 bg-gray-100 rounded-lg">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
            <div>
                <label for="user_id" class="block mb-1 text-sm font-semibold">ID de usuario:</label>
                <form action="<?php echo WEB_ROOT; ?>/task/user" method="post" class="flex items-center">
                    <input type="number" id="user_id" name="user_id" required min="1" class="w-full p-1 mr-2 border rounded">
                    <button type="submit" class="px-2 py-1 text-xs text-white bg-purple-500 rounded">Buscar</button>
                </form>
            </div>

            <div>
                <label for="id" class="block mb-1 text-sm font-semibold">ID de la tarea:</label>
                <form action="<?php echo WEB_ROOT; ?>/task/showone" method="post" class="flex items-center">
                    <input type="number" id="id" name="id" required min="1" class="w-full p-1 mr-2 border rounded">
                    <button type="submit" class="px-2 py-1 text-xs text-white bg-purple-500 rounded">Buscar</button>
                </form>
            </div>

            <div>
                <label for="string" class="block mb-1 text-sm font-semibold">Palabra clave:</label>
                <form action="<?php echo WEB_ROOT; ?>/task/find" method="post" class="flex items-center">
                    <input type="text" id="string" name="string" required class="w-full p-1 mr-2 border rounded">
                    <button type="submit" class="px-2 py-1 text-xs text-white bg-purple-500 rounded">Buscar</button>
                </form>
            </div>
        </div>
    </div>

    <table id="sortable-table" class="min-w-full bg-white">
        <thead>
        <tr>
                <th class="px-4 py-2 border">Task ID</th>
                <th class="px-4 py-2 border">Task Name</th>
                <th class="px-4 py-2 border">Description</th>
                <th class="px-4 py-2 border">Status</th>
                <th class="px-4 py-2 border">Date Created</th>
                <th class="px-4 py-2 border">Date Updated</th>
                <th class="px-4 py-2 border">User ID</th>
                <th class="px-4 py-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if(isset($_SESSION['tasks']))
            {
                $tasks=$_SESSION['tasks'];
            }
            foreach ($tasks as $task): ?>
            <tr>
            <td><?php echo $task['id']; ?></td>
            <td><?php echo $task['task_name']; ?></td>
            <td><?php echo $task['description']; ?></td>
            <td><?php echo $task["status"] ?></td>
            <td><?php echo $task['dateCreated']; ?></td>
            <td><?php echo $task['dateUpdated']; ?></td>
            <td><?php echo $task['userId']; ?></td>
            <td>


                <form action="<?php echo WEB_ROOT; ?>/task/update" method="post" class="inline">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($task['id']); ?>">
                    <button type="submit" class="text-blue-500 underline">Update</button>
                </form>
                <form action="<?php echo WEB_ROOT; ?>/task/delete" method="post" class="inline">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($task['id']); ?>">
                    <input type="submit" value="Delete" onclick="return confirm('Â¿Quieres borrar esta tarea?');" class="text-red-500 underline">
                </form>
            </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>