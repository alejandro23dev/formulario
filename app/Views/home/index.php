<?php
echo view('header/index')
?>
<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">

        <h1 class="text-center mb-4">Formulario</h1>

        <form id="formulario" method="POST" action="" class="needs-validation" novalidate>
          <!-- Campo de Nombre -->
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" minlength="3" maxlength="45" required >
            <div class="invalid-feedback">
              Por favor, introduce tu nombre.
            </div>
          </div>

          <!-- Campo de Apellidos -->
          <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" minlength="3" maxlength="45" required>
            <div class="invalid-feedback">
              Por favor, introduce tus apellidos.
            </div>
          </div>

          <!-- Campo de Email -->
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" minlength="3" maxlength="45" required>
            <div class="invalid-feedback">
              Por favor, introduce una dirección de email válida.
            </div>
          </div>

          <!-- Botón de Enviar -->
          <div class="d-grid gap-2">
            <button type="button" class="btn btn-primary" id="enviar">Enviar</button>
          </div>
        </form>

      </div>
    </div>
  </div>

  
  <script>
  $(document).ready(function() {
    // Captura el evento onclick del botón con id "enviar"
    $('#enviar').on('click', function() {
      // Obtiene los valores de los campos del formulario
      var nombre = $('#nombre').val();
      var apellidos = $('#apellidos').val();
      var email = $('#email').val();

      // Envía los datos al controlador Home utilizando AJAX
      $.ajax({
        type: 'POST',
        url: '<?= base_url('Home/createUser') ?>', 
        data: {
          nombre: nombre,
          apellidos: apellidos,
          email: email
        },
        success: function(response) {
          // Si la petición se ejecuta correctamente, redirige al usuario a otra página
          window.location.href = '<?= base_url('Home/listUsuarios') ?>';
        },
        error: function(xhr) {
          // Si ocurre un error, muestra un mensaje de error al usuario
          alert('Se produjo un error al enviar los datos.');
        }
      });
    });
  });

    // Validar el formulario con Bootstrap 5
    var formulario = document.getElementById('formulario');
    formulario.addEventListener('submit', function(event) {
      if (formulario.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
      }
      formulario.classList.add('was-validated');
    });

    
  </script>
</body>
</html>