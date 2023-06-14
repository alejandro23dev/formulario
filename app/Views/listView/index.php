<?php
echo view('header/index')
?>

<body>

<div class="container">
    <button class="btn btn-info" id="inicioDeSesion">Inicio de Sesión</button>

</div>

    <div class="container mt-5">
        <table id="datatable">
            <thead>
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
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
    <script>

        $('#inicioDeSesion').on('click', function(){
            window.location = "<?php echo base_url('Home/index'); ?>";
        });

        $(document).ready(function() {
            // Inicializar el DataTable
            $('#datatable').DataTable();

            // Obtener los datos del servidor y agregarlos al DataTable
            $.ajax({
                url: 'listView', // Reemplazar con la URL que devuelve los datos
                type: 'get',
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