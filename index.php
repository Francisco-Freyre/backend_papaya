<?php
require_once 'config/parameters.php';
require_once 'layaut/nav.php';
require_once 'layaut/sidebar.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Nuevo cliente</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Crea un nuevo cliente</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="controller/clientesController.php">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
                  </div>
                  <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" name="apellidos" placeholder="Apellidos" required>
                  </div>
                  <div class="form-group">
                    <label for="edad">Edad</label>
                    <input type="text" class="form-control" name="edad" placeholder="Edad" required>
                  </div>
                  <!-- select -->
                  <div class="form-group">
                    <label for="sexo">Sexo</label>
                    <select class="custom-select" name="sexo" required>
                        <option value="Sin opcion">Selecciona una opcion</option>
                        <option value="Hombre">Hombre</option>
                        <option value="Mujer">Mujer</option>
                    </select>
                    </div>
                  <div class="form-group">
                    <label for="emai">Correo</label>
                    <input type="email" class="form-control" name="email" placeholder="Correo" required>
                  </div>
                  <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="text" value="crear" name="accion" style="display: none;">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php
require_once 'layaut/footer.php';
?>