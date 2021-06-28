<?php
require_once 'config/parameters.php';
require_once 'layaut/nav.php';
require_once 'layaut/sidebar.php';
require_once 'model/platillos.php';
require_once 'config/db.php';
$_platillos = new platillos();
$platillos = $_platillos->getPlatillo($_GET['id']);
if($platillos && $platillos->num_rows == 1){
    $platillo = $platillos->fetch_object();
    $aportes = $_platillos->getAporte($platillo->id);
    $aporte = $aportes->fetch_object();
    $ingredientes = $_platillos->getIngredientes($platillo->id);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar platillo</h1>
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
                <h3 class="card-title">Edita el platillo</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="controller/platilloController.php" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?=$platillo->nombre?>" required>
                  </div>
                  <div class="form-group">
                    <label for="procedimiento">Procedimiento</label>
                    <textarea name="procedimiento" cols="30" rows="10" class="form-control" required><?=$platillo->procedimiento?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="elaboracion">Tiempo de Elaboracion</label>
                    <input type="text" class="form-control" name="elaboracion" value="<?=$platillo->tiempo_elaboracion?>" placeholder="elaboracion" required>
                  </div>
                  <div class="form-group">
                    <label for="energia">Energia</label>
                    <input type="text" class="form-control" name="energia" value="<?=$platillo->energia?>" placeholder="Energia" required>
                  </div>
                  <div class="form-group"><label for="">Imagen del platillo</label></div>
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile" name="img">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                  <div class="form-group">
                      <br>
                      <br>
                    <label>APORTE NUTRICIONAL</label>
                      <br>
                      <br>
                  </div>
                  <div class="form-group">
                    <label for="energianutri">Energia</label>
                    <input type="text" class="form-control" name="energianutri" value="<?=$aporte->energia?>" placeholder="Energia" required>
                  </div>
                  <div class="form-group">
                    <label for="proteina">Proteina</label>
                    <input type="text" class="form-control" name="proteina" value="<?=$aporte->proteinas?>" placeholder="Proteina" required>
                  </div>
                  <div class="form-group">
                    <label for="carbohidratos">Carbohidratos</label>
                    <input type="text" class="form-control" name="carbohidratos" value="<?=$aporte->carbohidratos?>" placeholder="Carbohidratos" required>
                  </div>
                  <div class="form-group">
                    <label for="grasas">Grasas</label>
                    <input type="text" class="form-control" name="grasas" value="<?=$aporte->grasas?>" placeholder="Grasas" required>
                  </div>
                  <div class="form-group">
                    <label for="sodio">Sodio</label>
                    <input type="text" class="form-control" name="sodio" value="<?=$aporte->sodio?>" placeholder="Sodio" required>
                  </div>
                  <div class="form-group">
                    <label for="potasio">Potasio</label>
                    <input type="text" class="form-control" name="potasio" value="<?=$aporte->potasio?>" placeholder="Potasio" required>
                  </div>
                  <div class="form-group">
                    <label for="calcio">Calcio</label>
                    <input type="text" class="form-control" name="calcio" value="<?=$aporte->calcio?>" placeholder="Calcio" required>
                  </div>
                  <div class="form-group">
                    <label for="hierro">Hierro</label>
                    <input type="text" class="form-control" name="hierro" value="<?=$aporte->hierro?>" placeholder="Hierro" required>
                  </div>
                  <div class="form-group">
                    <label for="vitamina_a">Vitamina A</label>
                    <input type="text" class="form-control" name="vitamina_a" value="<?=$aporte->vitamina_a?>" placeholder="Vitamina A" required>
                  </div>
                  <div class="form-group">
                    <label for="vitamina_c">Vitamina C</label>
                    <input type="text" class="form-control" name="vitamina_c" value="<?=$aporte->vitamina_c?>" placeholder="Vitamina C" required>
                  </div>
                  <div class="form-group">
                    <label for="vitamina_d">Vitamina D</label>
                    <input type="text" class="form-control" name="vitamina_d" value="<?=$aporte->vitamina_d?>" placeholder="Vitamina D" required>
                  </div>
                  <div class="form-group">
                    <label for="vitamina_e">Vitamina E</label>
                    <input type="text" class="form-control" name="vitamina_e" value="<?=$aporte->vitamina_e?>" placeholder="Vitamina E" required>
                  </div>
                  <div class="form-group">
                    <label for="acido_folico">Acido Folico</label>
                    <input type="text" class="form-control" name="acido_folico" value="<?=$aporte->acido_folico?>" placeholder="Acido Folico" required>
                  </div>
                  <div class="form-group">
                    <label for="nombre">Ingredientes</label>
                    <input type="text" class="form-control" id="ingrediente" data-id="<?=$_GET['id']?>" placeholder="Escribe tus ingredientes, separalos por coma(,) o enter">
                    <br>
                    <div class="row">
                        <div class="col-md-12" id="chipss">
                            <?php while($ingrediente = $ingredientes->fetch_object()): ?>
                                <div class="chip" id="aroma<?=$ingrediente->id?>">
                                    <?=$ingrediente->nombre?>
                                    <span class="closebtn" data-id="<?=$ingrediente->id?>">&times;</span>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="text" value="editar-platillo" name="accion" style="display: none;">
                  <input type="text" value="<?=$_GET['id']?>" name="id" style="display: none;">
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
}
require_once 'layaut/footer.php';
?>