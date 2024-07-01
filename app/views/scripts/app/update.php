<x-main-layout>
    <div class="max-w-4xl p-6 mx-auto mt-10 bg-white rounded-lg shadow-lg bg-opacity-90">
        <h1 class="mb-6 text-2xl font-bold text-center">Actualizar tarea</h1>

        <p class="text-center text-red-500"><?php echo $this->message; ?></p>

        <form action="<?php echo WEB_ROOT; ?>/task/saveUpdate" method="post" class="space-y-4">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($_POST['id'] ?? ''); ?>">

            <div>
                <label for="task_name" class="block mb-2 text-lg font-semibold">Nombre de la tarea:</label>
                <input type="text" id="task_name" name="task_name" required class="w-full p-2 border rounded" value="<?php echo htmlspecialchars($_POST['task_name'] ?? ''); ?>">
            </div>

            <div>
                <label for="description" class="block mb-2 text-lg font-semibold">Descripción:</label>
                <textarea id="description" name="description" required class="w-full p-2 border rounded"><?php echo htmlspecialchars($_POST['description'] ?? ''); ?></textarea>
            </div>

            <div>
                <label for="status" class="block mb-2 text-lg font-semibold">Estado:</label>
                <select id="status" name="status" required class="w-full p-2 border rounded">
                    <option value="Activa" <?php if ($_POST['status'] == 'Activa') echo 'selected'; ?>>Activa</option>
                    <option value="Suspendida" <?php if ($_POST['status'] == 'Suspendida') echo 'selected'; ?>>Suspendida</option>
                    <option value="Terminada" <?php if ($_POST['status'] == 'Terminada') echo 'selected'; ?>>Terminada</option>
                </select>
            </div>

            <div>
                <label for="dateCreated" class="block mb-2 text-lg font-semibold">Fecha de creación:</label>
                <input id="dateCreated" name="dateCreated" type="date" required class="w-full p-2 border rounded"
                       value="<?php echo htmlspecialchars($_POST['dateCreated'] ?? ''); ?>">
            </div>

            <div>
                <label for="dateFinished" class="block mb-2 text-lg font-semibold">Fecha de finalización:</label>
                <input id="dateFinished" name="dateFinished" type="date" required class="w-full p-2 border rounded" value="<?php echo htmlspecialchars($_POST['dateFinished'] ?? ''); ?>">
            </div>

            <div>
                <label for="userId" class="block mb-2 text-lg font-semibold">ID de usuario:</label>
                <input type="number" id="userId" name="userId" required min="1" class="w-full p-2 border rounded" value="<?php echo htmlspecialchars($_POST['userId'] ?? ''); ?>">
            </div>

            <div class="text-center">
                <button type="submit" class="px-4 py-2 text-white bg-purple-500 rounded">Guardar</button>
            </div>
        </form>
    </div>
</x-main-layout>
