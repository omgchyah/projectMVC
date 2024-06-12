<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task List</title>
    <script>
        $(document).ready(function() {
            $("#sortable-table").tablesorter();
        });
    </script>
</head>
<body class="bg-gray-200">

<div class="max-w-4xl p-6 mx-auto mt-10 bg-white rounded-lg shadow-lg bg-opacity-90">
    <h1 class="mb-6 text-2xl font-bold text-center">Lista de Tareas</h1>

            <!-- Display the session message if it exists -->
            <?php if (isset($_SESSION['message'])): ?>
        <div class="p-4 mb-4 text-blue-700 bg-blue-100 rounded">
            <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']); // Clear the message after displaying it
            ?>
        </div>
    <?php endif; ?>

    <table id="sortable-table" class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="px-4 py-2 border">ID de tarea</th>
                <th class="px-4 py-2 border">Nombre</th>
                <th class="px-4 py-2 border">Descripción</th>
                <th class="px-4 py-2 border">Estado</th>
                <th class="px-4 py-2 border">Fecha de creación</th>
                <th class="px-4 py-2 border">Fecha de actualización</th>
                <th class="px-4 py-2 border">ID de usuario</th>
                <th class="px-4 py-2 border">Opciones</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        if(isset($_SESSION['tasksFound'])) {
            $tasks = $_SESSION['tasksFound'];
        }
        foreach ($tasks as $task): ?>
        <tr>
            <td class="px-4 py-2 border"><?php echo $task['id']; ?></td>
            <td class="px-4 py-2 border"><?php echo $task['task_name']; ?></td>
            <td class="px-4 py-2 border"><?php echo $task['description']; ?></td>
            <td class="px-4 py-2 border"><?php echo $task["status"] ?></td>
            <td class="px-4 py-2 border"><?php echo $task['dateCreated']; ?></td>
            <td class="px-4 py-2 border"><?php echo $task['dateFinished']; ?></td>
            <td class="px-4 py-2 border"><?php echo $task['userId']; ?></td>
            <td class="px-4 py-2 border">
            <form action="<?php echo WEB_ROOT; ?>/task/update" method="post" class="inline">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($task['id']); ?>">
                    <button type="submit" class="text-blue-500 underline">Update</button>
                </form>
                <form action="<?php echo WEB_ROOT; ?>/task/delete" method="post" class="inline">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($task['id']); ?>">
                    <input type="submit" value="Delete" onclick="return confirm('¿Quieres borrar esta tarea?');" class="text-red-500 underline">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
