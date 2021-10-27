<?php
require_once 'config/parameters.php';
require_once 'layaut/nav.php';
require_once 'layaut/sidebar.php';
$_categorias = new categorias_alimentos();
$categorias = $_categorias->readAll();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lista de ingredientes</h1>
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
                <h3 class="card-title">Agrega los ingredientes del platillo</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="enviar">
                <div class="card-body">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <i class="fas fa-sort-numeric-up-alt"></i>
                              <label for="unidad"> Categoria de alimentos</label>
                              <select class="custom-select" name="categoria" id="categoria" required>
                                  <option value="Sin opcion">Selecciona una categoria</option>
                                  <?php while($categoria = $categorias->fetch_object()): ?>
                                    <option value="<?=$categoria->id?>"><?=$categoria->nombre?></option>
                                  <?php endwhile; ?>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <i class="fas fa-sort-numeric-up-alt"></i>
                              <label for="alimento_id"> Alimentos</label>
                              <select class="custom-select" name="alimento_id" id="alimento_id" required>
                                  <option value="Sin opcion">Selecciona un alimento</option>
                              </select>
                          </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-1">
                        <div class="form-group clearfix">
                          <label for="">Cambiar</label>
                          <br>
                          <div class="icheck-primary d-inline">
                            <input type="checkbox" name="cambiar" id="cambiar" value="1" checked>
                            <label for="cambiar">
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                              <label for="nombre">Unidad</label>
                              <input type="text" class="form-control" name="unidad" id="unidad" placeholder="Unidad" autocomplete="off" disabled>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                              <label for="nombre">Cantidad</label>
                              <input type="text" class="form-control" name="cantidad" id="cantidad" placeholder="Cantidad" autocomplete="off" disabled>
                          </div>
                      </div>
                      <div class="col-md-5">
                          <div class="form-group">
                              <label for="nombre">Equivalente</label>
                              <input type="text" class="form-control" name="equivalente" id="equivalente" placeholder="Equivalente" autocomplete="off" required>
                          </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-2">
                        <div class="form-group mt-4">
                          <input class="d-none" type="text" name="platillo_id" id="platillo_id" value="<?=$_GET['id']?>">
                          <input class="d-none" type="text" name="accion" id="accion" value="crear">
                          <button type="submit" class="btn btn-info">Agregar</button>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <table class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                  <th>Cambiar</th>
                                  <th>Nombre</th>
                                  <th>Cantidad</th>
                                  <th>Kcal</th>
                                  <th>Carbohidratos</th>
                                  <th>Proteinas</th>
                                  <th>Lipidos</th>
                                  <th>Acciones</th>
                              </tr>
                          </thead>
                          <tbody id="tabla">
                          </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <a href="platillos.php" class="btn btn-primary">Terminar</a>
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