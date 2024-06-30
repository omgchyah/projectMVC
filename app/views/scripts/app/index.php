<x-main-layout>
    <div class="max-w-4xl p-6 mx-auto mt-10 bg-white rounded-lg shadow-lg bg-opacity-90">
        <h1 class="mb-6 text-2xl font-bold text-center">¡Bienvenid@!</h1>
        <p class="mb-6 text-lg text-center">¡Tu Task Manager personalizado!</p>

        <!-- Form to submit and navigate to create page -->
        <form action="<?php echo WEB_ROOT; ?>/task/execute" method="post" class="text-center">
            <button type="submit" class="px-4 py-2 text-white bg-purple-500 rounded">Crea una tarea</button>
        </form>
    </div>
</x-main-layout>
