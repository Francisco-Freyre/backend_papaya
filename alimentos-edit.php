<?php
require_once 'config/parameters.php';
require_once 'layaut/nav.php';
require_once 'layaut/sidebar.php';
$_alimentos = new alimentos();
$_categorias = new categorias_alimentos();
$categorias = $_categorias->readOne($_GET['id']);
$alimentos = $_alimentos->readCategoria($_GET['id']);
$alimentos2 = $_alimentos->readCategoria($_GET['id']);
$categoria = $categorias->fetch_object();
$alimento = $_alimentos->readAlimento($_GET['id']);
$aliment = $alimento->fetch_object();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edita un alimento</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <form method="POST" action="controller/alimentosController.php">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <i class="fas fa-file-signature"></i>
                                <label for="nombre"> Nombre</label>
                                <input type="text" list="nombres" class="form-control" value="<?=$aliment->nombre?>" name="nombre" placeholder="Alimento" autocomplete="off" required>
                                <datalist id="nombres">
                                  <?php while($alim = $alimentos2->fetch_object()): ?>
                                    <option value="<?=$alim->nombre?>"></option>
                                  <?php endwhile; ?>
                                </datalist>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <i class="fas fa-sort-numeric-up-alt"></i>
                                <label for="unidad"> Unidad</label>
                                <select class="custom-select" name="unidad" required>
                                    <option value="Sin opcion">Selecciona una unidad</option>
                                    <option value="gr" <?php echo ($aliment->unidad == "gr") ? "selected" : ""; ?>>Gr</option>
                                    <option value="taza" <?php echo ($aliment->unidad == "taza") ? "selected" : ""; ?>>Taza</option>
                                    <option value="cdita" <?php echo ($aliment->unidad == "cdita") ? "selected" : ""; ?>>Cdita</option>
                                    <option value="cda" <?php echo ($aliment->unidad == "cda") ? "selected" : ""; ?>>Cda</option>
                                    <option value="ml" <?php echo ($aliment->unidad == "ml") ? "selected" : ""; ?>>Ml</option>
                                    <option value="vaso" <?php echo ($aliment->unidad == "vaso") ? "selected" : ""; ?>>Vaso</option>
                                    <option value="disparo" <?php echo ($aliment->unidad == "disparo") ? "selected" : ""; ?>>Disparos</option>
                                    <option value="pieza" <?php echo ($aliment->unidad == "pieza") ? "selected" : ""; ?>>Pieza</option>
                                    <option value="lata" <?php echo ($aliment->unidad == "lata") ? "selected" : ""; ?>>Lata</option>
                                    <option value="hoja" <?php echo ($aliment->unidad == "hoja") ? "selected" : ""; ?>>Hojas</option>
                                    <option value="rebanada" <?php echo ($aliment->unidad == "rebanada") ? "selected" : ""; ?>>Rebanadas</option>
                                    <option value="tarro" <?php echo ($aliment->unidad == "tarro") ? "selected" : ""; ?>>Tarro</option>
                                    <option value="copa" <?php echo ($aliment->unidad == "copa") ? "selected" : ""; ?>>Copa</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <i class="fas fa-sort-numeric-up-alt"></i>
                                <label for="cantidad"> Cantidad</label>
                                <input type="number" class="form-control" name="cantidad" value="<?=$aliment->cantidad?>" step="0.01" placeholder="Cantidad" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group d-none">
                                <label for="id">id</label>
                                <input type="number" class="form-control" name="id" value="<?=$aliment->id?>" autocomplete="off">
                                <label for="id_categoria">id_categoria</label>
                                <input type="number" class="form-control" name="id_categoria" value="<?=$aliment->categoria_id?>" autocomplete="off">
                                <label for="accion">accion</label>
                                <input type="text" class="form-control" name="accion" value="editar" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <button type="submit" class="btn btn-primary">Editar</button>
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