<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Numero Tarea
                </th>
                <th scope="col" class="px-6 py-3">
                    Nombre Tarea
                </th>
                <th scope="col" class="px-6 py-3">
                    Despcripcion
                </th>
                <th scope="col" class="px-6 py-3">
                    Estado
                </th>
                <th scope="col" class="px-6 py-3">
                    Fecha inicio
                </th>
                <th scope="col" class="px-6 py-3">
                    Fecha Fin
                </th>
                <th scope="col" class="px-6 py-3">
                    Usuario
                </th>
                <th scope="col" class="px-6 py-3">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($this->model->fetchAll() as $result):?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td scope="col" class="px-6 py-3">
                $result['Id']
                </td>
                <td scope="col" class="px-6 py-3">
                $result['Name']
                </td>
                <td scope="col" class="px-6 py-3">
                $result['Despcription']
                </td>
                <td scope="col" class="px-6 py-3">
                $result['Status']
                </td>
                <td scope="col" class="px-6 py-3">
                $result['DateCreated']
                </td>
                <td scope="col" class="px-6 py-3">
                $result['DateUpdated']
                </td>
                <td scope="col" class="px-6 py-3">
                Editar/Eliminar
                </td>
            </tr>
            <?php endforeach;?>         
        </tbody>
    </table>
</div>