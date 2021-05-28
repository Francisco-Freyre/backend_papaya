<?php
if(!filter_var($_GET['id'], FILTER_VALIDATE_INT)){
    die('Error');
}
require_once 'config/parameters.php';
require_once 'layaut/nav.php';
require_once 'layaut/sidebar.php';
require_once 'model/clientes.php';
require_once 'config/db.php';
$clientes = new clientes();
$cliente = $clientes->readOne($_GET['id']);
$client = $cliente->fetch_object();
$sexos = $clientes->readSexo();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar cliente</h1>
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
                <h3 class="card-title">Editar un cliente</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="controller/clientesController.php">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="<?=$client->nombre?>" placeholder="Nombre" required>
                  </div>
                  <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" name="apellidos" value="<?=$client->apellido?>" placeholder="Apellidos" required>
                  </div>
                  <div class="form-group">
                    <label for="edad">Edad</label>
                    <input type="text" class="form-control" name="edad" value="<?=$client->edad?>" placeholder="Edad" required>
                  </div>
                  <!-- select -->
                  <div class="form-group">
                    <label for="sexo">Sexo</label>
                    <select class="custom-select" name="sexo" required>
                        <option value="Sin opcion">Selecciona una opcion</option>
                        <?php while($sexo = $sexos->fetch_object()): ?>
                        <option value="<?=$sexo->sexo?>" <?php if($sexo->sexo == $client->sexo): ?> selected <?php endif; ?>><?=$sexo->sexo?></option>
                        <?php endwhile; ?>
                    </select>
                    </div>
                  <div class="form-group">
                    <label for="emai">Correo</label>
                    <input type="email" class="form-control" name="email" value="<?=$client->email?>" placeholder="Correo" required>
                  </div>
                  <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" name="password" placeholder="Contraseña">
                    <p>NOTA: Si no quiere cambiar la contraseña deje el campo vacio</p>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="text" value="editar" name="accion" style="display: none;">
                  <input type="text" value="<?=$client->id?>" name="id" style="display: none;">
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