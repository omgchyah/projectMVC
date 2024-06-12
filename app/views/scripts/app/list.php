<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
    
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

    <div class="p-4 mb-6 bg-gray-100 rounded-lg">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
            <div>
                <label for="user_id" class="block mb-1 text-sm font-semibold">ID de usuario:</label>
                <form action="<?php echo WEB_ROOT; ?>/task/user" method="post" class="flex items-center">
                    <input type="number" id="userId" name="userId" placeholder="Escribe ID del usuario..." required min="1" class="w-full p-1 mr-2 border rounded">
                    <button type="submit" class="px-2 py-1 text-xs text-white bg-purple-500 rounded">Buscar</button>
                </form>
            </div>

            <div>
                <label for="id" class="block mb-1 text-sm font-semibold">ID de la tarea:</label>
                <form action="<?php echo WEB_ROOT; ?>/task/showone" method="post" class="flex items-center">
                    <input type="number" id="id" name="id" placeholder="Escribe ID de la tarea..." required min="1" class="w-full p-1 mr-2 border rounded">
                    <button type="submit" class="px-2 py-1 text-xs text-white bg-purple-500 rounded">Buscar</button>
                </form>
            </div>

            <div>
                <label for="string" class="block mb-1 text-sm font-semibold">Palabra clave:</label>
                <form action="<?php echo WEB_ROOT; ?>/task/find" method="post" class="flex items-center">
                    <input type="text" id="string" name="string" placeholder="Escribe una palabra clave..." required class="w-full p-1 mr-2 border rounded">
                    <button type="submit" class="px-2 py-1 text-xs text-white bg-purple-500 rounded">Buscar</button>
                </form>
            </div>
        </div>
    </div>

    <table id="sortable-table" class="min-w-full bg-white">
        <thead>
        <tr>
                <th class="px-4 py-2 border">ID de tarea</th>
                <th class="px-4 py-2 border">Nombre</th>
                <th class="px-4 py-2 border">Descripción</th>
                <th class="px-4 py-2 border">Estado</th>
                <th class="px-4 py-2 border">Creada</th>
                <th class="px-4 py-2 border">Actualizada</th>
                <th class="px-4 py-2 border">ID de usuario</th>
                <th class="px-4 py-2 border">Opciones</th>
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