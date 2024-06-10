<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task List</title>
    <link href="/PHP/ProjectMVC/web/stylesheets/styles.css" rel="stylesheet">
     <!-- Include jQuery -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include tablesorter plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/jquery.tablesorter.min.js"></script>
    <!-- Include tablesorter CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/css/theme.default.min.css">
    <script>
        $(document).ready(function() {
            $("#sortable-table").tablesorter();
        });
    </script>
</head>
<body>

    <h1>Lista de Tareas</h1>
    <table border="1">
        <table  id="sortable-table" class="tablesorter">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Status</th>
                    <th>Fecha de creación</th>
                    <th>Fecha de actualización</th>
                    <th>ID de usuario</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            if(isset($_SESSION['tasksFound']))
            {
                $tasks=$_SESSION['tasksFound'];
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


                <a href="edit_task.php?task_id=<?php echo $id; ?>">Update</a>
                <form action="<?php echo WEB_ROOT; ?>/task/update" method="post" style="display:inline;">
                    <input type="hidden" name="task_id" value="<?php echo $id; ?>">
                    <input type="submit" value="Delete" onclick="return confirm('¿Quieres borrar esta tarea');">
                </form>
            </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>