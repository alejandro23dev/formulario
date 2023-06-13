<?php
echo view('header/index')
?>
<body>

    <button class="btn btn-primary" id="btnInicioDeSesion">Inicio De Sesión</button>

    <button class="btn btn-warning" id="btnEdit">Editar</button>
    
</body>

<script>

$(document).ready(function() {
    // Captura el evento onclick del botón con id "btnInicioDeSesión"
    $('#btnInicioDeSesion').on('click', function() {
      // Redirige al usuario a la función index del controlador Home
      window.location.href = '<?= base_url('Home') ?>';
    });
  });

  $(document).ready(function() {
    // Captura el evento onclick del botón con id "btnInicioDeSesión"
    $('#btnEdit').on('click', function() {
      // Redirige al usuario a la función index del controlador Home
      window.location.href = '<?= base_url('Home/editar') ?>';
    });
  });

</script>

</html>