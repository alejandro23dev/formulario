<?php
echo view('header/index')
?>

<body>

    <?php echo view('buttons/button_logout') ?>

    <div class="container mt-5 table table-striped table-hover table-bordered table-rounded shadow">
        <table id="datatable" class="table table-striped table-hover table-bordered table-rounded">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario) : ?>
                    <tr>
                        <td><?php echo $usuario['id']; ?></td>
                        <td><?php echo $usuario['nombre']; ?></td>
                        <td><?php echo $usuario['apellidos']; ?></td>
                        <td><?php echo $usuario['email']; ?></td>
                        <td class="text-center"><?php echo view('buttons/button_edit') ?></td>
                        <td class="text-center"><?php echo view('buttons/button_delete') ?> </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script>
        var dataTable = $('#dataTable').DataTable({

            destroy: true,
            processing: true,
            serverSide: true,
            responsive: true,
            bAutoWidth: true,
            pageLength: 10,
            lengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 100]
            ],
            order: [
                [0, 'asc']
            ],
            columns: [
            {data: 'nombre'},
            {data: 'apellidos'},
            {data: 'email'},
            {data: 'btnEdit', class: 'text-center', orderable: false, searchable: false},
            {data: 'btnDelete', class: 'text-center', orderable: false, searchable: false}
        ],
        });

        $('#btnLogout').on('click', function() {
            window.location = "<?php echo base_url('Home/index'); ?>";
        });

        $(document).ready(function() {
            // Inicializar el DataTable
            $('#datatable').DataTable();

            // Obtener los datos del servidor y agregarlos al DataTable
            $.ajax({
                url: 'listView', // Reemplazar con la URL que devuelve los datos
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Iterar sobre los datos y agregar las filas al DataTable
                    $.each(data, function(index, value) {
                        $('#datatable').DataTable().row.add([
                            value.id,
                            value.nombre,
                            value.apellidos,
                            value.email
                        ]).draw(false);
                    });
                },
                error: function() {
                    alert('Error al obtener los datos');
                }
            });
        });

    </script>

</body>

</html>