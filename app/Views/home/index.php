<?php
echo view('header/index')
?>
<body>
  <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="row justify-content-center">
      <div class="col-md-10 formulario">

        <img src="<?= base_url('images/user.jpg') ?>" class="w-25" style="border-radius: 50%;">
        <h1 class="text-center mb-4">Registro</h1>

        <form id="formulario" method="POST" action="" class="needs-validation" novalidate>
          <!-- Campo de Nombre -->
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nombre " name="nombre" placeholder="Nombre" minlength="3" maxlength="45" >
            <label for="nombre"></label>
            <div class="invalid-feedback">
              Por favor, introduce tu nombre.
            </div>
          </div>

          <!-- Campo de Apellidos -->
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" minlength="3" maxlength="45">
            <label for="apellidos"></label>
            <div class="invalid-feedback">
              Por favor, introduce tus apellidos.
            </div>
          </div>

          <!-- Campo de Email -->
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" minlength="3" maxlength="45" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
            <label for="email"></label>
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

  <!-- Agrega el modal de bienvenida -->
  <div class="modal fade" id="modal-bienvenida" tabindex="1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">¡Bienvenido!</h4>
          </div>
          <div class="modal-body">
            <p>Hola <span id="nombre-usuario"></span>, gracias por registrarte.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

  <style>
    body {
        background-image: url('https://img.freepik.com/foto-gratis/fondo-futurista-abstracto-diseno-3d_1361-3532.jpg');
        background-size: cover;
        background-repeat: no-repeat;
    }

    .formulario {
        background-color: white;
        padding: 25px;
        border-radius: 5px;
        text-align: center;
    }
  </style>
  
  <script>
  $(document).ready(function() {

    $('#enviar').click(function() {
        $.ajax({
            type: "post",
            url: "<?php echo base_url('Home/createUser')?>",
            data: [
                'nombre', nombre,
                'apellidos', apellidos,
                'email', email,
            ],
            dataType: "json",
        }).done(function() {
            alert('OK')
        }).fail(function(){
            alert('Error')  
        });
    }); 
});  

  </script>
</body>
</html>