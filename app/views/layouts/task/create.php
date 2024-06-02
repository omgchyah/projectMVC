<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crear nueva tarea</title>
    <link href="/PHP/ProjectMVC/web/stylesheets/styles.css" rel="stylesheet">
</head>
<body>
    <form action="/task/store" method="post" enctype="multipart/form-data">
        <fieldset><h1>Crear nueva tarea</h1>
        <div>
            <label for="task_name">Nombre:</label>
            <input type="task_name" id="task_name" name="task_name" placeholder="Dale un nombre a tu tarea..." required>
        </div>
        <div>
            <label for="task_descrip">Descripción:</label>
            <input type="task_descrip" id="task_descrip" name="task_descrip" placeholder="Describe tu tarea..." required>
        </div>
        <div>
            <button type="submit">Guardar tarea</button>
        </div>
        </fieldset>
    </form>
</body>
</html>