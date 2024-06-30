<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Include tablesorter plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/jquery.tablesorter.min.js"></script>
    
    <!-- Include tablesorter CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/css/theme.default.min.css">

    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <script>
        $(document).ready(function() {
            $("#sortable-table").tablesorter();
        });
    </script>
</head>

<body class="flex flex-col min-h-screen">
    <header class="fixed top-0 left-0 right-0 z-10 bg-gradient-to-r from-green-500 via-lightgreen-500 to-white">
        <div class="flex justify-end p-4 font-serif text-xl italic text-sky-950">
            <span>Quehaceres.com</span>
        </div>
        <div class="flex items-center justify-between p-4">
            <div class="relative">
                <button id="dropdownButton" class="p-3 text-white bg-purple-600 rounded-full text-1xl">
                    <i class="fas fa-bars" title="Menu"></i>
                </button>
                <div id="dropdownMenu" class="absolute left-0 hidden w-48 mt-2 bg-white rounded-md shadow-lg">
                    <form action="<?php echo WEB_ROOT; ?>/" method="post">
                        <button type="submit" class="block w-full px-4 py-2 text-left text-gray-800 hover:bg-gray-100">Inicio</button>
                    </form>
                    <form action="<?php echo WEB_ROOT; ?>/task/execute" method="post">
                        <button type="submit" class="block w-full px-4 py-2 text-left text-gray-800 hover:bg-gray-100">Crear nueva tarea</button>
                    </form>
                    <form action="<?php echo WEB_ROOT; ?>/task/list" method="post">
                        <button type="submit" class="block w-full px-4 py-2 text-left text-gray-800 hover:bg-gray-100">Ver tareas</button>
                    </form>
                </div>
            </div>
            <div class="flex space-x-4">
                <form action="<?php echo WEB_ROOT; ?>/" method="post" class="inline">
                    <button type="submit" class="text-2xl text-purple-600"><i class="fas fa-home" title="Home"></i></button>
                </form>
                <form action="<?php echo WEB_ROOT; ?>/task/execute" method="post" class="inline">
                    <button type="submit" class="text-2xl text-purple-600"><i class="fas fa-plus-circle" title="Crear nueva tarea"></i></button>
                </form>
                <form action="<?php echo WEB_ROOT; ?>/task/list" method="post" class="inline">
                    <button type="submit" class="text-2xl text-purple-600"><i class="fas fa-tasks" title="Ver tareas"></i></button>
                </form>
            </div>
        </div>
    </header>

    <main class="flex-grow pt-32 pb-24">
        <?php echo $this->content(); ?>
    </main>
    
    <footer class="fixed bottom-0 left-0 right-0 flex items-center justify-between h-24 px-10 bg-gradient-to-r from-white via-lightgreen-500 to-green-500">
        <div class="flex-1 text-center">
            <p class="text-sm italic text-purple-600">
                By Gabriel & Rossana
            </p>
        </div>
    </footer>

    <script>
        document.getElementById('dropdownButton').addEventListener('click', function() {
            var dropdownMenu = document.getElementById('dropdownMenu');
            dropdownMenu.classList.toggle('hidden');
        });

        // Close the dropdown if clicked outside
        window.addEventListener('click', function(e) {
            if (!document.getElementById('dropdownButton').contains(e.target)) {
                document.getElementById('dropdownMenu').classList.add('hidden');
            }
        });
    </script>
</body>
</html>
