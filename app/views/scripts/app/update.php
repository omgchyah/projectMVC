<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Task</title>
</head>
<body class="bg-gray-200">

<div class="max-w-4xl p-6 mx-auto mt-10 bg-white rounded-lg shadow-lg bg-opacity-90">
    <h1 class="mb-6 text-2xl font-bold text-center">Actualizar tarea</h1>

    <form action="<?php echo WEB_ROOT; ?>/task/store" method="post" class="space-y-4">
        <input type="hidden" name="action" value="store">
        
        <div>
            <label for="task_name" class="block mb-2 text-lg font-semibold">Nombre de la tarea:</label>
            <input type="text" id="task_name" name="task_name" required class="w-full p-2 border rounded">
        </div>
        
        <div>
            <label for="description" class="block mb-2 text-lg font-semibold">Descripción:</label>
            <textarea id="description" name="description" required class="w-full p-2 border rounded"></textarea>
        </div>

        <div>
            <label for="status" class="block mb-2 text-lg font-semibold">Estado:</label>
            <select id="status" name="status" required class="w-full p-2 border rounded">
                <option value="Activa">Activa</option>
                <option value="Suspendida" >Suspendida</option>
                <option value="Terminada" >Terminada</option>
            </select>
        </div>
        
        <div>
            <label for="user_id" class="block mb-2 text-lg font-semibold">ID de usuario:</label>
            <input type="number" id="user_id" name="userId" required min="1" class="w-full p-2 border rounded">
        </div>

        <div class="text-center">
            <button type="submit" class="px-4 py-2 text-white bg-purple-500 rounded">Guardar</button>
        </div>
    </form>
</div>

</body>
</html>