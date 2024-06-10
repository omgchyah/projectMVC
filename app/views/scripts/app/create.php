<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Task</title>

    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body class="bg-gray-200">

<div class="max-w-4xl p-6 mx-auto mt-10 bg-white rounded-lg shadow-lg bg-opacity-90">
    <h1 class="mb-6 text-2xl font-bold text-center">Create a New Task</h1>

    <form action="<?php echo WEB_ROOT; ?>/task/store" method="post" class="space-y-4">
        <input type="hidden" name="action" value="store">
        
        <div>
            <label for="task_name" class="block mb-2 text-lg font-semibold">Task Name:</label>
            <input type="text" id="task_name" name="task_name" required class="w-full p-2 border rounded">
        </div>
        
        <div>
            <label for="description" class="block mb-2 text-lg font-semibold">Description:</label>
            <textarea id="description" name="description" required class="w-full p-2 border rounded"></textarea>
        </div>
        
        <div>
            <label for="user_id" class="block mb-2 text-lg font-semibold">User ID:</label>
            <input type="number" id="user_id" name="userId" required min="1" class="w-full p-2 border rounded">
        </div>

        <div class="text-center">
            <button type="submit" class="px-4 py-2 text-white bg-purple-500 rounded">Create Task</button>
        </div>
    </form>
</div>

</body>
</html>
