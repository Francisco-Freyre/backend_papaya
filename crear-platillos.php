<?php
require_once 'config/parameters.php';
require_once 'layaut/nav.php';
require_once 'layaut/sidebar.php';
require_once 'model/platillos.php';
require_once 'config/db.php';
$_platillos = new platillos();
$platillos = $_platillos->getPlatillos();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Nuevo platillo</h1>
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
                <h3 class="card-title">Crea un nuevo platillo</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="controller/platilloController.php" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <i class="fas fa-file-signature"></i>
                    <label for="nombre"> Nombre</label>
                    <input list="nombres" type="text" class="form-control" name="nombre" placeholder="Nombre" autocomplete="off" required>
                    <datalist id="nombres">
                      <?php while($platillo = $platillos->fetch_object()): ?>
                        <option value="<?=$platillo->nombre?>"></option>
                      <?php endwhile; ?>
                    </datalist>
                  </div>
                  <div class="form-group">
                    <i class="fas fa-list-ul"></i>
                    <label for="apellidos"> Procedimiento</label>
                    <textarea name="procedimiento" cols="30" rows="10" class="form-control" required></textarea>
                  </div>
                  <div class="form-group">
                    <i class="fas fa-history"></i>
                    <label for="elaboracion"> Tiempo de Elaboracion (Minutos)</label>
                    <input type="number" class="form-control" name="elaboracion" placeholder="elaboracion" required>
                  </div>
                  <div class="form-group"> <i class="far fa-images"></i> <label for=""> Imagen del platillo</label></div>
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile" name="img">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="text" value="crear-platillo" name="accion" style="display: none;">
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