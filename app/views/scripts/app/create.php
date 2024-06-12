<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Task</title>
</head>
<body class="bg-gray-200">

<div class="max-w-4xl p-6 mx-auto mt-10 bg-white rounded-lg shadow-lg bg-opacity-90">
    <h1 class="mb-6 text-2xl font-bold text-center">Crear nueva tarea</h1>
    <p class="text-center">Rellena los campos de abajo</p>

    <form action="<?php echo WEB_ROOT; ?>/task/store" method="post" class="space-y-4">
        <input type="hidden" name="action" value="store">
        
        <div>
            <label for="task_name" class="block mb-2 text-lg font-semibold">Nombre:</label>
            <input type="text" id="task_name" name="task_name" required class="w-full p-2 border rounded">
        </div>
        
        <div>
            <label for="description" class="block mb-2 text-lg font-semibold">Descripción:</label>
            <textarea id="description" name="description" required class="w-full p-2 border rounded"></textarea>
        </div>

        <div>
            <label for="dateFinished" class="block mb-2 text-lg font-semibold">Fecha de finalización:</label>
            <input id="dateFinished" name="dateFinished" type="date" required class="w-full p-2 border rounded">
        </div>
        
        <div>
            <label for="user_id" class="block mb-2 text-lg font-semibold">ID de usuario:</label>
            <input type="number" id="userId" name="userId" required min="1" class="w-full p-2 border rounded">
        </div>

        <div class="text-center">
            <button type="submit" class="px-4 py-2 text-white bg-purple-500 rounded">Crear tarea</button>
        </div>
    </form>
</div>

</body>
</html>
